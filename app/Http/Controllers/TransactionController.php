<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Transaction::all(); 
        return view('pages.transactions.index')->with([
            'items' => $items
        ]);
    }

    // Metode untuk mengubah status transaksi
    public function changeStatus($id, Request $request)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = $request->status;
        $transaction->save();

        return redirect()->route('transactions.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $item = Transaction::with('details.product')->findOrFail($id);
        return view('pages.transaction.show')->with([
            'item' => $item
        ]);
    }

    public function edit(string $id)
    {
        $item = Transaction::findOrFail($id);
        return view('pages.transactions.edit')->with([
            'item' => $item
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'transaction_total' => 'required|numeric',
            'transaction_status' => 'required|string|in:PENDING,SUCCESS,FAILED'
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
