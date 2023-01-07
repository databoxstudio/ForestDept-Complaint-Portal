<?php
namespace App\Http\Controllers\CustomersModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\User;
use App\TblState;
use Hash;



class CustomerController extends Controller

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
            $query->where(array('role'=>'customer'));


        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query->orwhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $users->appends(['search_text' => $search]);
        }

        else {

            $users = User::where(array('role'=>'customer'))->paginate(10);

        }

        return View('CustomerModule.index')->with('users',$users);
        //
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

     
        return view('CustomerModule.create')->with(array('users'=>$users,'states'=>$states)); 

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
           // 'dob' => 'required',
            'phone_number' => 'required',
            'local_address_line_1' => 'required',
            'local_address_state' => 'required',
            'local_address_city' => 'required',
            'local_address_pincode' => 'required',
            //'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            

         ]);


     



           $user = new User();
           $user->role  = 'customer';
           $user->first_name  = $request->first_name;
           $user->last_name  = $request->last_name;
           $user->name  = $request->first_name.' '.$request->last_name;
           $user->email  = $request->email;
          // $user->dob = $request->dob;
           $user->blood_group = $request->blood_group;
           $user->local_address_line_1 = $request->local_address_line_1;
           $user->local_address_line_2 = $request->local_address_line_2;
            $user->local_address_country  = $request->local_address_country;
           $user->local_address_state = $request->local_address_state;
           $user->local_address_city = $request->local_address_city;
           $user->phone_number  = $request->phone_number;
           $user->local_address_pincode = $request->local_address_pincode;
           $user->reference_by = $request->reference_by;


           $imageName = time().'.'.$request->profile_image->extension();  
          // echo public_path('images');
           //exit;
           $request->profile_image->move(public_path('profile_image'), $imageName);
            $user->profile_image = 'public/images/'.$imageName;


            $user->save();
        return redirect()->back()->with('message', 'Customer Added successfully!');

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

        return view('CustomerModule.view')->with('users',$users); 

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


        return view('CustomerModule.edit')->with(array('users'=>$users,'states'=>$states)); 

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
            'phone_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            //'dob' => 'required',

            'local_address_line_1' => 'required',
            'local_address_state' => 'required',
            'local_address_city' => 'required',
            'local_address_pincode' => 'required',
         
         ]);



           $user =  User::where('id',$request->user_id)->first();

          // $user->role  = 'supervisor';

           $user->first_name  = $request->first_name;
           $user->last_name  = $request->last_name;
           $user->name  = $request->first_name.' '.$request->last_name;
            $user->email  = $request->email;
             $user->local_address_country  = $request->local_address_country;
           $user->local_address_line_1 = $request->local_address_line_1;
           $user->local_address_line_2 = $request->local_address_line_2;
           $user->local_address_state = $request->local_address_state;
           $user->local_address_city = $request->local_address_city;
           $user->local_address_pincode = $request->local_address_pincode;
           $user->reference_by = $request->reference_by;
           //$user->password =  Hash::make($request->password);

           $user->phone_number  = $request->phone_number;


            $imageName = time().'.'.$request->profile_image->extension();  
          // echo public_path('images');
           //exit;
           $request->profile_image->move(public_path('profile_image'), $imageName);
            $user->profile_image = 'public/images/'.$imageName;
         
        $user->update();

        return redirect()->back()->with('message', 'Customer Updated successfully!');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function delete($id)

    {

           

        $customer =  User::where('id',$id)->first();

        $customer->delete();

        return redirect()->back()->with('message', 'Customer deleted successfully!');

    

    }





















}

