<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue sur notre plateforme</title>
</head>
<body>
    <h2>Bonjour {{ $user->name }},</h2>
    <p>Votre compte a été créé avec succès.</p>
    <p>Voici vos identifiants de connexion :</p>
    <ul>
        <li><strong>Email :</strong> {{ $user->email }}</li>
        <li><strong>Mot de passe :</strong> {{ $password }}</li>
    </ul>
    <p>Veuillez vous connecter et changer votre mot de passe dès que possible.</p>
    <p>Merci !</p>
</body>
</html>
