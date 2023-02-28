<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Designation extends Model
{
    use HasFactory;
    public function departmentInfo(){
        return $this->belongsTo(Department::class, 'department', 'id');
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
