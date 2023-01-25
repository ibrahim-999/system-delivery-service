<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Courier;
use App\Models\Form;
use App\Models\Note;
use App\Models\Pickup;
use App\Policies\FormPolicy;
use App\Policies\PickupPolicy;
use App\Policies\NotePolicy;
use App\Policies\ServicePolicy;
use App\Policies\ShipmentPolicy;
use App\Policies\ClientPolicy;
use App\Policies\CouriersPolicy;
use App\Policies\ZonePolicy;
use App\Models\Service;
use App\Models\Shipment;
use App\Models\Zone;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        Client::class => ClientPolicy::class,
        Courier::class => CouriersPolicy::class,
        Shipment::class => ShipmentPolicy::class,
        Pickup::class => PickupPolicy::class,
        Note::class => NotePolicy::class,
        Zone::class => ZonePolicy::class,
        Service::class => ServicePolicy::class,
        Form::class => FormPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
