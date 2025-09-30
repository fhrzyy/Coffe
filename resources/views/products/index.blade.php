<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Products</h1>

        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Add Product</a>

        @if(session('success'))
            <div class="mt-4 p-2 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-4 bg-white border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Stock</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $i => $p)
                    <tr>
                        <td class="border px-4 py-2">{{ $i+1 }}</td>
                        <td class="border px-4 py-2">{{ $p->name }}</td>
                        <td class="border px-4 py-2">{{ $p->category->name }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($p->price) }}</td>
                        <td class="border px-4 py-2">{{ $p->stock }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <a href="{{ route('products.edit', $p->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
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
