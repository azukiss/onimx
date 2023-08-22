<?php

namespace Database\Seeders;

use App\Models\Membership\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'PLAN001',
                'name' => 'Emerald',
                'price' => 50000,
                'length' => 30,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'code' => 'PLAN002',
                'name' => 'Diamond',
                'price' => 150000,
                'length' => 30,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'PLAN003',
                'name' => 'Citrine',
                'price' => 250000,
                'length' => 30,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        Plan::insert($data);
    }
}
