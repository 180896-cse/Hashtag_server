<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=["image_1", "image_2", "image_3", "image_4", "image_5", "image_6", "image_7", "image_8", "image_9", "image_10"];
    protected $casts=[
        "image_1"=>"string",
        "image_2"=>"string",
        "image_3"=>"string",
        "image_4"=>"string",
        "image_5"=>"string",
        "image_6"=>"string",
        "image_7"=>"string",
        "image_8"=>"string",
        "image_9"=>"string",
        "image_10"=>"string"
    ];
    protected $hidden=["id"];

    public function customSave($data)
    {
        $productImages=new ProductImages($data);
        $productImages->save();
        return $productImages["id"];
    }
}
