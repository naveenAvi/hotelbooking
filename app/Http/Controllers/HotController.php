<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use Illuminate\Support\Facades\DB;

class HotController extends Controller
{
     public function index()
    {
    	return view('welcome');
    }
    public function show()
    {
    	
    }
    public function checkdates($request, $roomNum){
        //var formData = {date:deparure , todate:todate,persons:persosns,ac:acnone};
        
        $manaskingdate = strtotime($request->date);//04
        $mangoingdate = strtotime($request->todate);//05
        /*
        $manaskingdate = strtotime('11/20/2020');//04
        $mangoingdate = strtotime('11/22/2020');//05
*/
        //11/04/2020 - 11/13/2020

        $bookings = DB::table('bookings')->get();
        $isAvailable = true;
        foreach ($bookings as $bookingsdates) {
            if( $bookingsdates->roomnumber == $roomNum ){
                $existingfrom = strtotime($bookingsdates->dates); //06
                $existingto = strtotime($bookingsdates->dateo); //08
                //04 > 08
                if( $manaskingdate < $existingto ){
                    //aluth eka enne. inna eka yanna kalinda.
                    //04                    06
                    if($manaskingdate > $existingfrom   ){
                        //ow aru iddimai muth enna ahanne. tahukanna
                        //room isn't available nowwwww
                        $isAvailable = false;
                    }else{
                        //aru enna kalin aluth eka enne. dan aluth eka yana dawasa balamu
                        //05                  06
                        if($mangoingdate > $existingfrom){
                            //aluth ekata kamare denna baaaa
                            $isAvailable = false;
                        }
                    }
                }else{
                    //available
                    
                }
            }
        }
        return $isAvailable;
    }
    public function getAvailable( Request $request ){
        $ropoms = DB::table('rooms')->get();
        $roomsArr = array('','');
        foreach ($ropoms as $singleRoom) {
            $isAvailable = $this->checkdates($request, $singleRoom->number);
            $availableRoo = array( 'roomNumber'=> $singleRoom->number, 'persons'=> $singleRoom->persons, 'ac'=>$singleRoom->ac,'price'=>$singleRoom->price, 'resul'=>$isAvailable);
            /*echo $singleRoom->number;
            echo ' ';
            echo $isAvailable;
            echo '==';*/
            array_push($roomsArr, $availableRoo);
        }
        return $roomsArr;
    }
    
    public function checkAvailabe(Request $request)
    {
        if( strtotime($request->date) > strtotime($request->todate)){
            $age = array("name"=>"haser", "res"=>'Room is available for ', "class"=>43,'num'=>$request->number, 'cost'=>'aa',  'roomNumber'=> 'a'); 
            return json_encode($age);
        }
        $result = $this->getAvailable($request);
        $withoputAc = false;
        $personcount = false;
        $availableFull = false;
        $availableROom = array();
        for ($i=2; $i < count($result) ; $i++) { 

            $minRes = $result[$i];
            if( $minRes['resul'] == 1 ){
                if( $minRes['persons'] >= $request->persons ){
                    if( $minRes['ac'] == $request->ac ){
                         $availableFull = true;
                         $availableROom = $minRes;
                    }else{
                        $withoputAc = true;
                        $availableROom = $minRes;
                    }
                }else{
                     $personcount = true;
                }
            }
        }
        $personCOunt = 0;
        $roomcountpersonCOunt = 0;
        $costroomcountpersonCOunt = 0; 
        $roomspersonCOunt = '';

        $withoutacMatching = 0;
        $roomcountwithoutacMatching = 0;
        $costroomcountwithoutacMatching = 0; 
        $roomswithoutacMatching = '';
        if( $availableFull == true){
            $age = array("name"=>"has", "res"=>'Room is available for ' . $availableROom['persons'] . ' persons' , "class"=>43,'num'=>$request->number, 'cost'=>$availableROom['price'],  'roomNumber'=> $availableROom['roomNumber']); 
            return json_encode($age);
        }
        if( $withoputAc == true){
            $age = array("name"=>"has2", "res"=>'Room is available for ' . $availableROom['persons'] . ' persons' , "class"=>43,'num'=>$request->number, 'cost'=>$availableROom['price'],  'roomNumber'=> $availableROom['roomNumber']); 
            return json_encode($age);
        }
        if($personcount == true){
            for ($i=2; $i < count($result) ; $i++) { 
                $minRes = $result[$i];
                if( $minRes['resul'] == 1 ){
                    if( $minRes['persons'] >= $request->persons ){
                        if( $minRes['ac'] >= $request->ac ){
                            if( $personCOunt <= $request->persons){

                                $personCOunt = $personCOunt + ((int)$minRes['persons']);
                                $roomcountpersonCOunt = $roomcountpersonCOunt + 1;
                                $costroomcountpersonCOunt = $costroomcountpersonCOunt + ((int)$minRes['price']);
                                $roomspersonCOunt = $roomspersonCOunt . "**" . $minRes['roomNumber'];
                            }
                            
                        }
                    }else{
                        if( $withoutacMatching <= $request->persons){
                            $withoutacMatching = $withoutacMatching + ((int)$minRes['persons']);
                            $roomcountwithoutacMatching = $roomcountwithoutacMatching + 1;
                            $costroomcountwithoutacMatching = $costroomcountwithoutacMatching + ((int)$minRes['price']);
                            $roomswithoutacMatching = $roomswithoutacMatching . "**" . $minRes['roomNumber'];
                        }
                    }
                }
            }
            if( $request->persons < ((int)$withoutacMatching) ){
                $costroomcountwithoutacMatching = $costroomcountwithoutacMatching .'';
                if( $request->persons < $personCOunt ){
                    //he has to order more than 1 room ac or none ac as user defined
                    $age = array("name"=>"has7", "res"=>'Have to buy ' . $roomcountpersonCOunt . ' rooms' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountpersonCOunt, 'roomNumber' => $roomspersonCOunt);
                }else{
                    $age = array("name"=>"hasa6", "res"=>'No Rooms Availalbe' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountpersonCOunt, 'roomNumber' => $roomspersonCOunt);
                }
                if( $request->persons < $withoutacMatching ){
                    //roomsw available mixing ac and none ac
                    $age = array("name"=>"has8", "res"=>'Have to buy ' . $roomcountwithoutacMatching . ' rooms' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountwithoutacMatching, 'roomNumber' => $roomswithoutacMatching);
                }else{
                    $age = array("name"=>"hasa9", "res"=>'No Rooms Availalbe' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountpersonCOunt, 'roomNumber' => $roomspersonCOunt);
                }
            
            }else{
                 $age = array("name"=>"hasa10", "res"=>'No Rooms Availalbe' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountpersonCOunt, 'roomNumber' => $roomspersonCOunt);
            }
                
            
        }else{
           $age = array("name"=>"hasa10", "res"=>'No Rooms Availalbe', "class"=>43,'num'=>$request->number, 'cost'=>'no',  'roomNumber'=> 'no'); 

        }
        
        return json_encode($age);
    
    }

