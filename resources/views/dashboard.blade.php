<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Bienvenida -->
        <div class="rounded-xl bg-gradient-to-r from-blue-50 to-indigo-100 p-6 dark:from-blue-900/20 dark:to-indigo-900/20">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                ¡Bienvenido de vuelta, {{ auth()->user()->name }}!
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Aquí tienes un resumen de tu actividad y accesos rápidos.
            </p>
        </div>

        <!-- Estadísticas -->
        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-500">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-900 dark:text-white">Total de Artículos</h3>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ App\Models\Article::count() }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-500">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-900 dark:text-white">Publicados</h3>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ App\Models\Article::where('published', true)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-500">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-900 dark:text-white">Borradores</h3>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ App\Models\Article::where('published', false)->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones Rápidas -->
        <div class="grid gap-4 lg:grid-cols-2">
            <!-- Acciones -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Acciones Rápidas</h2>
                <div class="grid gap-3 sm:grid-cols-2">
                    <a href="{{ route('create.article') }}" class="flex items-center gap-3 rounded-lg bg-blue-50 p-3 text-blue-700 transition-colors hover:bg-blue-100 dark:bg-blue-900/20 dark:text-blue-400 dark:hover:bg-blue-900/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="font-medium">Nuevo Artículo</span>
                    </a>
                    <a href="{{ route('search') }}" class="flex items-center gap-3 rounded-lg bg-green-50 p-3 text-green-700 transition-colors hover:bg-green-100 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="font-medium">Buscar</span>
                    </a>
                    <a href="{{ route('settings.profile') }}" class="flex items-center gap-3 rounded-lg bg-purple-50 p-3 text-purple-700 transition-colors hover:bg-purple-100 dark:bg-purple-900/20 dark:text-purple-400 dark:hover:bg-purple-900/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium">Mi Perfil</span>
                    </a>
                    <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-lg bg-gray-50 p-3 text-gray-700 transition-colors hover:bg-gray-100 dark:bg-gray-900/20 dark:text-gray-400 dark:hover:bg-gray-900/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="font-medium">Ver Sitio</span>
                    </a>
                </div>
            </div>

            <!-- Artículos Recientes -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 dark:bg-gray-800 dark:ring-gray-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Artículos Recientes</h2>
                @php
                    $recentArticles = App\Models\Article::latest()->take(5)->get();
                @endphp
                <div class="space-y-3">
                    @forelse ($recentArticles as $article)
                        <div class="flex items-center justify-between rounded-lg border border-gray-200 p-3 dark:border-gray-600">
                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-900 dark:text-white">{{ Str::limit($article->title, 40) }}</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $article->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($article->published)
                                    <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900/20 dark:text-green-400">
                                        Publicado
                                    </span>
                                @else
                                    <span class="inline-flex items-center rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400">
                                        Borrador
                                    </span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 dark:text-gray-400">No hay artículos aún.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
