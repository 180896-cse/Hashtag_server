<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerDetails extends Model
{
    use HasFactory;
    protected $table="seller_details";
    public $timestamps=false;
    protected $fillable=["name", "personal_details_id","seller_id"];
    protected $casts=[
        "name"=>"string",
        "personal_details_id"=>"int"
    ];

    public function customSave($data)
    {
        $sellerDetails=new SellerDetails($data);
        $sellerDetails->save();
        return $sellerDetails["id"];
    }

}
