@extends('layouts.main')

@section('post')
    @if($post)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post['title']}}</h5>
                <p class="card-text">{{$post['body']}}</p>
                <a href="/post/{{$post['id']}}" class="btn btn-primary">Go to post</a>
            </div>
        </div>
    @else
        <h3>posts</h3>
    @endif
@endsection
