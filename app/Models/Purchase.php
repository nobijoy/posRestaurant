<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function supplierInfo(){
        return $this->belongsTo(Supplier::class, 'supplier', 'id');
    }
//    public function paymentInfo(){
//        return $this->belongsTo(PaymentMethod::class, 'payment_method', 'id');
//    }

    public function totalPurchaseCost(){
        return $this->hasMany(PurchaseIngredient::class, 'purchase_id', 'id')->where('is_active', 1)->sum('total');
    }

    public function totalIngredient(){
        return $this->hasMany(PurchaseIngredient::class, 'purchase_id', 'id')->where('is_active', 1)->count();
    }

    public function totalDueAmount(){
        return $this->totalPurchaseCost() - $this->paid;
    }
}
