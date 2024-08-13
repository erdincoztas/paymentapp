<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class changeUserNameToUserId extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $user=User::where('name',$order->seller_id)->first();
            if($user){
               $order->seller_id=$user->id;
               $order->save();

            }

        }
    }
}
