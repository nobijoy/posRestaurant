<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    use HasFactory;

    public function supplierInfo() {
        return $this->belongsTo(Supplier::class, 'name', 'id');
    }
    public function paymentInfo() {
        return $this->belongsTo(PaymentMethod::class, 'payment_method', 'id');
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
