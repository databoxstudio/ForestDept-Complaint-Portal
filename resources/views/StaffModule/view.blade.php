@extends('layouts.app')







@section('content')

<div class="page-content">



<div class="row">

                    <div class="col-md-12 stretch-card">

                        <div class="card">

                            <div class="card-body">

                                @if(session()->has('message'))

                <div class="alert alert-success">

                    {{ session()->get('message') }}

                </div>

                @endif

                                <h6 class="card-title">Agent Detail</h6>

                                    <form class="forms-sample" action="{{route('staffModule.save')}}" method="post">

                {{ csrf_field() }}

                                        <div class="row">

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Agent First Name</label>

                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$users->first_name}}" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                             <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Agent Last Name</label>

                                                    <input type="text" class="form-control" value="{{$users->last_name}}" name="last_name" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Father's Name</label>

                                                    <input type="text" class="form-control" value="{{$users->fathers_name}}" name="fathers_name" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->

                                        <div class="row">

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Date of Birth</label>

                                                    <input type="text" class="form-control" value="{{$users->dob}}"  name="dob" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Blood Group</label>

                                                    <input type="text" class="form-control" value="{{$users->blood_group}}"  name="blood_group" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                              <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Contact Numnber</label>

                                                    <input type="text" class="form-control" value="{{$users->phone_number}}"  name="phone_number" disabled="disabled">

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

                                                   <input type="text" class="form-control" value="{{$users->local_address_line_1}}"  name="local_address_line_1" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Address Line 2</label>

                                                    <input type="text" class="form-control" value="{{$users->local_address_line_2}}"  name="local_address_line_2" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">State</label>

                                                     <input type="text" class="form-control" value="{{$users->localState->name}}"  name="local_address_state" disabled="disabled">



                                                    

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">City</label>

                                                    <input type="text" class="form-control" value="{{$users->local_address_city}}"  name="local_address_city" disabled="disabled">



                                                   

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Pincode</label>

                                                    <input type="text" class="form-control" value="{{$users->local_address_pincode}}"  name="local_address_pincode" disabled="disabled">

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

                                                   <input type="text" class="form-control" value="{{$users->permanent_address_line_1}}"  name="permanent_address_line_1" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Address Line 2</label>

                                                    <input type="text" class="form-control" value="{{$users->permanent_address_line_2}}"  name="permanent_address_line_2" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">State</label>

                                                    <input type="text" class="form-control" value="{{$users->permanentState->name}}"  name="permanent_address_state" disabled="disabled">



                                                    

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">City</label>

                                                     <input type="text" class="form-control" value="{{$users->permanent_address_city}}"  name="local_address_city" disabled="disabled">



                                                     

                                                </div>

                                            </div><!-- Col -->

                                            <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Pincode</label>

                                                    <input type="text" class="form-control" value="{{$users->permanent_address_pincode}}" name="permanent_address_pincode" disabled="disabled">

                                                </div>

                                            </div><!-- Col -->

                                        </div><!-- Row -->

                                    
                                 

                                       </form>

                            </div>

                        </div>

                    </div>

                </div>







</div>

@endsection

