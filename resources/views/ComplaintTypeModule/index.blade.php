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

                                   <button class="btn btn-success">Filter Profiles</button>

                            </div>

                        </div>



                         <div class="col-sm-2">

                            <div class="form-group">

                                <label for="location">&nbsp;</label>

                                  <a href="{{route('customersModule.customers')}}" class="btn btn-success">Reset Filter</a>

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

                  <h6 class="card-title mb-0">Measurements</h6>

                  <div class="dropdown mb-2">

                     

                    <a class="btn btn-success" href="{{route('complaintsModule.create')}}"> <span class="">Add New Measurement</span></a>

                  </div>

                </div>

                <div class="table-responsive">

                  <table class="table table-hover mb-0">

                    <thead>

                      <tr>

                         <th class="pt-0">ID</th> 
<th class="pt-0">Image</th>
                        <th class="pt-0">Customer Name</th>

                        <th class="pt-0">Measurement Date</th>

                        <th class="pt-0">Delivery Date</th>

                   
                        <th class="pt-0">Action</th>

                        

                    </thead>

                    <tbody>

                     @foreach($measurement as $measurements)

                      <tr>
 <td><a href="http://localhost/akriti/{{$measurements->profile_image}}" target="_blank"><img src="http://localhost/akriti/{{$measurements->profile_image}}" height="" width=""></a></td>
                         <td>{{$measurements->id}}</td>
<td>{{$measurements->first_name}} {{$measurements->last_name}} </td>
                        <td>{{$measurements->measurement_date}} </td>

                        <td>{{$measurements->delivery_date}}</td>


                      

                        <td><a href="{{route('complaintsModule.view',$measurements->id)}}" class="view_client" ids="{{$measurements->id}}"><i class="icon-sm mr-2" data-feather="eye"></i></a> | <a href="{{route('complaintsModule.edit',$measurements->id)}}"><i data-feather="edit-3" class="icon-sm mr-2"></i></a> | <a href="{{route('complaintsModule.delete',$measurements->id)}}"><i data-feather="trash" class="icon-sm mr-2"></i></i></a></td> 

           



                      </tr>

                      @endforeach

                     

                    </tbody>

                  </table>

                  <div class="pagination">

                        <?php //echo $measurements->render();?>



                    </div>

                </div>

              </div> 

            </div>

          </div>



</div>

@endsection

