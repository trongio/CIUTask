@extends('layouts.main')

@section('posts')

    @if(count($posts))
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$post['title']}}</h5>
                    <p class="card-text">{{$post['body']}}</p>
                    <a href="/post/{{$post['id']}}" class="btn btn-primary">Go to post</a>
                </div>
            </div>
        @endforeach
    @else
        <h3>No posts</h3>
    @endif
@endsection
