
@extends('layouts.main')

@section('container')
    <h3>Halaman Data Mahasiswa</h3>
  @if (isset($inputer))
      <h4>Inputed by {{ $inputer }}</h4>
  @endif
 
    <div class="card-body px-0 pb-2">

    <form action="/mahasiswa">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('user'))
        <input type="hidden" name="user" value="{{ request('user') }}">
      @endif
    <div class="search"> 
      <i class="fa fa-search"></i> <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari Data"> 
        <button class="btn btn-primary" type="submit" >Search</button> 
    </div>
  </form>

        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nim</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jurusan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inputers</th>
                <th class="text-secondary opacity-7">Action</th>
              </tr>
            </thead>
            @foreach ($dataMhs as $mhs)
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../images/{{ $mhs['img'] }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm"><a href="/mahasiswa/{{ $mhs->nim }}">{{ $mhs->nama }}</a></h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $mhs->nim }}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $mhs->kelas }}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0"><a href="/mahasiswa?category={{ $mhs->category->slug }}">{{ $mhs->category->jurusan }}</a></p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm {{ ($mhs->status === "online") ? 'bg-gradient-success' : 'bg-gradient-danger' }} ">{{ $mhs->status }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold"> <a href="/mahasiswa?user={{ $mhs->user->username }}">{{ $mhs->user->name }}</a></span>
                </td>
                <td class="align-middle">
                  <a href="/edit/{{ $mhs->nim }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit  |   
                  <a href="/hapus/{{ $mhs->nim }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Hapus user">
                    Hapus
                  </a>
                </td>
              </tr>    
           </tbody>
           @endforeach
         </table>
         <br>

         <div class="d-flex justify-content-left"> 
          {{ $dataMhs->links() }}
         </div>

        </div>
@endsection