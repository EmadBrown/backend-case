@extends('cms.layout')

@section('title' , '| Grades')

@section('cms-content')
<div class="col-sm-10 col-md-10">
            <div class="well">
                    <div class="row">
                             <div class="col-md-9">
                                        <h1>Grades  <small  class="badge">{{$grades->count()}} </small></h1>
                             </div>
                              <div class="col-md-3">

                             </div>
                    </div>
                    <div class="row">
                             <div class="col-md-12">
                                    <table class="table">
                                                <thead>
                                                            <th> #</th>
                                                             <th>Title</th>
                                                             <th>Author</th>
                                                             <th>Description</th>
                                                </thead>
                                                <tbody>
                                                       @foreach ($grades as $grade)
                                                                <tr>
                                                                            <th> {{ $grade->id }} </th>
                                                                            <th> {{substr( strip_tags($grade->title) , 0 , 25) }}  {{ strlen(strip_tags($grade->title)) > 25 ? "..." : ""}}</th>
                                                                            <th> {{ substr(strip_tags($grade->author), 0 , 30) }} {{ strlen(strip_tags($grade->author)) > 30 ? "..." : "" }}</th>
                                                                            <th> {{ substr(strip_tags($grade->description), 0 , 30) }} {{ strlen(strip_tags($grade->description)) > 30 ? "..." : "" }}</th>

                                                                            <th> 
                                                                                    {!! Html::linkRoute('grade.show' , 'View' , array($grade->id) , 
                                                                                   array('class' =>'btn btn-default ')) !!}

                                                                                  {!! Html::linkRoute('grade.edit' , 'Edit' , array($grade->id) , 
                                                                                   array('class' =>'btn btn-default')) !!}
                                                                            </th>
                                                                </tr>
                                                        @endforeach
                                                </tbody>

                                    </table>
                                    <div class="text-center">
                                            {{ $grades->links() }}   
                                   </div>
                              </div>
                    </div>
            </div>
</div>
        </div>
 </div>
@endsection