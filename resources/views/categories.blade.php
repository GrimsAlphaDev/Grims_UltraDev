{{-- @dd($categories) --}}
@extends('layouts.main')
    
@section('container') 
<h1>Jurusan Mahasiswa</h1>   

{{-- @foreach ($categories as $category)
<ul>
    <li>
        <h2><a href="/categories/{{ $category->slug }}">{{ $category->jurusan }}</a></h2>
    </li>
</ul>
@endforeach --}}

<div class="container">
    <div class="row">
        @foreach ($categories as $category)   
        <div class="col-md-4">
            <a href="/mahasiswa?category={{ $category->slug }}">
            <div class="card bg-dark text-white mt-3">
                <img src="https://source.unsplash.com/500x500?{{ $category->jurusan }}" alt="{{ $category->jurusan }}" class="card-img" alt="{{ $category->name }}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.5)">{{ $category->jurusan }}</h5>
                 
                </div>
              </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

</body>
</html>