<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
       @include('cms.partials._head')
       
         @yield('cms-stylesheet')
         
</head>
<body>
    <div id="app">

    @include('cms.partials._navigation')  
    
         @include('cms.partials._messages')
         
     <div class="col-md-12">
                <div class="row">

                          @include('cms.partials._navigation-side-bar') 

                            @yield('cms-content')
                            
                </div>
     </div>

    @include('cms.partials._footer') 
                
    </div>
        <!-- Scripts -->
     @include('cms.partials._javascript')  

        @yield('cms-script')

</body>
</html> 