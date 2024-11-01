@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-semibold mb-4">Product Details</h2>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <h3 class="text-lg font-medium">Name:</h3>
                <p class="text-gray-700">{{ $product->name }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium">Price:</h3>
                <p class="text-gray-700">RM {{ number_format($product->price, 2) }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium">Details:</h3>
                <p class="text-gray-700">{{ $product->details }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium">Publish:</h3>
                <p class="text-gray-700">{{ $product->publish ? 'Yes' : 'No' }}</p>
            </div>
            <div class="mt-6 flex space-x-2">
                <a href="{{ route('products.index') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                    Back
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
            </div>
        </div>
    </div>
@endsection
