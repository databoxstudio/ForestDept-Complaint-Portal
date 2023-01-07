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

                                <label class="control-label">Search Text</label>


                                <input type="text" class="form-control" name="search_text" value="<?php echo ((isset($_REQUEST['search_text']) ? $_REQUEST['search_text'] : "")); ?>" placeholder="Search Text">
<!--<input type="text" class="form-control datepicker1"><span class="input-group-addon"><i data-feather="calendar"></i></span>-->
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

                                  <a href="{{route('customersModule.customers')}}" class="btn btn-success">Reset Filter</a>

                            </div>

                        </div>

 <div class="col-sm-2">


                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                  <a href="{{route('printModule.index')}}" target="_blank" class="btn btn-success">Print</a>

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

                  <h6 class="card-title mb-0">Complaints</h6>

                  <div class="dropdown mb-2">

                     

                    <a class="btn btn-success" href="{{route('complaintsModule.create')}}"> <span class="">Add New Complaint</span></a>

                  </div>

                </div>

                <div class="table-responsive">

                  <table class="table table-hover mb-0">

                    <thead>

                      <tr>

                         <th class="pt-0">UID</th> 

                        <th class="pt-0">Contact Number</th>

                        <th class="pt-0">Full Name</th>

                        <th class="pt-0">Forest Area</th>
                        <th class="pt-0">Complaint/Information</th>

                   
                        <th class="pt-0">Action</th>

                        

                    </thead>

                    <tbody>

                        @if(!$complaints->isEmpty()) 
                     @foreach($complaints as $complaint)
                        
                      <tr>

                         <td>{{$complaint->uid}}</td>
<td>{{$complaint->contact_number}} </td>
                        <td>{{$complaint->full_name}} </td>

                        <td>Village:{{$complaint->villege}} <br/> Beat: {{$complaint->beat}} <br/> Block: {{$complaint->block}} <br/> Range: {{$complaint->range}} <br/> Division: {{$complaint->division}}</td>

                         <td>@if(!empty($complaint->information))
        
        Information: {!!html_entity_decode($complaint->information) !!} <br/><br/>
          Information Detail: {!!html_entity_decode($complaint->complaintdetail) !!}
          @endif
        
     
       
         @if(!empty($complaint->complaint))

          Complaint: {{$complaint->complaint}} <br/><br/>
            Complaint Detail: {!!html_entity_decode($complaint->complaintdetail)!!}
           @endif
          
      
          
          
         
          </td>
                      

                        <td><a href="{{route('complaintsModule.view',$complaint->id)}}" class="view_client" ids="{{$complaint->id}}"><img src="/complaintportal/public/assets/images/icons8-view-25.png" style="width:14px;"></a>|<a href="{{route('complaintsModule.edit',$complaint->id)}}"><img src="/complaintportal/public/assets/images/icons8-edit-24.png" style="width:14px;"></a>|<a href="{{route('complaintsModule.delete',$complaint->id)}}" onclick="return confirm('Are you sure?')"><img src="/complaintportal/public/assets/images/icons8-delete.svg" style="width:14px;"></a></td>
                      </tr>
                     
                     

                      @endforeach

                       @else

                         <tr>

                         <td colspan="5" style="font-size: 16px;font-weight: bold;text-align: center;">No complaints are registered yet!</td> 

           



                      </tr>

                      @endif

                     

                    </tbody>

                  </table>

                  <div class="pagination">

                        {{$complaints->render()}}



                    </div>

                </div>

              </div> 

            </div>

          </div>



</div>

@endsection

