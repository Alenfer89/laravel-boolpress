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
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
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
                                {{ $post->author_name }}
                            </td>
                            <td>
                                {{ $post->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection