<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomInsert;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Validator;
use Illuminate\Http\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AdminController extends Controller
{
     public function index()
    {
    	return view('welcome');
    }
    public function loging(){
        return view('logingview');
    }
    public function dashboard(){
        $ropoms = DB::table('rooms')->get();
        $roomsArr = array('','');
        $count = 0;
        foreach ($ropoms as $singleRoom) {
            $count = $count + 1;
        }
        $thisMonth = strtotime('11/01/2020');
        $thisMonthLast = strtotime('11/30/2020');
        $ropoms = DB::table('bookings')->get();
        $roomsArr = array('','');
        $bookCOunt = 0;
        $bookCOuntThis = 0;
        foreach ($ropoms as $singleRoom) {
            $bookingdate = strtotime($singleRoom->dates);
            if(( $thisMonth < $bookingdate )&&( $thisMonthLast > $bookingdate )){
                $bookCOuntThis = $bookCOuntThis + 1;
            }
            $bookCOunt = $bookCOunt + 1;
        }
        $data['rooms'] = $count;
        $data['totalBookings'] = $bookCOunt;
        $data['thisMonth'] = $bookCOuntThis; 
        return view('dashb',$data);
    }
    public function login(){
        return view('getstar',['name'=>'']);
    }
    public function autouser(){

        if((request('usern') =='' )|| (request('password') =='' )) {
            $age = array("name"=>'fill', "res"=>'Please enter Price', "class"=>43);
            return view('getstar',['name'=>'fill']);
        }
        $users = DB::table('users')->get();
        foreach ($users as $singleRoom) {
            if(($singleRoom->email == request('usern')) && ( $singleRoom->password == request('password'))){
                
                $response = new Response('hello world');
                /*
                $response->withCookie(cookie()->forever('email', request('usern')));
                $response->withCookie(cookie()->forever('password', request('password')));*/
                $response->cookie('email', request('usern', 10));
                $response->cookie('password', request('password',10));
                //return $response;
                return redirect('dashboard');
            
            }else{
                $age = array("name"=>'fai', "res"=>'Please enter Price', "class"=>43);
                return view('getstar',['name'=>'wrong']);
            }
        }
        return view('getstar',['name'=>'some']);

    }
    public function addRooms(){
        return view('addListing');
    }
    public function Validato(Request $request){
        if(is_null($request->number) != false){
            return ['e','nullnum'];
        }
        if(is_null($request->persons) != false){
            return ['e','nullpers'];
        }
        if(is_null($request->price) != false){
            return ['e','nullprice'];
        }
        $rooms = DB::table('rooms')->get();
        foreach ($rooms as $singleRoom) {
            if( $singleRoom->number == $request->number){
                return ['e','numbersame'];
            }
        }
        if( $request->number > 98 ){
            return ['e','numbermax'];
        }
        if( $request->persons > 10 ){
            return ['e','personmax'];
        }
        return ['ok','max'];
    }

    public function insert(Request $request){
        /*
        $validatedData = $request->validate([
            'roomnumber' => ['required','max:2'],
            'topersons' => ['required'],
            'roomtype' => ['required'],
            'roomprice' => ['required']
        ]);
        $validatedData->after(function($validatedData){
            if( $this->somethingElseInvalid() ){
                $age = array("name"=>"har", "res"=>'Insert Successful', "class"=>92);
                return json_encode($age);
            }
        });*/
        //var formData = {name:"ravi",age:"31"};
        //var formData = {number:'roomnumber' ,persons:'topersons' , ac:'roomtype', price:'roomprice'};
        //var formData = {number:'roomnumber' ,persons:'topersons' , ac:'roomtype', price:'roomprice'};
        
        $validated = $this->Validato($request);
        if( $validated[0] == 'e' ){
            if($validated[1] == 'nullnum'){
                $age = array("name"=>$validated[1], "res"=>'Please enter room number', "class"=>43,'num'=>$request->number);
                return json_encode($age);
            }
            if($validated[1] == 'nullpers'){
                $age = array("name"=>$validated[1], "res"=>'Please enter persons number', "class"=>43,'num'=>$request->number);
                return json_encode($age);
            }
            if($validated[1] == 'nullprice'){
                $age = array("name"=>$validated[1], "res"=>'Please enter Price', "class"=>43,'num'=>$request->number);
                return json_encode($age);
            }
            if($validated[1] == 'numbersame'){
                $age = array("name"=>$validated[1], "res"=>'You have entered room:' . $request->number, "class"=>43,'num'=>$request->number);
                return json_encode($age);
            }
            if($validated[1] == 'numbermax'){
                $age = array("name"=>$validated[1], "res"=>'You have entered maximum room number', "class"=>43,'num'=>$request->number);
                return json_encode($age);
            }
            if($validated[1] == 'personmax'){
                $age = array("name"=>$validated[1], "res"=>'How can ' . $request->number . ' enters a room?', "class"=>43,'num'=>$request->number);
                return json_encode($age);
            }

        }else{

            try{
                $Rooms = new RoomInsert;
                $Rooms->number = $request->number;
                $Rooms->persons = $request->persons;
                $Rooms->ac = $request->ac;
                $Rooms->price = $request->price;
                $Rooms->save();
                $age = array("name"=>"has", "res"=>'Insert Successful', "class"=>43,'num'=>$request->number);
                return json_encode($age);
            }catch(Exception $e){
                $age = array("name"=>"hasa", "res"=>'Failed to insert data!', "class"=>98, 'num'=>'noope');
                return json_encode($age);
            }
        }
        
        
    }
}
