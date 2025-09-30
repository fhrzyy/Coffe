<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('items.product')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
{
    $request->validate([
        'product_id.*' => 'required|exists:products,id',
        'qty.*' => 'required|integer|min:1',
        'payment_method' => 'required|in:cash,debit,qris',
    ]);

    DB::beginTransaction();
    try {
        $transaction = Transaction::create([
            'user_id' => 1, // sementara hardcode
            'total_price' => 0,
            'payment_method' => $request->payment_method, // simpan metode pembayaran
        ]);

        $total = 0;

        foreach ($request->product_id as $key => $product_id) {
            $product = Product::findOrFail($product_id);
            $qty = $request->qty[$key];
            $subtotal = $product->price * $qty;
            $total += $subtotal;

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'qty' => $qty,
                'price' => $product->price,
                'subtotal' => $subtotal,
            ]);

            // kurangi stok
            $product->decrement('stock', $qty);
        }

        $transaction->update(['total_price' => $total]);

        DB::commit();
        return redirect()->route('transactions.index')->with('success', 'Transaction created.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['msg' => 'Error: ' . $e->getMessage()]);
    }
}


    public function show(Transaction $transaction)
    {
        $transaction->load('items.product');
        return view('transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted.');
    }
}
