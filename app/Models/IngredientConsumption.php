<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientConsumption extends Model
{
    use HasFactory;

    public function ingredient() {
        return $this->belongsTo(Ingredient::class, 'ingredient_id', 'id');
    }

    public function menu() {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function deletedBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
