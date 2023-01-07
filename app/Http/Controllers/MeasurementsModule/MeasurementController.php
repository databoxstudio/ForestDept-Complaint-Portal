<?php
namespace App\Http\Controllers\MeasurementsModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\User;
use App\TblState;
use App\Measurement;
use Hash;



class MeasurementController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

     
             $search =  $request->input('search_text');
            $query = User::query();

        

      


      /* if(isset($request) && !empty($request)){

           

        if (isset($request['search_text']) && $request['search_text'] != '' ) {

        $term = $request['search_text'];

          $query->where(function ($query) use ($term) {

              return $query->whereRaw('lower(email) like (?)', ["%{$term}%"])->orWhereRaw('lower(phone_number) like (?)', ["%{$term}%"])->orWhereRaw('lower(email) like (?)', ["%{$term}%"])->orWhereRaw('lower(concat(first_name,\' \',last_name)) like (?)', ["%{$term}%"])->orWhereRaw('id like (?)',["%{$term}%"]);

          });

        } 
       }*/
          if($search!=""){
            $users = Measurement::where(function ($query) use ($search){
                $query->orwhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('phone_name', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $users->appends(['search_text' => $search]);
        }
       
       
       else {

        $measurement =  Measurement::paginate(10);
       
      }

       

       return view('MeasurementModule.index')->with(array('measurement'=>$measurement)); 

      

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $customers =  User::all();     
         $states =  TblState::all();

        return view('MeasurementModule.create')->with(array('customers'=>$customers,'states'=>$states)); 

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
            
              
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'local_address_line_1' => 'required',
            'local_address_state' => 'required',
            'local_address_city' => 'required',
            'local_address_pincode' => 'required',
            'delivery_date' => 'required',
            'measurement_date' => 'required',
            'general_length' => 'required',
            'shoulder'   => 'required',
            'knee_length'   => 'required',
            'front_across'   => 'required',
            'full_length'  => 'required',
            'front_neck'   => 'required',
            'upper_chest'   => 'required',
            'back_neck'  => 'required',
            'chest'   => 'required',
            'full_sleeve_muri'   => 'required',
            'under_chest_waist'  => 'required',
            'low_waist'  => 'required',
            'elbow_sleeve_muri'   => 'required',
            'hip' => 'required',
            'sleeve_muri_2'  => 'required',
            'dart_point'   => 'required',
            'arm_hole' => 'required',
            'shoulder_to_waist'   => 'required',
            'ankle_length'   => 'required',
            'upper_thigh'   => 'required',
            'pant_waist'   => 'required',
            'calf'   => 'required',
            'salwar_length'   => 'required',
            'knee' => 'required',
            'lehnga_length'   => 'required',
            'heels'   => 'required',
            'waist'   => 'required',
            'lehnga_waist'   => 'required',
            'blouse_length'   => 'required',
            'f_n'   => 'required',
            'peticoat_length'   => 'required',
            'b_n'   => 'required',




            /*'bicep' => 'required',
            'sleeve_3_4_muri'   => 'required',
            'back_across'  => 'required',
            'lehnga_waist'   => 'required',
            'lehnga_length'  => 'required',*/


         ]);


            $measurement = new Measurement();
            $measurement->customer_id  = $request->customer_id;

           /* $user =  User::find($measurement->customer_id);

            $measurement->first_name = $user->first_name;
            $measurement->last_name = $user->last_name;
            $measurement->city = $user->city;
            $measurement->phone_number = $user->phone_number;
            $measurement->email = $user->email;*/


            $measurement->first_name  = $request->first_name;
           $measurement->last_name  = $request->last_name;
           $measurement->name  = $request->first_name.' '.$request->last_name;
           $measurement->email  = $request->email;
          // $user->dob = $request->dob;
           $measurement->blood_group = $request->blood_group;
           $measurement->local_address_line_1 = $request->local_address_line_1;
           $measurement->local_address_line_2 = $request->local_address_line_2;
            $measurement->local_address_country  = $request->local_address_country;
           $measurement->local_address_state = $request->local_address_state;
           $measurement->local_address_city = $request->local_address_city;
           $measurement->phone_number  = $request->phone_number;
           $measurement->local_address_pincode = $request->local_address_pincode;
           $measurement->reference_by = $request->reference_by;

            $measurement->delivery_date  = $request->delivery_date;
            $measurement->measurement_date  = $request->measurement_date;
            $measurement->general_length = $request->general_length;
            $measurement->arm_hole  = $request->arm_hole;
            $measurement->front_neck = $request->front_neck;
            $measurement->back_neck = $request->back_neck;
            $measurement->bicep = $request->bicep;
            $measurement->elbow_sleeve_muri = $request->elbow_sleeve_muri;
            $measurement->sleeve_3_4_muri = $request->sleeve_3_4_muri;
            $measurement->full_sleeve_muri  = $request->full_sleeve_muri;
            $measurement->sleeve_muri_2  =  $request->sleeve_muri_2;
            $measurement->heels  =  $request->heels;
            $measurement->salwar_length  =  $request->salwar_length;
            $measurement->dart_point = $request->dart_point;
            $measurement->shoulder  = $request->shoulder;
            $measurement->front_across  = $request->front_across;
            $measurement->back_across  = $request->back_across;
            $measurement->upper_chest  = $request->upper_chest;
            $measurement->chest = $request->chest;
            $measurement->shoulder_to_waist = $request->shoulder_to_waist;
            $measurement->waist = $request->waist;
            $measurement->lehnga_waist = $request->lehnga_waist;
            $measurement->pant_waist = $request->pant_waist;
            $measurement->low_waist = $request->low_waist;
            $measurement->hip  = $request->hip;
            $measurement->upper_thigh = $request->upper_thigh;
            $measurement->knee_length  = $request->knee_length;
            $measurement->ankle_length  = $request->ankle_length;
            $measurement->full_length  = $request->full_length;
            $measurement->knee  = $request->knee;
            $measurement->calf = $request->calf;
            $measurement->ankle = $request->ankle;
            $measurement->lehnga_length = $request->lehnga_length;
             $measurement->blouse_length = $request->blouse_length;
            $measurement->f_n   = $request->f_n;
            $measurement->peticoat_length   = $request->peticoat_length;
            $measurement->b_n    = $request->b_n;
            $measurement->under_chest_waist   = $request->under_chest_waist;
            $measurement->sleeve_muri   = $request->sleeve_muri;
            $measurement->shrara_length  = $request->shrara_length;
            $measurement->muri  = $request->muri;

            $imageName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('profile_image'), $imageName);
            $measurement->profile_image = 'public/profile_image/'.$imageName;

            $measurement->save();
        return redirect()->back()->with('message', 'Measurement Added successfully!');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function view($id)

    {

        $measurement =  Measurement::find($id);
$customers =  User::all();
$states =  TblState::all();
        return view('MeasurementModule.view')->with(array('customers'=>$customers,'measurement'=>$measurement,'states'=>$states)); 

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
        $states =  TblState::all();
        $measurement =  Measurement::find($id);
        return view('MeasurementModule.edit')->with(array('customers'=>$customers,'measurement'=>$measurement,'states'=>$states)); 

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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'local_address_line_1' => 'required',
            'local_address_state' => 'required',
            'local_address_city' => 'required',
            'local_address_pincode' => 'required',
            'delivery_date' => 'required',
            'measurement_date' => 'required',
            'general_length' => 'required',
            'shoulder'   => 'required',
            'knee_length'   => 'required',
            'front_across'   => 'required',
            'full_length'  => 'required',
            'front_neck'   => 'required',
            'upper_chest'   => 'required',
            'back_neck'  => 'required',
            'chest'   => 'required',
            'full_sleeve_muri'   => 'required',
            'under_chest_waist'  => 'required',
            'low_waist'  => 'required',
            'elbow_sleeve_muri'   => 'required',
            'hip' => 'required',
            'sleeve_muri_2'  => 'required',
            'dart_point'   => 'required',
            'arm_hole' => 'required',
            'shoulder_to_waist'   => 'required',
            'ankle_length'   => 'required',
            'upper_thigh'   => 'required',
            'pant_waist'   => 'required',
            'calf'   => 'required',
            'salwar_length'   => 'required',
            'knee' => 'required',
            'lehnga_length'   => 'required',
            'heels'   => 'required',
            'waist'   => 'required',
            'lehnga_waist'   => 'required',
            'blouse_length'   => 'required',
            'f_n'   => 'required',
            'peticoat_length'   => 'required',
            'b_n'   => 'required',
         
         ]);


          


           $measurement =  Measurement::where('id',$request->measurement_id)->first();

         
            $measurement->first_name  = $request->first_name;
            $measurement->last_name  = $request->last_name;
            $measurement->name  = $request->first_name.' '.$request->last_name;
            $measurement->email  = $request->email;

            $measurement->blood_group = $request->blood_group;
            $measurement->local_address_line_1 = $request->local_address_line_1;
            $measurement->local_address_line_2 = $request->local_address_line_2;
            $measurement->local_address_country  = $request->local_address_country;
            $measurement->local_address_state = $request->local_address_state;
            $measurement->local_address_city = $request->local_address_city;
            $measurement->phone_number  = $request->phone_number;
            $measurement->local_address_pincode = $request->local_address_pincode;
            $measurement->reference_by = $request->reference_by;

            $measurement->delivery_date  = $request->delivery_date;
            $measurement->measurement_date  = $request->measurement_date;
            $measurement->general_length = $request->general_length;
            $measurement->arm_hole  = $request->arm_hole;
            $measurement->front_neck = $request->front_neck;
            $measurement->back_neck = $request->back_neck;
            $measurement->bicep = $request->bicep;
            $measurement->elbow_sleeve_muri = $request->elbow_sleeve_muri;
            $measurement->sleeve_3_4_muri = $request->sleeve_3_4_muri;
            $measurement->full_sleeve_muri  = $request->full_sleeve_muri;
            $measurement->sleeve_muri_2  =  $request->sleeve_muri_2;
            $measurement->heels  =  $request->heels;
            $measurement->salwar_length  =  $request->salwar_length;
            $measurement->dart_point = $request->dart_point;
            $measurement->shoulder  = $request->shoulder;
            $measurement->front_across  = $request->front_across;
            $measurement->back_across  = $request->back_across;
            $measurement->upper_chest  = $request->upper_chest;
            $measurement->chest = $request->chest;
            $measurement->shoulder_to_waist = $request->shoulder_to_waist;
            $measurement->waist = $request->waist;
            $measurement->lehnga_waist = $request->lehnga_waist;
            $measurement->pant_waist = $request->pant_waist;
            $measurement->low_waist = $request->low_waist;
            $measurement->hip  = $request->hip;
            $measurement->upper_thigh = $request->upper_thigh;
            $measurement->knee_length  = $request->knee_length;
            $measurement->ankle_length  = $request->ankle_length;
            $measurement->full_length  = $request->full_length;
            $measurement->knee  = $request->knee;
            $measurement->calf = $request->calf;
            $measurement->ankle = $request->ankle;
            $measurement->lehnga_length = $request->lehnga_length;
            $measurement->blouse_length = $request->blouse_length;
            $measurement->f_n   = $request->f_n;
            $measurement->peticoat_length   = $request->peticoat_length;
            $measurement->b_n    = $request->b_n;
            $measurement->under_chest_waist   = $request->under_chest_waist;
            $measurement->sleeve_muri   = $request->sleeve_muri;
            $measurement->shrara_length  = $request->shrara_length;
            $measurement->muri  = $request->muri;
         
         
            $imageName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('profile_image'), $imageName);
            $measurement->profile_image = 'public/images/'.$imageName;

        $measurement->update();

        return redirect()->back()->with('message', 'Measurement Updated successfully!');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function delete($id)

    {

           

        $measurement =  Measurement::where('id',$id)->first();

        $measurement->delete();

        return redirect()->back()->with('message', 'Measurement deleted successfully!');

    

    }

}

?>