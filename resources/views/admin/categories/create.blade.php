@extends('layouts.app')


@section('content')
<div class="container">
    {{-- @dd($categories) --}}
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
                    <input class="form-control" type="text" id="title" name='title' placeholder="Insert your post title here" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input class="form-control" type="text" id="image_url" name='image_url' placeholder="Copy and paste your image url, if any" value="{{ old('image_url') }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Post Text</label>
                    <textarea class="form-control" id="content" name='content' rows="3">{{ old('content') ? old('content') : '' }}</textarea>
                </div>
                <div class="mb-3">
                    @foreach ($categories as $key => $category)
                        <input type='checkbox' value="{{ $category->id }}" name='category[]'
                        {{ isset(old("category")[$key]) == $category->id ? 'checked' : ''}}>
                        {{-- {{ array_key_exists($category->id , old("category[]")) ?? 'checked' }}> --}}
                        
                        <label for="title" class="form-label badge rounded-pill me-3" style='background-color: {{ $category->color }}'>
                            {{ $category->name }}
                        </label>
                    @endforeach
                    @dump(old('category'))
                    @dump(old("category[0]"))
                    @dump(old("category[$key]"))
                </div>
                <button class="btn btn-success" type="submit">Add your Post</button>
            </form>
        </div>
        
    </div>
</div>
@endsection