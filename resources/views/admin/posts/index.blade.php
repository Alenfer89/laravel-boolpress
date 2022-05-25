@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1>
                {{ucfirst(Auth::user()['name'])}} Posts
            </h1>
            <div>
                {{-- <a href="{{ route('admin.posts.create') }}">
                    <button class="btn btn-sm btn-primary">
                        New Post
                    </button>
                </a> --}}
                <a href="#" id='test'>
                    <button class="btn btn-sm btn-primary">
                        New Post
                    </button>
                </a>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @elseif(session('remove-message'))
                <div class="alert alert-danger">
                    {{ session('remove-message') }}
                </div>
            @endif
        </div>
        <div class="col-12">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <a href="{{ route('admin.posts.show', [$post , count($posts)]) }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td>
                                
                                @foreach ($post->categories as $singleCategory)
                                <span class="badge rounded-pill" style="background-color: {{ $singleCategory->color }}">
                                    {{ $singleCategory->name }}
                                </span>
                                @endforeach
                                {{-- <span class="badge" style="background-color: {{ $post->categories[0]->color }}">
                                    {{ $post->categories[0]->name }}
                                </span>
                                -
                                <span class="badge" style="background-color: {{ $post->categories[1]->color }}">
                                    {{ $post->categories[1]->name }}
                                </span> --}}
                            </td>
                            <td>
                                {{ $post->user->userInfo->first_name }} - {{ $post->user->userInfo->last_name }}
                            </td>
                            <td>
                                {{ $post->created_at }}
                            </td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post) }}">
                                    <button class="btn btn-sm btn-warning"> Edit </button>
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" class="are-you-sure" method="POST">
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
                let confimation = window.confirm('Are you sure you want to remove this post?');
                if(confimation){
                    this.submit();
                }
            })
        });

        const test = document.getElementById('test');
        test.addEventListener('click', function(){
            promt('hello');
        });
    </script>
@endsection