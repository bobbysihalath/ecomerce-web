<?php

namespace App\Models;

use App\Comment;
use App\Detail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand_id', 'image', 'description', 'price', 'discount', 'stock'
    ];

    protected $table = 'products';

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }


    public function comment(){
        return $this->hasMany(Comment::class);
    }


}
