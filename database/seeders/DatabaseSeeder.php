<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Device;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Device::truncate();

        // User::factory()->create([
        //     'name' => 'Simon Garrick',
        //     'email' => 'simon.garrick@parall.ax',
        //     'password' => Hash::make(env('USER_DEFAULT_PASSWORD'))
        // ]);

        // $device = Device::factory(5)->create();


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
