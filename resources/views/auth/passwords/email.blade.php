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
                              <form id="loginForm" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
                                  <div class="form-group{{ $errors->has('student_number') ? ' has-error' : '' }}">
                                            <label for="email" class="control-label">E-Mail Address</label>
                                            <input type="text" class="form-control" id="email" name="email" value=" {{ old('email') }}" required="" title="Please enter your email" placeholder="Email">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                   </div>
                                    <button type="submit" class="btn btn-success btn-block">Send Password Reset Link</button>
                              </form>
                            </div> 
                          </div>
                      </div>
                  </div>
              </div>
        </div>
    </div>
@endsection
