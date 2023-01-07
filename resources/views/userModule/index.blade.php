@extends('layouts.app')



@section('content')
<div class="page-content">

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
                  <h6 class="card-title mb-0">Admin Users</h6>
              
                 <!-- <div class="dropdown mb-2">
                   
                    <a class="btn btn-success" href="{{route('usersModule.create')}}"> <span class="">Add New Admin User</span></a>
                  </div>-->
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">User ID</th>
                        <th class="pt-0">User Name</th>
                        <th class="pt-0">User Email</th>
                        <th class="pt-0">Local Address</th>
                        <th class="pt-0">Permanent Address</th>
                        <th class="pt-0">Action</th>
                        
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>
                         <td>{{$user->id}}</td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->local_address_line_1}} {{$user->local_address_line_2}}
                            {{$user->local_address_state}} {{$user->local_address_city}}
                            {{$user->local_address_pincode}}
                        </td>
                        <td>{{$user->permanent_address_line_1}} {{$user->permanent_address_line_2}}
                            {{$user->permanent_address_state}} {{$user->permanent_address_city}}
                            {{$user->permanent_address_pincode}}</td>
                        <td><a href=""><i data-feather="edit-3" class="icon-sm mr-2"></i></a> | <a href=""><i data-feather="trash" class="icon-sm mr-2"></i></i></a></td> 
           

                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="pagination">
                  <?php //echo $category->render(); ?>

                    </div>

                </div>
              </div> 
            </div>
          </div>

</div>
@endsection
