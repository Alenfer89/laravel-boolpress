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
                some content
            </h1>
            <h1>
                some content
            </h1>
            <h1>
                some content
            </h1>
        </section>
        <div class="col-6 mx-auto d-flex justify-content-between">
            <a href="{{ url('/') }}">
                <button class="btn btn-primary" >
                    back
                </button> 
            </a>
        </div>
    </div>
</div>
@endsection
