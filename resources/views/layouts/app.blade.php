<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Navigation -->
            <livewire:layout.navigation />

            <!-- Sidebar and Main Content -->
            <div class="flex">
                <!-- Sidebar -->
                <div class="hidden md:flex md:flex-shrink-0" style="height:100vh">
                    <div class="flex flex-col w-64">
                        <div class="flex flex-col h-0 flex-1 bg-blue-900">
                            <div class="flex items-center h-16 flex-shrink-0 px-4 bg-blue-800">
                                <div class="text-white text-xl font-bold">Alpha <span class="text-blue-300">v1.0</span></div>
                            </div>
                            <div class="flex-1 flex flex-col overflow-y-auto">
                                <nav class="flex-1 px-2 py-4 space-y-1">
                
                                    <a href="/profile" class="text-gray-300 hover:bg-blue-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        <svg class="mr-3 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14c4.418 0 8 3.582 8 8s-3.582 8-8 8-8-3.582-8-8 3.582-8 8-8zM12 12c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z"/>
                                        </svg>
                                        Profil
                                    </a>
                                    
                                    <!-- Tableau de bord (accessible à tous) -->
                                    <a href="/" class="bg-blue-800 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        <svg class="mr-3 h-6 w-6 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Tableau de bord
                                    </a>

                                    <a href="/conges" class="text-gray-300 hover:bg-blue-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        <svg class="mr-3 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                                        </svg>
                                        Demande de congé
                                    </a>
                                    
                
                                    <!-- Liens accessibles uniquement aux Admins -->
                                    @role('Admin')
                                       
                
                                        <a href="/departements" class="text-gray-300 hover:bg-blue-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m4 18V3m-8 0h12a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z" />
                                            </svg>
                                            Départements
                                        </a>
                                    @endrole
                
                                    <!-- Liens accessibles aux Admins et Managers -->
                                    @hasanyrole('Admin|Manager')
                                        <a href="/users" class="text-gray-300 hover:bg-blue-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            Gérer les Employés
                                        </a>
                                        
                                        <a href="/formasion" class="text-gray-300 hover:bg-blue-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                            Formations
                                        </a>
                                    @endhasanyrole
                
                                    <!-- Liens accessibles à tous (Admin, Manager, Employé) -->
                                    <a href="/posts" class="text-gray-300 hover:bg-blue-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        Posts
                                    </a>
                
                                    <!-- Paramètres (accessible uniquement aux Admins et Managers) -->
                                    @can('manage settings')
                                        <a href="/settings" class="text-gray-300 hover:bg-blue-800 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                            <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            </svg>
                                            Paramètres
                                        </a>
                                    @endcan
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                

                <!-- Main Content -->
                <div class="flex-1">
                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <!-- Page Content -->
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>