<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required',
            'status' => 'required',
            'delivery_address' => 'nullable',
        ]);

        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->order_date = $request->input('order_date');
        $order->total_amount = $request->input('total_amount');
        $order->payment_method = $request->input('payment_method');
        $order->status = $request->input('status');
        $order->delivery_address = $request->input('delivery_address');
        $order->save();

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required',
            'status' => 'required',
            'delivery_address' => 'nullable',
        ]);

        $order->user_id = $request->input('user_id');
        $order->order_date = $request->input('order_date');
        $order->total_amount = $request->input('total_amount');
        $order->payment_method = $request->input('payment_method');
        $order->status = $request->input('status');
        $order->delivery_address = $request->input('delivery_address');
        $order->save();

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
