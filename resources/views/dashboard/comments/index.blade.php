@extends('dashboard.layouts.main')

@section('container')
<title>Incoming Comments</title>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Incoming Comments</h1>
</div>

<div class="col-lg-5">
  <form action="/dashboard/userlist">
    <div class="input-group mb-3">
      <input type="text" value="{{ request('search') }}" class="form-control" placeholder="Search.." name="search">
      <button class="btn btn-primary" type="submit"> <span data-feather="search"></span></button>
    </div>
  </form>
</div>

@if($data->count())
<div class="table-responsive col-lg-10">
    <table class="table table-borderless table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>       
          <th scope="col">Name</th>  
          <th scope="col">Username</th>  
          <th scope="col">Email</th>  
          <th scope="col">Created_at</th>
          <th scope="col">Last Seen</th> 
          <th scope="col">Status</th> 
          <th scope="col">Is_admin</th>    
          <th scope="col">Action</th>          
        </tr>
      </thead>
      <tbody>
          @foreach($data as $user)

          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <img class="rounded" src="/uploads/avatars/{{ $user->avatar }}" style="" width="40%" />
              
            </td>
           
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td> {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
            <td>
              @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success alert-success">Online</span>
                        @else
                            <span class="text-secondary alert-secondary">Offline</span>
                        @endif
            </td>
            <td>
                <button  class="btn bg-info border-0">
                    {{ $user->is_admin }}
                  </button>
               
            </td>
            <td>         
               btn            
            </td>          
          </tr>
          @endforeach
      </tbody>
    </table>
    @else

  <p class=" fs-5">No Comments Found.. <img src="https://img.icons8.com/ios/50/000000/sad.png"/></p>
@endif

    <div class="d-flex justify-content-center">
      
      {{ $data->links() }}

    </div>
  </div>
@endsection
