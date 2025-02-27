@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">All Posts</h1>
    
    <!-- Button to create a new post -->
    <div class="mb-6 text-right">
        <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            ajouté New Post
        </a>
    </div>

    <!-- Posts List -->
    @foreach($posts as $post)
        <div class="bg-white shadow-md p-6 mb-4 rounded-lg">
            <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
            <p class="text-gray-700">{{ Str::limit($post->content, 150) }}</p>
            {{-- <p class="text-sm text-gray-500">By {{ $post->user->title }}   |  --}}
                Category: {{ $post->category->name ?? 'Uncategorized' }}
            </p>
            
            <!-- Buttons for managing the post -->
            <div class="mt-4 flex justify-between">
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">Read More</a>

                <div class="flex space-x-2">
                    <!-- Edit Button -->
                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:text-blue-900" title="Modifier">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="openDeleteModal('{{ $post->id }}', '{{ $post->titre }}')" class="text-red-600 hover:text-red-900" title="Supprimer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
