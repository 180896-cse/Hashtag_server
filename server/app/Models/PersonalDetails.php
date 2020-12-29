<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    use HasFactory;
    protected $table="personal_details";
    protected $fillable=[ "first_name", "middle_name", "last_name", "email", "mobile_number", "images_id", "login_details_id", "address_id"];
    protected $casts=[
        "first_name"=>"string",
        "middle_name"=>"string",
        "last_name"=>"string",
        "email"=>"string",
        "mobile_number"=>"string",
        "images_id"=>"int",
        "login_details_id"=>"int",
        "address_id"=>"int"
    ];
    public $timestamps=false;


    public function getAddress(){
        return $this->hasOne(Addresses::class,"id","address_id");
    }
    public function getImages(){
        return $this->hasOne(Images::class,"id","images_id");
    }


    public function customSave($data)
    {
        $personalDetails=new PersonalDetails($data);
        $personalDetails->save();
        return $personalDetails["id"];
    }



}
