@extends('layouts.main')

@section('container')

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>   
        </div>
        @endif
       
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>   
        </div>
        @endif
        
<main class="form-signin">
    <form action="/login" method="POST">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>
  
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email')
          is-invalid
        @enderror" id="email" placeholder="name@example.com" value="{{ OLD('email') }}" required autofocus>
        <label for="email">Email address</label>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>
  
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; By GrimsAlphaDev</p>
    </form>

    <small class="d-block text-center mt-3">Belum Daftar ? <a href="{{ URL('/register') }}"> Daftar Sekarang !</a> 
  </main>
@endsection