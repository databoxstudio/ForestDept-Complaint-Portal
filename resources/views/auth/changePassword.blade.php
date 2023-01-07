@extends('layouts.app')

@section('content')
<div class="page-content">  
    <div class="row">
					<div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
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
								<h6 class="card-title">Change Password</h6>
                                <form class="forms-sample" method="POST" action="{{ route('changePassword') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password">Current Password</label>
                            <input id="current-password" type="password" class="form-control" name="current-password" required autocomplete="off">
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                             </div>


                             <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password">New Password</label>
                                <input id="new-password" type="password" class="form-control" name="new-password" required autocomplete="off">
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                           </div>


                        <div class="form-group">
                            <label for="new-password-confirm" >Confirm New Password</label>
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        </div>
									
						<button type="submit" class="btn btn-primary mr-2">Change Password</button>
									
                                </form>
                              
              </div>
            </div>
					</div>
				
				</div>
</div>

@endsection