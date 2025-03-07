@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <h2 class="text-2xl font-semibold mb-4">Modifier le profil</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Nom</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                class="w-full p-2 border rounded">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                class="w-full p-2 border rounded">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Mot de passe (laisser vide si inchangé)</label>
            <input type="password" name="password" class="w-full p-2 border rounded">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Confirmer Mot de passe</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Photo de profil</label>
            <input type="file" name="avatar" class="w-full p-2 border rounded">
            @if($user->avatar)
                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" class="mt-2 w-20 h-20 rounded-full">
            @endif
            @error('avatar') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Mettre à jour
        </button>
    </form>
</div>
@endsection
