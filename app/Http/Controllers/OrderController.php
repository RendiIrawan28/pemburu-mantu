<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderImages()
    {
        $images = Image::all();
        return view('orders.order', compact('images'));
    }

    public function index()
    {
        $orders = Order::where('image_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    public function show()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.show', compact('orders'));
    }

    public function create(Image $image)
    {
        return view('orders.create', compact('image'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'image_id' => 'required|exists:images,id',
        ]);

        $order = new Order();
        $order->customer_name = $request->input('customer_name');
        $order->customer_email = $request->input('customer_email');
        $order->customer_phone = $request->input('customer_phone');
        $order->alamat = $request->input('alamat');
        $order->image_id = $request->input('image_id');
        $order->user_id = Auth::id();
        $order->status = 'pending';
        $order->save();

        return redirect()->route('orders.show')->with('success', 'Order placed successfully');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,completed,canceled',
        ]);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully');
    }
}
