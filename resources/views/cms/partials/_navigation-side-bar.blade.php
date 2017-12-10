@if (Auth::guard('admin')->check())

<div class="col-sm-2 col-md-2 font-style-bold">
     <div class="panel-group " id="accordion">
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
                             <td class="{{ Request::segment(1) == 'grade' ? 'alert-info' : '' }}">
                                 <span class=" fa fa-rss-square" aria-hidden="true" ></span><a href="{{ route('grade.index') }}" class="text-info">  Grades List </a>
                             </td>
                         </tr>
                         <tr>
                             <td class="{{ Request::segment(1) == 'grade' ? 'alert-info' : '' }}">
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
                                <td  class="{{Request::segment(1) == 'news' ? 'alert-info  ' : '' }}">
                                    <span class="fa fa-bars" aria-hidden="true"></span><a href="{{route('news.index')}}" class="text-info"> News List  <span class="badge">42</span></a>
                                </td>
                            </tr>
                             <tr>
                             <td class="{{ Request::segment(1) == 'news' ? 'alert-info' : '' }}">
                                 <span class=" fa fa-rss-square" aria-hidden="true" ></span><a href="{{ route('news.create') }}" class="text-info"> Create </a>
                             </td>
                         </tr>
                        </table>
                    </div>
            </div>
         </div>
     </div>
 </div>

@endif