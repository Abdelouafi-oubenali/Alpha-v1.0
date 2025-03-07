@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Créer un nouvel utilisateur</h2>
        <p class="mt-2 text-sm text-gray-600">Veuillez remplir tous les champs requis pour créer un compte utilisateur.</p>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nom -->
                <div class="col-span-2 md:col-span-1">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                    
                    <input type="text" name="nom" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" >
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-span-2 md:col-span-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" >
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Vérification -->
                <div class="col-span-2 md:col-span-1">
                    <label for="email_confirmation" class="block text-sm font-medium text-gray-700">Confirmation email</label>
                    <input type="email" name="email_confirmation" id="email_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" >
                </div>

                <!-- Téléphone -->
                <div class="col-span-2 md:col-span-1">
                    <label for="telephone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                    <input type="tel" name="telephone" id="telephone" value="{{ old('telephone') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('telephone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div class="col-span-2 md:col-span-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" >
                    @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmation mot de passe -->
                <div class="col-span-2 md:col-span-1">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" >
                </div>

                <!-- department ID -->
                <div class="col-span-2 md:col-span-1">
                    <label for="roleId" class="block text-sm font-medium text-gray-700">roles</label>
                    <select name="roleName" id="roleId" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Sélectionner les role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ old('  ') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('roleId')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                   <div class="col-span-2 md:col-span-1">
                    <label for="postId" class="block text-sm font-medium text-gray-700">post</label>
                    <select name="PostName" id="postId" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" style="color: black">
                        <option value="postId" style="color: black">Sélectionner post</option>
                        @foreach($posts as $post)
                            <option value="{{ $post->id }}" {{ old('postId') == $post->id ? 'selected' : '' }}>
                                {{ $post->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('postId')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type de contrat -->
                <div class="col-span-2 md:col-span-1">
                    <label for="type_contrat" class="block text-sm font-medium text-gray-700">Type de contrat</label>
                    <select name="type_contrat" id="type_contrat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Sélectionner un type</option>
                        <option value="CDI" {{ old('type_contrat') == 'CDI' ? 'selected' : '' }}>CDI</option>
                        <option value="CDD" {{ old('type_contrat') == 'CDD' ? 'selected' : '' }}>CDD</option>
                        <option value="Intérim" {{ old('type_contrat') == 'Intérim' ? 'selected' : '' }}>Intérim</option>
                        <option value="Freelance" {{ old('type_contrat') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="Stage" {{ old('type_contrat') == 'Stage' ? 'selected' : '' }}>Stage</option>
                        <option value="Alternance" {{ old('type_contrat') == 'Alternance' ? 'selected' : '' }}>Alternance</option>
                    </select>
                    @error('type_contrat')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo de profil -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Photo de profil</label>
                    <div class="mt-2 flex items-center">
                        <div class="h-24 w-24 overflow-hidden rounded-full bg-gray-100 flex justify-center items-center">
                            <img id="preview" src="{{ asset('images/default-avatar.png') }}" alt="Aperçu" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-5">
                            <label for="photo_profile" class="cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Choisir une photo
                                <input id="photo_profile" name="photo_profile" type="file" class="sr-only" accept="image/*" onchange="previewImage()">
                            </label>
                            <p class="mt-1 text-xs text-gray-500">PNG, JPG ou GIF jusqu'à 2MB</p>
                            @error('photo_profile')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Annuler
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Créer l'utilisateur
                </button>
            </div>
        </form>
    </div>
</div>

{{-- <script>
    function previewImage() {
        var preview = document.getElementById('preview');
        var file = document.getElementById('photo_profile').files[0];
        var reader = new FileReader();
        
        reader.onloadend = function () {
            preview.src = reader.result;
        }
        
        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ asset('images/default-avatar.png') }}";
        }
    }
</script> --}}
@endsection



