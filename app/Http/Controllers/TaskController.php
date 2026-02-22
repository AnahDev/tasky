<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Método para mostrar la vista con la lista de tareas
    public function index(Request $request)
    {
        // Traemos solo las tareas del usuario logueado, ordenadas por la más reciente
        $tasks = $request->user()->tasks()->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    // Método para guardar una nueva tarea en PostgreSQL
    public function store(Request $request)
    {
        // 1. Validamos que el título no venga vacío
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // 'description' => 'nullable|string', // (Descomenta esto si agregaste el campo descripción)
        ]);

        // 2. Creamos la tarea usando la relación del usuario logueado
        $request->user()->tasks()->create($validated);

        // 3. Redirigimos de vuelta a la página de tareas
        return redirect()->route('tasks.index');
    }

    // Método para marcar/desmarcar como completada
    public function toggle(Request $request, Task $task)
    {
        // Seguridad: Si la tarea no es de este usuario, bloqueamos la acción (Error 403)
        if ($task->user_id !== $request->user()->id) {
            abort(403, 'Acceso denegado');
        }

        // Truco: Invertimos el estado actual (si es true pasa a false, y viceversa)
        // $task->update([
        //     'is_completed' => !$task->is_completed
        // ]);

        $task->is_completed = !$task->is_completed;
        $task->save();

        // Recargamos la página actual
        return redirect()->back();
    }

    // Método para eliminar la tarea de la base de datos
    public function destroy(Request $request, Task $task)
    {
        // Seguridad: Validamos al dueño
        if ($task->user_id !== $request->user()->id) {
            abort(403, 'Acceso denegado');
        }

        // Eliminamos el registro
        $task->delete();

        return redirect()->back();
    }
}
