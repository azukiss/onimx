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
                'order' => 1
            ],
            [
                'name' => 'Gravure',
                'slug' => 'gravure',
                'code' => 'GRVR',
                'order' => 2
            ],
            [
                'name' => 'Nude',
                'slug' => 'nude',
                'code' => 'ND',
                'order' => 3
            ],
        ];

        Tag::insert($data);
    }
}
