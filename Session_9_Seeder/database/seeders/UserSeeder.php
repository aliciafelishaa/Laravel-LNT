<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Andi',
            'email'=>'andi@gmail.com',
            // 'password'=>bcrypt('andiho76')
            'password'=>Hash::make('andiho76'),
            'phone_number'=>'087654345678',
            'address'=>'Jl.Mahoni',
            'email_verified_at'=>now(),
            'city_id'=> 1
        ]);
        User::create([
            'name'=>'Budi',
            'email'=>'budi@gmail.com',
            // 'password'=>bcrypt('andiho76')
            'password'=>Hash::make('budiho76'),
            'phone_number'=>'087654345078',
            'address'=>'Jl.Mama',
            'email_verified_at'=>now(),
            'city_id'=> 2
        ]);
    }
}
