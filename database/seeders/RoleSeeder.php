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
            ["name"=>"Admin"],
            ["name"=>"Secretaire"],
            ["name"=>"Medecin"],
            ["name"=>"Patient"],
            ["name"=>"Medecin_Coordinateur"]
        ]);
        // Role::factory(1)->create();
    }
}
