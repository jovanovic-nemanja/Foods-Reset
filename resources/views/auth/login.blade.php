@extends('layouts.frontendTemplate')
@section('css-file')
    <link rel="stylesheet" href="{{asset('css/login.css')}}?v={{time()}}">
@endsection
@section('content')
	<?php use App\Libraries\ZnUtilities;
	?>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('img/bg-01.jpg')}}');">
			<div class="wrap-login100">
				<form method="POST" action="{{ url('/login') }}" class="login100-form validate-form">
                    <a href="{{ url('/') }}" class="d-block text-center"><img src="{{asset('img/logo-new.jpg')}}" alt="logo" class="login-logo"></a>
                    @csrf
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Email" autocomplete="off" required >
						<span class="focus-input100 far fa-user"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" autocomplete="off" required name="password" placeholder="Password">
						<span class="focus-input100 fas fa-envelope"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="text-center p-t-90 p-b-90">
						<a class="txt1" href="#">
							I forgot my password
						</a>
					</div>

					<div class="container-login100-form-btn">
                        <a class="login100-form-btn" href="{{url('/register')}}">
							Register
						</a>
						<button type="submit" class="login100-form-btn ml-3">
							Sign-In
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
