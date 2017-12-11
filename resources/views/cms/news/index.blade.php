@extends('cms.layout')

@section('title' , '| News')

@section('cms-content')

    <div class="col-sm-10 col-md-10">
                <div class="well">
                        <div class="row">
                                 <div class="col-md-9">
                                            <h1>News  <small  class="badge">{{$news->count()}}  Article</small></h1>
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
                                                           @foreach ($news as $article)
                                                                    <tr>
                                                                                <th> {{ $article->id }} </th>
                                                                                <th> {{substr( strip_tags($article->title) , 0 , 25) }}  {{ strlen(strip_tags($article->title)) > 25 ? "..." : ""}}</th>
                                                                                <th> {{ substr(strip_tags($article->author), 0 , 30) }} {{ strlen(strip_tags($article->author)) > 30 ? "..." : "" }}</th>
                                                                                <th> {{ substr(strip_tags($article->description), 0 , 30) }} {{ strlen(strip_tags($article->description)) > 30 ? "..." : "" }}</th>

                                                                                <th> 
                                                                                        {!! Html::linkRoute('news.show' , 'View' , array($article->id) , 
                                                                                       array('class' =>'btn btn-default ')) !!}

                                                                                      {!! Html::linkRoute('news.edit' , 'Edit' , array($article->id) , 
                                                                                       array('class' =>'btn btn-default')) !!}
                                                                                </th>
                                                                    </tr>
                                                            @endforeach
                                                    </tbody>
                                        </table>
                                        <div class="text-center">
                                                {{ $news->links() }}   
                                       </div>
                                  </div>
                        </div>
                </div>
    </div>

@endsection