<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $dateTime = date('Y-m-d h:i:s', time());

        $data = [
            [
                'username' => 'SuperAdmin',
                'email' => 'superadmin@oni.test',
                'password' => Hash::make('test-superadmin'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
            [
                'username' => 'Admin',
                'email' => 'admin@oni.test',
                'password' => Hash::make('test-admin'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
            [
                'username' => 'Moderator',
                'email' => 'moderator@oni.test',
                'password' => Hash::make('test-moderator'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
            [
                'username' => 'Diamond',
                'email' => 'premium@oni.test',
                'password' => Hash::make('test-premium'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
            [
                'username' => 'Emerald',
                'email' => 'vip@oni.test',
                'password' => Hash::make('test-vip'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
            [
                'username' => 'Member',
                'email' => 'member@oni.test',
                'password' => Hash::make('test-member'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
            [
                'username' => 'Awaiting',
                'email' => 'awaiting@oni.test',
                'password' => Hash::make('test-awaiting'),
                'email_verified_at' => null,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
        ];

        User::insert($data);
    }
}
