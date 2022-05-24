@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1>
                {{-- {{ucfirst(Auth::user()['name'])}} Post --}}
                {{ $post->user->userInfo->first_name }} Post
            </h1>
            <div>
                <a href="{{ route('admin.posts.index') }}">
                    <button class="btn btn-sm btn-primary">
                        back
                    </button>
                </a>
            </div>
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
                        <a href="{{ route('admin.posts.show', $post->id -1) }}" class="card-link">Previous Post</a>
                    @endif
                    {{-- qua serve il count di pos::all()?? --}}
                    @if ($post->id + 1 <= $totalPosts)
                        <a href="{{ route('admin.posts.show', $post->id +1) }}" class="card-link">Next Post</a>
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection