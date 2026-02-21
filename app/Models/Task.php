<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    // para permitir la asignación masiva de estos campos
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_completed',
    ];

    //Relacion con el modelo User (una tarea pertenece a un usuario) 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
