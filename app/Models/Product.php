<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_code',
        'category_id',
        'brand_id',
        'product_qty',
        'product_price',
        'product_cost',
        'product_des',
        'product_image',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function brand(){
//        if ($this->belongsTo(Brand::class,'brand_id','id')){
//            return $this->belongsTo(Brand::class,'brand_id','id');
//        }else{
//            return 'No Brand';
//        }
        $this->belongsTo(Brand::class, 'brand_id');
    }
}
