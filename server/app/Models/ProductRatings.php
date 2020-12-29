<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRatings extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function customSave($data)
    {
        $productRatings=new ProductRatings($data);
        $productRatings->save();
        return $productRatings["id"];
    }

}
