<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnums;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $order = Order::query()
            ->with('items.product')
            ->where('status', OrderStatusEnums::Pending)
            ->first();

        return view('cart', [
            'order' => $order,
        ]);
    }

    public function store(Product $product)
    {
        $order = Order::firstOrCreate([
            'status' => OrderStatusEnums::Pending,
        ],[
            'reference' => 'ORD-'.strtoupper(uniqid()),
        ]);

        if ($orderItem = $order->items()->where('product_id', $product->id)->first()) {

            $orderItem->update([
                'quantity' => $orderItem->quantity + 1,
            ]);
        } else {

            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('home');
    }




}
