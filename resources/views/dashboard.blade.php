<x-app-layout>
    
   <div class="grid grid-cols-3 gap-x-20 gap-y-20 p-20 mt-10"> 
    <div class="relative w-80 rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        <div class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg" style="background-image: url('{{ Storage::url('images/calendrier.jpg') }}'); background-size: cover; background-position: center;">
            <img class="object-cover" src="{{ Storage::url('images/calendrier.jpg') }}" alt="">
        </div>
        <div class="p-6 w-full">
            <a href="{{ route('newresa') }}" class="block w-full rounded-lg py-2 px-4 text-center text-white font-bold bg-marron"> 
              Voir les réservations 
            </a>
          </div>
      </div>

      <div class="relative w-80  rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        <div class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg" style="background-image: url('{{ Storage::url('images/calendrier.jpg') }}'); background-size: cover; background-position: center;">
            <img class="object-cover" src="{{ Storage::url('images/commande.jpg') }}" alt="">
        </div>
        <div class="p-6 w-full">
            <a href="#" class="block w-full rounded-lg py-2 px-4 text-center text-white font-bold bg-marron"> 
              Voir les commandes
            </a>
          </div>
      </div>

      <div class="relative w-80  rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        <div class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg" style="background-image: url('{{ Storage::url('images/calendrier.jpg') }}'); background-size: cover; background-position: center;">
            <img class="object-cover" src="{{ Storage::url('images/produit.jpg') }}" alt="">
        </div>
        <div class="p-6 w-full">
            <a href="{{ route('afficherProduit') }}" class="block w-full rounded-lg py-2 px-4 text-center text-white font-bold bg-marron"> 
             Gérer les produits 
            </a>
          </div>
      </div>

      <div class="relative w-80  rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        <div class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg" style="background-image: url('{{ Storage::url('images/calendrier.jpg') }}'); background-size: cover; background-position: center;">
            <img class="object-cover" src="{{ Storage::url('images/demandedecontact.jpg') }}" alt="">
        </div>
        <div class="p-6 w-full">
            <a href="{{ route('afficherContact') }}" class="block w-full rounded-lg py-2 px-4 text-center text-white font-bold bg-marron"> 
              Voir les demandes de contact 
            </a>
          </div>
      </div>

      <div class="relative w-80  rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        <div class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg" style="background-image: url('{{ Storage::url('images/calendrier.jpg') }}'); background-size: cover; background-position: center;">
            <img class="object-cover" src="{{ Storage::url('images/clients.jpg') }}" alt="">
        </div>
        <div class="p-6 w-full">
            <a href="{{ route('newresa') }}" class="block w-full rounded-lg py-2 px-4 text-center text-white font-bold bg-marron"> 
              Voir la liste des clients 
            </a>
          </div>
      </div>
   </div>

</x-app-layout>
