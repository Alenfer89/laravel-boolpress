@extends('layouts.app')


@section('content')
    <div class="container-fluid w-75 mx-auto pt-5">
        <div class="row">
            <div class="col-12 mb-5">
                <h1>
                    guest sends email
                </h1>
                <form action="{{ route('guest.sender') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="guestName" class="form-label">Your Name:</label>
                    <input type="text" class="form-control" id="guestName" placeholder="" name='guestName'>
                </div>
                <div class="mb-3">
                    <label for="guestEmail" class="form-label">The email where you want to be contacted</label>
                    <input type="email" id='guestEmail' name='guestEmail' class="form-control">
                </div>
                <div class="mb-3">
                    <label for="guestMessage" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="guestMessage" name='guestMessage' rows="8"></textarea>
                </div>
                
                <button class="btn btn-success">
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
