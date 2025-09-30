<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Transaction</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function addRow() {
            let container = document.getElementById('products-container');
            let row = document.querySelector('.product-row').cloneNode(true);

            // reset value input
            row.querySelectorAll('input').forEach(i => i.value = '');
            container.appendChild(row);
        }
    </script>
</head>

<body class="p-6 bg-gray-100">
    <div class="max-w-lg mx-auto">
        <h1 class="text-xl font-bold mb-4">New Transaction</h1>

        <form action="{{ route('transactions.store') }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf

            <div id="products-container">
                <div class="product-row mb-3">
                    <label class="block mb-1">Product</label>
                    <select name="product_id[]" class="w-full border p-2 rounded mb-2">
                        @foreach ($products as $p)
                            <option value="{{ $p->id }}">{{ $p->name }} - Rp {{ number_format($p->price) }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="qty[]" class="w-full border p-2 rounded" placeholder="Quantity"
                        min="1">
                </div>
            </div>

            <button type="button" onclick="addRow()" class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded">+ Add
                Item</button>

            {{-- Tambahin ini --}}
            <div class="mt-4">
                <label class="block mb-1">Payment Method</label>
                <select name="payment_method" class="w-full border p-2 rounded" required>
                    <option value="cash">Cash</option>
                    <option value="debit">Debit</option>
                    <option value="qris">QRIS</option>
                </select>
            </div>

            <div class="mt-4">
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Save Transaction</button>
                <a href="{{ route('transactions.index') }}"
                    class="ml-2 px-4 py-2 bg-gray-500 text-white rounded">Back</a>
            </div>
        </form>

    </div>
</body>

</html>
