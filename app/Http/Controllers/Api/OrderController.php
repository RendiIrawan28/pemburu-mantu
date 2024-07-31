<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('image')->get();
        return response()->json($orders);
    }

    public function show(Order $order)
    {
        return response()->json($order->load('image'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:15',
            'image_id' => 'required|exists:images,id',
            'status' => 'required|string|in:pending,paid,shipped,completed,canceled',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'sometimes|required|string|max:255',
            'customer_email' => 'sometimes|required|email|max:255',
            'customer_phone' => 'sometimes|required|string|max:15',
            'image_id' => 'sometimes|required|exists:images,id',
            'status' => 'sometimes|required|string|in:pending,paid,shipped,completed,canceled',
        ]);

        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:pending,paid,shipped,completed,canceled',
        ]);

        $order->update(['status' => $request->status]);
        return response()->json($order);
    }
}
