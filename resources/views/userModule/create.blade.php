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
                                <h6 class="card-title">Add Admin User</h6>
                                    <form class="forms-sample" action="{{route('usersModule.save')}}" method="post">
                {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off" placeholder="First Name">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off" placeholder="Last Name">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" class="form-control id="email" name="email" autocomplete="off" placeholder="email">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" class="form-control" id="dob"  name="dob" autocomplete="off" placeholder="Date of Birth">
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
                                                    <label class="control-label">Local Address Line 1</label>
                                                   <input type="password" class="form-control" id="local_address_line_1"  name="local_address_line_1" autocomplete="off" placeholder="Address Line 1">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Local Address Line 2</label>
                                                    <input type="email" class="form-control" id="local_address_line_2"  name="local_address_line_2" autocomplete="off" placeholder="Address Line 2">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                   
                                                      <select class="form-control" name="local_address_state" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select State</option>
                                                    <option>Country 1</option>
                                                    <option>Country 2</option>
                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                     <select class="form-control" name="local_address_city" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select City</option>
                                                    <option>Country 1</option>
                                                    <option>Country 2</option>
                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="password" class="form-control" id="local_address_pincode"  name="local_address_pincode" autocomplete="off" placeholder="Pincode">
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
                                                   <input type="password" class="form-control" id="permanent_address_line_1"  name="permanent_address_line_1" autocomplete="off" placeholder="Address Line 1">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address Line 2</label>
                                                    <input type="email" class="form-control" id="permanent_address_line_2"  name="permanent_address_line_2" autocomplete="off" placeholder="Address Line 2">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                   
                                                      <select class="form-control" name="permanent_address_state" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select State</option>
                                                    <option>Country 1</option>
                                                    <option>Country 2</option>
                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                     <select class="form-control" name="permanent_address_city" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select City</option>
                                                    <option>Country 1</option>
                                                    <option>Country 2</option>
                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pincode</label>
                                                    <input type="password" class="form-control" id="permanent_address_pincode"  name="permanent_address_pincode" autocomplete="off" placeholder="Pincode">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->
                                    

                                        <div class="row">
                                            <h6 class="card-title">AADHAR DETAIL</h6>
                                                </div>
                                         <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Aadhar Number</label>
                                                    <input type="email" class="form-control" id="aadhar_number"  name="aadhar_number" autocomplete="off" placeholder="Aadhar Number">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Name on Aadhar Card</label>
                                                    <input type="email" class="form-control" id="name_on_aadhar_card"  name="name_on_aadhar_card" autocomplete="off" placeholder="Name on Aadhar Card">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Aadhar Card front pic</label>
                                                    <input type="file" class="form-control" id="aadhar_front_snap"  name="aadhar_front_snap" autocomplete="off" placeholder="Aadhar Card front pic">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Aadhar Card Back pic</label>
                                                    <input type="file" class="form-control" id="aadhar_back_snap"  name="aadhar_back_snap" autocomplete="off" placeholder="Aadhar Card Back pic">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->


                                         <div class="row">
                                            <h6 class="card-title">DRIVING LICENCE DETAIL</h6>
                                                </div>
                                             <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">DL Number</label>
                                                    <input type="email" class="form-control" id="driving_licence_number"  name="driving_licence_number" autocomplete="off" placeholder="DL Number">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Name As on DL</label>
                                                    <input type="email" class="form-control" id="name_as_on_dl"  name="name_as_on_dl" autocomplete="off" placeholder="Name As on DL">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">DOB as on DL</label>
                                                    <input type="password" class="form-control" id="dob_dl"  name="dob_dl" autocomplete="off" placeholder="DOB as on DL">
                                                </div>
                                            </div><!-- Col -->
                                        </div>
                                       <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">DL Issue Date</label>
                                                    <input type="password" class="form-control" id="dl_issue_date"  name="dl_issue_date" autocomplete="off" placeholder="DL Issue Date">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">DL Expiry Date</label>
                                                    <input type="password" class="form-control" id="dl_expiry_date"  name="dl_expiry_date" autocomplete="off" placeholder="DL Expiry Date">
                                                </div>
                                            </div><!-- Col -->
                                               <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">DL Issued State</label>
                                                     <select class="form-control" name="issued_state" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select State</option>
                                                    <option>Country 1</option>
                                                    <option>Country 2</option>
                                                </select>
                                                </div>
                                            </div><!-- Col -->
                                           
                                        </div><!-- Row -->
                                         <div class="row">
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">DL Front Pic</label>
                                                    <input type="file" class="form-control" id="dl_front_snap"  name="dl_front_snap" autocomplete="off" placeholder="DL Front Pic">
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">DL Back Pic</label>
                                                     <input type="file" class="form-control" id="dl_back_snap"  name="dl_back_snap" autocomplete="off" placeholder="DL Back Pic">
                                                </div>
                                            </div><!-- Col -->
                                            
                                        </div><!-- Row -->



                                            <div class="row">
                                            <h6 class="card-title">PAN CARD DETAIL</h6>
                                                </div>
                                         <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">PAN Number</label>
                                                    <input type="text" class="form-control" id="pan_number"  name="pan_number" autocomplete="off" placeholder="PAN Number">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Name as on PAN</label>
                                                    <input type="text" class="form-control" id="name_as_on_pancard"  name="name_as_on_pancard" autocomplete="off" placeholder="Name as on PAN">
                                                </div>
                                            </div><!-- Col -->
                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">PAN Front Pic</label>
                                                    <input type="file" class="form-control" id="pan_front_snap"  name="pan_front_snap" autocomplete="off" placeholder="PAN Front Pic">
                                                </div>
                                            </div><!-- Col -->
                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">PAN Back Pic</label>
                                                   <input type="file" class="form-control" id="pan_back_snap"  name="pan_back_snap" autocomplete="off" placeholder="PAN Back Pic">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->


                                            <div class="row">
                                            <h6 class="card-title">BANK ACCOUNT DETAIL</h6>
                                                </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Bank Account Number</label>
                                                    <input type="password" class="form-control" id="back_ac_number"  name="back_ac_number" autocomplete="off" placeholder="Bank Account Number">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">A/C Holder Name</label>
                                                    <input type="password" class="form-control" id="account_holder_name"  name="account_holder_name" autocomplete="off" placeholder="A/C Holder Name">
                                                </div>
                                            </div><!-- Col -->
                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Bank Name</label>
                                                    <input type="password" class="form-control" id="bank_name"  name="bank_name" autocomplete="off" placeholder="Bank Name">
                                                </div>
                                            </div><!-- Col -->
                                        </div>
                                        <div class="row">
                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Bank Branck</label>
                                                    <input type="text" class="form-control" id="branch_name"  name="branch_name" autocomplete="off" placeholder="Bank Branck">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">IFSC Code</label>
                                                    <input type="text" class="form-control" id="ifsc_code"  name="ifsc_code" autocomplete="off" placeholder="IFSC Code">
                                                </div>
                                            </div><!-- Col -->
                                             <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Cancel Cheque Pic</label>
                                                   <input type="file" class="form-control" id="cancel_cheque_snap"  name="cancel_cheque_snap" autocomplete="off" placeholder="Cancel Cheque Pic">
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->


                                       

                                     <button class="btn btn-light">Back</button>
                                     <button type="submit" class="btn btn-primary mr-2">Create Agent</button>
                                       </form>
                            </div>
                        </div>
                    </div>
                </div>



</div>
@endsection
