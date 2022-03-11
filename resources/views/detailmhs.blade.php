
{{-- <?php echo dirname(__file__) ?> --}}
@extends('layouts.main')    

@section('container')
    
<div class="container-fluid py-4">
  
  <article>
    <h3>Detail Mahasiswa</h3>
    <img src="../img/{{ $dataMhs['img'] }}" style="width: 200px" class="img-thumbnail rounded-circle" alt="{{ $dataMhs['nama'] }}">
    <h4>Nama : {{ $dataMhs["nama"] }}</h4>
    <h4>Nim : {{ $dataMhs["nim"] }}</h4>
    <h4>Kelas : {{ $dataMhs["kelas"] }}</h4>
    <h4><a href="../categories/{{ $dataMhs->category->slug }}">Jurusan : {{ $dataMhs->category->jurusan }}</h4>
    <h5><a href="/admin/{{ $dataMhs->user->username }}">Inputed By : {{ $dataMhs->user->name }}</a></h5>

    </article>
    
  </div>
  @endsection



