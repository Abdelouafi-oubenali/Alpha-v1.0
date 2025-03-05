<!-- resources/views/demande-conge.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de congé</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        @if ($errors->any())
        <div class="alert alert-danger" style="background-color: red; color: white; padding: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Demande de congé</h1>
            
            <form action="{{ route('conges.store') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <h2 class="text-lg font-semibold border-b border-gray-300 pb-2 mb-4">Informations personnelles</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom et prénom</label>
                            <input type="text" id="nom" name="nom"  
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="service" class="block text-sm font-medium text-gray-700 mb-1">Service</label>
                            <input type="text" id="service" name="service"  
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="matricule" class="block text-sm font-medium text-gray-700 mb-1">Matricule</label>
                            <input type="text" id="matricule" name="matricule"  
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">email</label>
                            <input type="email" id="email" name="email"  
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h2 class="text-lg font-semibold border-b border-gray-300 pb-2 mb-4">Période de congé</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="date_debut" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                            <input type="date" id="date_debut" name="date_debut"  
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="date_fin" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                            <input type="date" id="date_fin" name="date_fin"  
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="date_reprise" class="block text-sm font-medium text-gray-700 mb-1">Date de reprise</label>
                            <input type="date" id="date_reprise" name="date_reprise"  
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="jours" class="block text-sm font-medium text-gray-700 mb-1">Nombre de jours</label>
                            <input type="number" value="{{ $conges }}" id="jours" name="jours" min="0.5" step="0.5"  
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                   
                        </div>
                    </div>
                </div>
                
                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text">Type de congé</span>
                    </label>
                    <select class="select select-bordered w-full" name="type_conge">
                        <option disabled selected>Sélectionnez un type de congé</option>
                        <option>conge_paye</option>
                        <option>rtt</option>
                        <option>sans_solde</option>
                        <option>maladie</option>
                        <option>maternite</option>
                        <option>autre</option>

                    </select>
                </div>
                
                <div class="mb-6">
                    <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-1">Commentaires</label>
                    <textarea id="commentaire" name="commentaire" rows="3" 
                             class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-2">Signature de l'employé</p>
                        <div class="h-24 border border-gray-300 rounded-md"></div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-2">Signature du responsable</p>
                        <div class="h-24 border border-gray-300 rounded-md"></div>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end space-x-4">
                    <button type="button" onclick="window.history.back()" 
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Annuler
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Soumettre
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var today = new Date();
            var sevenDaysFromNow = new Date();
            sevenDaysFromNow.setDate(today.getDate() + 7);
            var minDate = sevenDaysFromNow.toISOString().split('T')[0];

            document.getElementById('date_debut').setAttribute('min', minDate);

            document.getElementById('date_debut').addEventListener('change', function () {
                var startDate = new Date(this.value);
                var endDateInput = document.getElementById('date_fin');
                
                if (this.value) {
                    var minEndDate = new Date(startDate);
                    minEndDate.setDate(startDate.getDate() + 1); // La date de fin doit être après la date de début

                    endDateInput.setAttribute('min', minEndDate.toISOString().split('T')[0]);
                }
            });

            document.getElementById('date_fin').addEventListener('change', function () {
                var startDate = new Date(document.getElementById('date_debut').value);
                var endDate = new Date(this.value);
                
                if (endDate < startDate) {
                    alert('La date de fin ne peut pas être avant la date de début');
                    this.setCustomValidity('La date de fin ne peut pas être avant la date de début');
                } else {
                    this.setCustomValidity('');
                }
            });
        });
    </script>
</body>
</html>