@extends('layouts.app')


@section('content')
    <div class="container-fluid w-75 mx-auto pt-5">
        <div class="row">
            <div class="col-12 mb-5">
                <h1>
                    Thanks for contacting us!
                </h1>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        
            <div class="col-2">
                <a href=" {{ route('guest.home') }} ">
                    <button class="btn btn-primary">
                        Go back to Home
                    </button>
                </a>
            </div>
            
        </div>
    </div>
@endsection

@section('content-scripts')
    <script src="{{ asset('js/front.js') }}" defer></script>
@endsection