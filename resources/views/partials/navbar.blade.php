 <!-- ======= Header ======= -->
 <head>
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>

<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
 </head>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-between">

   
   <H2><a href="/" style="color: #414141"> MY BLOG</a> </H2>
  
    <nav id="navbar" class="navbar">
      <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <span class="fas fa-search"></span>
      </button>
      <ul>
        
        {{-- <li><a class="nav-link {{ Request::is('projek') ? 'active' : '' }}" href="/p">Proyek</a></li> --}}
        <li><a class="nav-link {{ Request::is('blog*') ? 'active' : '' }} " href="/blog">Blog</a></li>
        <li><a class="nav-link {{ Request::is('portfolio') ? 'active' : '' }}" href="/portfolio">Portfolio</a></li>
        <li><a class="nav-link {{ Request::is('topik') ? 'active' : '' }} " href="/topik">Topik</a></li>
        <li><a class="nav-link {{ Request::is('contact') ? 'active' : '' }} " href="">Screencast</a></li>
        <li><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Kontak</a></li>
        <li><a class="nav-link {{ Request::is('about') ? 'active' : '' }} " href="/about">Tentang Saya</a></li>
        
   
      
      
        @auth
        {{-- Jika user login maka tampilkan dropdown ini --}}
        <li class="dropdown"><a href="#"><span class="text-danger"><img src="/uploads/avatars/{{ auth()->user()->avatar }}" class="rounded-circle" width="24px" alt=""> {{ auth()->user()->username }}</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/dashboard">Dashboard</a></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <small><button type="submit" class="btn "><i class="fas fa-logout fa-sm"></i> LogOut</button></small>
              </form>
            </li>
           
          </ul>
        </li>
        @else

        @endauth
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->
<br><br><br>

{{-- Modal --}}
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <form action="/blog" class="flex-nowrap col ml-auto footer-subscribe p-0">
          <input type="text" value="{{ request('search') }}" class="form-control border-top-0 border-bottom-0 border-left-0 border-right-0" placeholder="Masukan keyword.." name="search"> <center><button type="submit" class="btn btn-primary btn-sm">  <img src="https://img.icons8.com/material-outlined/24/ffffff/search--v1.png"/>Search</button> </center>
       </form>
      </div>
      
    </div>
  </div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <form action="/blog" class="flex-nowrap col ml-auto footer-subscribe p-0">
          
          <input type="text" value="{{ request('search') }}" class="form-control border-top-0 border-bottom-0 border-left-0 border-right-0" placeholder="Masukan keyword.." name="search"> <center><button type="submit" class="btn btn btn-sm text-white" style="background-color:#27c777">  <img src="https://img.icons8.com/material-outlined/24/ffffff/search--v1.png"/>Search</button> </center>
       </form>
      </div>
     
    </div>
  </div>
</div>
















