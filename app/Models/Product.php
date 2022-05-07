<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    use HasFactory;
    function manu_product()
    {
        return $this->belongsTo(Manufacture::class, 'manu_id');
    }
    function type_product()
    {
        return $this->belongsTo(Protype::class, 'type_id');
    }
}
