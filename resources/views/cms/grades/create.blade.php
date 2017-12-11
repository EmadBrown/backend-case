@extends('cms.layout')

@section('title' , '| Add Grade')

@section('cms-stylesheet')
    
    {!! Html::style('css/select2.min.css') !!}
    
    {!! Html::style('css/parsley.css') !!}
    
@endsection 

@section('cms-content')
    <div class="col-sm-10 col-md-10">
                <div class="well">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h1> Add Article </h1>
                                    <hr>
                                    {!! Form::open(['route' => 'grade.store' , 'data-parsley-validate' => '' , 'Method' => 'Post' ]) !!}
                                         <div class="form-group">
                                                {{ Form::label('name' , 'Name:')  }}
                                                {{ Form::text('name' ,  null , array('class' => 'form-control' , 'required' =>'' , 'type' => 'string' , 'data-parsley-maxlength' => '70')) }}
                                        </div>
                                       <div class="form-group">
                                           <div class="row">
                                               <div class="col-md-6">
                                                    {{ Form::label('user_id' , 'Student Number: ') }}
                                                   <select class="form-control single-select"  name="user_id" data-parsley-required='true'>
                                                        <option value="" selected="" ></option>
                                                            @foreach( $users as $user )
                                                                    <option value="{{$user->id}}"> {{$user->student_number}}</option>
                                                            @endforeach
                                                   </select>
                                               </div>
                                                <div class="col-md-6">
                                                    {{ Form::label('test_type_id' , 'Test Type: ') }}
                                                   <select class="form-control single-select"  name="test_type_id" data-parsley-required='true'>
                                                            <option value="" selected="" ></option>
                                                            @foreach( $testTypes as $testType )
                                                                    <option value="{{$testType->id}}"> {{$testType->test_type}}</option>
                                                            @endforeach
                                                   </select>
                                               </div>
                                           </div>
                                               
                                        </div>
                                        <div class="form-group">
                                                {{ Form::label('mark' , ' Mark:') }}
                                                {{ Form::text('mark' ,  null , array('class' => 'form-control' , 'required' =>'' , 'type' => 'integer' ,  'data-parsley-maxlength' =>'60')) }} 
                                        </div>  
                                        <div class="form-group">
                                                {{ Form::label('sufficient' , 'Sufficient:') }}
                                                {{ Form::radio('sufficient', 'Sufficient', array('class' => 'form-control ' , 'required' =>'' , 'type' => 'boolean' )) }}
                                                {{ Form::label('inadequate' , 'Inadequate:') }}
                                                {{ Form::radio('sufficient', 'Inadequate', array('class' => 'form-control ' , 'required' =>'' , 'type' => 'boolean' )) }}
                                        </div>
                                    
                                          {{ Form::submit('Save' , array('class' => 'btn btn-success btn-lm')) }}
                                          <a href="{{ url('/grade/') }}" class="btn btn-primary btn-lm font-style-bold " role="button">Cancel</a>

                                   {!! Form::close() !!}
                                </div>

                            </div>
                 </div>
    </div>

@endsection

@section('cms-script')

    {!! Html::script('js/parsley.min.js') !!}
    
      {!! Html::script('js/select2.min.js') !!}
      
       <script type="text/javascript">
     
            $(document).ready(function()
            {
                $('.single-select').select2();
            });

    </script>

@endsection 


