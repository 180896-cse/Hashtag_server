<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Images;
use App\Models\PersonalDetails;
use App\Models\UsersLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class UsersLoginController extends Controller
{
    public function addNewUser(Request $request)
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
            "password"=>$request["password"]

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

           $userLogin=new UsersLogin($postData);
           $userLogin->save();
           $userLogin["default"]=$postData["password"];
           DB::commit();
           return response()->json($userLogin,202);
       }
       catch (Throwable $ex)
        {
            return response()->json($ex->getTrace(),500);
        }

    }
    public function makeLogin(Request $request)
    {
        $loginData=[
            "username"=>$request["username"],
            "password"=>$request["password"]
        ];
        $loginStatus= Auth::attempt($loginData);
        if($loginStatus)
        {
            $token=Auth::user()->createToken("users")->accessToken;
            return response()->json($token,202);
        }
        return response()->json("incorrect credentials",401);
    }
    public function userInfo(Request $request)
    {
        return Auth::user();
    }
}
