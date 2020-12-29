<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Images;
use App\Models\PersonalDetails;
use App\Models\SellerDetails;
use App\Models\SellersLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class SellersLoginController extends Controller
{
    public function addNewSeller(Request $request)
    {
        $postData=[
            "first_name"=>$request["first_name"],
            "middle_name"=>$request["middle_name"],
            "last_name"=>$request["last_name"],
            "email"=>$request["email"],
            "mobile_number"=>$request["mobile_number"],
            "url"=>$request->file("image")->store("users"),
            "username"=>($request["username"])?$request["username"]: $request["email"],
            "address"=>$request["address"],
            "pincode"=>$request["pincode"],
            "landmark"=>$request["landmark"],
            "password"=>$request["password"],
            "name"=>($request["name"])?$request["name"]:($request["first_name"].' '.$request["middle_name_name"]." ".$request["first_name"]),
        ];
        try{
            DB::beginTransaction();
            $address=new Addresses($postData);
            $address->save();
            $postData["address_id"]=$address["id"];


            $image=new Images($postData);
            $image->save();
            $postData["images_id"]=$image["id"];


            $personalDetails=new PersonalDetails($postData);
            $personalDetails->save();
            $postData["personal_details_id"]=$personalDetails["id"];


            $sellerDetails=new SellerDetails($postData);
            $sellerDetails->save();
            $postData['seller_details_id']=$sellerDetails["id"];

            $seller=new SellersLogin($postData);
            $seller->save();
            DB::commit();
            return response()->json($seller,200);
        }
        catch (Throwable $ex)
        {
            return $ex;
        }




    }
    public function makeLogin(Request $request)
    {
        $loginData=[
            "username"=>$request["username"],
            "password"=>$request["password"]
        ];
        $loginStatus=Auth::guard("sellersSession")->attempt($loginData);
        if($loginStatus)
        {
            $token=Auth::guard("sellersSession")->user()->createToken("sellers")->accessToken;
            return response()->json($token,202);
        }
        return -1;
    }
    public function sellerInfo(Request $request)
    {
        return Auth::guard("sellers")->user();
    }
    public function logout(Request $request)
    {
        try{
//            Auth::guard("sellers")->logout();
            return response()->json("logout",202);
        }
        catch (Throwable $ex)
        {
            return response()->json("unable to logout",500);

        }
    }
}
