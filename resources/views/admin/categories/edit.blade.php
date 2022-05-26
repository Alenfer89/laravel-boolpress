@extends('layouts.app')


@section('content')
<div class="container">
    {{-- @dd($categories) --}}
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                <h1>Hello {{ucfirst(Auth::user()['name'])}}</h1>
            </h1>
        </div>
        <div class="col-12">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input class="form-control" type="text" id="name" name='name' value="{{ old('name') ? old('name') : $category->name }}">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input class="form-control w-25" type="color" id="color" name='color' value="{{ old('color') ? old('color') : $category->color }}">
                </div>
                <button class="btn btn-success" type="submit">Add this Category</button>
            </form>
        </div>
        
    </div>
</div>
@endsection