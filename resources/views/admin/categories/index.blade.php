@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1>
                CIAO {{ucfirst(Auth::user()['name'])}}
            </h1>
            <div>
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
                    {{-- <form action="{{ route('admin.posts.store') }}" method='POST'>
                        @csrf
                        @method('POST')
                        <input type="text" value='{{$deletedPost}}' name='post' class='d-none'>
                        <button class="btn btn-danger btn-sm" type='submit'>
                            Annulla
                        </button>
                    </form> --}}
                </div>
            @endif
        </div>

        <div class="col-12">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="text-uppercase">
                                <a href="{{ route('admin.categories.show', [$category , count($categories)]) }}">
                                    {{ $category->name }}
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill w-100" style="background-color: {{ $category->color }}">
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td>
                                {{ $category->created_at }}
                            </td>
                            <td>
                                {{ $category->updated_at }}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="me-3">
                                    <button class="btn btn-sm btn-warning"> Edit </button>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" class="are-you-sure" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type='submit' class="btn btn-sm btn-danger"> Delete </button>
                                    
                                </form>
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