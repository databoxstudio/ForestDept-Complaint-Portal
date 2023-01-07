@extends('layouts.app')



@section('content')
<div class="page-content">

<div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">

                                      @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif

                                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                                <h6 class="card-title">Update Profile</h6>
                                    <form class="forms-sample" action="{{route('usersModule.updateprofile')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" value="{{$users->id}}" name="user_id">

                                         <div class="row">
                                            
                                        </div><!-- Row -->

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off" placeholder="First Name" value="{{$users->first_name}}">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" placeholder="Last Name" value="{{$users->last_name}}">
                                                </div>
                                            </div><!-- Col -->
                                           
                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Contact Number</label>
                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" autocomplete="off" placeholder="Contact Number" value="{{$users->phone_number}}" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div><!-- Col -->
                                            
                                           
                                        </div><!-- Row -->
                                        <div class="row">
                                           
                             
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" class="form-control" id="dob"  name="dob" autocomplete="off" placeholder="Date of Birth" value="{{$users->dob}}" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Blood Group</label>
                                                    <select name="blood_group" class="form-control" id="exampleFormControlSelect1">
                                                       <option selected="" disabled="">Select Blood Group</option>
                                                        <option value="A+">A+</option>
                                                        <option value="B+">B+</option>
                                                        <option value="O+">O+</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O-">O-</option>
                                                        <option value="AB-">AB-</option>
                                                    </select>
                                                </div>
                                            </div><!-- Col -->
                                            
                                        </div><!-- Row -->




                                        <div class="row">
                                            <h6 class="card-title">Local Address</h6>
                                                </div>
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 1</label>
                                                   <input type="text" class="form-control" id="local_address_line_1"  name="local_address_line_1" autocomplete="off" placeholder="Address Line 1" value="{{$users->local_address_line_1}}">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="local_address_line_2"  name="local_address_line_2" autocomplete="off" placeholder="Address Line 2" value="{{$users->local_address_line_2}}">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                   
                                                     <select class="form-control" name="local_address_state" id="exampleFormControlSelect1">

                                                    <option selected="" disabled="">Select State</option>

                                                

                                                        @foreach($states as $state)
                                                        @if (old('local_address_state') == $state->id)
                                                            <option value="{{$state->id}}" selected="selected">{{$state->name}}</option>
                                                            @else 
                                                            <option value="{{$state->id}}")>{{$state->name}}</option>
                                                            @endif


                                                        @endforeach

                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                           
                                                       <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                       <input type="text" class="form-control" id="local_address_city"  name="local_address_city" autocomplete="off" placeholder="City" value="{{$users->local_address_city}}">
                                               
                                                </div>
                                            </div><!-- Col -->
                                               
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="text" class="form-control" id="local_address_pincode"  name="local_address_pincode" autocomplete="off" placeholder="Pincode" onkeypress="return isNumberKey(event)" value="{{$users->local_address_pincode}}">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->
                                    

                                        <div class="row">
                                            <h6 class="card-title">Permanent Address</h6>
                                                </div>
                                          <div class="row">
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 1</label>
                                                   <input type="text" class="form-control" id="permanent_address_line_1"  name="permanent_address_line_1" autocomplete="off" placeholder="Address Line 1" value="{{$users->permanent_address_line_1}}">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="permanent_address_line_2"  name="permanent_address_line_2" autocomplete="off" placeholder="Address Line 2" value="{{$users->permanent_address_line_2}}">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                   
                                                     <select class="form-control" name="permanent_address_state" id="exampleFormControlSelect1">

                                                    <option selected="" disabled="">Select State</option>

                                                

                                                        @foreach($states as $state)
                                                        @if (old('local_address_state') == $state->id)
                                                            <option value="{{$state->id}}" selected="selected">{{$state->name}}</option>
                                                            @else 
                                                            <option value="{{$state->id}}")>{{$state->name}}</option>
                                                            @endif


                                                        @endforeach

                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                       <input type="text" class="form-control" id="permanent_address_city"  name="permanent_address_city" autocomplete="off" placeholder="City" value="{{$users->permanent_address_city}}">
                                               
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="text" class="form-control" id="permanent_address_pincode"  name="permanent_address_pincode" autocomplete="off" placeholder="Pincode" onkeypress="return isNumberKey(event)" value="{{$users->permanent_address_pincode}}">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->
                                    

                                         
                                      
                                       
                                     <button type="submit" class="btn btn-primary mr-2">Update Profile</button>
                                       </form>
                            </div>
                        </div>
                    </div>
                </div>



</div>
@endsection


      <script>
      function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>