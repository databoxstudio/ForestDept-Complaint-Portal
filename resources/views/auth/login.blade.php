@extends('layouts.app')
@section('content')
<style>
.login_logo{
  text-align:center;
  margin-top:12px;
}
</style>
<div class="page-wrapper full-page ">
<!--<div class="login_logo">
                        <a href="/"><img src="public/images/black-logo.png" alt="Company name"></a>
                    </div>-->
			<div class="page-content d-flex align-items-center justify-content-center">
				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-10 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="auth-left-wrapper">
                     <img src="/public/assets/images/login_logo.jpg" alt=""> 
                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">COMPLAINT PORTAL <span>LOGIN</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label  for="exampleInputEmail1">Email address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" >Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          Remember me
                        <i class="input-frame"></i></label>
                      </div>




                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">Login</button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                       
                 
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>

@endsection
