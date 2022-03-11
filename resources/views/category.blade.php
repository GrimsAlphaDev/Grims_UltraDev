@if (count($mahasiswas) < 1 )
 @php
     echo "<script>
        alert('Belum ada data untuk jurusan $category->jurusan');
        document.location.href='/categories';
        </script"
 @endphp
@endif
{{-- @dd($mahasiswas) --}}
{{-- <?php echo dirname(__file__) ?> --}}
@extends('layouts.main')

@section('container')
<h1>Jurusan : {{ $category->jurusan }}</h1>   
<article class="mb-5">
  <br>
    @foreach ($mahasiswas as $mahasiswa)
        <ul>
            <li>
                <h3><a href="/mahasiswa/{{ $mahasiswa->nim }}">{{ $mahasiswa->nama }}</a></h3>
                {{ $mahasiswa->nim }} <br>
                {{ $mahasiswa->kelas }}
            </li>
        </ul>
    @endforeach
    

@endsection

