@extends('main')

@section('stylesheet')
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
        <div id="login-overlay" class="modal-dialog">
          <div class="modal-content">
                <div class="modal-body">
                        <div class="panel-heading"><strong>Login </strong></div>
                              <div class="row">
                                  <div class="col-xs-12">
                                      <div class="well">
                                          
                    <form id="loginForm" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="name" class="control-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" value=" {{ old('name') }}" required="" required autofocus title="Please enter you name" placeholder="name">
                                          @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                            </div>
                        
                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="control-label">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" value=" {{ old('email') }}" required required autofocus title="Please enter you email" placeholder="email">
                                          @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                            </div>
                        
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value=" {{ old('password') }}"  required autofocus title="Please enter you password" placeholder="password">
                                          @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                            </div>
                        
                           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password-confirm" class="control-label">Confirm Password</label>
                                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation" value=" {{ old('password-confirm') }}"  required autofocus title="Please enter you password confirm" placeholder="password confirm">
                            </div>

                        <div class="form-group">
                  
                                <button type="submit" class="btn btn-success btn-block">Register</button>
      
                        </div>
                    </form>
                 </div>
                    </div>
                </div>
                </div>
          </div>
      </div>
</div>
@endsection
