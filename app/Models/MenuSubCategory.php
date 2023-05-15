<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSubCategory extends Model
{
    use HasFactory;

    public function categoryInfo() {
        return $this->belongsTo(MenuCategory::class, 'category', 'id');
    }
}
