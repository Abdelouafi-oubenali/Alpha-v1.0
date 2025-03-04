<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Congés</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-4">
            <h1 class="text-2xl font-bold">Gestion des Congés</h1>
        </div>
        
        <div class="p-6">
            <section class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Acquisition des Jours de Congé</h2>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                        <span>Tout employé ayant complété une année de travail bénéficie de <strong>18 jours de congé</strong>.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11 7h2v10h-2V7zm4.5 4l1.5 1.5 3-3-3-3-1.5 1.5 1.5 1.5-1.5 1.5zM7.5 9L6 7.5l-3 3 3 3 1.5-1.5L6 10.5l1.5-1.5z"/>
                        </svg>
                        <span>Si l'employé n'a pas encore complété une année, il acquiert <strong>1,5 jour de congé</strong> par mois travaillé.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-purple-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/>
                        </svg>
                        <span>À partir d'un an de service, le solde est augmenté de <strong>0,5 jour</strong> par an.</span>
                    </li>
                </ul>
            </section>

            <section class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Demande de Congé</h2>
                <div class="space-y-3 text-gray-700">
                    <p class="flex items-center">
                        <svg class="w-6 h-6 text-yellow-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11 7h2v10h-2V7zm4.5 4l1.5 1.5 3-3-3-3-1.5 1.5 1.5 1.5-1.5 1.5zM7.5 9L6 7.5l-3 3 3 3 1.5-1.5L6 10.5l1.5-1.5z"/>
                        </svg>
                        Soumettre une demande au moins une semaine à l'avance
                    </p>
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-3 rounded">
                        <h3 class="font-semibold text-blue-800">Processus de Validation</h3>
                        <ol class="list-decimal list-inside text-blue-700">
                            <li>Validation par le Manager</li>
                            <li>Validation par le service RH</li>
                        </ol>
                    </div>
                </div>
            </section>

            <div class="text-center mt-6">
                <a href="/conges/create" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    Demander un Congé
                </a>
            </div>
        </div>

        <div class="bg-gray-100 p-4 text-center text-sm text-gray-600">
            Votre solde de congés actuel : <strong>{{ $conges }} jour</strong>
        </div>
    </div>
</body>
</html>

