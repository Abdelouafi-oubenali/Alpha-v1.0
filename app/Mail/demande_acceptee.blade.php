<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de Congé Acceptée</title>
</head>
<body>
    <h1>Notification de Congé</h1>
    <p>Deux demandes de congé ont été acceptées.</p>
    <p><strong>Employé :</strong> {{ $demande->employe->name }}</p>
    <p><strong>Dates :</strong> {{ $demande->date_debut }} au {{ $demande->date_fin }}</p>
</body>
</html>
