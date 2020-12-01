<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Validator extends Controller
{
     public function index()
    {
    	return view('welcome');
    }
    public function validate(){
        return true;
    }
    public function show()
    {
    	
    }
    public function checkAvailabe(Request $request)
    {
    	$age = array("name"=>"has", "res"=>'Rooms Available', "class"=>43);

    	
        return json_encode($age);
    }
    public function inser(Request $request)
    {
    	$age = array("name"=>"has", "res"=>'Rooms Available', "class"=>43);

    	
        return json_encode($age);
    }
}
