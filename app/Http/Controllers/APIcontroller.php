<?php

namespace App\Http\Controllers;
use App\Models\API;
use Illuminate\Http\Request;

class APIcontroller extends Controller
{
    public function home()
    {
        echo "Home";
    }

    public function getAllProducts()
    {
        $data = API::all();
        return response()->json($data);
    }
    public function addProduct(Request $request)
    {
        $name = $request->name;
        $des = $request->description;
        $price = $request->price;
        
        $obj = new API();
        $obj->Name = $name;
        $obj->DIs = $des;
        $obj->Price = $price;
        $obj->save();

        $res = array();
        $res["status"] = true;
        $res["message"] = "Data inserted successfully";

        return response()->json($res);
    }

    public function deleteproduct(Request $request, $id)
    {
        $obj = API::where("API_ID",$id)->get();
        $res = array();
        if(count($obj)<=0)
        {
            $res["status"] = false;
            $res["message"] = "Data not found";
        }
        else
        {
            $obj = API::where("API_ID",$id)->delete();
            $res["status"] = true;
            $res["message"] = "Data deleted successfully";
        }

        return response()->json($res);
    }
    public function singleproduct(Request $request, $id)
    {
        $obj = API::where("API_ID",$id)->get();
        $res = array();
        if(count($obj)<=0)
        {
           
            $res["status"] = false;
            $res["message"] = "Data not found";
            $res["data"]=null;
        }
        else
        {
            $obj = API::where("API_ID",$id)->first();
            $res["status"] = true;
            $res["message"] = "Data found";
            $res["data"]=$obj;
        }
        return response()->json($res);
    }

    public function updateproduct(Request $request)
    {
        $name = $request->name;
        $des = $request->description;
        $price = $request->price;
        $id = $request->id;

        $obj = API::where("API_ID",$id)->get();
        $res = array();
        if(count($obj)<=0)
        {
            $res["status"] = false;
            $res["message"] = "Data not found";
        }
        else
        {
            $obj = API::where("API_ID",$id)->first();
            $obj->Name = $name;
            $obj->DIs = $des;
            $obj->Price = $price;
            $obj->save();


            $res["status"] = true;
            $res["message"] = "Data Updated";
        }
        
        return response()->json($res);
    }

}
