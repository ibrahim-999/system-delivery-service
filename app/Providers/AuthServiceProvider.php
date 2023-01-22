<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Courier;
use App\Models\Shipment;
use App\Policies\ClientPolicy;
use App\Policies\CouriersPolicy;
use App\Policies\ShipmentPolicy;
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
