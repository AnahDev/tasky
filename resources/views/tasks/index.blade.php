<x-app-layout>
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
</x-app-layout>
