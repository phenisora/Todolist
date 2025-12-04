<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être remplis massivement (mass assignable).
     * Ceci est crucial pour la sécurité.
     */
    protected $fillable = [
        'title',
        'completed',
    ];
}
