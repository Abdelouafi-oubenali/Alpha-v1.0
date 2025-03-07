<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignation des Formations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8 text-blue-700">Assignation des Formations</h1>
        
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('assignFormation', ['formationId' => $formations->first()->id]) }}" method="POST">
                <!-- CSRF token for security -->
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Formulaire de Sélection de Formation -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Sélection de Formation</h2>
                        <select name="formation_id" class="w-full p-2 border rounded-md mb-4" required>
                            @foreach($formations as $formation)
                                <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                            @endforeach
                        </select>
                    </div>

          
                </div>

                <!-- Liste des Employés -->
                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800">Liste des Employés</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white border">
                            <thead class="bg-blue-50">
                                <tr>
                                    <th class="p-3 text-left">
                                        <input type="checkbox" class="mr-2" id="selectAll">
                                        Sélectionner Tout
                                    </th>
                                    <th class="p-3 text-left">Nom</th>
                                    <th class="p-3 text-left">Département</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">
                                        <input type="checkbox" name="selected_users[]" value="{{ $user->id }}" class="mr-2">
                                    </td>
                                    <td class="p-3">{{ $user->name }}</td>
                                    <td class="p-3">{{ $user->posIdt }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Boutons d'Action -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300" onclick="window.location.reload()">
                        Annuler
                    </button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Assigner la Formation
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script to select/deselect all checkboxes -->
    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[name="selected_users[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
</body>
</html>
