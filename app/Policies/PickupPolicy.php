<?php

namespace App\Policies;

use App\Models\Pickup;
use App\Models\Role;;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PickupPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isAdmin())
            return true;
    }

    /**
     * Determine whether the user can view all shipments.
     *
     * @param  \App\Models\User $user
     * @return boolean
     */
    public function index(User $user)
    {
        return $user->isAuthorized('pickups', Role::UT_READ);
    }

    /**
     * Determine whether the user can view the shipment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pickup  $pickup
     * @return boolean
     */
    public function view(User $user, Pickup $pickup)
    {
        return $user->isAuthorized('pickups', Role::UT_READ)
            && ($user->client->account_number == $pickup->client_account_number ?? false);
    }

    /**
     * Determine whether the user can create shipments.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAuthorized('pickups', Role::UT_CREATE);
    }

    /**
     * Determine whether the user can update the shipment.
     *
     * @param  \App\Models\User $user
     * @param Pickup $pickup
     * @return mixed
     */
    public function update(User $user, Pickup $pickup)
    {
        $pass = false;
        if($user->isClient())
            $pass = $pickup->client->is($user->client);
        return $user->isAuthorized('pickups', Role::UT_UPDATE) && $pass;
    }

    /**
     * Determine whether the user can delete the shipment.
     *
     * @param  \App\Models\User $user
     * @param Pickup $pickup
     * @return mixed
     */
    public function delete(User $user, Pickup $pickup)
    {
        return $user->isAuthorized('pickups', Role::UT_DELETE)
            && $pickup->client_account_number == $user->client->account_number;
    }
}
