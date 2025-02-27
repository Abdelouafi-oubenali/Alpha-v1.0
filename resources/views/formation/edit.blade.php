@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Modifier la formation</h1>

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
            <p class="font-bold">Erreur(s) :</p>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-gray-50 p-6 rounded-lg shadow">
        <form action="{{ route('formasion.update', $formations
        ->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div>
                <label for="titre" class="block text-gray-700 font-medium mb-2">Titre de la formation</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre', $formations->titre) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" rows="4" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $formations->description) }}</textarea>
            </div>

            <!-- Date de début -->
            <div>
                <label for="date_debut" class="block text-gray-700 font-medium mb-2">Date de début</label>
                <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut', $formations->date_debut) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Date de fin -->
            <div>
                <label for="date_fin" class="block text-gray-700 font-medium mb-2">Date de fin</label>
                <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin', $formations->date_fin) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Employé -->
            {{-- <div>
                <label for="employe_id" class="block text-gray-700 font-medium mb-2">Employé assigné</label>
                <select id="employe_id" name="employe_id" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($employes as $employe)
                        <option value="{{ $employe->id }}" {{ $formations->employe_id == $employe->id ? 'selected' : '' }}>
                            {{ $employe->nom }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
