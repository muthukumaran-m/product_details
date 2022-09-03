<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BrandDetail;
use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        BrandDetail::insert(
            [
                [
                    "name" => "Nestle"
                ],
                [
                    "name" => "Britania"
                ],
            ]
        );

        ProductDetail::insert(
            [
                [
                    'name' => "Bikis",
                    'brand_detail_id' => 1,
                    "price" => 10,
                    "quantity" => 3,
                    "discount" => 10,
                    "tax" => 12
                ],
                [
                    'name' => "Choki",
                    'brand_detail_id' => 1,
                    "price" => 30,
                    "quantity" => 2,
                    "discount" => 5,
                    "tax" => 3
                ]
            ]
        );
        ProductDetail::insert(
            [
                [
                    'name' => "Milk",
                    'brand_detail_id' => 2,
                    "price" => 10,
                    "quantity" => 3,
                    "discount" => 10,
                    "tax" => 12
                ],
                [
                    'name' => "Cake",
                    'brand_detail_id' => 2,
                    "price" => 45,
                    "quantity" => 1,
                    "discount" => 5,
                    "tax" => 13
                ]
            ]
        );
    }
}
