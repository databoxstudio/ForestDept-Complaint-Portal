
@extends('layouts.app')

@section('content')

<div class="page-content">
    <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h6 class="card-title">Profile</h6>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form class="forms-sample" method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">First name</label>
                                <input id="name" type="text" class="form-control" name="name"  value="{{ Auth::user()->name }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                       <div class="form-group">
                            <label for="name">Last name</label>
                                <input id="name" type="text" class="form-control" name="last_name"  value="{{ Auth::user()->last_name }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="form-group">
                            <label for="name" >Email</label>
                                <input id="name" type="text" class="form-control" name="email"  value="{{ Auth::user()->email }}" required >
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                       



                        <div class="form-group">
                            <label for="requisition_by" >PO Requisition By</label>
                                <input id="requisition_by" type="text" class="form-control" name="requisition_by"  value="{{ Auth::user()->requisition_by }}" required >
                                @if ($errors->has('requisition_by'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('requisition_by') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="form-group">
                            <label for="name" >Phone</label>
                                <input id="phone" type="text" class="form-control" name="phone"  value="{{ Auth::user()->phone }}" required >
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="name" >Address Line 1</label>
                                <input id="address_line_1" type="text" class="form-control" name="address_line_1"  value="{{ Auth::user()->address_line_1 }}" required >
                                @if ($errors->has('address_line_1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line_1') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="name" >Address Line 2</label>
                                <input id="address_line_2" type="text" class="form-control" name="address_line_2"  value="{{ Auth::user()->address_line_2 }}"  >
                                @if ($errors->has('address_line_2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line_2') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="form-group">
                            <label for="name" >Address Line 3</label>
                                <input id="address_line_3" type="text" class="form-control" name="address_line_3"  value="{{ Auth::user()->address_line_3 }}"  >
                                @if ($errors->has('address_line_3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line_3') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="figure mb-3">
										<img src="{{ url('avatars/'.Auth::user()->profile) }}" alt="" width=100px;>
									</div>
                        <div class="form-group">
                            
										<label>Upload Logo</label>
										<input type="file" name="profile" class="file-upload-default">
										<div class="input-group col-xs-12">
											<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload logo">
											<span class="input-group-append">
												<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
											</span>
										</div>
									</div>
                   


                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
</div>
</div>



@endsection

