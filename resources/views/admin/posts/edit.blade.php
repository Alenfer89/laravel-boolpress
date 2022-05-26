@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                Ciao {{ucfirst(Auth::user()['name'])}}
            </h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        <div class="col-12">
            <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            
            @csrf
            
            @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input class="form-control" type="text" id="title" name='title' value="{{ old('title') ?? $post->title }}">
                    @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image URL</label>
                    <input class="form-control" type="text" id="image_url" name='image_url' value="{{ old('image_url') ?? $post->image_url }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Post Text</label>
                    <textarea class="form-control" id="content" name='content' rows="3">{{ old('content') ?? $post->content }}
                    </textarea>
                    @error('content')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <label for="category" class="form-label me-5 align-self-start">Category:</label>
                    @foreach ($categories as $category)
                        <input name="category[]" id="category" type='checkbox' value="{{ $category->id }}" 
                        @if($post->categories->contains($category)) checked @endif>
                        {{-- @checked(old('category', $category->id))> --}}
                        <span class="badge rounded-pill ms-1 me-3" style='font-size: .5rem; background-color: {{ $category->color }}'>
                            {{ ucfirst($category->name) }}
                        </span>
                    @endforeach
                </div>
                @error('category')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <button class="btn btn-success" type="submit">Edit your Post</button>
            </form>
        </div>
        
    </div>
</div>
@endsection