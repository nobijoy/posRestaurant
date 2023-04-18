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

    public function warehouseInfo(){
        return $this->belongsTo(Warehouse::class, 'warehouse', 'id');
    }

    public function unit(){
        return $this->belongsTo(IngredientUnit::class, 'unit_id', 'id');
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
