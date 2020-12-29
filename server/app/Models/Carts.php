<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=["user_id", "product_id", "quantity"];
    protected $casts=[
        "user_id"=>"int",
        "product_id"=>"int",
        "quantity"=>"int"
    ];
    public function product()
    {
        return $this->hasOne(Products::class,"id","product_id");
    }

    public function customSave($data)
    {
        $cart=new Carts($data);
        $cart->save();
        return $cart["id"];
    }

}
