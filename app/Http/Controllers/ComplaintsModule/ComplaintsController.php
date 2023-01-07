<?php

namespace App\Http\Controllers\ComplaintsModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Complaint;
use App\ForestArea;
use App\Village;
use App\ComplaintType;
use App\RoDfoContact;

class ComplaintsController extends Controller
{
    

    public function index(Request $request)
    {

            $user_id = Auth::user()->id;
            $role = Auth::user()->role;
     
            $search =  $request->input('search_text');
            $query = Complaint::query();

      /* if(isset($request) && !empty($request)){

           

        if (isset($request['search_text']) && $request['search_text'] != '' ) {

        $term = $request['search_text'];

          $query->where(function ($query) use ($term) {

              return $query->whereRaw('lower(email) like (?)', ["%{$term}%"])->orWhereRaw('lower(phone_number) like (?)', ["%{$term}%"])->orWhereRaw('lower(email) like (?)', ["%{$term}%"])->orWhereRaw('lower(concat(first_name,\' \',last_name)) like (?)', ["%{$term}%"])->orWhereRaw('id like (?)',["%{$term}%"]);

          });

        } 
       }*/
          if($search!=""){
            if($role == 'admin') {

                 $complaint = Complaint::where(function ($query) use ($search,$user_id){
                $query->orwhere('full_name', 'like', '%'.$search.'%')
                    ->orWhere('contact_number', 'like', '%'.$search.'%');
                   // ->orderBy('id', 'DESC');
            })
                 ->paginate(25);

            } else {
            $complaint = Complaint::where(function ($query) use ($search,$user_id){
                $query->where('user_id', '=', $user_id)
                    ->orwhere('full_name', 'like', '%'.$search.'%')
                    ->orWhere('contact_number', 'like', '%'.$search.'%');
                   // ->orderBy('id', 'DESC');
            })
             ->paginate(25);
        }
           
            $complaint->appends(['search_text' => $search]);
        }
       
       else {
           
         if($role == 'admin') {
            $complaint =  Complaint::orderBy('id', 'DESC')->paginate(25);
         } else {

        $complaint =  Complaint::where('user_id', '=', $user_id)->orderBy('id', 'DESC')->paginate(25);
    }
      }

       return view('ComplaintModule.index')->with(array('complaints'=>$complaint)); 
    }



        /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {
        $users =  User::all();   
        
        $forestareas =  ForestArea::all();
        $villages =  ForestArea::all();
        $complainttypes =  ComplaintType::all();

        return view('ComplaintModule.create')->with(array('forestareas'=>$forestareas,'complainttypes'=>$complainttypes,'villages'=>$villages)); 
    }


