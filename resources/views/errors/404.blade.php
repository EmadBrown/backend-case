@extends('main')
 
@section('content')
 
    <div class="container text-center">
         <form method="post" action="/404notfound" id="form1">
             
                    <div class="aspNetHidden">
                            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTE2ODkwNjU4MDEPFgIeE1ZhbGlkYXRlUmVxdWVzdE1vZGUCAWRk9ZQ9JmEKUrUBSfk+e8Y573phHck=" />
                    </div>
             
                    <div class="aspNetHidden">
                            <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="8B8C8B03" />
                    </div>
            
                    <div id="globalWrapper">
                             <div id="site" class="clearfix">
                                  <h2>Page Not Found</h2>
                                    <div class="userPrompt">
                                            <img src="https://lc-www-live-s.legocdn.com/r/www/-/media/portal%20v2010/errors/404%20mainstage%20image.jpg?l.r2=1953967734" alt="" />
                                            <div>
                                                    <p>Sorry, we can't find that page! It might be an old link or maybe it moved.</p>
                                                    <a class="btn cancel large blue" href="/en-US"><span class="label">BACK TO HOME </span><span class="decor"></span></a>
                                            </div>
                                    </div>
                             </div>
                    </div>
             
        </form>
    </div>

  @endsection

  @section('script')

   <script src="https://lc-www-live-s.legocdn.com/r/www/scripts/dist/release.js?l.r2=1.0.0.1587" type="text/javascript"></script>
   <script type="text/javascript" src="https://lc-www-live-s.legocdn.com/r/www/r/globalnavigationservices/api/v1/global/scripts/en-US/lego.global.javascriptwrapper/www?l.r2=1.0.0.1587"></script>

@endsection 