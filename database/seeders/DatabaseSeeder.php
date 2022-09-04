<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Patient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  Client::factory(10)->create();

         $this->call(RoleSeeder::class);
         $this->call(PermissionSeeder::class);

         User::find(1)->roles()->attach(1);
         User::find(2)->roles()->attach(2);
         User::find(3)->roles()->attach(3);
         User::find(4)->roles()->attach(4);
         User::find(5)->roles()->attach(5);

        //  \App\Models\Patient::factory(10)->create();

    
    }
}
