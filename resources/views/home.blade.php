<!DOCTYPE html>
<html>
<head>
    <title>My Ecommerce Site - Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav li {
            margin: 0 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .hero {
            padding: 100px;
            text-align: center;
        }

        .hero h1 {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 24px;
            margin-bottom: 40px;
        }

        .hero button {
            background-color: #fff;
            color: #333;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
        }

        .main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product-card {
            width: 30%;
            margin-bottom: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 5px;
            overflow: hidden;
            padding: 20px;
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;

        }

        .product-card h3 {
            margin: 20px 0 10px 0;
            font-size: 24px;
            padding: 0 20px;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="{{ route('cart.index') }}">Cart</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="hero">
        <h1>Welcome to My Ecommerce Site</h1>
        <p>Find the best deals on the products you need</p>
        <button>Shop Now</button>
    </div>
</header>
<main>
    <h2>Featured Products</h2>
    <div class="products">
        @forelse($products as $products)
            <div class="product-card">
                <img src="{{ $products->image }}" alt="{{ $products->name }}">
                <h3>{{ $products->name }}</h3>
                <p>{{ $products->description }}</p>
                <p>{{ $products->price }} </p>

                <form action="{{ route('cart.store', $products->id ) }}" method="POST">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>

            </div>
        @empty
            <p>No products found</p>
        @endforelse

        </div>
    </div>
</main>
</body>
</html>
