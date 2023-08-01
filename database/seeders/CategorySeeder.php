<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Koleksi Mantap',
                'slug' => 'koleksi-mantap',
                'order' => 1
            ],
            [
                'name' => 'Koleksi Sexy',
                'slug' => 'koleksi-sexy',
                'order' => 2
            ],
            [
                'name' => 'Koleksi MedSos',
                'slug' => 'koleksi-medsos',
                'order' => 3
            ],
        ];

        Category::insert($data);
    }
}
