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
                                <h6 class="card-title">Customer Detail</h6>
                                    <form class="forms-sample" action="" method="post">
                {{ csrf_field() }}

                                    


                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Customer First Name</label>
                                                    <input type="text" class="form-control" value="{{$users->first_name}}" disabled="disabled">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Customer Last Name</label>
                                                    <input type="text" class="form-control" value="{{$users->last_name}}" disabled="disabled">
                                                </div>
                                            </div><!-- Col -->
                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Customer Contact Number</label>
                                                    <input type="text" value="{{$users->phone_number}}" class="form-control" id="phone_number" name="phone_number" disabled="disabled">
                                                </div>
                                            </div><!-- Col -->
                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Customer Email</label>
                                                    <input type="text" value="{{$users->email}}" class="form-control" id="email" name="email" disabled="disabled">
                                                </div>
                                            </div><!-- Col -->


                                              <div class="col-sm-4">

                                                <div class="form-group">

                                                    <label class="control-label">Reference By</label>

                                                    <input type="reference_by" class="form-control" id="reference_by" name="reference_by" value="{{$users->reference_by}}" disabled="disabled">

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
                                                    <label class="control-label">Country</label>
                                                   
                                                    <input type="text" class="form-control" value="{{$users->local_address_country}}"  name="local_address_country" disabled="disabled">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                   
                                                    <input type="text" class="form-control" value="{{$users->localState->name}}"  name="state" disabled="disabled">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                     <input type="text" class="form-control" value="{{$users->local_address_city}}"  name="city" disabled="disabled">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="text" class="form-control" value="{{$users->local_address_pincode}}"  name="local_address_pincode" disabled="disabled">
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
