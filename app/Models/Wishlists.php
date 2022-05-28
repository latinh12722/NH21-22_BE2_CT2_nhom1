<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'id',
        'product_id',
    ];
    
    function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    function users()
    {
        return $this->hasMany(User::class,'id');
    }

}
