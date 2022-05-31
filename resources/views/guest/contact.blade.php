@extends('layouts.app')


@section('content')
    <div class="container-fluid w-75 mx-auto pt-5">
        <div class="row">
            <div class="col-12 mb-5">
                <h1>
                    guest sends email throu form
                </h1>
                {{-- 
                    @ raccolgo i dati con un form che comunica con funzioni custom all'interno del HomeController (generico dei guest)
                    
                --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('guest.sender') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="guestName" class="form-label">Your Name:</label>
                        <input type="text" class="form-control" id="guestName" placeholder="" name='guestName' value='{{ old('guestName') }}'>
                    </div>
                    <div class="mb-3">
                        <label for="guestEmail" class="form-label">The email where you want to be contacted</label>
                        <input type="email" id='guestEmail' name='guestEmail' class="form-control" value='{{ old('guestEmail') }}'>
                    </div>
                    <div class="mb-3">
                        <label for="guestMessage" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="guestMessage" name='guestMessage' rows="8">{{ old('guestMessage') }}</textarea>
                    </div>
                    
                    <button class="btn btn-success" type="submit">
                        Send your email
                    </button>
                </form>
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
