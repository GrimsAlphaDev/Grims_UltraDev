
@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Tambah Data Mahasiswa</h1>
</div>

<form method="POST" action="/dashboard/mahasiswa" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input type="text" name="nim" class="form-control" value="{{ $data }}" id="nim" required readonly >
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control 
      @error('nama')
      is-invalid
      @enderror " id="nama" value="{{ old('nama') }}" autofocus required>
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror  
    </div>
    <div class="mb-3">
      <label for="kelas" class="form-label">Kelas</label>
      <select class="form-select @error('kelas')
      is-invalid
      @enderror" name="kelas" required>
      @switch(OLD('kelas'))
          @case(10)
          <option disabled selected>~ Pilih Kelas ~</option>
          <option value="10" selected>10</option>
          <option value="11">11</option>
          <option value="12">12</option> 
              @break
          @case(11)
          <option disabled selected>~ Pilih Kelas ~</option>
          <option value="10">10</option>
          <option value="11"selected>11</option>
          <option value="12">12</option> 
              @break
          @case(12)
          <option disabled selected>~ Pilih Kelas ~</option>
          <option value="10" >10</option>
          <option value="11">11</option>
          <option value="12" selected>12</option> 
              @break
          @default
          <option disabled selected>~ Pilih Kelas ~</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option> 
      @endswitch
      </select>
      @error('kelas')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror 
    </div>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select @error('status')
      is-invalid
      @enderror" name="status" required>
        <option disabled selected>~ Pilih Status ~</option>
        <option value="Online" @if (old('status') == 'Online') selected @endif>Online</option>
        <option value="Offline" @if (old('status') == 'Offline') selected @endif>Offline</option>
      </select>
      @error('status')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror 
    </div>
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <select class="form-select @error('category_id')
        is-invalid
        @enderror" name="category_id" required>
          <option disabled selected>~ Pilih Jurusan ~</option>
            @foreach ($jurusan as $jr)
            @if (old('category_id') == $jr->id)
            <option value="{{ $jr->id }}" selected>{{ $jr->jurusan }}</option>    
            @else
            <option value="{{ $jr->id }}">{{ $jr->jurusan }}</option>
            @endif
            @endforeach
        </select>
      @error('category_id')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
      @enderror 
      </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input 
            type="file"
            id="image"
            class="form-control @error('gambar')
            is-invalid
            @enderror"
            onchange="previewImage()"
            name= "gambar" required>
      @error('gambar')
        <p class="text-danger">{{ $message }}</p>
      @enderror 
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  

@endsection