<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success" role='alert'>
            <strong>Success: </strong>{{ Session::get('success') }}
        </div>
    @endif
    
    @if(Session::has('danger'))
        <div class="alert alert-danger" role='alert'>
            <strong>Danger: </strong>{{ Session::get('danger') }}
        </div>
    @endif
    
    @if(Session::has('warning'))
        <div class="alert alert-warning" role='alert'>
            <strong>Warning: </strong>{{ Session::get('warning') }}
        </div>
    @endif
    
    @if(Session::has('primary'))
        <div class="alert alert-primary" role='alert'>
            <strong>Error: </strong>{{ Session::get('primary') }}
        </div>
    @endif
    
    @if(Session::has('info'))
        <div class="alert alert-info" role='alert'>
            <strong>Info: </strong>{{ Session::get('info') }}
        </div>
    @endif
    
    @if(count($errors) > 0)
    <div class="alert alert-danger" role='alert'>
        <strong>Errors: </strong>
            <ul>
                @foreach($errors->all()  as $error)
                    <li> {{  $error }} </li>
                @endforeach
            </ul>
    </div>
    @endif
</div>