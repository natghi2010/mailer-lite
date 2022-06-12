<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seed the subscribers and their fields
        Subscriber::factory(5)->create()->each(function ($user) {
            $user->fields()->saveMany(Field::factory(5)->make());
        });
    }
}
