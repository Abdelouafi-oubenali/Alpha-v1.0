<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Congé</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen flex flex-col items-center justify-center">
    <div class="card bg-base-100 shadow-xl max-w-md w-full text-center p-8">
        <h1 class="text-3xl font-bold mb-6">Demande de Congé</h1>
        
        <!-- Informations sur les congés -->
        <div class="mb-6 text-left">
            <h2 class="text-xl font-semibold mb-4">Informations sur les congés</h2>
            <ul class="list-disc list-inside space-y-2">
                <li><strong>Congés payés :</strong> 25 jours par an</li>
                <li><strong>Congés maladie :</strong> Selon la législation en vigueur</li>
                <li><strong>Congés sans solde :</strong> Sur demande et approbation</li>
                <li><strong>Congés exceptionnels :</strong> Mariage, décès, etc.</li>
            </ul>
        </div>

        <!-- Bouton de demande de congé -->
        <a href="/conges/create" class="btn btn-primary btn-lg w-full flex items-center justify-center gap-2 hover:scale-105 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Faire une demande de congé
        </a>
            
    </div>
</body>
</html>
