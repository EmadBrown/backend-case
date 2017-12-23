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
                                    {!! Form::model($article , ['route' => [ 'news.update' , $article->id ] , 'data-parsley-validate' => '' , 'method' => 'PUT' , 'files' => true ]) !!}
                                           <div class="form-group">
                                                {{ Form::label('title' , 'Title:')  }}
                                                {{ Form::text('title' ,  null , array('class' => 'form-control' , 'required' =>'' , 'type' => 'string' , 'data-parsley-maxlength' => '70')) }}
                                        </div>
                                        <div class="form-group">
                                                {{ Form::label('author' , ' Author:') }}
                                                {{ Form::text('author' ,  null , array('class' => 'form-control' , 'required' =>'' , 'type' => 'string' , 'data-parsley-minlength' => '3' ,  'data-parsley-maxlength' =>'60')) }} 
                                        </div>
                                        <div class="form-group">
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                {{ Form::label('image_url' , 'Upload Feature Image:') }}
                                                                {{ Form::file('image_url') }}
                                                         </div>
                                                    @if(!Empty($article->image_url))
                                                        <div class="col-md-6">
                                                            <img src="{{ asset('images/news') }}/{{$article->image_url }}" width="80" height="60" >
                                                        </div>
                                                    @endif
                                                </div>
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


