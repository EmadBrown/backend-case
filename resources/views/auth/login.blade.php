@extends('main')    

@section('content')
<div class="container">
        <div id="login-overlay" class="modal-dialog">
          <div class="modal-content">
                <div class="modal-body">
                        <div class="panel-heading"><strong>Reset Password</strong></div>
                              <div class="row">
                                  <div class="col-xs-12">
                                      <div class="well">
                                          <form id="loginForm" method="POST" action="{{ route('login') }}">
                                          {{ csrf_field() }}
                                              <div class="form-group{{ $errors->has('student_number') ? ' has-error' : '' }}">
                                                  <label for="student_number" class="control-label">Student Number</label>
                                                  <input type="text" class="form-control" id="student_number" name="student_number" value=" {{ old('student_number') }}" required="" title="Please enter you student number" placeholder="Student Number">
                                                          @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('student_number') }}</strong>
                                                            </span>
                                                        @endif
                                              </div>
                                              <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                  <label for="password" class="control-label">Password</label>
                                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                                       @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                              </div>
                                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                              <div class="checkbox">
                                                  <label>
                                                         <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                  </label>
                                                  <p class="help-block">(if this is a private computer)</p>
                                              </div>
                                              <button type="submit" class="btn btn-success btn-block">Login</button>
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
