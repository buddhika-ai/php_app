<?php

namespace App\Http\Controllers;

use App\Models\CreditPurchase;
use Illuminate\Http\Request;

class CreditPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditPurchases = CreditPurchase::all();
        return view('credit-purchases.index', compact('creditPurchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('credit-purchases.create');
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
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'deduction_date' => 'required|date',
            'status' => 'required',
        ]);

        $creditPurchase = new CreditPurchase();
        $creditPurchase->user_id = $request->input('user_id');
        $creditPurchase->order_id = $request->input('order_id');
        $creditPurchase->amount = $request->input('amount');
        $creditPurchase->deduction_date = $request->input('deduction_date');
        $creditPurchase->status = $request->input('status');
        $creditPurchase->save();

        return redirect()->route('credit-purchases.index')
            ->with('success', 'Credit Purchase created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditPurchase  $creditPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(CreditPurchase $creditPurchase)
    {
        return view('credit-purchases.show', compact('creditPurchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreditPurchase  $creditPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditPurchase $creditPurchase)
    {
        return view('credit-purchases.edit', compact('creditPurchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditPurchase  $creditPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditPurchase $creditPurchase)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'deduction_date' => 'required|date',
            'status' => 'required',
        ]);

        $creditPurchase->user_id = $request->input('user_id');
        $creditPurchase->order_id = $request->input('order_id');
        $creditPurchase->amount = $request->input('amount');
        $creditPurchase->deduction_date = $request->input('deduction_date');
        $creditPurchase->status = $request->input('status');
        $creditPurchase->save();

        return redirect()->route('credit-purchases.index')
            ->with('success', 'Credit Purchase updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditPurchase  $creditPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditPurchase $creditPurchase)
    {
        $creditPurchase->delete();

        return redirect()->route('credit-purchases.index')
            ->with('success', 'Credit Purchase deleted successfully.');
    }
}
