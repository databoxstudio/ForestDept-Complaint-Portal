@extends('layouts.app')



@section('content')
<div class="page-content">
<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
            <div class="card">

             
              
              <div class="card-body">
              @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <h6 class="card-title">Add Site</h6>
                <form class="forms-sample" action="{{route('agentModule.update')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" id="company_legal_name" name="id" value="{{$tbl_client->id}}" autocomplete="off" >
                    <div class="form-group">
                        <label for="exampleInputUsername1">Compnay Legal Name</label>
                        
                        <input type="text" class="form-control" id="company_legal_name" name="company_legal_name" value="{{$tbl_client->company_legal_name}}" autocomplete="off" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Primary Client Manager</label>
                        <input type="text" class="form-control" id="primary_client_manager"  name="primary_client_manager" placeholder=""  value="{{$tbl_client->primary_client_manager}}"  autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile_number"  name="mobile_number" placeholder=""  value="{{$tbl_client->mobile_number}}"   autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Account Manager</label>
                        <input type="text" class="form-control" id="account_manager"  name="account_manager" placeholder="" value="{{$tbl_client->account_manager}}"  autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">AM Mobile Number</label>
                        <input type="text" class="form-control" id="am_mobile_number"  name="am_mobile_number" placeholder=""  value="{{$tbl_client->am_mobile_number}}" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No of  Sites</label>
                        <input type="text" class="form-control" id="am_mobile_number"  name="number_of_sites" placeholder=""   value="{{$tbl_client->number_of_sites}}" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Postal Code</label>
                        <input type="number" class="form-control" id="postal_code"  name="postal_code" placeholder=""  value="{{$tbl_client->postal_code}}"  autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
              </div>
            </div>
					</div>
				
				</div>
</div>
@endsection
