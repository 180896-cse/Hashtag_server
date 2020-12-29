<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class UsersLogin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="users_login";
    protected $fillable=["username","password","personal_details_id"];
    protected $casts=[
        "username"=>"string",
        "password"=>"string",
        "personal_details_id"=>"int"
    ];
    public $timestamps=false;

    public function setPasswordAttribute($value)
    {
        return $this->attributes["password"]=Hash::make($value);
    }
    public function customSave($data)
    {
        $userLogin=new UsersLogin($data);
        $userLogin->save();
        return $userLogin["id"];
    }

}
