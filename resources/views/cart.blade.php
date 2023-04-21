
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        /* Styles for the shopping cart page */
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .cart {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr 1fr;
            grid-gap: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .cart img {
            width: 100%;
            height: auto;
        }

        .cart h2 {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }

        .cart p {
            font-size: 18px;
            margin: 0;
        }

        .cart .quantity {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart .quantity button {
            background-color: #f8f8f8;
            border: none;
            font-size: 24px;
            font-weight: 700;
            padding: 5px 10px;
            cursor: pointer;
        }

        .cart .total {
            font-size: 24px;
            font-weight: 700;
            text-align: right;
        }

        .checkout {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .checkout button {
            background-color: #f8f8f8;
            border: none;
            font-size: 24px;
            font-weight: 700;
            padding: 10px 20px;
            cursor: pointer;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Shopping Cart</h1>

    @forelse($order->items as $orderItem)


        <div class="cart">
            <img src="https://picsum.photos/200" alt="Product Image">
            <div>
                <h2>{{ $orderItem->product->name }}</h2>
                <p>{{$orderItem->product->description}}</p>
            </div>
            <div class="quantity">
                <form action="{{ route('orderItem.decrease', $orderItem->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit">-</button>
                </form>

                <span>{{$orderItem->quantity}}</span>

                <form action="{{ route('orderItem.increase', $orderItem->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit">+</button>
                </form>

            </div>
            <div class="total">{{$orderItem->total}}</div>
        </div>
    @empty
        <div class="cart">
            <p>No items in cart.</p>
        </div>


    @endforelse


    <div class="cart">
        <div class="total">Total: {{$order->total}}</div>
    </div>

    {{ $order->items->count() < 1 ? 'Your cart is empty' : ''}}

    <div class="checkout">

        <form action="{{route('checkout', $order->id )}}" method="POST">
            @csrf
        @method('POST')
            <button type="submit" {{ $order->items->count() < 1 ? 'disabled' : ''}}>Checkout</button>
        </form>
    </div>
</div>
</body>
</html>
