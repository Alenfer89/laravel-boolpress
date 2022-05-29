@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1>
                CIAO {{ucfirst(Auth::user()['name'])}}
            </h1>
            {{-- <div>
                <a href="{{ route('admin.categories.create') }}">
                    <button class="btn btn-sm btn-primary">
                        New Category
                    </button>
                </a>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @elseif(session('remove-message'))
                <div class="alert alert-danger d-flex justify-content-between">
                    </span>
                        {{ session('remove-message') }}
                    <span>
                </div>
            @endif --}}
        </div>
    </div>
    <div class="row">
        
            
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $user->name }}
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $user->email }}
                        </h6>
                        <div>
                            <span>
                                {{-- @dd($user->userInfo , $user->userInfo->first_name) --}}
                                {{ $user->userInfo->first_name . ' ' . $user->userInfo->last_name }}
                            </span>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="card-link">Go Back</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img src="{{ $user->userInfo->profile_pic }}" class="w-100" alt="Profile pic of {{ $user->userInfo->first_name }}">
            </div>
            
    </div>
    
</div>
@endsection
