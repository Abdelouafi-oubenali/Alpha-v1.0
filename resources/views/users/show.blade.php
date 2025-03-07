<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formations des Employés</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
  <div class="container mx-auto p-4 max-w-6xl">
    <div class="bg-white rounded-lg shadow-md p-6 my-8">
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Suivi des {{ $user->name}}</h1>
      
      <!-- Barre d'étapes -->
      <div class="relative my-12">
        <div class="flex items-center justify-between mb-12">
          <!-- Ligne de connexion -->
          <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-gray-300 w-full"></div>
          
          <!-- Étapes -->
          <div class="relative z-10 flex flex-col items-center">
            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">1</div>
            <div class="mt-2 text-sm font-medium">Inscription</div>
            <div class="text-xs text-gray-500">15/02/2025</div>
          </div>
          
          <div class="relative z-10 flex flex-col items-center">
            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">2</div>
            <div class="mt-2 text-sm font-medium">En cours</div>
            <div class="text-xs text-gray-500">01/03/2025</div>
          </div>
          
          <div class="relative z-10 flex flex-col items-center">
            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">3</div>
            <div class="mt-2 text-sm font-medium">Evaluation</div>
            <div class="text-xs text-gray-500">15/03/2025</div>
          </div>
          
          <div class="relative z-10 flex flex-col items-center">
            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">4</div>
            <div class="mt-2 text-sm font-medium">Certification</div>
            <div class="text-xs text-gray-500">30/03/2025</div>
          </div>
        </div>
      </div>
      
      <!-- Information de la formation en cours -->
      <div class="mb-8 p-6 border rounded-lg bg-blue-50 border-blue-200">
        <h2 class="text-xl font-semibold text-blue-800 mb-4">Formation actuelle: Développement Web Avancé</h2>
        <div class="flex flex-wrap gap-4">
          <div class="flex-1 min-w-max">
            <p class="text-sm text-gray-600 mb-1">Date de début:</p>
            <p class="font-medium">01/03/2025</p>
          </div>
          <div class="flex-1 min-w-max">
            <p class="text-sm text-gray-600 mb-1">Date de fin prévue:</p>
            <p class="font-medium">30/03/2025</p>
          </div>
          <div class="flex-1 min-w-max">
            <p class="text-sm text-gray-600 mb-1">Formateur:</p>
            <p class="font-medium">Jean Dupont</p>
          </div>
        </div>
      </div>
      <!-- Bouton d'action -->
      <div class="mt-8 text-center">
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition-colors">
          Voir toutes les formations
        </button>
      </div>
    </div>
  </div>
</body>
</html>