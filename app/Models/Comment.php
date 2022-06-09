<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'id',
        'product_id',
        'comment_content',
        'phone',
        'rating'
    ];
    function product(){
        return $this->belongsTo(Product::class);
    }
}
