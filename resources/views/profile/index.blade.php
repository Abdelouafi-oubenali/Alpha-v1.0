@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 md:p-8 ml-[15rem] w-[80rem]">
        <!-- En-tête du profil -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden ">
            <!-- Bannière et photo de profil -->
            <div class="relative">
                <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-600"></div>
                <div class="absolute bottom-0 left-8 transform translate-y-1/2">
                    @if($user->photo_profil)
                        <img class="rounded-full border-4 border-white w-24 h-24 object-cover" src="{{ asset('storage/' . $user->photo_profil) }}" alt="User Profile Picture">
                    @else
                        {{-- <img class="rounded-full border-4 border-white w-24 h-24 object-cover" src="{{ asset('images/xYwSYHvOzEFOyywPWPvM72ahiVAuY2SiNyVUCdkd.png') }}" alt="Default Avatar"> --}}
                    @endif
                </div>
            </div>
            
            <!-- Informations de base -->
            <div class="pt-16 pb-8 px-8">
                <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
                <p class="text-gray-600">{{$user->email }}</p>
                <p class="text-gray-500 mt-2">  Role : {{$user->role }}</p>
                
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">{{$user->posIdt}}</span>
          
                </div>
                
                
            </div>
        </div>
        
   
        

        
        <!-- Section Formation -->
        <div class="bg-white rounded-lg shadow-md mt-6 p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Formation</h2>
            @foreach($formations as $formation)
            <div class="mb-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-gray-800">{{$formation->titre }}</h3>
                        <p class="text-gray-600">{{ $formation->description }}</p>
                    </div>
                    <span class="text-sm text-gray-500">2016 - 2018</span>
                </div>
            </div>
            @endforeach

        </div>
        
        <!-- Section Compétences -->
    >
        
   
        
        <!-- Pied de page -->
        <div class="mt-8 text-center text-gray-500 text-sm">
            <p>© 2025 Tous droits réservés</p>
        </div>
    </div>
</body>
</html>
@endsection
