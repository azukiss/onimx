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
                'cat_id' => 1,
                'order' => 1
            ],
            [
                'name' => 'Gravure',
                'slug' => 'gravure',
                'code' => 'GRVR',
                'cat_id' => 1,
                'order' => 2
            ],
            [
                'name' => 'Nude',
                'slug' => 'nude',
                'code' => 'ND',
                'cat_id' => 1,
                'order' => 3
            ],
            [
                'name' => 'China',
                'slug' => 'china',
                'code' => 'CHN',
                'cat_id' => 2,
                'order' => 4
            ],
            [
                'name' => 'Indonesia',
                'slug' => 'indonesia',
                'code' => 'IND',
                'cat_id' => 2,
                'order' => 5
            ],
            [
                'name' => 'Instagram',
                'slug' => 'instagram',
                'code' => 'IG',
                'cat_id' => 3,
                'order' => 6
            ],
            [
                'name' => 'Tiktok',
                'slug' => 'tiktok',
                'code' => 'TT',
                'cat_id' => 3,
                'order' => 7
            ],
        ];

        Tag::insert($data);
    }
}
