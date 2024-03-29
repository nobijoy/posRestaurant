<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function fullName(){
        if ($this->last_name) {
            return $this->first_name . ' ' .$this->last_name;
        }else {
            return $this->first_name;
        }
    }
}
