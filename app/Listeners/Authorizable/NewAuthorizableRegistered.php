<?php

namespace App\Listeners\Authorizable;

use App\Entities\Authorizable;

class NewAuthorizableRegistered
{
    /**
     * Handle the event.
     *
     * @param  array  $payload
     * @return void
     */
    public function handle(array $payload)
    {
        $authorizable = Authorizable::create([
            'entity_id' => $payload["user_id"],
            'entity' => 'User',
        ]);

        // assign role
    }
}
