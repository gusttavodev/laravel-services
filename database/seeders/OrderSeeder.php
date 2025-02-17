<?php

namespace Database\Seeders;

use App\Models\Establishment\Establishment;
use App\Models\Order\Order;
use App\Models\User\User;
use App\Models\User\WppUser;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // WPP USER

        Establishment::all()->each(function ($establishment) {
            $establishment->orders()->saveMany(
                Order::factory(3)->make()
            )->each(function ($order) {
                $allProducts = $order->establishment->user->products()->take(3)->get();
                $allAdditionals = $order->establishment->user->additionals()->take(3)->get();

                foreach ($allProducts as $productKey => $productValue) {
                    $order->products()->save(
                        $productValue,
                        [
                            'quantity'    => 3,
                            'unity_price' => $productValue->price,
                        ]
                    );
                }

                foreach ($allAdditionals as $additionalsKey => $additionalsValue) {
                    foreach ($order->products as $orderProdKey => $orderProdValue) {
                        $orderProdValue->order_additionals()->save($additionalsValue, [
                            'quantity'    => 3,
                            'order_id'    => $order->id,
                            'unity_price' => $additionalsValue->price,
                        ]);
                    }
                }
            });
        });

        $orders  = Order::all();
        $wppUser =  WppUser::factory(2)->create();
        foreach ($wppUser as $wppUserKey => $wppUserValue) {
            foreach ($orders as $ordersKey => $ordersValue) {
                $ordersValue->wpp_user_id = $wppUserValue->id;
                $ordersValue->save();
            }
        }

        // USER CLIENT
        Establishment::all()->each(function ($establishment) {
            $establishment->orders()->saveMany(
                Order::factory(3)->make()
            )->each(function ($order) {
                $allProducts = $order->establishment->user->products()->take(3)->get();
                $allAdditionals = $order->establishment->user->additionals()->take(3)->get();

                foreach ($allProducts as $productKey => $productValue) {
                    $order->products()->save(
                        $productValue,
                        [
                            'quantity'    => 3,
                            'unity_price' => $productValue->price,
                        ]
                    );
                }

                foreach ($allAdditionals as $additionalsKey => $additionalsValue) {
                    foreach ($order->products as $orderProdKey => $orderProdValue) {
                        $orderProdValue->order_additionals()->save($additionalsValue, [
                            'quantity'    => 3,
                            'order_id'    => $order->id,
                            'unity_price' => $additionalsValue->price,
                        ]);
                    }
                }
            });
        });

        $users = User::factory(2)->create()->each(function ($user) {
            $user->assignRole('client');
        });

        $orders = Order::where('wpp_user_id', null)->get();
        foreach ($users as $usersKey => $usersValue) {
            foreach ($orders as $ordersKey => $ordersValue) {
                $ordersValue->user_id = $usersValue->id;
                $ordersValue->save();
            }
        }
    }
}
