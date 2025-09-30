<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Models\Product;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil kasir sebagai user transaksi
        $kasir = User::where('role', 'kasir')->first();

        // Ambil beberapa produk
        $products = Product::take(3)->get();

        // Bikin 10 transaksi dummy
        for ($i = 0; $i < 10; $i++) {
            $transaction = Transaction::create([
                'user_id' => $kasir->id,
                'total_price' => 0, // sementara, nanti diupdate
                'payment_method' => collect(['cash', 'qris', 'debit'])->random(),
                'created_at' => now()->subDays(rand(0, 30)), // biar nyebar 30 hari terakhir
            ]);

            $total = 0;

            // Tambahin detail transaksi (2 produk per transaksi)
            foreach ($products->random(2) as $product) {
                $qty = rand(1, 3);
                $subtotal = $product->price * $qty;

                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $product->id,
                    'qty' => $qty,
                    'price' => $product->price,
                    'subtotal' => $subtotal,
                ]);

                $total += $subtotal;

                // Kurangi stok produk
                $product->decrement('stock', $qty);
            }

            // Update total price transaksi
            $transaction->update(['total_price' => $total]);
        }
    }
}
