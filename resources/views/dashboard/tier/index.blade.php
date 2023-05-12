@extends('dashboard.layouts.main')

@section('container')
<head>
  <title>Author Tier</title>
</head>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2 text-dark">Author Tier</h1>
  
</div>
<p class="text-muted">Author dengan postingan yang telah mencapai 40 akan mendapatkan Reward.</p>
<p>
   <kbd>Bronze</kbd> <img src="{{ asset('img/tier/bronze.png') }}" width="30px" alt="tier">  Posts = 1-10 &nbsp; &nbsp; <kbd>Silver</kbd> <img src="{{ asset('img/tier/silver.png') }}" width="30px" alt="tier">  Posts = 10-20 &nbsp; &nbsp; <kbd>Gold</kbd> <img src="{{ asset('img/tier/gold.png') }}" width="30px" alt="tier"> Posts = 20-30 &nbsp; &nbsp; <kbd>Grand Master+Reward</kbd> <img src="{{ asset('img/tier/gm.png') }}" width="30px" alt="tier"> Posts = 30-40
  <br>
</p>

@if($users->count())
<div class="table-responsive">
    <table class="table table-borderless table-hover table-sm">
      <thead>
        <tr>
          <th scope="col" class="text-dark"></th>
          <th scope="col" class="text-dark">Profile</th>  
          <th scope="col" class="text-dark">Username</th>  
          <th scope="col" class="text-dark">Tier</th> 
          <th scope="col" class="text-dark">Total Posts</th> 
          <th scope="col" class="text-dark">Status</th>         
        </tr>
      </thead>
      <tbody>
          @foreach($users as $user)

          <tr>
            <td></td>
            <td>    
                <img src="/uploads/avatars/{{ $user->avatar }}" width="40px" class="rounded">
            </td>
            <td class="text-dark">{{ $user->username }}</td>
            <td>
              

              @if ($user->post()->count() < 1)
              <a style="color: #696767">Belum ada Tier</a>
              @elseif ($user->post()->count() < 10)
              <img src="{{ asset('img/tier/bronze.png') }}" width="60px" alt="tier"> <a style="color: #CD7F32">Bronze</a> 
              @elseif ($user->post()->count() < 20)
              <img src="{{ asset('img/tier/silver.png') }}" width="60px" alt="tier"> <a style="color:#adacac">Silver</a>
              @elseif ($user->post()->count() < 30)
              <img src="{{ asset('img/tier/gold.png') }}" width="60px" alt="tier"> <a style="color:#FFD700">Gold</a>
              @elseif($user->post()->count() < 40)
              <img src="{{ asset('img/tier/gm.png') }}" width="60px" alt="tier"> <a style="color:#144FAD">Grand Master</a>
              @endif
            </td>      
            <td>
              {{$user->post()->count()}}
            </td>      
            <td>
              @if(Cache::has('user-is-online-' . $user->id))      
                        <span class="badge badge-pill text-white" style="background: rgb(74, 211, 74)">Online</span>
                        @else
                        <span class="badge badge-pill text-white" style="background: rgb(168, 175, 168)">Offline</span>  
                        @endif
            </td>
           
          </tr>
          @endforeach
      </tbody>
    </table>
    @else

  <p class=" fs-5">No User Found.. <img src="https://img.icons8.com/ios/50/000000/sad.png"/></p>
@endif

    <div class="d-flex justify-content-center">
      
      {{-- {{ $users->links() }} --}}

    </div>
  </div>
 
@endsection
