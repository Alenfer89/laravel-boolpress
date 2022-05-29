@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1>
                CIAO {{ucfirst(Auth::user()['name'])}}
            </h1>
            
        </div>
    </div>
    <div class="row">
        
            @foreach ($users as $user)
            <div class="col-3">
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
                                {{ $user->userInfo->first_name }}
                            </span>
                            <span>
                                {{ $user->userInfo->last_name }}
                            </span>
                            
                        </div>
                        <a href="{{ route('admin.users.show', $user) }}" class="card-link">Show Details</a>
                        <a href="" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    
</div>
@endsection

@section('content-scripts')
    <script defer>
        const cancellations = document.querySelectorAll(".are-you-sure");
        console.log(cancellations);
        cancellations.forEach(cancellation => {
            cancellation.addEventListener( "submit", function(event){
                event.preventDefault();
                let confirmation = window.confirm('Are you sure you want to remove this post?');
                if(confirmation){
                    this.submit();
                }
            })
        });
    </script>
@endsection