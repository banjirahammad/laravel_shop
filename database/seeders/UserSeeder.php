<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  =>  'banjir',
            'email'  =>  'banjir@gmail.com',
            'phone'  =>  '01797948994',
            'address'  =>  'Mirpur, Dhaka',
            'role'  =>  1,
            'password'  =>  Hash::make('123456'),
        ]);
        User::create([
            'name'  =>  'test123',
            'email'  =>  'test123@gmail.com',
            'phone'  =>  '01797948994',
            'address'  =>  'Mirpur, Dhaka',
            'password'  =>  Hash::make('test123'),
        ]);
    }
}
