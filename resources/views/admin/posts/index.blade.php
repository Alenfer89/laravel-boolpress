@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                <h1>{{ucfirst(Auth::user()['name'])}} Posts</h1>
            </h1>
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
                                <a href="{{ route('admin.posts.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td>
                                categoria
                            </td>
                            <td>
                                {{ $post->author_name }}
                            </td>
                            <td>
                                {{ $post->created_at }}
                            </td>
                            <td>
                                <a href="">
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