<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-lg mx-auto">
        <h1 class="text-xl font-bold mb-4">Add Product</h1>

        <form action="{{ route('products.store') }}" method="POST" class="bg-white p-4 rounded shadow">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Category</label>
                <select name="category_id" class="w-full border p-2 rounded">
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Price</label>
                <input type="number" name="price" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Stock</label>
                <input type="number" name="stock" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Unit</label>
                <input type="text" name="unit" class="w-full border p-2 rounded">
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            <a href="{{ route('products.index') }}" class="ml-2 px-4 py-2 bg-gray-500 text-white rounded">Back</a>
        </form>
    </div>
</body>
</html>
