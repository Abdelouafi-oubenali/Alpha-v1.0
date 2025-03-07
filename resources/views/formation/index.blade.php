@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 pb-4 border-b border-gray-200">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Catalogue de formations</h2>
            <p class="mt-1 text-sm text-gray-500">Gérez les formations disponibles pour vos collaborateurs</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('formasion.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Créer une formation
            </a>

            <a href="/user/formation" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                assign formation
            </a>
        </div>
    </div>

    <!-- Filtres de recherche -->
 

    <!-- Affichage des formations en grille -->
    @if(count($formations) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($formations as $formation)
                <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-md transition-shadow duration-300">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $formation->image ? asset('storage/' . $formation->image) : asset('images/default-formation.jpg') }}')">
                        @if($formation->date_debut && \Carbon\Carbon::parse($formation->date_debut)->isFuture())
                            <div class="bg-green-600 text-white px-3 py-1 text-sm font-semibold rounded-br-lg inline-block">
                                À venir
                            </div>
                        @endif
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex justify-between items-start mb-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                @if($formation->niveau == 'debutant') bg-green-100 text-green-800 
                                @elseif($formation->niveau == 'intermediaire') bg-blue-100 text-blue-800 
                                @elseif($formation->niveau == 'avance') bg-purple-100 text-purple-800 
                                @elseif($formation->niveau == 'expert') bg-red-100 text-red-800 
                                @else bg-gray-100 text-gray-800 
                                @endif">
                                {{ ucfirst($formation->niveau) }}
                            </span>
                            <span class="text-sm font-medium text-gray-600">
                                {{ $formation->duree }} {{ $formation->duree > 1 ? 'jours' : 'jour' }}
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $formation->titre }}</h3>
                        <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $formation->description }}</p>
                        
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>
                                @if($formation->date_debut)
                                    {{ \Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }}
                                @else
                                    Date flexible
                                @endif
                            </span>
                        </div>
                        
                        <div class="mt-5 flex justify-between items-center">
                            <div class="text-lg font-bold text-indigo-600">
                                @if($formation->prix > 0)
                                    {{ number_format($formation->prix, 2, ',', ' ') }} €
                                @else
                                    Gratuit
                                @endif
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('formasion.show', $formation) }}" class="text-indigo-600 hover:text-indigo-900" title="Voir détails">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('formasion.edit', $formation) }}" class="text-blue-600 hover:text-blue-900" title="Modifier">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('formasion.destroy', $formation->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="openDeleteModal('{{ $formation->id }}', '{{ $formation->titre }}')" class="text-red-600 hover:text-red-900" title="Supprimer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                               </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-6">
            {{ $formations->withQueryString()->links() }}
        </div>
    @else
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-16 sm:px-6 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune formation trouvée</h3>
                <p class="mt-1 text-sm text-gray-500">Commencez par créer une nouvelle formation.</p>
                <div class="mt-6">
                    <a href="{{ route('formasion.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Créer une formation
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Modal de confirmation de suppression -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Confirmation de suppression</h3>
            <p class="text-sm text-gray-500 mb-6">
                Êtes-vous sûr de vouloir supprimer la formation <span id="formationTitle" class="font-medium"></span> ? Cette action est irréversible.
            </p>
            <div class="flex justify-end space-x-3">
                <button onclick="closeDeleteModal()" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Annuler
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(formationId, formationTitle) {
        document.getElementById('formationTitle').textContent = formationTitle;
        document.getElementById('deleteForm').action = `/formations/${formationId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Fermer le modal si on clique en dehors
    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target == modal) {
            closeDeleteModal();
        }
    }
</script>
@endsection