<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customerInfo(){
        return $this->belongsTo(Customer::class, 'customer', 'id');
    }
    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class, 'payment_method', 'id');
    }
    public function waiterInfo(){
        return $this->belongsTo(Employee::class, 'waiter', 'id');
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
