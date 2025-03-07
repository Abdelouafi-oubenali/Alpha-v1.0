@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Créer une formation</h1>

    <!-- Affichage des erreurs générales -->


    <div class="bg-gray-50 p-6 rounded-lg shadow">
        <form action="{{ route('formasion.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Titre -->
            <div>
                <label for="titre" class="block text-gray-700 font-medium mb-2">Titre de la formation</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Entrez le titre">
                @error('titre')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" rows="4" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Entrez une description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date de début -->
            <div>
                <label for="date_debut" class="block text-gray-700 font-medium mb-2">Date de début</label>
                <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut') }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('date_debut')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date de fin -->
            <div>
                <label for="date_fin" class="block text-gray-700 font-medium mb-2">Date de fin</label>
                <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin') }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('date_fin')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Enregistrer la formation
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
