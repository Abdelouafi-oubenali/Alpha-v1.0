<!-- resources/views/emails/demande_acceptee.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de congé acceptée</title>
</head>
<body>
    <h1>Votre demande de congé a été acceptée</h1>
    <p>Bonjour {{ $nomEmploye }},</p>
    <p>Nous avons le plaisir de vous informer que votre demande de congé pour la période du {{ $dateDebut }} au {{ $dateFin }} a été acceptée.</p>
    <p>Merci pour votre demande.</p>
</body>
</html>
