@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div >
            <h2><img src="/images/{{ $mahasiswa->img }}" alt="{{ $mahasiswa->category->jurusan }}" style="width: 100px" class="img-thumbnail rounded-circle">  {{ $mahasiswa->nama }}</h2>
     
            <a href="/dashboard/mahasiswa" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali Ke Data Mahasiswa</a>
            <a href="/dashboard/mahasiswa/{{ $mahasiswa->nim }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/mahasiswa/{{ $mahasiswa->nim }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Yakin menghapus data {{ $mahasiswa->nama }} ?')"><span data-feather="trash-2"></span> Delete</button>
              </form>
            
            
            
            <article class="my-3 fs-5" style="text-align: justify">
            {{-- @dd($mahasiswa) --}}
            <ul>
                <li>NIM     = {{ $mahasiswa->nim }}</li>
                <li>Nama    = {{ $mahasiswa->nama }}</li>
                <li>Kelas   = {{ $mahasiswa->kelas}}</li>
                <li>Status  = {{ $mahasiswa->status }}</li>
                <li>Jurusan = {{ $mahasiswa->category->jurusan }}</li>
            </ul>
            </article>

        </div>
    </div>
</div>
@endsection