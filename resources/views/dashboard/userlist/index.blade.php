@extends('dashboard.layouts.main')

@section('container')

<title>Author Management</title>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2 text-dark">Author Management</h1>
</div>
{{-- @if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  
  {{ session('success') }}
</div>
@endif --}}
<div class="col-lg-5">
  <form action="/dashboard/manajemen-user">
    <div class="input-group mb-3">
      <input type="text" value="{{ request('search') }}" class="form-control" placeholder="Search.." name="search">
      <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-sm"></i></button>
    </div>
  </form>
</div>

@if($data->count())
<div class="table-responsive">
    <table class="table table-borderless table-hover table-sm">
      <thead>
        <tr>
          <th scope="col" class="text-dark">#</th>
          <th scope="col" class="text-dark">Image</th>       
          <th scope="col" class="text-dark">Name</th>  
          <th scope="col" class="text-dark">Username</th>  
          <th scope="col" class="text-dark">Email</th>  
          <th scope="col" class="text-dark">Created_at</th>
          <th scope="col" class="text-dark">Last Seen</th> 
          <th scope="col" class="text-dark">Status</th> 
          <th scope="col" class="text-dark">Is_admin</th>  
          <th scope="col" class="text-dark">Hak Akses</th>  
          <th scope="col" class="text-dark">Action</th>          
        </tr>
      </thead>
      <tbody>
          @foreach($data as $user)

          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <img class="rounded" src="/uploads/avatars/{{ $user->avatar }}" style="" width="40%" />
              
            </td>
           
            <td class="text-dark">{{ $user->name }}</td>
            <td class="text-dark">{{ $user->username }}</td>
            <td class="text-dark">{{ $user->email }}</td>
            <td class="text-dark">{{ $user->created_at }}</td>
            <td> {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
            <td>
              @if(Cache::has('user-is-online-' . $user->id))
              
                        <span class="badge badge-pill text-white" style="background: rgb(74, 211, 74)">Online</span>
                        @else
                        <span class="badge badge-pill text-white" style="background: rgb(168, 175, 168)">Offline</span>  
                        @endif
            </td>
            <td>
                    {{ $user->is_admin }}
   
            </td>
            <td>
              <form action="/dashboard/manajemen-user/{{ $user->id }}" method="post" class="d-inline">
                @method('put')
                @csrf
                <input class="form-check-input" type="checkbox" value="1" name="is_admin">
              <button class="badge badge-primary border-0" onclick="return confirm('Ubah Akses User ini?')"> Simpan</button>
              </form>
            </td>
            <td>         
                <form action="/dashboard/manajemen-user/{{ $user->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf

                  <button class="badge bg-danger border-0 text-white" onclick="return confirm('Yakin ingin menghapus User ini?')">Hapus</button>
                </form>              
            </td>          
          </tr>
          @endforeach
      </tbody>
    </table>
    @else

  <p class=" fs-5">No User Found.. <img src="https://img.icons8.com/ios/50/000000/sad.png"/></p>
@endif

    <div class="d-flex justify-content-center">
      
      {{ $data->links() }}

    </div>
  </div>
  {{-- Auto close --}}
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 1500);
</script>


@endsection
