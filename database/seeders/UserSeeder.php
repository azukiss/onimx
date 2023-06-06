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
                'username' => 'Uploader',
                'email' => 'uploader@oni.test',
                'password' => Hash::make('test-uploader'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
        ];

        User::insert($data);
    }
}
