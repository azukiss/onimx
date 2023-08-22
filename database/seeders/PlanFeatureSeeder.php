<?php

namespace Database\Seeders;

use App\Enum\PlanFeature\TypeEnum;
use App\Models\Membership\PlanFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'plan_id' => 1,
                'name' => 'Hide Sponsor',
                'description' => 'No more adsense on website',
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 1,
            ],
            [
                'plan_id' => 1,
                'name' => 'Skip Short Link',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 2,
            ],
            [
                'plan_id' => 1,
                'name' => 'Direct Download Link',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 3,
            ],
            [
                'plan_id' => 2,
                'name' => 'Direct Download Link',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 6,
            ],
            [
                'plan_id' => 2,
                'name' => 'Paid Download Link',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 7,
            ],
            [
                'plan_id' => 2,
                'name' => 'Skip Short Link',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 5,
            ],
            [
                'plan_id' => 2,
                'name' => 'Hide Sponsor',
                'description' => 'No more adsense on website',
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 4,
            ],
            [
                'plan_id' => 3,
                'name' => 'Hide Sponsor',
                'description' => 'No more adsense on website',
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 8,
            ],
            [
                'plan_id' => 3,
                'name' => 'Skip Short Link',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 9,
            ],
            [
                'plan_id' => 3,
                'name' => 'Paid Download Link',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 11,
            ],
            [
                'plan_id' => 3,
                'name' => 'Direct Download Link',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 10,
            ],
            [
                'plan_id' => 3,
                'name' => 'Picture Live View',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 12,
            ],
            [
                'plan_id' => 3,
                'name' => 'Video Streaming',
                'description' => NULL,
                'type' => TypeEnum::Boolean,
                'value' => '1',
                'order' => 13,
            ],
        ];

        PlanFeature::insert($data);
    }
}
