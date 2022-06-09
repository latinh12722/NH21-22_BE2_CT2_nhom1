<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    use HasFactory;
    function manufacture()
    {
        return $this->belongsTo(Manufacture::class, 'manu_id');
    }
    function protype()
    {
        return $this->belongsTo(Protype::class, 'type_id');
    }
    function wishlist()
    {
        return $this->belongsTo(Wishlists::class, 'product_id');
    }
    function comments()
    {
        return $this->hasMany(Comment::class);
    }
    function bill(){
        return $this->belongsToMany(Bills::class);
    }
    
    function bill_products(){
        return $this->hasMany(bill_product::class);
    }
}
