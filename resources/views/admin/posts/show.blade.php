@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                <h1>{{ucfirst(Auth::user()['name'])}} Post</h1>
            </h1>
        </div>
        <div class="col-6 mx-auto">
            <div class="card">
                <img src="{{ $post->image_url }}" class="card-img-top" alt="{{ $post->title }} image by {{ $post->author }}">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $post->title }}
                    </h5>
                    <p class="card-text">
                        {{ $post->content }}
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        {{ $post->created_at }}
                    </li>
                    <li class="list-group-item">
                        {{ $post->updated_at }}
                    </li>
                    <li class="list-group-item">
                        {{ $post->id }}
                    </li>
                </ul>
                <div class="card-body">
                    @if ($post->id !== 0)
                        <a href="{{ route('admin.posts.show', $post->id -1) }}" class="card-link">Card link</a>
                    @endif
                    {{-- qua serve il count di pos::all()?? --}}
                    <a href="{{ route('admin.posts.show', $post->id +1) }}" class="card-link">Another link</a>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection