@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-semibold mb-4">Products</h2>
        <div class="flex justify-end mb-4">
            <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                Create New Product
            </a>
        </div>
        <div class="mb-4">
            <input type="text" id="filterInput" placeholder="Search by name" class="px-4 py-2 border rounded w-full" onkeyup="filterTable()">
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded shadow-md">
                <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">Name</th>
                    <th class="py-2 px-4 border-b text-left">Price(RM)</th>
                    <th class="py-2 px-4 border-b text-left">Details</th>
                    <th class="py-2 px-4 border-b text-left">Publish</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
                </thead>
                <tbody id="productTableBody">
                @foreach($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $product->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->details }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->publish ? 'Yes' : 'No' }}</td>
                        <td class="py-2 px-4 border-b flex space-x-2">
                            <a href="{{ route('products.show', $product->id) }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                                Show
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-500" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function filterTable() {
            const input = document.getElementById("filterInput").value.toLowerCase();
            const tableBody = document.getElementById("productTableBody");
            const rows = tableBody.getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                const name = cells[1].innerText.toLowerCase();

                if (name.includes(input)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
