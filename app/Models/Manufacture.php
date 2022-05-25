<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;
    protected $primaryKey = 'manu_id';
    public $timetamps = false;
    function product()
    {
        return $this->hasMany(Product::class,'manu_id','manu_id');
    }
}
