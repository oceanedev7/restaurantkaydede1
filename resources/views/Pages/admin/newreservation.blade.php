<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
  
    <title>Nouvelles réservations</title>
</head>
<body>

    <header class="flex items-center justify-center h-20 bg-marron">
         <div class="text-white font-black text-3xl"> Nouvelles Réservations </div>
    </header>

    <a class="underline ml-10 relative top-6 font-bold" href="{{route ('dashboard')}}" > <- Revenir à la page d'accueil </a>

    <div class="grid grid-cols-3 gap-6 p-14">
        @foreach ($reservations as $reservation)
        <div class="bg-white p-6 rounded-xl shadow-2xl border-2 border-marron">
            <h3 class="text-xl font-bold mb-3 text-gray-800">{{ $reservation->nom }}</h3>
            <p class="text-gray-700 mb-2"><span class="font-semibold">Date:</span> {{ \Carbon\Carbon::parse($reservation->date)->format('d-m-Y') }}</p>
            <p class="text-gray-700 mb-2"><span class="font-semibold">Heure:</span> {{ \Carbon\Carbon::parse($reservation->heure)->format('H:i') }}</p>
            <p class="text-gray-700 mb-2"><span class="font-semibold">Nombre de personnes:</span> {{ $reservation->nombre_personne }}</p>
            <p class="text-gray-700"><span class="font-semibold">Commentaires:</span> {{ $reservation->commentaires }}</p>
        </div>
        
        @endforeach
    </div>
    
    
</body>
</html>