@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h1>
                LOGGED HOMEPAGE
            </h1>
        </div>
        <div class="col-6 mx-auto">
            <a href="{{ route('admin.posts.index') }}"> i tuoi post </a>
        </div>
    </div>
</div>
@endsection
