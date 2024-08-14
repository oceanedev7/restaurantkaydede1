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
  
</head>
<body>

    <header class="flex items-center justify-center h-20 bg-marron">
        <div class="text-white font-black text-3xl"> Gérer les produits </div>
   </header>

   <a class="underline ml-10 relative top-8 font-bold" href="{{route ('dashboard')}}" > <- Revenir à la page d'accueil </a>

    
   <form class="mt-12 roundes-lg bg-white p-8 rounded-lg shadow-2xl space-y-4 mx-8 lg:mx-32" enctype="multipart/form-data" method="post" action="{{ route('ajouterProduit') }}">
    @csrf
    
    <div>
        <label for="type" class="block font-bold text-marron">Type de produit</label>
        <select name="type" id="type" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            <option value="">---</option>
            <option value="Pizza">Pizza</option>
            <option value="Dessert">Dessert</option>
            <option value="Boisson">Boisson</option>
        </select>
    </div>

    <div>
        <label for="photo" class="block font-bold text-marron">Photo</label>
        <input name="photo" id="photo" type="file" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" required>
    </div>

    <div>
        <label for="nom" class="block font-bold text-marron">Nom</label>
        <input name="nom" id="nom" type="text" placeholder="Nom" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>

    <div>
        <label for="ingredients" class="block font-bold text-marron">Ingrédients</label>
        <input name="ingredients" id="ingredients" type="text" placeholder="Ingrédients" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>

    <div>
        <label for="description" class="block font-bold text-marron">Description</label>
        <textarea name="description" id="description" placeholder="Description" rows="4" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
    </div>

    <div>
        <label for="taille" class="block font-bold text-marron">Taille</label>
        <input name="taille" id="taille" type="text" placeholder="Taille" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div>
        <label for="prix" class="block font-bold text-marron">Prix</label>
        <input name="prix" id="prix" type="text" placeholder="Prix" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>

    <div>
        <button type="submit" class="w-full bg-marron text-white font-semibold py-2 px-4 rounded-md shadow-xl">Ajouter</button>
    </div>
</form>


<div class="container mx-auto p-6 mt-16">
    <h2 class="text-3xl text-center text-marron font-bold mb-10">- Liste des produits (par catégorie) - </h2>

    <h2 class="text-2xl text-marron underline font-bold mb-4 mt-10">Pizzas</h2>
    <div class="grid grid-cols-4 gap-6">
        @foreach ($pizzas as $pizza)
        <div class="bg-white rounded-lg shadow-2xl p-4">
            <div class="flex justify-between items-center mb-4">
                
            </div>
            <img src="{{ Storage::url($pizza->photo) }}" class="h-40 w-full object-cover rounded-lg mb-4">
            
            <label class="block text-gray-700 font-semibold">Nom :</label>
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $pizza->nom }}</h3>
            
            <label class="block text-gray-700 font-semibold">Ingrédients :</label>
            <p class="text-gray-600 mb-2">{{ $pizza->ingredients }}</p>
            
            <label class="block text-gray-700 font-semibold">Description :</label>
            <p class="text-gray-500 mb-4">{{ $pizza->description }}</p>
            
            @if($pizza->taille)
                <label class="block text-gray-700 font-semibold">Taille :</label>
                <p class="text-gray-600 font-semibold">{{ $pizza->taille }}</p>
            @endif
            
            <label class="block text-gray-700 font-semibold mt-2">Prix :</label>
            <p class="text-xl font-bold text-gray-800">{{ $pizza->prix }}€</p>
    
            <div class="space-x-2 mt-4 ml-2 py-2">
                <a href="{{ route('editProduit', $pizza->id) }}" class="bg-marron text-white p-2 rounded-lg">Modifier</a>
                <a href="{{ route('supprimerProduit', $pizza->id) }}" class="bg-marron text-white p-2 rounded-lg">
                    Supprimer
                </a>
            </div>
        </div>
        @endforeach
    </div>


    <h2 class="text-2xl text-marron underline font-bold mb-4 mt-10">Boissons</h2>
    <div class="grid grid-cols-4 gap-6">
        @foreach ($boissons as $boisson)
        <div class="bg-white rounded-lg shadow-2xl p-4">
            <div class="flex justify-between items-center mb-4">
                
            </div>
            <img src="{{ Storage::url($boisson->photo) }}" class="h-40 w-full object-cover rounded-lg mb-4">
            
            <label class="block text-gray-700 font-semibold">Nom :</label>
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $boisson->nom }}</h3>
            
            <label class="block text-gray-700 font-semibold">Ingrédients :</label>
            <p class="text-gray-600 mb-2">{{ $boisson->ingredients }}</p>
            
            <label class="block text-gray-700 font-semibold">Description :</label>
            <p class="text-gray-500 mb-4">{{ $boisson->description }}</p>
            
            @if($boisson->taille)
                <label class="block text-gray-700 font-semibold">Taille :</label>
                <p class="text-gray-600 font-semibold">{{ $boisson->taille }}</p>
            @endif
            
            <label class="block text-gray-700 font-semibold mt-2">Prix :</label>
            <p class="text-xl font-bold text-gray-800">{{ $boisson->prix }}€</p>
    
            <div class="space-x-2 mt-4 ml-2 py-2">
                <a href="{{ route('editProduit', $boisson->id) }}" class="bg-marron text-white p-2 rounded-lg">Modifier</a>
                <a href="{{ route('supprimerProduit', $boisson->id) }}" class="bg-marron text-white p-2 rounded-lg">
                    Supprimer
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <h2 class="text-2xl text-marron underline font-bold mb-4 mt-10">Desserts</h2>
<div class="grid grid-cols-4 gap-6">
    @foreach ($desserts as $dessert)
    <div class="bg-white rounded-lg shadow-2xl p-4">
        <div class="flex justify-between items-center mb-4">
            
        </div>
        <img src="{{ Storage::url($dessert->photo) }}" class="h-40 w-full object-cover rounded-lg mb-4">
        
        <label class="block text-gray-700 font-semibold">Nom :</label>
        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $dessert->nom }}</h3>
        
        <label class="block text-gray-700 font-semibold">Ingrédients :</label>
        <p class="text-gray-600 mb-2">{{ $dessert->ingredients }}</p>
        
        <label class="block text-gray-700 font-semibold">Description :</label>
        <p class="text-gray-500 mb-4">{{ $dessert->description }}</p>
        
        @if($dessert->taille)
            <label class="block text-gray-700 font-semibold">Taille :</label>
            <p class="text-gray-600 font-semibold">{{ $dessert->taille }}</p>
        @endif
        
        <label class="block text-gray-700 font-semibold">Prix :</label>
        <p class="text-xl font-bold text-gray-800">{{ $dessert->prix }}€</p>

        <div class="space-x-2 mt-4 ml-2 py-2">
            <a href="{{ route('editProduit', $dessert->id) }}" class="bg-marron text-white p-2 rounded-lg">Modifier</a>
            <a href="{{ route('supprimerProduit', $dessert->id) }}" class="bg-marron text-white p-2 rounded-lg">
                Supprimer
            </a>
        </div>
    </div>
    @endforeach
</div>

    
       
</div>



</body>
</html>