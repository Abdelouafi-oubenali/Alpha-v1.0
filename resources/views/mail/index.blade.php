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
      @forelse($congers as $demande) <!-- Correction de la variable -->

      <div class="bg-white p-4 rounded shadow">
        <div class="flex justify-between mb-2">
        <h2 class="font-bold">{{ $demande->employe->name }}</h2>
          <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">
            {{ ucfirst($demande->statut) }}
          </span>
        </div>
        
        <div class="mb-3">
          <p><span class="font-semibold">Type:</span> {{ $demande->type_conge }}</p>
          <p><span class="font-semibold">Dates:</span> Du {{ $demande->date_debut }} au {{ $demande->date_fin }}</p>
          <p><span class="font-semibold">Soumis le:</span> {{ $demande->created_at->format('d/m/Y') }}</p>
        </div>
        
        <div class="flex space-x-2 justify-end">
          <form method="POST" action="#">
            @csrf
            @method('PUT')
            <input type="hidden" name="statut" value="accepté">
            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Accepter</button>
          </form>

          <form method="POST" action="#">
            @csrf
            @method('PUT')
            <input type="hidden" name="statut" value="refusé">
            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Refuser</button>
          </form>

          <form method="POST" action="#">
            @csrf
            @method('PUT')
            <input type="hidden" name="statut" value="en attente">
            <button class="bg-blue-600 hover:bg-blue-600 text-white px-3 py-1 rounded">View</button>
        </form>
        
        </div>
      </div>

      @empty
        <p class="text-center text-gray-500">Aucune demande de congé disponible.</p>
      @endforelse
    </div>
  </div>
</body>
</html>
