<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    
    public function category(){
        return $this->belongsTo(IngredientCategory::class, 'category_id', 'id');
    }

    public function unit(){
        return $this->belongsTo(IngredientUnit::class, 'unit_id', 'id');
    }
}
