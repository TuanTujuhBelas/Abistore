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
        return view('pages.transaction.index')->with([
            'items' => $items
        ]);
    }

 
    public function create()
    {
        // Tampilkan form untuk membuat data transaksi baru
    }

    
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form jika diperlukan
        Transaction::create([
            'field1' => $request->field1,
            'field2' => $request->field2,
            // Isi dengan field yang sesuai
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show($id)
    {
        // Tampilkan detail transaksi berdasarkan $id
        $item = Transaction::findOrFail($id);
        return view('pages.transaction.show', compact('item'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit data transaksi berdasarkan $id
        $item = Transaction::findOrFail($id);
        return view('pages.transaction.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form jika diperlukan
        $item = Transaction::findOrFail($id);
        $item->update([
            'field1' => $request->field1,
            'field2' => $request->field2,
            // Isi dengan field yang sesuai
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus data transaksi berdasarkan $id
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
