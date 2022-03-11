@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Mahasiswa Yang Di Input Oleh : {{ auth()->user()->name }}</h1>
    <hr>
</div>

  @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
  @endif

    <div class="table-responsive">
      <a href="/dashboard/mahasiswa/create" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nim</th>
              <th scope="col">Nama</th>
              <th scope="col">Kelas</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->kelas }}</td>
                <td>{{ $mhs->category->jurusan }}</td>
                <td>
                    <a href="/dashboard/mahasiswa/{{ $mhs->nim }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/mahasiswa/{{ $mhs->nim }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                  <form action="/dashboard/mahasiswa/{{ $mhs->nim }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" type="submit" onclick="return confirm('Apakah Yakin menghapus data {{ $mhs->nama }} ?')"><span data-feather="trash-2"></span></button>
                  </form>
                  
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
</div>

@endsection