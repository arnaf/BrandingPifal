<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SU = User::create([
            'email' => 'su@mail.com',
            'password' => bcrypt('superadmin'),
        ]);
        $SU -> assignRole('SU');
    }
}
