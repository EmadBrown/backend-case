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
                                          @if (session('status'))
                                              <div class="alert alert-success">
                                                  {{ session('status') }}
                                              </div>
                                          @endif
                                      <form id="loginForm" method="POST" action="{{ route('password.request') }}">
                                               {{ csrf_field() }}
                                               <input type="hidden" name="token" value="{{ $token }}">
                                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                      <label for="email" class="control-label">E-Mail Address</label>
                                                      <input type="text" class="form-control" id="email" name="email"  required autofocus  title="Please enter your email" placeholder="Email">
                                                          @if ($errors->has('email'))
                                                              <span class="help-block">
                                                                  <strong>{{ $errors->first('email') }}</strong>
                                                              </span>
                                                          @endif
                                             </div>


                                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                              <label for="password" class="control-label">Password</label>
                                                      <input id="password" type="password" class="form-control" name="password" required autofocus  placeholder="Password">

                                                      @if ($errors->has('password'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('password') }}</strong>
                                                          </span>
                                                      @endif
                                              </div>

                                              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                      <label for="password-confirm" class="control-label">Confirm Password</label>
                                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus  placeholder="Confirm Password">

                                                          @if ($errors->has('password_confirmation'))
                                                              <span class="help-block">
                                                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                              </span>
                                                          @endif
                                              </div>

                                               <button type="submit" class="btn btn-success btn-block"> Reset Password</button>
                                      </form>
                                      </div> 
                                    </div>
                                </div>
                  </div>
              </div>
        </div>
    </div>
@endsection
