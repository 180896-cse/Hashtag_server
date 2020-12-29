<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Images;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ProductsController extends Controller
{
    public function getProductsByPage(Request $request)
    {

        return Products::with("relatedImages")->where("quantity",">",0)->paginate(10);
    }

    public function getProducts(Request $request,$id)
    {

            $product=Products::where([
                "id"=>$id
            ])->get();
            if(count($product)==0)
            {
                return response()->json("no product found",400);
            }
            return response()->json($product,200);
    }

    public function addNewProduct(Request $request)
    {
        $requestedData=[
            "seller_id"=>Auth::guard("sellers")->user()["id"],
            "name"=>$request["name"],
            "description"=>$request["description"],
            "quantity"=>$request["quantity"],
//            "images"=>$request->file("images"),
            "category_id"=>$request["category_id"],
        ];
        $imagesUrl=array();
        try{
            $allImageId=[
//                "image_1"=>"",
//                "image_2"=>"",
//                "image_3"=>"",
//                "image_4"=>"",
//                "image_5"=>"",
//                "image_6"=>"",
//                "image_7"=>"",
//                "image_8"=>"",
//                "image_9"=>"",
//                "image_10"=>""
            ];
            $looped=1;
            foreach ($request->allFiles("images") as $file)
            {
                $allImageId["image_".$looped]=$file->store("products");
                $looped++;
            }
//            return var_dump($request->file("images"));
            $image=new ProductImages($allImageId);
            $image->save();
            $requestedData["product_images_id"]=$image["id"];

//            return var_dump($requestedData);


            $product=new Products($requestedData);
            $product->save();
            return response()->json("product successfully added",202);

        }
        catch (Throwable $ex)
        {
            return $ex;
        }
    }



    public function updateProduct(Request $request)
    {

    }
    public function deleteProduct(Request $request)
    {

    }
}
