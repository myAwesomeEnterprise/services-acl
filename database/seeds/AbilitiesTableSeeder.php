<?php

use App\Entities\Ability;
use Illuminate\Database\Seeder;

class AbilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ability::class)->create([
            'name' => '*',
            'title' => 'All abilities',
        ]);
    }
}
