<?php

namespace Database\Seeders;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");
        for ($i = 1; $i < 21; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'remember_token' => Str::random(),
                'email_verified_at' => now()
            ]);
        }
    }
}
