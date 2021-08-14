<?php

namespace App\Services;

use App\Models\Order\Order;
use App\Models\Product\Product;
use Illuminate\Support\Carbon;

class OrderService
{
    public function storeOrderProducts(array $products, Order $order): void
    {
        foreach ($products as $productKey => $productValue) {
            $selectedProduct = Product::find($productValue['id']);
            $orderProduct    = $order->products()->save(
                $selectedProduct,
                [
                    'quantity'    => $productValue['quantity'],
                    'unity_price' => $selectedProduct->price,
                ]
            );
            foreach ($productValue['additionals'] as $additionalKey => $additionalValue) {
                // TODO REGISTER ADDITIONAL NOT FOUND LOG
                $selectedAdditional = $selectedProduct->additionals()->find($additionalValue['id']);
                if ($selectedAdditional) {
                    $orderProduct->order_additionals()->save($selectedAdditional, [
                        'quantity'    => $additionalValue['quantity'],
                        'unity_price' => $selectedAdditional->price,
                        'order_id'    => $order->id,
                    ]);
                }
            }
        }
    }

    public function storeOrderPrice(Order $order, int $paymentMode, bool $needChange = false, float $valuePaidCash = 0.00): void
    {
        $changePrice = 0;

        $additionalsPrice = $order->additionals_total_price;
        $productsPrice    = $order->products_total_price;
        $totalPrice       =  $productsPrice + $additionalsPrice;

        $needChange = $needChange && $paymentMode == Order::MONEY ? 1 : 0;

        if ($needChange) {
            $changePrice = $totalPrice - $valuePaidCash;
        }

        $order->update([
            'total_price'  => $totalPrice,
            'change_price' => $changePrice,
            'need_change'  => $needChange,
        ]);
    }

    public function formatOrderStatusChanges($orderStatusChanges): array
    {
        $statusesList = Order::STATUSES_LIST;
        foreach ($statusesList as $listKey => $listValue) {
            foreach ($orderStatusChanges as $changeKey => $changeValue) {
                if ($listValue['value'] == $changeValue->status) {
                    $statusesList[$listKey]['completed'] = true;
                    $statusesList[$listKey]['date']      =  Carbon::parse($changeValue->created_at)->format('d/m/Y');
                    $statusesList[$listKey]['time']      =  Carbon::parse($changeValue->created_at)->format('H:i');
                }
            }
        }

        return $statusesList;
    }
}
