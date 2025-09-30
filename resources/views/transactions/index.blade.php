<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Transactions</h1>

        <a href="{{ route('transactions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ New Transaction</a>

        @if(session('success'))
            <div class="mt-4 p-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-4 bg-white border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Total</th>
                    <th class="border px-4 py-2">Items</th>
                    <th class="p-2 border">Payment</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $i => $t)
                    <tr>
                        <td class="border px-4 py-2">{{ $i+1 }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($t->total_price) }}</td>
                        <td class="border px-4 py-2">
                            <ul class="list-disc pl-4">
                                @foreach($t->items as $item)
                                    <li>{{ $item->product->name }} x {{ $item->qty }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="p-2 border">{{ ucfirst($t->payment_method) }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <a href="{{ route('transactions.show', $t->id) }}" class="px-3 py-1 bg-green-600 text-white rounded">Detail</a>
                            <form action="{{ route('transactions.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Delete this transaction?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
