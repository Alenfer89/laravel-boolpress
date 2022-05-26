@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                LOGGED HOMEPAGE
            </h1>
        </div>
        <section class="col-12">
            <h1>
                some content
            </h1>
        </section>
        <section class="col-12">
            <h1>
                some content
            </h1>
        </section>
        <div class="col-12">
            <h1>
                <a href="{{ route('admin.posts.index') }}">
                    POSTS
                </a>
            </h1>
        </div>
        <section class="col-12">
            <h1>
                <a href="{{ route('admin.categories.index') }}">
                    CATEGORIES
                </a>
            </h1>
        </section>
    </div>
</div>
@endsection
