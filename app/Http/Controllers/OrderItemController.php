<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{

    public function increaseQuantity(OrderItem $orderItem)
    {
        $orderItem->update([
            'quantity' => $orderItem->quantity + 1,
        ]);

        return redirect()->route('cart.index');
    }


    public function decreaseQuantity(OrderItem $orderItem)
    {
        if ($orderItem->quantity <= 1) {

            $orderItem->delete();
        } else {

            $orderItem->update([
                'quantity' => $orderItem->quantity - 1,
            ]);
        }

        return redirect()->route('cart.index');
    }
}
