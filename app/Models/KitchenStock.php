<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitchenStock extends Model
{
    use HasFactory;

    public function ingredients() {
        return $this->belongsTo(Ingredient::class, 'ingredient', 'id');
    }
}
