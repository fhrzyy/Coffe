<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Transaction #{{ $transaction->id }}</h1>

        <table class="w-full border mb-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">Product</th>
                    <th class="border px-4 py-2">Qty</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction->items as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->product->name }}</td>
                        <td class="border px-4 py-2">{{ $item->qty }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($item->price) }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($item->subtotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="text-xl font-bold">Total: Rp {{ number_format($transaction->total_price) }}</p>


        <a href="{{ route('transactions.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded">Back</a>
    </div>
</body>
</html>
