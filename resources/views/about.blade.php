@extends('layouts.main')

@section('container')
<head>
  @section('meta')
<meta title="TheDevcode | About">
<meta name="description" content="Kami hadir untuk memberikan tutorial berbahasa Indonesia.Kami TheDevcode percaya bahwa semua ilmu Teknologi berhak untuk diketahui oleh semua orang dan bebas untuk digunakan. ">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
@endsection
</head>


@foreach ($datas as $data )
<div class="card text-center mt-5">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <div class="text-center">
      <img src="https://avatars.githubusercontent.com/u/57335597?v=4" class="circle" alt="...">
    </div>
    <h5 class="card-title">{{ $data['owner'] ['login'] }}</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
@endforeach

@endsection