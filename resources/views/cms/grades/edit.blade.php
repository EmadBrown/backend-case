@extends('cms.layout')

@section('title' , '| Edit')

@section('cms-stylesheet')

    
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({
            selector:'textarea',
            plugins: 'link image imagetools',
            menubar: false
             });
    </script>
    
        {!! Html::style('css/parsley.css') !!}
    
@endsection 

@section('cms-content')

          <div class="col-sm-10 col-md-10">
                      <div class="well">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h1> Edit  Article </h1>
                                    <hr>
                                    {!! Form::model($grade , ['route' => [ 'grade.update' , $grade->id ] , 'data-parsley-validate' => '' , 'method' => 'PUT']) !!}
                                           <div class="form-group">
                                                {{ Form::label('name' , 'Name:')  }}
                                                {{ Form::text('name' ,  null , array('class' => 'form-control' , 'required' =>'' , 'type' => 'string' , 'data-parsley-maxlength' => '70')) }}
                                        </div>
                                       <div class="form-group">
                                                {{ Form::label('category_id' , ' Current Category: ') }}
                                                   <select class="form-control single-select"  name="category_id">
                                                            @foreach($categories as $category)
                                                                    @if ($category->id == $post->category_id)
                                                                    <option value="{{$category->id}}" selected=""> {{$category->name}}</option>
                                                                    @else
                                                                     <option value="{{$category->id}}"> {{$category->name}}</option>
                                                                    @endif
                                                            @endforeach
                                                   </select>
                                        </div>
                                        <div class="form-group">
                                                {{ Form::label('mark' , ' Mark:') }}
                                                {{ Form::text('mark' ,  null , array('class' => 'form-control' , 'required' =>'' , 'type' => 'string' , 'data-parsley-minlength' => '3' ,  'data-parsley-maxlength' =>'60')) }} 
                                        </div>
                                        <div class="form-group">
                                                {{ Form::label('description' , 'Description:') }}
                                                {{ Form::textarea('description' ,  null , array('class' => 'form-control ' , 'required' =>'' ,'data-parsley-minlength' => '10' )) }}
                                        </div>
                                    
                                          {{ Form::submit('Save' , array('class' => 'btn btn-success btn-lm font-style-bold ')) }}
                                          <a href="{{ url('/news/') }}" class="btn btn-primary btn-lm font-style-bold " role="button">Cancel</a>

                                   {!! Form::close() !!}
                                </div>

                            </div>
                      </div>
            </div>

@endsection

@section('cms-script')

    {!! Html::script('js/parsley.min.js') !!}
    
@endsection 


