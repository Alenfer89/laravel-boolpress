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

        <div class="col-12">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">User</th>
                        <th scope="col">User id</th>
                        <th scope="col">Post</th>
                        <th scope="col">Post id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td class="text-uppercase">
                                <a href="{{ route('admin.categories.show', $comment) }}">
                                    {{ $comment->id }}
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill w-100 text-dark">
                                    {{ $comment->user->name }}
                                </span>
                            </td>
                            <td>
                                {{ $comment->user_id }}
                            </td>
                            <td>
                                {{ $comment->post->title }}
                            </td>
                            <td class="d-flex">
                                {{ $comment->post_id }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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