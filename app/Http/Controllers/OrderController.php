<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Events\OrderPlaced;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));  // Blade view banao
    }
    public function store(Request $request)
    {
        // Validation (simple ke liye skip, real mein add karo)
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);
        $total = $product->price * $request->quantity;

        // Order create
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'completed',  // Assume payment done
        ]);

        // OrderItem create
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price,
        ]);

        // Event dispatch
        OrderPlaced::dispatch($order);

        return redirect()->route('orders.success')->with('success', 'Order placed!');
    }
}
