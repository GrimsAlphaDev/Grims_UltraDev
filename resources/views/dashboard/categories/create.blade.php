@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Jurusan Baru</h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/categories" class="mb-5" >
        @csrf
        <div class="mb-3">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="text" class="form-control @error('jurusan')
              is-invalid
          @enderror " id="jurusan" name="jurusan" value="{{ OLD('jurusan') }}" required autofocus>
          @error('jurusan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug')
          is-invalid
          @enderror " id="slug" name="slug" value="{{ OLD('slug') }}" required>
          @error('slug')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Buat Jurusan</button>
      </form>
</div>

<script>
    const jurusan = document.querySelector('#jurusan');
    const slug = document.querySelector('#slug');

    jurusan.addEventListener('change', function() {
      fetch('/dashboard/categories/checkSlug?jurusan=' + jurusan.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    });


    
</script>
@endsection
 