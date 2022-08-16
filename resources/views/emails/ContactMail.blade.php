<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact form</title>
</head>
<body class="col-md-7 mb-md-0 mb-5">

    <h1 style="color: #FFD02A" > Une nouvelle demande de la part d'un adhérent CREA </h1>
    <p>Nom: {{$requete['nom']}}</p>
    <p>Email: {{$requete['email']}}</p>
    <p>Entreprise: {{$requete['entreprise']}}</p>
    <p>objet: {{$requete['objet']}}</p>
    <p>Type: {{$requete['type']}}</p>
    <p>Description: {{$requete['description']}}</p>

</body>
</html>
