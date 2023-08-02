@extends('dashboard.layouts.main')

@section('container')
<title>{{ $title }}</title>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2 text-dark">My Posts</h1>
</div>



<a href="/dashboard/posts/create" class="btn btn mb-3" style="background-color: rgb(143, 97, 218); color:white;"><i class="fas fa-pencil fa-sm"></i> Mulai menulis</a>

@if (request('search'))
<br>
 Anda mencari <kbd style="background-color: rgba(134, 160, 134, 0.808)"> "{{ request('search') }}"</kbd>

@endif




@if($posts->count())
<div class="table-responsive">
    <table class="table table-borderless table-hover">
      <thead>
        <tr>
          <th scope="col" class="text-dark">#</th>
          <th scope="col" class="text-dark">Thumbnail</th>
          <th scope="col" class="text-dark">Judul</th>
          <th scope="col" class="text-dark">Dilihat</th>
          <th scope="col" class="text-dark">Created</th>
          <th scope="col" class="text-dark">Published</th>
          <th scope="col" class="text-dark">Status</th>
          <th scope="col" class="text-dark">Kategori</th>
          <th scope="col" class="text-dark">Aksi</th>          
        </tr>
      </thead>
      <tbody>
          @foreach($posts as $post)

          <tr>
            <td class="text-dark">{{ $loop->iteration }}</td>
            <td class="text-dark"> 
                <div class="img-container">
                  {{-- @if ($post->image)  --}}
                <img src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->title }}" width="50px">
                {{-- @else
                <img src="https://source.unsplash.com/640x200?{{ $post->category->name }}" width="50%"> --}}
                {{-- @endif    --}}
                 </div>
             
           </td>
            <td class="text-dark">{{ $post->title }}</td>
            <td class="text-dark"><small><i class="far fa-eye fa-sm"></i> {{ number_format( $post->total_views ) }} x</small></td>
            <td class="text-dark">
             
              <small class="text-muted"><i class="far fa-clock fa-sm"></i> {{ $post->created_at->diffForHumans() }} 
              </small>
              
            </td>
            <td class="text-dark">
              @if (isset($post->is_published))
              <small class="text-muted"><i class="far fa-calendar fa-sm"></i> {{ Carbon\Carbon::parse($post->published_at)->format('d M,Y') }}
              </small>
              @else
                {{-- <small>No publishing</small> --}}

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                  <i class="fa fa-upload" aria-hidden="true"></i> Publish
                </button>
              @endif
              
            </td>
            <td class="text-dark"> 
              @if (isset($post->is_published))
                <span class="badge badge-pill bg-success text-white">Published</span>
              
              @else
              <span class="badge badge-pill bg-secondary text-white">Draft</span>
              @endif
            </td>
            <td class="text-dark">
              @foreach ( ($post->getCategories($post->category_id)) as $category )
                <span class="badge badge-pill text-white" style="background-color: {{ $category->color }}">{{ $category->name }}</span>
              @endforeach
          </td>
            {{-- <td>{{ dd(array_map('intval', explode(',', $post->category_id)))  }}</td> --}}
            <td>                   
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning text-white">Edit</a>
                
                
                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                  @method('delete')
                  @csrf
                  
                  <button class="badge bg-danger border-0 text-white" onclick="return confirm('Yakin ingin menghapus Post ini?')">Delete</button>
                </form>              
            </td>          
          </tr>
          @endforeach
      </tbody>
    </table>
    @else

  <p class=" fs-5">No Post Found.. <img src="https://img.icons8.com/ios/50/000000/sad.png"/></p>
@endif

    <div class="d-flex justify-content-center">
      
      {{ $posts->links() }}

    </div>
  </div>
  




  {{-- Modal --}}
 


<!-- Modal Update -->
@foreach ($posts as $post )

<div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Published <span class="bg-warning text-white">{{ $post->title }}</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('updatepublished',$post->id) }}}}" method="post">
          @csrf
          @method('put')
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Set Publish</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="is_published">
              <option selected>----------Pilih----------</option>
              <option value="1">Publish</option>
              
            </select>
          </div>
          
        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Terbit</span>
            </div>
            <input type="date" class="form-control" aria-label="Sizing example input" name="published_at" aria-describedby="inputGroup-sizing-default">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn" style="background-color: rgb(143, 97, 218); color:white;">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

  
@endforeach

@endsection
