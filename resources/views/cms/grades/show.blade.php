@extends('cms.layout')

@section('title' , '| View Grades')

@section('cms-content')

        <div class="col-sm-10 col-md-10">
                    <div class="well">
                            <div class="row">
                                   <div class="col-md-8 ">
                                                <!--get name of view post blog by URL-->
                                             <label> Article Title:   </label>
                                             <h1>{{ $article->title }}</h1>
                                             
                                            <label> Article Author:  </label>
                                                <h2>{{ $article->author }}</h2>
                                                
                                             <label> Article Body:   </label>
                                             <p class="lead"> {!! $article->description !!}</p>
                                             <hr> 
                                          
                                   </div>
                                    <div class="col-md-4">
                                                <div class="well">
                                                        <dl class="dl-horizontal text-center">
                                                            <label> Created At:</label>
                                                            <p>{{ date( 'M j,Y h:ia' ,  strtotime( $article->created_at )) }}</p>
                                                        </dl>

                                                        <dl class="dl-horizontal text-center">
                                                                <label> Last Updated:</label>
                                                                <p>{{ date( 'M j,Y h:ia' , strtotime( $article->updated_at )) }}</p>
                                                        </dl>

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                     {!! Html::linkRoute('news.edit' , 'Edit' , array($article->id) , 
                                                                                   array('class' =>'btn btn-primary btn-block')) !!}
                                                            </div>
                                                            <div class="col-sm-6">
                                                                                   
                                                                        {!! Form::open(['route' =>['news.destroy' , $article->id ] , 'data-parsley-validate' => '' , 'method' => 'Delete']) !!}
                                                                                {{ Form::submit('Delete' , array('class' => 'btn btn-danger btn-block ')) }}
                                                                        {!! Form::close() !!}
                                                            </div>

                                                            <hr>
                                                            
                                                            <div class="row ">
                                                                    <div class="col-sm-12"> 
                                                                        <!--  back button other option in case {{ url('/cms/blogs') }}/{{Request::segment(3)}}  it does works with refresh in this case -->
                                                                        <a id='back-link' href=" {{ url()->previous() }} " class="btn btn-default btn-block font-style-bold Spacing " role="button">Back</a>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                </div>
                                    </div>
                            </div>

                    </div>
        </div>

@endsection