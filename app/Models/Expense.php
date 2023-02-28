<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public function categoryInfo(){
        return $this->belongsTo(ExpenseItem::class, 'category', 'id');
    }
    public function employeeinfo(){
        return $this->belongsTo(Employee::class, 'responsible_person', 'id');
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
