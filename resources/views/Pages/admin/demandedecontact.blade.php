<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">  
</head>
<body>

    <header class="flex items-center justify-center h-20 bg-marron">
        <div class="text-white font-black text-3xl"> Demandes de contact </div>
   </header>

   <a class="underline ml-10 relative top-8 font-bold" href="{{route ('dashboard')}}" > <- Revenir à la page d'accueil </a>


    @foreach ($contacts as $contact)
    <div class="grid grid-cols-3 gap-4 p-20">
        <div class="bg-white p-8 rounded-lg shadow-md mx-auto max-w-xs border-2 border-marron">
            <h3 class="text-lg font-semibold mb-2 text-gray-800">{{ $contact->nom }}</h3>
            <p class="text-gray-700 mb-1">
                <span class="font-medium">Email:</span> {{ $contact->email }}
            </p>
            <p class="text-gray-700 mb-1">
                <span class="font-medium">Téléphone:</span> {{ $contact->numero_telephone }}
            </p>
            <p class="text-gray-700 mb-1">
                <span class="font-medium">Sujet:</span> {{ $contact->sujet }}
            </p>
            <p class="text-gray-700">
                <span class="font-medium">Message:</span> {{ $contact->message }}
            </p>

            @php
            $expediteur = urlencode($contact->email);
            $sujet = urlencode($contact->sujet);
            $message = urlencode("Message : " . $contact->message . "\n\nRéponse :");
            $lienGmail = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={$expediteur}&su={$sujet}&body={$message}";
            @endphp

            <div class="flex flex-row mt-4">
           <a href="{{ $lienGmail }}" class="bg-marron text-white px-4 py-2 rounded-lg">Répondre</a>
           <a href="{{route ('supprimerContact', $contact->id)}}"><i class="fa-solid fa-trash text-red-600 text-2xl ml-32 mt-2"></i></a> 
            </div>
        
        </div>

    </div>
    @endforeach

   
</body>
</html>