     /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function save(Request $request)
    {

         $this->validate($request,[
            
              
            'contact_number' => 'required',
            'full_name' => 'required',
           // 'beat' => 'required',
            'nature_information' => 'required',

         ]);


			$complaint = new Complaint();



            $user_id = Auth::user()->id;



            $lastid =  Complaint::latest('id')->first();
            $lastid->id;
            
            
            
			$complaint->uid  = date('d',time()).date('m',time()).date('Y',time()).'/'.$lastid->id;

            $complaint->user_id  = $user_id;
            

			$complaint->contact_number  = $request->contact_number;
			$complaint->full_name  = $request->full_name;
			$complaint->keep_identity_concealed  = $request->keep_identity_concealed;

			//$complaint->villege = $request->villege;


           
			

			if(!empty($request->villege)) {
			    

			$forestarea =  ForestArea::find($request->villege);
			$complaint->villege  = $forestarea->villege;
			$complaint->beat  = $forestarea->beat;
			$complaint->block  = $forestarea->block;
			$complaint->range = $forestarea->range;
			$complaint->district = $forestarea->district;
			$complaint->division = $forestarea->division;
		} else {
		    
		    $complaint->villege  = $request->villege;
			$complaint->beat  = $request->beat;
			$complaint->block  = $request->block;
			$complaint->range = $request->range;
			
			$complaint->district = $request->district;
			$complaint->division = $request->division;
		}

			

			$complaint->nature_information = $request->nature_information;
			$complaint->complaint = addslashes($request->complaint);
			$complaint->information = addslashes($request->information);
			$complaint->complaintdetail = addslashes($request->complaintdetail);

            $complaint->save();
        	return redirect()->route('complaintsModule.preview',$complaint->id);
    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function view($id)

    {

		 $forestareas =  ForestArea::all();
		 
         $complainttypes =  ComplaintType::all();

        $complaints =  Complaint::find($id);

        return view('ComplaintModule.view')->with(array('complaints'=>$complaints,'forestareas'=>$forestareas,'complainttypes'=>$complainttypes)); 

    }




    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function preview($id)

    {

		 $forestareas =  ForestArea::all();
         $complainttypes =  ComplaintType::all();

        $complaints =  Complaint::find($id);

        //print_r($complaints);


        return view('ComplaintModule.preview')->with(array('complaints'=>$complaints,'forestareas'=>$forestareas,'complainttypes'=>$complainttypes)); 

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {


        $customers =  User::all();
                 $forestareas =  ForestArea::all();
         $complainttypes =  ComplaintType::all();
             $villages =  ForestArea::all();
        $complaints =  Complaint::find($id);
        return view('ComplaintModule.edit')->with(array('complainttypes'=>$complainttypes,'complaints'=>$complaints,'forestareas'=>$forestareas,'villages'=>$villages)); 

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request)

    {
          
          
           $this->validate($request,[
            'contact_number' => 'required',
            'full_name' => 'required',
           // 'beat' => 'required',
            'nature_information' => 'required',

         ]);



    $complaint =  Complaint::where('id',$request->complaint_id)->first();
    $complaint->contact_number  = $request->contact_number;
    $complaint->full_name  = $request->full_name;
    $complaint->keep_identity_concealed  = $request->keep_identity_concealed;

             //$complaint->villege = $request->villege;
            //exit;

         
			if(!empty($request->villege)) {
			    

			$forestarea =  ForestArea::find($request->villege);
			$complaint->villege  = $forestarea->villege;
			$complaint->beat  = $forestarea->beat;
			$complaint->block  = $forestarea->block;
			$complaint->range = $forestarea->range;
			$complaint->district = $forestarea->district;
			$complaint->division = $forestarea->division;
		} else {
		    
		    $complaint->villege  = $request->villege;
			$complaint->beat  = $request->beat;
			$complaint->block  = $request->block;
			$complaint->range = $request->range;
			$complaint->district = $request->district;
			$complaint->division = $request->division;
		}



            //$complaint->district  = $request->district;

            $complaint->nature_information = $request->nature_information;
            $complaint->complaint = addslashes($request->complaint);
            $complaint->information = addslashes($request->information);
            
            $complaint->complaintdetail = addslashes($request->complaintdetail);

            $complaint->update();
            return redirect()->route('complaintsModule.preview',$complaint->id);
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function delete($id)

    {

           

        $measurement =  Complaint::where('id',$id)->first();

        $measurement->delete();

        return redirect()->back()->with('message', 'Complaint deleted successfully!');

    

    }   






    public function contactnumbers(Request $request)
    {

            $user_id = Auth::user()->id;
            $role = Auth::user()->role;
           $divisions =  RoDfoContact::distinct()->get(['division_name']);




             $search =  $request->input('search_text');
    

          if(isset($search)){

                 $contactnumbers =  RoDfoContact::where('division_name', '=', $search)->orderBy('id', 'DESC')->paginate(15);

                // print_r($contactnumbers);
                 
            } else {
        $contactnumbers =  RoDfoContact::paginate(35);
      }

 return view('ComplaintModule.contactnumbers')->with(array('contactnumbers'=>$contactnumbers,'divisions'=>$divisions)); 


      

    }







}
