<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    function products(){
        return $this->belongsToMany(Product::class);
    }



    
    function bill_products(){
        return $this->hasMany(bill_product::class,'bill_id');
    }
}
