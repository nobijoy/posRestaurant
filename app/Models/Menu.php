<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function categoryInfo() {
        return $this->belongsTo(MenuSubCategory::class, 'category', 'id');
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
    public function totalIngredient(){
        $total = $this->hasMany(IngredientConsumption::class, 'menu_id', 'id')->where('is_active', 1)->count();
        return $total;
    }
}
