<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class SellersLogin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="sellers_login";
    protected $fillable=["username", "password", "seller_details_id"];
    public $timestamps=false;
    protected $casts=[
        "username"=>"string",
        "password"=>"string",
        "seller_details_id"=>"int"
    ];

    public function setPasswordAttribute($value)
    {
        return $this->attributes["password"]=Hash::make($value);
    }

    public function customSave($data)
    {
        $sellerLogin=new SellersLogin($data);
        $sellerLogin->save();
        return $sellerLogin["id"];
    }



}
