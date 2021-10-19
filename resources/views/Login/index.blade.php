@extends('Layouts.main')

@section('title', 'Login')
@section('container')


<h3 class="text-center">Login</h3>

@if (session()->has('loginError'))
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

<div class="row justify-content-center">
    <div class="col-md-4">
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
              @error('username')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
              @error('password')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

@endsection
