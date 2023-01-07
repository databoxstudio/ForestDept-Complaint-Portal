@extends('layouts.app')







@section('content')

<div class="page-content">

    

    

        <div class="col-lg-12 col-xl-12 stretch-card">

        <div class="card">

            <div class="card-body">

                <form action="">

                                      

                    <div class="row">

                        <div class="col-sm-3">

                            <div class="form-group">

                                <label class="control-label">Select Division</label>

                              

                                   <select class="js-example-basic-single w-100" name="search_text" id="divid">
     <option selected="" disabled="">Select Division</option>
                                         @foreach($divisions as $division)
            @if (@$_REQUEST['search_text'] == $division->division_name)
                <option value="{{$division->division_name}}" selected="selected">{{$division->division_name}}</option>
                @else 
                <option value="{{$division->division_name}}">{{$division->division_name}}</option>
                @endif


            @endforeach

                                    </select>

                            </div>

                        </div>

                       

                     


                        <div class="col-sm-2">

                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                   <button class="btn btn-success">Filter Complaint</button>

                            </div>

                        </div>



                         <div class="col-sm-2">

                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                  <a href="{{route('complaintsModule.contactnumbers')}}" class="btn btn-success">Reset Filter</a>

                            </div>

                        </div>



                    </div>

                 

                </form>

            </div>

        </div>

    </div>



        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">

          <div>

            <!-- <h4 class="mb-3 mb-md-0">Roles page.</h4> -->

          </div>

        </div>

        <div class="col-lg-12 col-xl-12 stretch-card">

            <div class="card">

              <div class="card-body">

              @if(session()->has('message'))

                <div class="alert alert-success">

                    {{ session()->get('message') }}

                </div>

                @endif

                <div class="d-flex justify-content-between align-items-baseline mb-2">

                  <h6 class="card-title mb-0">Officer's Contact Number</h6>

                 <!-- <div class="dropdown mb-2">

                     

                    <a class="btn btn-success" href="{{route('complaintsModule.create')}}"> <span class="">Add New Complaint</span></a>

                  </div>-->

                </div>

                <div class="table-responsive">

                  <table class="table table-hover mb-0">

                    <thead>

                      <tr>
                          <th class="pt-0">Division</th>

                   
                        <th class="pt-0">DFO Name</th>

                         <th class="pt-0">DFO Contact</th>

                         <th class="pt-0">Range Name</th> 

                        <th class="pt-0">Range Officer Name</th>

                        <th class="pt-0">Range Officer Contact</th>

                      

                        

                    </thead>

                    <tbody>

                        @if(!$contactnumbers->isEmpty()) 
                     @foreach($contactnumbers as $contactnumber)

                              <tr>
                                 <td>{{$contactnumber->division_name}} </td>

                               <td>{{$contactnumber->dfo_name}} </td>
                                  <td>{{$contactnumber->dfo_contact}} </td>

                              <td>{{$contactnumber->range_name}}</td>
                              <td>{{$contactnumber->ro_name}} </td>
                              <td>{{$contactnumber->ro_contact}} </td>

                             


                      

           



                      </tr>
                     
                     

                      @endforeach

                       @else

                         <tr>

                         <td colspan="5" style="font-size: 16px;font-weight: bold;text-align: center;">No contact number found!</td> 

           



                      </tr>

                      @endif

                     

                    </tbody>

                  </table>

                  <div class="pagination">

                        {{$contactnumbers->render()}}



                    </div>

                </div>

              </div> 

            </div>

          </div>



</div>

@endsection

