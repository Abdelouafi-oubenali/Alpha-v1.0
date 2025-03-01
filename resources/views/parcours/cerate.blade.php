@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-primary mb-4">Liste des Parcours</h1>

    <!-- Liste des Parcours -->
    <div class="space-y-6">
        @foreach($parcours as $parcour)
            <div class="bg-white shadow-lg p-6 rounded-lg">
                <h3 class="text-2xl font-semibold text-gray-800">{{ $parcour->titre }}</h3>
                <p class="text-gray-700">{{ $parcour->description }}</p>
                
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('parcours.show', $parcour->id) }}" class="btn btn-info">Voir les Détails</a>
                    <div class="flex space-x-2">
                        <a href="{{ route('formations.create', $parcour->id) }}" class="btn btn-success">Ajouter Formation</a>
                        <a href="{{ route('grades.create', $parcour->id) }}" class="btn btn-warning">Ajouter Grade</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
