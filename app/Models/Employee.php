<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function designationInfo(){
        return $this->belongsTo(Designation::class, 'designation', 'id');
    }
    public function deptInfo(){
        return $this->belongsTo(Department::class, 'department', 'id');
    }
    public function userRole(){
        return $this->belongsTo(Role::class, 'role', 'id');
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
