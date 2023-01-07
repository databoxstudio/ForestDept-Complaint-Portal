<?php

namespace App\Http\Controllers\PrintModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Complaint;
use App\ForestArea;
use App\Village;
use App\ComplaintType;
use App\RoDfoContact;

class PrintController extends Controller
{
    
      public function index()
      {
            $complaint =  Complaint::orderBy('id', 'DESC')->get();
             return view('PrintModule.printcomplaint')->with(array('complaints'=>$complaint)); 
           
      }
      public function prndetail($id)
      {
           	 $forestareas =  ForestArea::all();
         $complainttypes =  ComplaintType::all();

        $complaints =  Complaint::find($id);

        //print_r($complaints);

        return view('PrintModule.printDetail')->with(array('complaints'=>$complaints,'forestareas'=>$forestareas,'complainttypes'=>$complainttypes)); 
      }
    
    
    
    
    
}
