<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            ["name"=>"admin"],
            ["name"=>"secretaire"],
            ["name"=>"medecin"],
            ["name"=>"patient"]
        ]);
        // Role::factory(1)->create();
    }
}
