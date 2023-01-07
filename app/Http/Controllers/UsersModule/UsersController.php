<?php



namespace App\Http\Controllers\UsersModule;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;

//use App\TblAgentSupervisorMapping;

use App\User;

//use App\TblCity;

use App\TblState;

use Hash;


use Auth;

class UsersController extends Controller

{

   public function index(){

        $users = User::where('role','admin')->paginate(10);

		return view('userModule.index',compact('users'));    	

    }



     public function create(){

       
         return view('userModule.create');

    }



    public function edit(Request $request){

         $id = $request->id;

         $user = Admin::find($id);



         $states = DB::table('cities')->groupBy('state_name')->select(DB::Raw('state_name as state'))->get()->pluck('state')->toArray(); 

         $roles = DB::table('roles')->get()->pluck('role_name','id')->toArray();

         return view('userModule.edit', compact('user','roles','states'));

    }



    public function save(Request $request){

          $this->validate($request,[

          'name' => 'required', 

          'email' => 'required',

          'phone_number' => 'required',

          'role' => 'required',

          ]);

     

          DB::beginTransaction();

          $data = $request->except('_token');

          try {

               DB::table('admins')->insert($data);

          } catch (\Exception $ex) {

          DB::rollBack();

          return redirect()->back()->with('error', 'Something went wrong!');

          }

          

          DB::commit();



          return redirect()->back()->with('message', 'User Created successfully!');

     }



     public function update(Request $request){

          $this->validate($request,[

          'name' => 'required', 

          'email' => 'required',

          'phone_number' => 'required',

          'role' => 'required',

          ]);

     

          DB::beginTransaction();

          $data = $request->except('_token');



          $id = $request->id;

          try {

               DB::table('admins')->where('id',$id)->update($data);

          } catch (\Exception $ex) {

          DB::rollBack();

          return redirect()->back()->with('error', 'Something went wrong!');

          }

          

          DB::commit();



          return redirect()->back()->with('message', 'User updated successfully!');

     }









      public function changeAdminPassword(Request $request){



        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {

            // The passwords matches

            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");

        }



        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){

            //Current password and new password are same

            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");

        }



        $validatedData = $request->validate([

            'current-password' => 'required',

            'new-password' => 'required|string|min:6|confirmed',

        ]);



        //Change Password

        $user = Auth::user();

        $user->password = bcrypt($request->get('new-password'));

        $user->save();



        return redirect()->back()->with("success","Password changed successfully !");



    }





    public function changePassword(){

        return view('userModule.changepassword');

    }

    

    public function editprofile()

    {

        $id = Auth::user()->id;

        $users =  User::find($id);

        $states =  TblState::all();


        return view('userModule.editprofile')->with(array('users'=>$users,'states'=>$states)); 

    }

    

    

    public function updateprofile(Request $request)

    {

        $this->validate($request,[

            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'blood_group' => 'required',
            'phone_number' => 'required',

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
           $user->first_name  = $request->first_name;
           $user->last_name  = $request->last_name;
           $user->dob = $request->dob;
           $user->phone_number  = $request->phone_number;

           $user->blood_group = $request->blood_group;
           $user->local_address_line_1 = $request->local_address_line_1;
           $user->local_address_line_2 = $request->local_address_line_2;
           $user->local_address_state = $request->local_address_state;
           $user->local_address_city = $request->local_address_city;
           $user->local_address_pincode = $request->local_address_pincode;

           


           $user->permanent_address_line_1 = $request->permanent_address_line_1;
           $user->permanent_address_line_2 = $request->permanent_address_line_2;
           $user->permanent_address_state = $request->permanent_address_state;
           $user->permanent_address_city = $request->permanent_address_city;
           $user->permanent_address_pincode = $request->permanent_address_pincode;
        $user->update();

        return redirect()->back()->with('message', 'Profile Updated successfully!');

    }

    

    



}

