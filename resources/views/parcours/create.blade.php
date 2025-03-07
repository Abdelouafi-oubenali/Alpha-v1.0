<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Parcours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="container mx-auto" >
        <h1 class="text-3xl font-bold text-center mb-8 text-blue-700">Modifier le Parcours</h1>
        
        <div class="bg-white shadow-md rounded-lg p-6 w-[40rem]" >
            <form action="/modifier-parcours" method="POST">
                <!-- CSRF token for security -->
                @csrf

                <!-- Input pour le titre du parcours -->
                <div class="mb-6">
                    <label for="titre" class="block text-xl font-semibold text-gray-800 mb-2">Titre du Parcours</label>
                    <input type="text" id="titre" name="titre" class="w-full p-2 border rounded-md" value="" required>
                </div>

                <div class="mb-6">
                    <label for="titre" class="block text-xl font-semibold text-gray-800 mb-2">titre du Parcours</label>
                    <select id="titre" name="titre" class="w-full p-2 border rounded-md" required>
                        {{-- <option value="actif" {{ $parcours->statut == 'actif' ? 'selected' : '' }}>Actif</option>
                        <option value="inactif" {{ $parcours->statut == 'inactif' ? 'selected' : '' }}>Inactif</option>
                        <option value="en_cours" {{ $parcours->statut == 'en_cours' ? 'selected' : '' }}>En Cours</option> --}}
                    </select>
                </div>

                <!-- Input pour la description du parcours -->
                <div class="mb-6">
                    <label for="description" class="block text-xl font-semibold text-gray-800 mb-2">Description du Parcours</label>
                    <textarea id="description" name="description" rows="4" class="w-full p-2 border rounded-md" required> </textarea>
                </div>

                <!-- Sélecteur pour la durée du parcours -->
                <div class="mb-6">
                    <label for="duree" class="block text-xl font-semibold text-gray-800 mb-2">Durée du Parcours (en heures)</label>
                    <input type="number" id="duree" name="duree" class="w-full p-2 border rounded-md" value="" required>
                </div>

                <!-- Sélecteur pour le statut du parcours -->
                <div class="mb-6">
                    <label for="statut" class="block text-xl font-semibold text-gray-800 mb-2">Statut du Parcours</label>
                    <select id="statut" name="statut" class="w-full p-2 border rounded-md" required>
                        {{-- <option value="actif" {{ $parcours->statut == 'actif' ? 'selected' : '' }}>Actif</option>
                        <option value="inactif" {{ $parcours->statut == 'inactif' ? 'selected' : '' }}>Inactif</option>
                        <option value="en_cours" {{ $parcours->statut == 'en_cours' ? 'selected' : '' }}>En Cours</option> --}}
                    </select>
                </div>

            

                <!-- Boutons d'Action -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300" onclick="window.location.href='/parcours';">
                        Annuler
                    </button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Sauvegarder les Modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
