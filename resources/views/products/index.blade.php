<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        .success-msg {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        select:focus, input[type="number"]:focus {
            outline: none;
            border-color: #5c6bc0;
            box-shadow: 0 0 8px rgba(92, 107, 192, 0.3);
        }
        button {
            background-color: #5c6bc0;
            color: white;
            padding: 12px 30px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto 0;
        }
        button:hover {
            background-color: #3f51b5;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Available Products</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="success-msg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Order Form -->
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="product_id">Select Product</label>
                <select name="product_id" id="product_id" required>
                    <option value="">-- Choose a product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }} - ${{ number_format($product->price, 2) }}
                            (Stock: {{ $product->stock }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" required>
            </div>

            <div class="text-center">
                <button type="submit">Place Order</button>
            </div>
        </form>
    </div>
</body>
</html>