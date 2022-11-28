@extends('dashboard.layout.mainDashboard')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-lg-8">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @error('title')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            @error('body')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            @error('img')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            <a href="/dashboard/posts" class="btn btn-primary mb-3 d-block">Back</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="mb-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> 
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger d-inline" type="submit" onclick="return confirm('Are You Sure to Delete?')">
                    <i class="fa-solid fa-delete-left"></i>
                </button>
            </form>

            {{-- content --}}
            <img src="{{ asset('storage/' . $post->img) }}" width="1200" height="400" class="img-fluid">
            <h2 class="mb-3 mt-3 card-title text-center"> {{ $post->title }} </h2>
            <article class="my-3">
               {{ $post->body }} 
            </article>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label class="form-label">Title</label>
                    <input type="text" class="form-control mb-2" value="{{ $post->title }}" name="title">

                    <label class="form-label">Body</label>
                    <textarea class="form-control mb-3" name="body" style="height: 100px">{{ $post->body }}</textarea>

                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Image</label> <br>
                        <img src="{{ asset('storage/' . $post->img) }}" alt="" width="50">
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="img">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
        </div>
    </div>

@endsection