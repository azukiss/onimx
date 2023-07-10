<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Cosplay',
                'slug' => 'cosplay',
                'code' => 'CSPLY',
            ],
            [
                'name' => 'Gravure',
                'slug' => 'gravure',
                'code' => 'GRVR',
            ],
        ];

        Tag::insert($data);
    }
}
