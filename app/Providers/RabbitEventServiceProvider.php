<?php

namespace App\Providers;

use Nuwber\Events\BroadcastEventServiceProvider;

class RabbitEventServiceProvider extends BroadcastEventServiceProvider
{
    /**
     * Th event listener mappings for the application
     *
     * @var array
     */
    protected $listen = [
        'users.registered' => [
            'App\Listeners\Authorizable\NewAuthorizableRegistered',
        ],
    ];
}
