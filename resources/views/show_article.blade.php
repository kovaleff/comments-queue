@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="article-detail">
        <div class="card d-flex justify-content-center align-items-center flex-column p-3 ">
            <img src="https://source.unsplash.com/random/800x800?sig=1" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                <p class="card-text">{{$article->content}}</p>
                <a href="{{route('like-article',['article' => $article])}}" class="btn btn-primary">Like!!!</a>
            </div>
            <div class="d-flex  justify-content-between likes p-4">
                <div><img src="/img/eye.svg" alt=""> {{$article->views}}</div>
                <a href="#" id="like-it"><img src="/img/heart.svg" alt=""> Like! <span>{{$article->likes}}</span></a>
            </div>
        </div>
        <h1>Add comment:</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="comment-form">
            <form action="{{route('add-comment', $article->id)}}" method="post" id="comment-form">
                @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subject:</label>
                        <input type="text" class="form-control" id="comment-title" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment-comment" class="form-label">Comment:</label>
                        <textarea class="form-control" id="comment-comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="comment-thanks hidden">
            <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
            </div>
        </div>
        <h1 class="mt-3">Comments:</h1>
        <div class="comment-list">
            @foreach($article->comments as $comment)
                <div class="comment">
                    <h3>{{$comment->title}}</h3>
                    <p>{{$comment->comment}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        $('#like-it').click(function(ev){
            ev.preventDefault();
            $.post( "{{route('inc-like', $article->id)}}", function( data ) {
                $( "#like-it span").text( data );
            });
        })

        $('#comment-form').submit(function(e){
            e.preventDefault();
            $.post( "{{route('add-comment', $article->id)}}", {
                'title' : $('#comment-title').val(),
                'comment' : $('#comment-comment').val(),
            }, function( data ) {
                $("#comment-form").toggle();
                $("#comment-thanks").toggle();
            });
        })
    </script>
@endpush
