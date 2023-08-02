 <!-- Sidebar -->
 <ul class="navbar-nav bg-light sidebar sidebar-light accordion shadow" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
       
        <div class="sidebar-brand-text mx-2">
            <h2>MY Blog</h2>
        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    {{-- <li class="nav-item {{ Request::is('dashboard/docs') ? 'active' : '' }}">
        <a class="nav-link " href="/dashboard/docs">
            <i class="fas fa-fw fa-book"></i>
            <span>Baca Dulu</span></a>
    </li> --}}
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link " href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
        <a class="nav-link " href="/dashboard/posts">
            <i class="fas fa-fw fa-edit"></i>
            <span>Postingan Saya</span></a>
    </li>
  
    
    <li class="nav-item">
        <a class="nav-link " href="/blog">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Preview Posts</span></a>
    </li>

    <li class="nav-item {{ Request::is('dashboard/tags') ? 'active' : '' }}">
        <a class="nav-link " href="/dashboard/tags">
            
            <i class="fa-solid fa-fw fa-hashtag"></i>
           
            <span>Tag</span></a>
    </li>

    {{-- <li class="nav-item {{ Request::is('dashboard/tier-user') ? 'active' : '' }}">
        <a class="nav-link " href="/dashboard/tier-user">
            
            <i class="fa-solid fa-fw fa-trophy"></i>
           
            <span>Tier</span></a>
    </li> --}}
    
  
    @can('admin')

    @if (Auth::user()->username == 'Moh.Agung')
    {{-- <li class="nav-item {{ Request::is('dashboard/manajemen-user') ? 'active' : '' }}">
        <a class="nav-link " href="/dashboard/manajemen-user">
            <i class="fas fa-fw fa-users"></i>
            <span>Manajemen User</span></a>
      </li> --}}
    @else
    @endif

    <li class="nav-item {{ Request::is('dashboard/categories') ? 'active' : '' }}">
        <a class="nav-link " href="/dashboard/categories">
            <i class="fas fa-fw fa-tags"></i>
            <span>Kategori</span></a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
       Admin
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
            aria-expanded="true" aria-controls="collapse">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Kontak</span>
        </a>
        <div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <a class="collapse-item {{ Request::is('dashboard/kirim-email-author') ? 'active' : '' }}" href="/dashboard/kirim-email-author">Kirim Balasan</a> --}}
                <a class="collapse-item {{ Request::is('dashboard/pesan-masuk') ? 'active' : '' }}" href="/dashboard/pesanmasuk">Pesan Masuk</a>
            </div>
           
        </div>
    </li>
 
   
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Subscriber</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('dashboard/subscriber') ? 'active' : '' }}" href="/dashboard/subscriber">Subscriber</a>
                
            </div>
        </div>
    </li>
    @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
 <script src="https://kit.fontawesome.com/048e5448dd.js" crossorigin="anonymous"></script>
<!-- End of Sidebar -->