<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">  

    <title>Liste des clients</title>
</head>
<body>

@foreach ($clients as $client)
    <div>{{$client->nom}}</div>
    <div>{{$client->prenom}}</div>
    <div>{{$client->numero_telephone}}</div>
    <div>{{$client->adresse_postale}}</div>
    <div>{{$client->email}}</div>
    <div>{{$client->created_at}}</div>
  @endforeach  

</body>
</html>