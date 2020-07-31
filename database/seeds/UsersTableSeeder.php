<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

use App\Models\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => Config::get('hw.adminName'),
            'email' => Config::get('hw.adminEmail'),
            'password' => Hash::make(Config::get('hw.adminPassword'))
        ]);
    }
}
