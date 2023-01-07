<?php



namespace App\Http\Controllers\StaffModule;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\TblState;
use App\Complaint;
use Hash;
use Carbon\Carbon;



class StaffController extends Controller

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
            $query->where(array('role'=>'staff'));


        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query->orwhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $users->appends(['search_text' => $search]);
        }

        else {

            $users = User::where(array('role'=>'staff'))->paginate(10);

        }




      return view('StaffModule.index')->with(array('users'=>$users)); 

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

         $users =  User::all();
          $states =  TblState::all();

        return view('StaffModule.create')->with(array('users'=>$users,'states'=>$states)); 

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
            'dob' => 'required',
            'blood_group' => 'required',
            'phone_number' => 'required',

            'email' => 'required',
            'password' => 'required',

            'local_address_line_1' => 'required',
            'local_address_state' => 'required',
            'local_address_city' => 'required',
            'local_address_pincode' => 'required',
            'permanent_address_line_1' => 'required',
            'permanent_address_state' => 'required',
            'permanent_address_city' => 'required',
            'permanent_address_pincode' => 'required',

         ]);
          $user_id = Auth::user()->id;
           $user = new User();
           $user->role  = 'staff';
           $user->first_name  = $request->first_name;
           $user->last_name  = $request->last_name;
           $user->name  = $request->first_name.' '.$request->last_name;
           $user->fathers_name = $request->last_name;
           $user->dob = $request->dob;
           $user->blood_group = $request->blood_group;
           $user->phone_number  = $request->phone_number;

           $user->local_address_line_1 = $request->local_address_line_1;
           $user->local_address_line_2 = $request->local_address_line_2;
           $user->local_address_state = $request->local_address_state;
           $user->local_address_city = $request->local_address_city;
           $user->local_address_pincode = $request->local_address_pincode;

           $user->email  = $request->email;
           $user->password =  Hash::make($request->password);

           
           $user->permanent_address_line_1 = $request->permanent_address_line_1;
           $user->permanent_address_line_2 = $request->permanent_address_line_2;
           $user->permanent_address_state = $request->permanent_address_state;
           $user->permanent_address_city = $request->permanent_address_city;
           $user->permanent_address_pincode = $request->permanent_address_pincode;
           $user->user_id = $user_id;

        $user->save();
        return redirect()->back()->with('message', 'Staff Account Created successfully!');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function view($id)

    {

         $users =  User::find($id);

        return view('StaffModule.view')->with('users',$users); 

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

         $users =  User::find($id);
  $states =  TblState::all();
        return view('StaffModule.edit')->with(array('users'=>$users,'states'=>$states)); 

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
            'dob' => 'required',
            'blood_group' => 'required',
            'phone_number' => 'required',

           // 'email' => 'required',
           // 'password' => 'required',

            'local_address_line_1' => 'required',
            'local_address_state' => 'required',
            'local_address_city' => 'required',
            'local_address_pincode' => 'required',
            'permanent_address_line_1' => 'required',
            'permanent_address_state' => 'required',
            'permanent_address_city' => 'required',
            'permanent_address_pincode' => 'required',
         
         ]);



           $user =  User::where('id',$request->user_id)->first();

          // $user->role  = 'supervisor';

          $user->first_name  = $request->first_name;
           $user->last_name  = $request->last_name;
           $user->name  = $request->first_name.' '.$request->last_name;
           $user->fathers_name = $request->last_name;
           $user->dob = $request->dob;
           $user->blood_group = $request->blood_group;
           $user->phone_number  = $request->phone_number;

           $user->local_address_line_1 = $request->local_address_line_1;
           $user->local_address_line_2 = $request->local_address_line_2;
           $user->local_address_state = $request->local_address_state;
           $user->local_address_city = $request->local_address_city;
           $user->local_address_pincode = $request->local_address_pincode;

           $user->email  = $request->email;
           $user->password =  Hash::make($request->password);

           
           $user->permanent_address_line_1 = $request->permanent_address_line_1;
           $user->permanent_address_line_2 = $request->permanent_address_line_2;
           $user->permanent_address_state = $request->permanent_address_state;
           $user->permanent_address_city = $request->permanent_address_city;
           $user->permanent_address_pincode = $request->permanent_address_pincode;
         
        $user->update();

        return redirect()->back()->with('message', 'Staff Updated successfully!');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function delete($id)

    {

        
        $staff =  User::where('id',$id)->first();

        $staff->delete();

        return redirect()->back()->with('message', 'Staff deleted successfully!');


    }

    

    

    public function blacklist($id){

        $agent =  User::where('id',$id)->first();
        $agent->is_blacklisted=1;
        $agent->update();
        return redirect()->back()->with('message', 'Staff Blocked successfully!');

    }



    public function enable($id){

        $agent =  User::where('id',$id)->first();
        $agent->is_blacklisted=0;
        $agent->update();
        return redirect()->back()->with('message', 'Staff Unblocked successfully!');

    }







}

