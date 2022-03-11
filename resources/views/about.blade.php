@extends('layouts.main')

@section('container')
    <h3>About Me</h3> <br>
    <h4>Name : {{ $name }}</h4>
    <h4>Class : {{ $class }}</h4>
    <h4>Email : {{ $email }}</h4>
    <img src="img/{{ $img }}" alt="{{ $name }}" style="width: 150px">
@endsection