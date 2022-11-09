@extends('layout.main')

@section('content')
    
<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-signin">
                
                <form action="/login" method="POST">
                    @csrf
                    <img class="rounded mx-auto d-block" src="https://i.pinimg.com/736x/a0/86/64/a08664662d9d0e416879c34df538c30e.jpg" alt="" width="100">
                    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

                    @if (session()->has('loginError'))
                        <p class="text-danger">{{ session('loginError') }}</p>
                    @endif
            
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name" value="{{ old('name') }}">
                        <label for="floatingInput">Name</label>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
            
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <p class="mt-3 text-muted text-center">&copy; Since 2022</p>
            </main>
        </div>
    </div>
    
</div>

@endsection