@extends('cms.layout')

@section('title' , '| Grades')

@section('cms-content')

<div class="col-sm-10 col-md-10">
            <div class="well">
                    <div class="row">
                             <div class="col-md-9">
                                        <h1>Grades  <small  class="badge">{{ $grades->count() }} </small></h1>
                             </div>
                              <div class="col-md-3">

                             </div>
                    </div>
                    <div class="row">
                             <div class="col-md-12">
                                    <table class="table">
                                                <thead>
                                                            <th> #</th>
                                                             <th>Name</th>
                                                             <th>Mark</th>
                                                             <th>Test Type</th>
                                                             <th>sufficient</th>
                                                </thead>
                                                <tbody>
                                                       @foreach ($grades as $grade)
                                                                <tr>
                                                                            <th> {{ $grade->id }} </th>
                                                                            <th> {{strip_tags($grade->name) }} </th>
                                                                            <th> {{ strip_tags($grade->mark) }}</th>
                                                                            <th> {{ strip_tags($grade->testType->test_type) }}</th>
                                                                            <th> {{ strip_tags($grade->sufficient) }}</th>

                                                                            <th> 
                                                                                <div class="row"> 
                                                                                            <div class="col-sm-3">
                                                                                                {!! Html::linkRoute('grade.edit' , 'Edit' , array($grade->id) , 
                                                                                                 array('class' =>'btn btn-primary')) !!}
                                                                                            </div>
                                                                                            <div class="col-sm-3">
                                                                                              {!! Form::open(['route' =>['grade.destroy' , $grade->id ] , 'data-parsley-validate' => '' , 'method' => 'Delete']) !!}
                                                                                                      {{ Form::submit('Delete' , array('class' => 'btn btn-danger ')) }}
                                                                                              {!! Form::close() !!}
                                                                                            </div>
                                                                                </div>
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