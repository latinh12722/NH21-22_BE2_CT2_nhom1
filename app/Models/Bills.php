<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $table = 'bills';
    function user(){
        return $this->belongsTo(User::class);
    }
    function products(){
        return $this->belongsToMany(Product::class);
    }
}
