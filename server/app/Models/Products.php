<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable=["name", "description", "quantity", "category_id", "product_images_id", "seller_id"];
    protected $casts=[
        "name"=>"string",
        "description"=>"string",
        "quantity"=>"int",
        "category_id"=>"int",
        "images_id"=>"json",
        "seller_id"=>"int"
    ];


    public $timestamps=false;
    public function relatedImages()
    {
        return $this->hasMany(Images::class,"id","images_id");
    }
    public function getCategory()
    {
        return $this->hasOne(Categories::class,"id","category_id");
    }
    public function customSave($data)
    {
        $products=new Products($data);
        $products->save();
        return $products["id"];
    }


}
