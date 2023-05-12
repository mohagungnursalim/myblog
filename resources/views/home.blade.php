@extends('layouts.main')

@section('container')
<head>
  @section('meta')
  <meta title="Home | TheDevcode">
  <meta name="description" content="TheDevcode Adalah Platform Belajar Programming,sharing,dan diskusi yang dikelola oleh mahasiswa,kami sadar penatnya belajar programming ditambah tutorial yang bahasa inggris membuat orang kadang malas untuk belajar,dari situ kami hadir untuk memberikan tutorial berbahasa Indonesia.">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @endsection
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>

<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
{{-- <script src="https://kit.fontawesome.com/70bddf16d1.js" crossorigin="anonymous"></script> --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<div class="container" >
   <!-- ======= Hero Section ======= -->
   <section id="hero" class="d-flex align-items-center"> 
    {{-- end --}}
    <div class="container position-relative">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1 id="typing">MOH.AGUNG | BLOG </h1>
          <h2 class="animate__animated animate__lightSpeedInRight
          " style="text-shadow: 1px 1px #ffffff; color: #24a364;" id="crow">Menulis apapun yang ingin saya tulis.Entah itu menulis tutorial programming,bahas politik,brainstorming ataupun review produk.</h2>     
        </div>
        
      </div>


      <div class="text-center mb-5">
        <a href="/blog" class="btn-get-started text-dark">Jelajahi <img alt="Rocket TheDevcode" class="animate__animated animate__rotateInDownLeft" src="https://img.icons8.com/external-vectorslab-flat-vectorslab/24/000000/external-rocket-project-management-and-web-marketing-vectorslab-flat-vectorslab.png"/></a>
      </div>
      <br><br><br>


   



    </div>

    <div class="wrapper">
      <div class="box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
   
    
  </section><!-- End Hero -->
  
 
 
</div>

<script>
  $( function() {
    $( "#slider" ).slider();
  } );
  </script>


@endsection