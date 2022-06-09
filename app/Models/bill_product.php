<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_product extends Model
{
    use HasFactory;
    protected $table = 'bill_product';
    function bill(){
        return $this->belongsTo(Bill::class);
    }

    function product()
    {
        return $this->belongsTo(Product::class,'product_product_id');
    }
}
