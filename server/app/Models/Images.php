<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable=["url"];
    protected $casts=[
        "url"=>"string"
    ];

    public $timestamps=false;
    public function customSave($data)
    {
        $images=new Images($data);
        $images->save();
        return $images["id"];
    }

}
