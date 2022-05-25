@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1>
                {{ucfirst(Auth::user()['name'])}} Posts
            </h1>
            <div>
                <a href="{{ route('admin.posts.create') }}">
                    <button class="btn btn-sm btn-primary">
                        New Post
                    </button>
                </a>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <a href="{{ route('admin.posts.show', [$post , count($posts)]) }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td>
                                
                                @foreach ($post->categories as $singleCategory)
                                <span class="badge rounded-pill" style="background-color: {{ $singleCategory->color }}">
                                    {{ $singleCategory->name }}
                                </span>
                                @endforeach
                                {{-- <span class="badge" style="background-color: {{ $post->categories[0]->color }}">
                                    {{ $post->categories[0]->name }}
                                </span>
                                -
                                <span class="badge" style="background-color: {{ $post->categories[1]->color }}">
                                    {{ $post->categories[1]->name }}
                                </span> --}}
                            </td>
                            <td>
                                {{ $post->user->userInfo->first_name }} - {{ $post->user->userInfo->last_name }}
                            </td>
                            <td>
                                {{ $post->created_at }}
                            </td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post) }}">
                                    <button class="btn btn-sm btn-warning"> Edit </button>
                                </a>
                                <a href="">
                                    <button class="btn btn-sm btn-danger"> Delete </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection