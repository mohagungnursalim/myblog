
@extends('layouts.main')

@section('container')
 <head>
     @section('meta')
    <meta title="TheDevcode | Blog">
    <meta name="description" content="TheDevcode Platform Belajar Programming,sharing,diskusi dan banyak lagi..">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @endsection
  </head>

<style>
    .card {
border-radius: 25px;
  
}
</style>

    <h3 class="mb-3 mt-3 text-center">{{ $title }} </h3>
</div>

@if ($posts->count(0))

<div class="container">
  <div class="row">

    
    @foreach ($posts as $post)
    
    <div class="col-md-4 mb-3 d-flex align-self-stretch ">
      <div class="card ">

      <a href="/blog/{{ $post->slug }}">
          {{-- jika user post image tampilkan --}}
          @if ($post->image)
            <div style="overflow:hidden;  border-radius:24px;">
              <img src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded  mx-auto d-block">
              </div>
          @endif       
        </a>
        
        <div class="card-body p-3">
          <h5 class="card-title"><a href="/blog/{{ $post->slug }}" class="text-black text-decoration-none">   {{ $post->title }}   </a> </h5>
          <p>
            <small class="text-muted">
           <img class="rounded-circle" alt="{{ $post->author->name }}" src="/uploads/avatars/{{ $post->author->avatar }}" width="30px" height="30px">  <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none text-danger">{{ $post->author->username }}

            {{-- badge admin and non admin --}}
            {{-- @if($post->author->is_admin == 1)
            <img alt="verified badge" src="https://img.icons8.com/color/18/000000/verified-badge.png"/>
            @else
             <img src="https://img.icons8.com/fluency/18/000000/verified-account.png"/>
            @endif
            --}}
           
            
            
            <a class="text-dark" href="/blog?author={{ $post->author->username }}"> &nbsp;
              <small class="text-muted"><i class="far fa-calendar fa-sm"></i> {{ Carbon\Carbon::parse($post->published_at)->format('d M,Y') }} &nbsp; <i class="far fa-eye fa-sm"></i> {{ number_format( $post->total_views ) }} x
              </small>
             
            </small>
          </p>
          
            @foreach ( ($post->getCategories($post->category_id)) as $category )
            <a class="badge badge-pill text-decoration-none" style="background-color:{{ $category->color }}" href="/blog?category={{ $category->slug }}">{{ $category->name }} </a>
            @endforeach
          
          <!--<a href="/blog/{{ $post->slug }}" class="text-decoration-none text-dark" > -->
           {{-- <i class="bi bi-bookmark" style="float: right"></i> --}}
          <!--</a>-->
         
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
{{-- ------ --}}

@else

  <p class="text-center fs-4">Tidak ada hasil. <img src="https://img.icons8.com/ios/50/000000/sad.png"/></p>
@endif
<div class="d-flex justify-content-center">

  {{ $posts->links() }}
</div>
<div>

</div>
@endsection

