@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1>
                Ciao {{ucfirst(Auth::user()['name'])}}
                {{-- {{ $post->user->userInfo->first_name }} --}}
            </h1>
            <div>
                <a href="{{ route('admin.categories.index') }}">
                    <button class="btn btn-sm btn-primary">
                        back
                    </button>
                </a>
            </div>
        </div>
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body" style='background-color: {{ $category->color }}'>
                    <h5 class="card-title">
                        {{ $category->name }}
                    </h5>
                    <p class="card-text">
                        {{ $category->color }}
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        {{ $category->created_at }}
                    </li>
                    <li class="list-group-item" style='background-color: {{ $category->color }}'>
                        {{ $category->updated_at }}
                    </li>
                    <li class="list-group-item">
                        {{ $category->id }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection