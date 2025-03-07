<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Demandes de Congé</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-4">
  <div class="max-w-4xl mx-auto">
    <!-- En-tête -->
    <h1 class="text-2xl font-bold mb-4 text-center">Demandes de Congé</h1>

    <!-- Liste des demandes -->
    <div class="space-y-4">
      @forelse($congers as $demande)

      <div class="bg-white p-4 rounded shadow">
        <div class="flex justify-between mb-2">
          <h2 class="font-bold">{{ $demande->employe->name }}</h2>
          <span class="px-2 py-1 rounded-full text-sm 
            @if($demande->statut === 'accepte') bg-green-100 text-green-800
            @elseif($demande->statut === 'refusé') bg-red-100 text-red-800
            @else bg-yellow-100 text-yellow-800 @endif">
            {{ ucfirst($demande->statut) }}
          </span>
        </div>
        
        <div class="mb-3">
          <p><span class="font-semibold">Type:</span> {{ $demande->type_conge }}</p>
          <p><span class="font-semibold">Dates:</span> Du {{ $demande->date_debut }} au {{ $demande->date_fin }}</p>
          <p><span class="font-semibold">Soumis le:</span> {{ $demande->created_at->format('d/m/Y') }}</p>
        </div>

        <div class="flex space-x-2 justify-end">
          <!-- Bouton Accepter -->
          <form method="POST" action="{{ route('demandes.accepter', $demande->id) }}">
            @csrf
            @method('PUT')
            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Accepter</button>
          </form>

          <!-- Bouton Refuser -->
          <form method="POST" action="{{ route('demandes.refuser', $demande->id) }}">
            @csrf
            @method('PUT')
            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Refuser</button>
          </form>

          <!-- Bouton View -->
        </div>
      </div>

      @empty
        <p class="text-center text-gray-500">Aucune demande de congé disponible.</p>
      @endforelse
    </div>
  </div>
</body>
</html>
