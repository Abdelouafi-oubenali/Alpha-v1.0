@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10 bg-white rounded-lg shadow-md">
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">Update Department</h1>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
            <p class="font-bold">Error(s):</p>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-gray-50 p-6 rounded-lg shadow">
        <form action="{{ route('departements.update', $departement->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nom du département -->
            <div>
                <label for="nom" class="block text-gray-700 font-medium mb-2">Department Name</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $departement->nom) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter department name">
            </div>

            <!-- Responsable du département -->
            <div>
                <label for="responsable_id" class="block text-gray-700 font-medium mb-2">Responsible User</label>
                <select id="responsable_id" name="responsable_id" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled>Select a responsible user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $departement->responsable_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Update Department
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
