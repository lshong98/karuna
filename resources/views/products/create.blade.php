@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-semibold mb-6">Add New Product</h2>
        <div class="flex justify-end mb-4">
            <a href="{{ route('products.index') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                Back
            </a>
        </div>
        <form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                <input type="number" name="price" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" step=".01" required>
            </div>
            <div class="mb-4">
                <label for="details" class="block text-gray-700 font-medium mb-2">Detail</label>
                <textarea name="details" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Publish</label>
                <div class="flex items-center mb-2">
                    <input type="radio" id="publish_yes" name="publish" value="1" class="mr-2">
                    <label for="publish_yes" class="text-gray-700">Yes</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="publish_no" name="publish" value="0" class="mr-2" checked>
                    <label for="publish_no" class="text-gray-700">No</label>
                </div>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                Submit
            </button>
        </form>
    </div>
@endsection