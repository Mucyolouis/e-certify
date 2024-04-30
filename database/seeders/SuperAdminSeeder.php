<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Super User', 
            'email' => 'super@mail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Christian User
        $christian = User::create([
            'name' => 'Umukirisitu', 
            'email' => 'christian@mail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $christian->assignRole('Christian');

        // Creating Clergy User
        $clergy = User::create([
            'name' => 'clergy', 
            'email' => 'clergy@mail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $clergy->assignRole('Clergy');
    }
}
