@extends('dashboard.layouts.main')
@section('container')

<head>
    @push('styles')
    <link href="{{ asset('select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/prism.css') }}"> --}}
    @endpush

    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(255, 255, 255, 0.514);
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

    </style>
</head>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-12">

    <form method="post" id="edit" action="/dashboard/posts/{{ $post->slug }}" class="mb-5"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" value="{{ old('title' ,$post->title) }}" autofocus
                class="form-control @error('title') is-invalid @enderror" id="title" name="title">

            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" value="{{ old('slug', $post->slug) }}" class="form-control @error('slug') is-invalid
        @enderror" id="slug" name="slug">
        @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
</div> --}}


<div class="form-group @error('category_id') has-danger @enderror">
    <label for="category">Kategori</label>
    
    <select class="selectpicker form-control " name="category_id[]" id="category_id" multiple data-live-search="true">

        @foreach ( $categories as $category )
        <option value="{{ $category->id }}" {{ old('category_id', $category->id) == $category->id ? 'selected' : '' }}> {{ $category->name }} </option>
        @endforeach
    </select>
    @error('category_id')
    <small class="text-danger">
        {{ $message }}
    </small>
    @enderror
</div>

<div class="form-group @error('tag_id') has-danger @enderror">
    <label for="tag">Tag</label>
  

    <select class="selectpicker form-control " name="tag_id[]" id="tag_id" multiple data-live-search="true">

        {{-- @foreach ( $tags as $tag )
        @if(old('tag_id') == $tag->id)
        <option selected value="{{ $tag->id }}" >{{ $tag->name }}</option>
        @else
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endif --}}
       
        @foreach ( $tags as $tag )
        
        {{-- <option selected value="{{ $tag->id }}" >{{ $tag->name }}</option> --}}
        
        <option value="{{ $tag->id }}" {{ old('tag_id', $tag->id) == $tag->id ? 'selected' : '' }}> {{ $tag->name }} </option>

     
        @endforeach


    </select>
    @error('tag_id')
    <small class="text-danger">
        {{ $message }}
    </small>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Post Image</label>
    <input type="hidden" name="oldImage" value="{{ $post->image }}">
    @if($post->image)
    <img src="{{ asset('storage/' .$post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
    @else
    <img class="img-preview img-fluid mb-3 col-sm-5">
    @endif

    <input onchange="previewImage()" class="form-control  @error('image') is-invalid @enderror" type="file" id="image"
        name="image">
    @error('image')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

{{-- <div class="form-group">
          <label for="published_at" class="form-label text-dark">Tanggal terbit</label>
          <input type="date" value="{{old('published_at', $post->published_at)}} }}" class="form-control
@error('published_at') is-invalid @enderror" id="published_at" name="published_at">
@error('published_at')
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
</div> --}}

{{-- <div class="form-group">

    <label for="published_at" class="form-label text-dark">Tanggal terbit</label>
    <br>
    <small class="text-danger">*saat mengedit postingan harap isi kembali Tanggal terbit</small>
    <input type="date" value="{{ old('published_at') }}"
class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at">
@error('published_at')
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
</div>
<div class="mb-3">
    <label for="is_published" class="form-label">Publish</label>
    <input type="checkbox" value="1" @if (isset($post->is_published)) checked @endif id="is_published"
    name="is_published">

</div> --}}

<div class="form-group">
    <label for="seo" class="form-label text-dark">SEO Deskripsi</label>
    <input type="text" value="{{ old('description', $post->description) }}"
        class="form-control @error('description') is-invalid @enderror" id="description" name="description">
    @error('description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea class="form-control" name="body" id="editor">{{ old('body',$post->body) }}</textarea>

    @error('body')
    <p class="text-danger"> {{ $message }}</p>
    @enderror

</div>
<div class="text-center">
    <button type="submit" class="btn btn" style="background-color: rgb(143, 97, 218); color:white;">Update Post</button>
</div>

<div id="PleaseWait" style="display: none;">
    <div class="preloader">
        <div class="loading">
            <div class="spinner-border text-primary" role="status"></div><span
                class="visually-hidden text-dark">Update..</span>
        </div>
    </div>
</div>
</form>
</div>






@push('styles')
<link href="{{ asset('select/css/bootstrap-select.min.css') }}" rel="stylesheet">

@endpush

@push('script')
<script type="text/javascript" src="{{ asset('select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
{{-- <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script> --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

</script>
<script>
    CKEDITOR.replace('editor', options);

</script>

@endpush

{{-- loading before submit --}}
<script>
    $('#edit').submit(function () {
        var pass = true;
        //some validations
        // $("#overlay").show();
        if (pass == false) {
            return false;
        }
        $("#PleaseWait").show();

        return true;
    });

</script>

{{-- image preview --}}
<script>
    function previewImage() {

        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {

            imgPreview.src = oFREvent.target.result;

        }


    }

</script>

{{-- auto slug with js --}}
{{-- <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change' , function(){
          fetch('/dashboard/posts/checkSlug?title=' +title.value)
          .then(response => response.json())
          .then (data => slug.value = data.slug )
      });
  </script>
<script>
      document.addEventListener('trix-file-accept', function(e)'{
         e.preventDefault();
      })
</script> --}}


@endsection
