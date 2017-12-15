@extends('cms.layout')

@section('title' , '| Test Type')

@section('cms-stylesheet')

    {!! Html::style('css/select2.min.css') !!}

    {!! Html::style('css/parsley.css') !!}

@endsection 

@section('cms-content')

            <div class="col-sm-10 col-md-10">
                        <div class="well">
                            <div class="row">
                                     <div class="col-md-9">
                                         <h1>Test Type  <small  class="badge">{{ $testTypes->count() }} Test Type</small></h1>
                                     </div>
                                <div class="row">
                                     <div class="col-md-8">
                                                <table class="table">
                                                        <thead>
                                                                    <th>#</th>
                                                                     <th>Name</th>
                                                        </thead>
                                                        <tbody>
                                                                 @foreach ($testTypes as $testType)
                                                                <tr>
                                                                            <th> {{ $testType->id }} </th>
                                                                            <th> 
                                                                                    <div id="name{{$testType->id}}">
                                                                                         {{substr( $testType->test_type , 0 , 60) }}  {{ strlen($testType->test_type) > 60 ? "..." : ""}}
                                                                                    </div>
                                                                                  <!--Form of edit name of Test Type.  hidden and show by  id div.row using $testType->id to target the form in jquery -->
                                                                                     <div class="row hidden" id="edit{{ $testType->id }}"> 
                                                                                            <div class="col-xs-12">
                                                                                                    {!! Form::model($testType , ['route' => [ 'test_type.store'] , 'data-parsley-validate' => '' , 'method' => 'PUT']) !!}
                                                                                                        <div class="row">
                                                                                                                   <div class="col-xs-8">
                                                                                                                     {{ Form::hidden('id', null, [ 'class' => 'form-control' ] )}}
                                                                                                                     {{ Form::text('test_type' ,   null , array('class' => 'form-control' , 'required' =>'' , 'data-parsley-maxlength' => '255')) }}
                                                                                                                   </div>

                                                                                                                     <div class="col-xs-2">
                                                                                                                             {{ Form::submit('Save' , array('class' => 'btn btn-success')) }}
                                                                                                                     </div>

                                                                                                                      <div class="col-xs-2">
                                                                                                                             <a href="#" cancel-button ="{{$testType->id}}"  class="btn btn-primary cancel">Cancel</a>
                                                                                                                      </div>
                                                                                                           </div>
                                                                                                    {!! Form::close() !!}
                                                                                            </div>
                                                                                    </div>
                                                                            </th>
                                                                            <th> 
                                                                                  <div class="row"> 
                                                                                    <!--Edit button hidden and show by Test Tye id in value of edit-button in a tag to target the button  in jquery-->
                                                                                            <div class="col-sm-3">
                                                                                                     <a href="#" edit-button="{{$testType->id}}" class="btn btn-primary edit">Edit</a>
                                                                                            </div>
                                                                                            <div class="col-sm-3">
                                                                                                    {!! Form::open(['route' => ['test_type.destroy' , $testType->id ] , 'data-parsley-validate' => '' , 'method' => 'get']) !!}
                                                                                                            {{ Form::submit('Delete' , array('class' => 'btn btn-danger')) }}
                                                                                                    {!! Form::close() !!}
                                                                                            </div>
                                                                                    </div>
                                                                            </th>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                </table>

                                                <div class="text-center">
                                                             {{ $testTypes->links() }}   
                                               </div>
                                      </div>
                                    <!-- end div col-md-8 -->

                                        <div class="col-sm-3">
                                                <div class="well">
                                                        {!! Form::open(['route' => ['test_type.store' ], 'data-parsley-validate' => '' , 'method' => 'POST']) !!}
                                                            <h2> Add New Test Type</h2>
                                                                {{ Form::label('test_type', 'Test Type:') }}
                                                                {{ Form::text('test_type', null, [ 'class' => 'form-control' ] )}}
                                                                <hr>
                                                                {{ Form::submit('Add New Test Type ' , array('class' => 'btn btn-primary  btn-block')) }}
                                                        {!! Form::close() !!}
                                                </div>
                                        </div>
                            </div>
                    </div>
                         </div>
            </div>

@endsection

@section('cms-script')

        {!! Html::script('js/parsley.min.js') !!}

        {!! Html::script('js/select2.min.js') !!}
        
         {!! Html::script('js/custom.js') !!}

@endsection