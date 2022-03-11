@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/categories/{{ $category->slug }}" class="mb-5" enctype="multipart/form-data">

        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="jurusan" class="form-label">jurusan</label>
          <input type="text" class="form-control @error('jurusan')
              is-invalid
          @enderror " id="jurusan" name="jurusan" value="{{ OLD('jurusan', $category->jurusan) }}" required autofocus>
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
          @enderror " id="slug" name="slug" value="{{ OLD('slug', $category->slug) }}" required>
          @error('slug')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
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
 