    /*
    public function checkAvailabe(Request $request)
    {
        $persosns = 15;
        $result = $this->getAvailable($request);
        $withoputAc = false;
        $personcount = false;
        $availableFull = false;
        $availableROom = array();
        for ($i=2; $i < count($result) ; $i++) { 
            $minRes = $result[$i];
            if( $minRes['resul'] == 1 ){

                if( $minRes['persons'] >= $persosns ){
                    if( $minRes['ac'] >= $request->ac ){
                         $availableFull = true;
                         $availableROom = $minRes;
                    }else{
                        $withoputAc = true;
                    }
                }else{
                     $personcount = true;
                }
            }
        }
        $personCOunt = 0;
        $roomcountpersonCOunt = 0;
        $costroomcountpersonCOunt = 0; 
        $roomspersonCOunt = '';

        $withoutacMatching = 0;
        $roomcountwithoutacMatching = 0;
        $costroomcountwithoutacMatching = 0; 
        $roomswithoutacMatching = '';
        if(($personcount == true) && ($availableFull == false)){
            for ($i=2; $i < count($result)-1 ; $i++) { 
                $minRes = $result[$i];
                if( $minRes['resul'] == 1 ){
                    if( $minRes['persons'] >= $persosns ){
                        if( $minRes['ac'] >= $request->ac ){
                            if( $personCOunt <= $request->persons){

                                $personCOunt = $personCOunt + ((int)$minRes['persons']);
                                $roomcountpersonCOunt = $roomcountpersonCOunt + 1;
                                $costroomcountpersonCOunt = $costroomcountpersonCOunt + ((int)$minRes['price']);
                                $roomspersonCOunt = $roomspersonCOunt . "**" . $minRes['roomNumber'];
                            }
                            
                        }
                    }else{
                        if( $withoutacMatching <= $persosns){
                            $withoutacMatching = $withoutacMatching + ((int)$minRes['persons']);
                            $roomcountwithoutacMatching = $roomcountwithoutacMatching + 1;
                            $costroomcountwithoutacMatching = $costroomcountwithoutacMatching + ((int)$minRes['price']);
                            $roomswithoutacMatching = $roomswithoutacMatching . "**" . $minRes['roomNumber'];
                        }
                    }
                }
            }
            if( $persosns < ((int)$withoutacMatching) ){
                $costroomcountwithoutacMatching = $costroomcountwithoutacMatching .'';
                if( $request->persons < $personCOunt ){
                    //he has to order more than 1 room ac or none ac as user defined
                    $age = array("name"=>"has", "res"=>'Have to buy ' . $roomcountpersonCOunt . ' rooms' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountpersonCOunt, 'roomNumber' => $roomspersonCOunt);
                }else{
                    $age = array("name"=>"hasa4", "res"=>'no matching room' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountpersonCOunt, 'roomNumber' => $roomspersonCOunt);
                }
                if( $request->persons < $withoutacMatching ){
                    //roomsw available mixing ac and none ac
                    $age = array("name"=>"has", "res"=>'Have to buy ' . $roomcountwithoutacMatching . ' rooms' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountwithoutacMatching, 'roomNumber' => $roomswithoutacMatching);
                }else{
                    $age = array("name"=>"hasa4", "res"=>'no matching room' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountpersonCOunt, 'roomNumber' => $roomspersonCOunt);
                }
            
            }else{
                 $age = array("name"=>"hasa4", "res"=>'no matching roasdfsafrom' , "class"=>43,'num'=>$request->number, 'cost'=>$costroomcountpersonCOunt, 'roomNumber' => $roomspersonCOunt);
            }
                
            
        }else{
           $age = array("name"=>"hasa", "res"=>'available for ' . $availableROom['persons'] , "class"=>43,'num'=>$request->number, 'cost'=>$availableROom['price'],  'roomNumber'=> $availableROom['roomNumber']); 
        }
        
        return json_encode($age);
    
    }*/

