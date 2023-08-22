<?php

namespace Database\Seeders;

use App\Enum\PlanPayment\TypeEnum;
use App\Models\Membership\PlanPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => 'PAY001',
                'name' => 'Dana',
                'holder' => 'Cindy Nurdiyanti',
                'type' => TypeEnum::ewallet,
                'address' => '089525505985',
            ],
            [
                'code' => 'PAY002',
                'name' => 'Gopay',
                'holder' => 'Cindy Nurdiyanti',
                'type' => TypeEnum::ewallet,
                'address' => '089525505985',
            ],
            [
                'code' => 'PAY003',
                'name' => 'OVO',
                'holder' => 'Cindy Nurdiyanti',
                'type' => TypeEnum::ewallet,
                'address' => '089525505985',
            ],
        ];

        PlanPayment::insert($data);
    }
}
