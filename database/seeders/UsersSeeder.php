<?php

namespace Database\Seeders;

use App\Models\DentistsData;
use App\Models\PatientsData;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Admin User
        $admin = User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'status' => $faker->boolean,
            'role' => 'admin',
            'profile_photo' => $faker->imageUrl(),
            'email_verified_at' => now(),
        ]);

        DentistsData::create([
            'user_id' => $admin->id,
            'first_name' => $faker->firstName,
            'middle_name' => $faker->optional()->lastName,
            'last_name' => $faker->lastName,
            'extension_name' => $faker->optional()->suffix,
            'license_number' => $faker->phoneNumber,
        ]);

        // Regular User
        $user = User::create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'status' => $faker->boolean,
            'role' => 'user',
            'profile_photo' => $faker->imageUrl(),
            'email_verified_at' => now(),
        ]);

        PatientsData::create([
            'user_id' => $user->id,
            'first_name' => $faker->firstName,
            'middle_name' => $faker->optional()->lastName,
            'last_name' => $faker->lastName,
            'extension_name' => $faker->optional()->suffix,
            'phone_number' => '+63 9' . $faker->numberBetween(10, 99) . ' ' . $faker->numberBetween(100, 999) . ' ' . $faker->numberBetween(1000, 9999),
            'birthdate' => $faker->date,
            'sex' => $faker->randomElement(['male', 'female']),
            'province_id' => rand(1, 10),
            'city_id' => rand(1, 10),
            'barangay_id' => rand(1, 10),
        ]);

        // 30 random users
        for ($i = 0; $i < 30; $i++) {
            $user = User::create([
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'status' => $faker->boolean,
                'role' => 'user',
                'profile_photo' => $faker->imageUrl(),
                'email_verified_at' => now(),
            ]);

            PatientsData::create([
                'user_id' => $user->id,
                'first_name' => $faker->firstName,
                'middle_name' => $faker->optional()->lastName,
                'last_name' => $faker->lastName,
                'extension_name' => $faker->optional()->suffix,
                'phone_number' => '+63 9' . $faker->numberBetween(10, 99) . ' ' . $faker->numberBetween(100, 999) . ' ' . $faker->numberBetween(1000, 9999),
                'birthdate' => $faker->date,
                'sex' => $faker->randomElement(['male', 'female']),
                'province_id' => rand(1, 10),
                'city_id' => rand(1, 10),
                'barangay_id' => rand(1, 10),
            ]);
        }
    }
}
