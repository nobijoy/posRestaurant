<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserved'
    ];

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function deletedBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function outlet(){
        return $this->belongsTo(OutletSetting::class, 'outlet_id', 'id');
    }
}
