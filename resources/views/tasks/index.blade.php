{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi To-Do List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('tasks.store') }}" method="POST" class="mb-6">
                    @csrf <div class="flex gap-4">
                        <input type="text" name="title" placeholder="¿Qué necesitas hacer hoy?"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                            required>
                        <button type="submit"
                            class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">
                            Agregar
                        </button>
                    </div>
                </form>

                <ul class="space-y-3">
                    @forelse($tasks as $task)
                        <li
                            class="p-4 bg-gray-50 border border-gray-200 rounded-md flex justify-between items-center transition hover:bg-gray-100">

                            <div class="flex items-center gap-3">
                                <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="w-5 h-5 rounded border flex items-center justify-center transition-colors {{ $task->is_completed ? 'bg-green-500 border-green-500' : 'border-gray-400 bg-white' }}">
                                        @if ($task->is_completed)
                                            <svg class="w-3 h-3 text-black" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        @endif
                                    </button>
                                </form>

                                <span
                                    class="text-gray-800 {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                                    {{ $task->title }}
                                </span>
                            </div>

                            <div class="flex items-center gap-4">
                                <span class="text-xs text-gray-400">{{ $task->created_at->diffForHumans() }}</span>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                    onsubmit="return confirm('¿Estás segura de eliminar esta tarea?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 text-sm font-semibold transition">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="text-center text-gray-500 py-4">No tienes tareas pendientes. ¡Excelente!</li>
                    @endforelse
                </ul>

            </div>
        </div>
    </div>
</x-app-layout> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-violet-800 leading-tight">
            {{ __('Mi To-Do List') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-violet-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-violet-100 overflow-hidden shadow-md shadow-violet-200 sm:rounded-2xl p-8">

                <form action="{{ route('tasks.store') }}" method="POST" class="mb-8">
                    @csrf
                    <div class="flex gap-3">
                        <input type="text" name="title" placeholder="¿Qué necesitas hacer hoy?"
                            class="border border-violet-300 focus:border-violet-500 focus:ring focus:ring-violet-200 focus:ring-opacity-50 rounded-xl shadow-sm w-full px-4 py-3 text-sm bg-fuchsia-50 text-violet-900 placeholder-violet-300 outline-none transition"
                            required>
                        <button type="submit"
                            class="bg-violet-700 hover:bg-violet-800 text-white px-5 py-3 rounded-xl text-sm font-semibold shadow-md shadow-violet-300 transition whitespace-nowrap">
                            + Agregar
                        </button>
                    </div>
                </form>

                <ul class="space-y-3">
                    @forelse($tasks as $task)
                        <li
                            class="p-4 rounded-xl flex justify-between items-center transition-all hover:bg-violet-200
                            {{ $task->is_completed ? 'bg-violet-50 border border-violet-300 opacity-75' : 'bg-fuchsia-50 border border-violet-200' }}">

                            <div class="flex items-center gap-3">
                                <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="w-5 h-5 rounded-md border-2 flex items-center justify-center transition-all
                                        {{ $task->is_completed ? 'bg-violet-700 border-violet-700' : 'border-violet-400 bg-transparent' }}">
                                        @if ($task->is_completed)
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        @endif
                                    </button>
                                </form>

                                <span
                                    class="text-sm font-medium {{ $task->is_completed ? 'line-through text-violet-400' : 'text-violet-900' }}">
                                    {{ $task->title }}
                                </span>
                            </div>

                            <div class="flex items-center gap-4">
                                <span class="text-xs text-violet-400">{{ $task->created_at->diffForHumans() }}</span>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                    onsubmit="return confirm('¿Estás segura de eliminar esta tarea?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center gap-1 text-xs font-semibold px-3 py-1.5 rounded-lg border border-violet-300 bg-violet-100 text-violet-700 hover:bg-violet-700 hover:text-white hover:border-violet-700 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="text-center py-10">
                            <div class="text-4xl mb-2">✨</div>
                            <p class="text-sm text-violet-400">No tienes tareas pendientes. ¡Excelente!</p>
                        </li>
                    @endforelse
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>
