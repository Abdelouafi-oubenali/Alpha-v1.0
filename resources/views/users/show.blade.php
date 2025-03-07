<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcours Professionnel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-4xl p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Parcours Professionnel</h1>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center">
                Modifier
            </button>
        </div>

        <!-- Barre de progression des étapes -->
        <<h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Suivi des {{ $user->name}}</h1>
      
        <!-- Barre d'étapes -->
        <div class="relative my-12">
          <div class="flex items-center justify-between mb-12">
            <!-- Ligne de connexion -->
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-gray-300 w-full"></div>
            
            <!-- Étapes -->
            <div class="relative z-10 flex flex-col items-center">
              <div class="w-8 h-8 
                  @if(empty($user->posIdt)) 
                      bg-gray-300
                  @else
                      bg-blue-600
                  @endif
                  rounded-full flex items-center justify-center text-white font-bold">
                  1
              </div>
              <div class="mt-2 text-sm font-medium">enrole at</div>
              <div class="text-xs text-gray-500">{{$user->created_at }}</div>
            </div>
            
            
            <div class="relative z-10 flex flex-col items-center">
              <div class="w-8 h-8 
                  @if(empty($user->type_contrat)) 
                      bg-gray-300
                  @else
                      bg-blue-600
                  @endif
                  rounded-full flex items-center justify-center text-white font-bold">
                  2
              </div>
              <div class="mt-2 text-sm font-medium">Contrat</div>
              <div class="text-xs text-gray-500">{{ $user->type_contrat }}</div>
            </div>
            
            
            @if($formations)
            <div class="relative z-10 flex flex-col items-center">
              <dev class="w-8 h-8 
                  @if(empty($formations)) 
                      bg-gray-300
                  @else
                      bg-blue-500 
                  @endif
                  rounded-full flex items-center justify-center text-white font-bold">
                  3
              </dev>
              <div class="mt-2 text-sm font-medium">formation</div>
              @foreach($formations as $formation)
                 <div class="text-xs text-gray-500">{{ $formation->titre }}</div>
              @endforeach

          </div>
          
            @else
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">🚫</div>
                <div class="mt-2 text-sm font-medium text-gray-500">Aucune formation disponible</div>
            </div>
            @endif
            
            
            <div class="relative z-10 flex flex-col items-center">
              <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">4</div>
              <div class="mt-2 text-sm font-medium">Enroler</div>
            </div>
          </div>
        </div>
        <!-- Chronologie des étapes -->
        <div class="relative">
            <div class="border-l-4 border-blue-500 absolute h-full left-4 top-0"></div>
            
            <div class="space-y-8 pl-16">
                <!-- Étape 1 : Formation -->
                <div class="relative">
                    <div class="absolute -left-[52px] top-1 bg-blue-500 text-white rounded-full w-12 h-12 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-md">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">formation cariare </h3>
                        @foreach($formations as $formation)
                        <p class="text-gray-600 mb-1 font-bold">{{ $formation->titre  }}</p> <!-- Assuming 'name' is a field in your formations table -->
                        <p class="text-sm text-gray-500">{{ $formation->date_debut }} - {{ $formation->date_fin }}</p>
                        @endforeach
                       
                    </div>
                </div>

                <!-- Étape 2 : Premier Emploi -->
                <div class="relative">
                    <div class="absolute -left-[52px] top-1 bg-green-500 text-white rounded-full w-12 h-12 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-md">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">jobs</h3>
                        @foreach($parcours as $cariare)
                        <p class="text-gray-600 mb-1"> {{$user->posIdt }}</p>
                        <p class="text-sm text-gray-500"> {{ $user->created_at }}</p>
                        @endforeach
                    </div>
                </div>

                <!-- Étape 3 : Contrat -->
                <div class="relative">
                    <div class="absolute -left-[52px] top-1 bg-purple-500 text-white rounded-full w-12 h-12 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-md">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Contrat {{$user->type_contrat}}</h3>
                        <p class="text-gray-600 mb-1">TechInnovate</p>
                        <p class="text-sm text-gray-500">2020 - Présent</p>
                    </div>
                </div>

                <!-- Étape 4 : Promotion -->
                <div class="relative">
                    <div class="absolute -left-[52px] top-1 bg-yellow-500 text-white rounded-full w-12 h-12 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>