    public function inser(Request $request)
    {
        $result = $this->getAvailable($request);
        $withoputAc = false;
        $personcount = false;
        $availableFull = false;
        $availableROom = array();
        $availableRooms = array();
        for ($i=2; $i < count($result) ; $i++) { 
            $minRes = $result[$i];
            if( $minRes['resul'] == 1 ){
                if( $minRes['persons'] >= $request->persons ){
                    if( $minRes['ac'] == $request->ac ){
                         $availableFull = true;
                         $availableROom = $minRes;
                    }else{
                        $withoputAc = true;
                        $availableROom = $minRes;
                    }
                }else{
                     $personcount = true;
                     array_push($availableRooms, $minRes);
                }
            }
        }
        if($availableFull == true){
            //booking only one room
            try{
            
                $bookings = new Bookings;
                $bookings->dates = $request->dates;
                $bookings->dateo =  $request->todate;
                $bookings->persons =  $request->persons;
                $bookings->ac =  $request->ac;
                $bookings->approval =  'not';
                $bookings->price =  $availableROom['price'];
                $bookings->phone =  $request->tele;
                $bookings->name =  $request->name;
                $bookings->roomnumber =  $availableROom['roomNumber'];
                $bookings->save();
                /*
                $bookings = new Bookings;
                $bookings->dates ='k';
                $bookings->dateo =  'k';
                $bookings->persons =  'k';
                $bookings->ac =  'k';
                $bookings->approval =  'not';
                $bookings->price =  '120';
                $bookings->phone =  'k';
                $bookings->name =  'k';
                $bookings->roomnumber =  '50';
                $bookings->save();
                */
                $age = array("name"=>"has", "res"=>'Insert Successful', "class"=>43,'num'=>$request->name);
                return json_encode($age);
            }catch(Exception $e){
                $age = array("name"=>"hasa", "res"=>'Failed to insert data!', "class"=>98, 'num'=>'noope');
                return json_encode($age);
            }
        }elseif ($withoputAc == true) {
            //book rooms without ac
            try{
            
                $bookings = new Bookings;
                $bookings->dates = $request->dates;
                $bookings->dateo =  $request->todate;
                $bookings->persons =  $request->persons;
                $bookings->ac =  $request->ac;
                $bookings->approval =  'not';
                $bookings->price =  $availableROom['price'];
                $bookings->phone =  $request->tele;
                $bookings->name =  $request->name;
                $bookings->roomnumber =  $availableROom['roomNumber'];
                $bookings->save();
                /*
                $bookings = new Bookings;
                $bookings->dates ='k';
                $bookings->dateo =  'k';
                $bookings->persons =  'k';
                $bookings->ac =  'k';
                $bookings->approval =  'not';
                $bookings->price =  '120';
                $bookings->phone =  'k';
                $bookings->name =  'k';
                $bookings->roomnumber =  '50';
                $bookings->save();
                */
                $age = array("name"=>"has1", "res"=>'Insert Successful', "class"=>43,'num'=>$request->name);
                return json_encode($age);
            }catch(Exception $e){
                $age = array("name"=>"hasa", "res"=>'Failed to insert data!', "class"=>98, 'num'=>'noope');
                return json_encode($age);
            }
        }elseif ($personcount == true) {
            //booking rooms with only person count
            foreach ($availableRooms as $singleAvailableROom) {
                try{
                    $bookings = new Bookings;
                    $bookings->dates = $request->dates;
                    $bookings->dateo =  $request->todate;
                    $bookings->persons =  $request->persons;
                    $bookings->ac =  $request->ac;
                    $bookings->approval =  'not';
                    $bookings->price =  $singleAvailableROom['price'];
                    $bookings->phone =  $request->tele;
                    $bookings->name =  $request->name;
                    $bookings->roomnumber =  $singleAvailableROom['roomNumber'];
                    $bookings->save();
                    
                    $age = array("name"=>"has2", "res"=>'Insert Successful', "class"=>43,'num'=>$request->name);
                    return json_encode($age);
                }catch(Exception $e){
                    $age = array("name"=>"hasa", "res"=>'Failed to insert data!', "class"=>98, 'num'=>'noope');
                    return json_encode($age);
                }
            }
        }
    }
}
