@extends('cms.layout')

@section('title' , '| Add News')

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
                                    <h1> Add Article </h1>
                                    <hr>
                                    {!! Form::open(['route' => 'news.store' , 'data-parsley-validate' => '' , 'Method' => 'Post' , 'files' => true]) !!}
                                         <div class="form-group">
                                                {{ Form::label('title' , 'Title:')  }}
                                                {{ Form::text('title' ,  null , array('class' => 'form-control' , 'required' =>'' , 'type' => 'string' , 'data-parsley-maxlength' => '70')) }}
                                        </div>
                                        <div class="form-group">
                                                {{ Form::label('author' , ' Author:') }}
                                                {{ Form::text('author' ,  null , array('class' => 'form-control' , 'required' =>'' , 'type' => 'string' , 'data-parsley-minlength' => '3' ,  'data-parsley-maxlength' =>'60')) }} 
                                        </div>
                                        <div class="form-group">
                                                   {{ Form::label('image_url' , 'Upload Feature Image:') }}
                                                   {{ Form::file('image_url') }}
                                        </div>

                                        <div class="form-group">
                                                {{ Form::label('description' , 'Description:') }}
                                                {{ Form::textarea('description' ,  null , array('class' => 'form-control ' , 'required' =>'' ,'data-parsley-minlength' => '3' )) }}
                                        </div>
                                    
                                          {{ Form::submit('Save' , array('class' => 'btn btn-success btn-lm font-style-bold ')) }}
                                          <a href="{{ url('/admin/') }}" class="btn btn-primary btn-lm font-style-bold " role="button">Cancel</a>

                                   {!! Form::close() !!}
                                </div>

                            </div>
                 </div>
    </div>

@endsection

@section('cms-script')

    {!! Html::script('js/parsley.min.js') !!}

@endsection 


