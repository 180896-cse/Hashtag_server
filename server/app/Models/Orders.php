<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=["user_id", "product_id", "quantity", "price", "address_id", "status"];
    protected $casts=[
        "user_id"=>"int",
        "product_id"=>"int",
        "quantity"=>"int",
        "price"=>"int",
        "address_id"=>"int",
        "status"=>"string"
    ];
    protected $hidden=["id"];

    public function address()
    {
        return $this->hasOne(Addresses::class,"id","address_id");
    }

    public function product()
    {
        return $this->hasOne(Products::class,"id","product_id");
    }

    public function customSave($data)
    {
        $order=new Orders($data);
        $order->save();
        return $order["id"];
    }

}
