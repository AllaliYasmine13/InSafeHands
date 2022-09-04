@extends('layouts.login_page')
{{-- @section('title')
    Admin Login
@endsection --}}
@section('container')

                  <div class="login_form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset>
                           <div class="field">
                              <label class="label_field"><i class="fa fa-envelope fa-lg fa-fw green_color"></i></label>
                              <input type="email" name="email" placeholder="Email Address"
                              class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />
                           </div>
                           <div class="field">
                              <label class="label_field"><i class="fa fa-lock fa-lg fa-fw green_color"></i></label>
                              <input type="password" name="password" placeholder="Password"
                               class="form-control" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
            
                           </div>
                           <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="">Forgotten Password?</a>
                           </div>
                           
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt">Se Connecter</button>
                           </div>
                        </fieldset>
                     </form> 
                          {{-- <div class="social-auth-links.test-center.mb-3">
                              <a href="#" class="btn btn-block btn-grimary">
                                 <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                              </a>
                              <a href="#" class="btn btn-block btn-danger">
                                 <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                              </a>
                           </div>  --}}

                    </div> 

    {{-- <div class="card card-primary">
         <div class="card-header"><h4>Admin Login</h4></div> 

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           placeholder="Enter Email" tabindex="1"
                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                           required>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                           placeholder="Enter Password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember"{{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                        Se Connecter
                    </button>
                </div>
            </form>
        </div>
    </div>  --}}
@endsection
