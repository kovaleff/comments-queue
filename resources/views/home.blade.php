@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    @isset($tagTitle)
        <h1>Tag: {{$tagTitle}}</h1>
    @endisset

    <div class="articles d-flex flex-wrap p-4">
        @foreach($articles as $article)
            <div class="card d-flex flex-column align-items-center" >
                <img src="https://source.unsplash.com/random/200x200?sig=1" class="card-img-top" alt="...">
                <div class="card-body d-flex justify-content-between flex-column">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->conent}}</p>
                    <a href="{{route('show-article',['article' => $article])}}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        @endforeach
            <ul class="pagination w-100">
                {{$articles->links()}}
            </ul>
    </div>
@endsection
