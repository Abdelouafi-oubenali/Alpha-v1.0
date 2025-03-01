@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Modifier Parcours</h1>
    
    <form action="{{ route('parcours.update', $parcour) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Titre</label>
            <input type="text" name="titre" value="{{ $parcour->titre }}" required class="input input-bordered w-full">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="textarea textarea-bordered w-full">{{ $parcour->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Date Début</label>
            <input type="date" name="date_debut" value="{{ $parcour->date_debut }}" required class="input input-bordered w-full">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Date Fin</label>
            <input type="date" name="date_fin" value="{{ $parcour->date_fin }}" class="input input-bordered w-full">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
