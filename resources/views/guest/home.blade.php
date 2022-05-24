@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h1>
                GUEST (NOT LOGGED) HOMEPAGE
            </h1>
        </div>
        <div class="col-6 mx-auto">
            <a href="{{ url('/') }}"> back</a>
        </div>
    </div>
</div>
@endsection
