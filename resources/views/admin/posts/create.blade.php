@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                <h1>{{ucfirst(Auth::user()['name'])}} Post</h1>
            </h1>
        </div>
        <div class="col-12">
            <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input class="form-control" type="text" id="title" name='title' placeholder="Insert your post title here">
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input class="form-control" type="text" id="image_url" name='image_url' placeholder="Copy and paste your image url, if any">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Post Text</label>
                    <textarea class="form-control" id="content" name='content' rows="3"></textarea>
                </div>
                {{-- <div class="mb-3">
                    <label for="title" class="form-label">Category</label>
                    <select name="" id=""></select>
                </div> --}}
                <button class="btn btn-success" type="submit">Add your Post</button>
            </form>
        </div>
        
    </div>
</div>
@endsection