<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\User;

class Waste extends Model
{
    use HasFactory;

    public function employeeInfo() {
        return $this->belongsTo(Employee::class, 'res_person', 'id');
    }
    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    public function deletedBy(){
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
