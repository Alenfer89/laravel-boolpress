@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <h1>
                GUEST (NOT LOGGED) HOMEPAGE
            </h1>
        </div>
        <section class="col-12">
            <h1>
                some news
            </h1>
            <h1>
                some news
            </h1>
            <h1>
                some news
            </h1>
        </section>
        <div class="col-6 mx-auto d-flex justify-content-between">
            <a href="{{ url('/') }}">
                <button class="btn btn-primary" >
                    back
                </button> 
            </a>
            <div>
                <a class="nav-link" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
