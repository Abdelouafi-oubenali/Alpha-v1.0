<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Demande de Congé</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-4">
            <h1 class="text-2xl font-bold">Demande de Congé</h1>
        </div>
        
        <div class="p-6 text-center">
            <div class="mb-6">
                <svg class="mx-auto w-20 h-20 text-yellow-500 mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 15c-.55 0-1-.45-1-1v-4c0-.55.45-1 1-1s1 .45 1 1v4c0 .55-.45 1-1 1zm1-8h-2V6h2v3z"/>
                </svg>
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Demande en Cours de Traitement</h2>
                <p class="text-gray-600 mb-4">
                    Votre demande de congé a été soumise avec succès et est en cours de validation.
                </p>
            </div>

            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded mb-6">
                <p class="text-blue-800 text-sm">
                    <strong>Prochaines étapes :</strong>
                    Votre demande sera examinée par votre manager et le service RH.
                    Vous recevrez une réponse dans les prochains jours.
                </p>
            </div>

            <div class="flex justify-center space-x-4">
                <a href="/" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                    Retour à l'accueil
                </a>
            
            </div>
        </div>

        <div class="bg-gray-100 p-4 text-center text-sm text-gray-600">
            Si vous avez des questions, contactez le service RH.
        </div>
    </div>
</body>
</html>