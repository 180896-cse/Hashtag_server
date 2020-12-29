<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;
    protected $fillable=["address", "pincode", "landmark", "mobile_number"];
    protected $casts=[
        "address"=>"string",
        "pincode"=>"string",
        "landmark"=>"string",
        "mobile_number"=>"string"
    ];
    public $timestamps=false;
}
