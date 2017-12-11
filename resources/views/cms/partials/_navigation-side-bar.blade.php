@if (Auth::guard('admin')->check())

<div class="col-sm-2 col-md-2 font-style-bold">
     <div class="panel-group " id="accordion">
           <div class="panel panel-default ">
             <div class="panel-heading">
                    <h4>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseZero"><span class="fa fa-th-list" aria-hidden="true" >
                        </span> Test Types </a>
                    </h4>
                </div>
                <div id="collapseZero" class="panel-collapse collapse  {{ Request::segment(1) == 'register' ? 'in' : '' }}">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td  class="{{ Request::is('register') ? 'alert-info  ' : '' }}">
                                    <span class="fa fa-bars" aria-hidden="true"></span><a href="{{route('test_type.index')}}" class="text-info"> Test Type List </a>
                                </td>
                            </tr>
                             <tr>
                             <td class="{{ Request::is('grade/create')  ? 'alert-info' : '' }}">
                                 <span class=" fa fa-rss-square" aria-hidden="true" ></span><a href="{{ route('grade.create') }}" class="text-info"> Create </a>
                             </td>
                         </tr>
                        </table>
                    </div>
            </div>
         </div>
         <div class="panel panel-default">
             <div class="panel-heading">
                 <h4>
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="fa fa-rss" aria-hidden="true">
                     </span> Grades </a>
                 </h4>
             </div>
             <div id="collapseOne" class="panel-collapse collapse {{ Request::segment(1) == 'grade' ? 'in' : '' }}">
                 <div class="panel-body">
                     <table class="table">
                         <tr>
                             <td class="{{ Request::is('grade') ? 'alert-info' : '' }}">
                                 <span class=" fa fa-rss-square" aria-hidden="true" ></span><a href="{{ route('grade.index') }}" class="text-info">  Grade List  </a>
                             </td>
                         </tr>
                         <tr>
                             <td class="{{ Request::is('grade/create')  ? 'alert-info' : '' }}">
                                 <span class=" fa fa-rss-square" aria-hidden="true" ></span><a href="{{ route('grade.create') }}" class="text-info"> Create </a>
                             </td>
                         </tr>
                     </table>
                 </div>
             </div>
         </div>
         <div class="panel panel-default ">
             <div class="panel-heading">
                    <h4>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="fa fa-th-list" aria-hidden="true" >
                        </span> News </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse  {{ Request::segment(1) == 'news' ? 'in' : '' }}">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td  class="{{ Request::is('news') ? 'alert-info  ' : '' }}">
                                    <span class="fa fa-bars" aria-hidden="true"></span><a href="{{route('news.index')}}" class="text-info"> Articles List  <span class="badge">{{ $countArticle }}</span></a>
                                </td>
                            </tr>
                             <tr>
                             <td class="{{ Request::is('news/create')  ? 'alert-info' : '' }}">
                                 <span class=" fa fa-rss-square" aria-hidden="true" ></span><a href="{{ route('news.create') }}" class="text-info"> Create </a>
                             </td>
                         </tr>
                        </table>
                    </div>
            </div>
         </div>
         
        <div class="panel panel-default ">
             <div class="panel-heading">
                    <h4>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThird"><span class="fa fa-th-list" aria-hidden="true" >
                        </span> Test Types </a>
                    </h4>
                </div>
                <div id="collapseThird" class="panel-collapse collapse  {{ Request::segment(1) == 'test_type' ? 'in' : '' }}">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td  class="{{ Request::is('test_type') ? 'alert-info  ' : '' }}">
                                    <span class="fa fa-bars" aria-hidden="true"></span><a href="{{route('test_type.index')}}" class="text-info"> Test Type List </a>
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>
         </div>
         
     </div>
 </div>

@endif