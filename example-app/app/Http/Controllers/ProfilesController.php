<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfilesController extends Controller
{
    public function index(){
        return response()->json(Profile::all(),200);
    }
 
    public function show($id){
        $the_Profile=Profile::find($id);
        if(is_null($the_Profile)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_Profile::find($id),200);
        }
    }
    public function store(Request $request){
        $the_Profile=Profile::create($request->all());
        return response($the_Profile,201);
    }
 
    public function update(Request $request,$id){
        $the_Profile=Profile::find($id);
        if(is_null($the_Profile)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_Profile->update($request->all());
            return response()->json($the_Profile::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_Profile=Profile::find($id);
        if(is_null($the_Profile)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_Profile->delete();
            return response()->json(null,204);
        }
    }

}
