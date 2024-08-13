<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderStatus::firstOrCreate([
           "name" =>  "pending"
        ]);
        OrderStatus::firstOrCreate([
            "name" =>"in progress"
        ]);
        OrderStatus::firstOrCreate([
            "name" =>"proccesing"
        ]);
        OrderStatus::firstOrCreate([
            "name" =>"complated"
        ]);
        OrderStatus::firstOrCreate([
            "name" =>"canceled"
        ]);
    }
}
