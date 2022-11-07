<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SU = Role::create([
            'name' => 'SU',
            'guard_name' => 'web'
        ]);


        $doctor = Role::create([
            'name' => 'doctor',
            'guard_name' => 'web'
        ]);


        $cashier = Role::create([
            'name' => 'cashier',
            'guard_name' => 'web'
        ]);


        $patient = Role::create([
            'name' => 'patient',
            'guard_name' => 'web'
        ]);


    }
}
