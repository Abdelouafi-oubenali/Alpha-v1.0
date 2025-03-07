@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Title -->
        <div>
            <label for="title" class="block text-gray-700 font-medium mb-2">Post Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter post title">
        </div>

        <!-- Content -->
        <div>
            <label for="content" class="block text-gray-700 font-medium mb-2">Post Content</label>
            <textarea id="content" name="content" required rows="5"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter post content">{{ old('content') }}</textarea>
        </div>

        <!-- Category -->
        {{-- <div>
            <label for="category_id" class="block text-gray-700 font-medium mb-2">Category</label>
            <select id="category_id" name="category_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option disabled selected>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                Create Post
            </button>
        </div>
    </form>
</div>
@endsection
