@extends('dashboard.layouts.main')

@section('container')
<head>
  <title> {{ $title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

    <div class="container">
        <h2>Panduan Author</h2>
       <small>
        <p class="text-muted">Terima kasih telah bergabung bersama TheDevcode,semoga konten yang kalian share disini dapat bermanfaat bagi banyak orang ❤️,untuk memulai silahkan baca panduan author disini.</p>
      </small> 
        <div class="card">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      <img src="https://img.icons8.com/tiny-color/16/000000/experimental-idea-tiny-color.png"/> {1} Upload Postingan
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <h6 class="font-weight-bold">Title</h6>
                      <p class="">Memasukan title : Masukan Judul sesuai dengan isi konten yang anda post.</p>
                      
                      <h6 class="font-weight-bold">Slug</h6>
                      <p class="">Slug: Slug akan otomatis terisi setelah anda berpindah dari field Title,slug akan muncul pada link postingan.</p>

                      <h6 class="font-weight-bold">Kategori</h6>
                      <p class="">Kategori: Masukan Kategori yang berhubungan dengan postingan anda.</p>

                      <h6 class="font-weight-bold">Tag</h6>
                      <p class="">Tag: Masukan Tag yang related dengan postingan.</p>

                      <h6 class="font-weight-bold">Image</h6>
                      <p class="">Image: Upload Image post dengan minimal size dibawah <code>2 MB</code>.</p>

                      <h6 class="font-weight-bold">Published</h6>
                      <p class="">Published: Adalah tanggal postingan di publikasikan,tanggal yang dimasukan akan memudahkan saat mencari dan mengedit postingan yang perlu di ubah suatu saat.</p>

                      <h6 class="font-weight-bold">SEO Deskripsi</h6>
                      <p class="">SEO Deskripsi: Mengisi SEO Deskripsi akan masuk ke Tag Meta description yang berfungsi untuk mendeskripsikan konten Anda secara singkat. Sehingga, calon pengunjung tahu apa yang anda bahas di dalam konten tersebut.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      <img src="https://img.icons8.com/tiny-color/16/000000/experimental-idea-tiny-color.png"/> {2} Isi Konten
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <div class="text-center">
                        <ol>
                          <li class="font-weight-bold">Font yang nyaman dibaca mata dan sesuai dengan thedevcode.</li>
                          <p>Kalian bisa menggunakan font Verdana dengan size <code>16</code>. </p>
  
                          <li class="font-weight-bold">Embed Code.</li>
                          <p>Pilih tombol icon Insert Code Snippet.</p><img src="{{ asset('img/docs/codehiglighter.png') }}" width="450px">
                          <p>Kemudian Sesuaikan bahasa pemrograman dan masukan script,lalu tekan oke.</p><img src="{{ asset('img/docs/popupcode.png') }}" width="450px">
                          <li class="font-weight-bold">Upload Image.</li>
                          <p>Pilih Image Button. </p> <img src="{{ asset('img/docs/iconupload.png') }}" width="450px"><br>
                          <p>Maka akan muncul pop up kemudian Browse Server.</p> <img src="{{ asset('img/docs/popupimage.png') }}" width="450px"><br>
                          <p>Kemudian Pilih atau upload gambar di file manager jika belum ada gambar tersedia.</p> <br> <img src="{{ asset('img/docs/filemanager.png') }}" width="450px">
  
                          <li class="font-weight-bold">Link Text.</li>
                          <p>Jika ingin membuat atau memasukan link ke Text select text yang ingin di link,kemudian tekan <kbd>Ctrl K</kbd> maka akan muncul pop up,lalu masukan link yang ingin di tuju.</p>
                          <img src="{{ asset('img/docs/linktext.png') }}" width="430px">
  
                          <li class="font-weight-bold">Upload Video Embed Youtube.</li>
                          <p>Embed Video youtube dengan klik icon youtube,akan muncul pop up kemudian isikan embed code url atau video url youtube tersebut.</p>
                          <img src="{{ asset('img/docs/iconyoutube.png') }}" width="430px">

                          <p>Cara mendapatkan embed code url & url link adalah dengan menekan button share/bagikan dibawah video youtube,kemudian pastekan di field embed code atau video url, ukurannya bisa di atur sesuai keinginan dan bisa juga menggunakan ukuran default yang tersedia.Kemudian tekan OK. </p>
                          <img src="{{ asset('img/docs/embed.png') }}" width="430px">
                        </ol>
                       
                      </div>
                        
                    </div>
                  </div>
                </div>


                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      <img src="https://img.icons8.com/tiny-color/16/000000/experimental-idea-tiny-color.png"/> {3} Edit Profile 
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <ol>
                        <li class="font-weight-bold">Edit Profile</li>
                          <p>Klik Icon image kanan atas navbar,kemudian profile.Lalu isikan data: [Name,Username,Email,Trakteer,Instagram,Twitter,Bio.]</p>
                          <ul type="square">
                            <li class="font-weight-bold">Name</li>
                            <p>Masukan nama lengkap anda.</p>

                            <li class="font-weight-bold">Username</li>
                            <p>Masukan username anda.Ini akan ditampilkan di halaman postingan anda dan di kanan atas dalam dashboard author.</p>

                            <li class="font-weight-bold">Email</li>
                            <p>Masukan email yang benar dan valid,email ini akan menjadi tempat verifikasi reset password jika anda lupa password anda.</p>

                            <li class="font-weight-bold">Trakteer  <a style="color: rgb(50, 50, 230)">[tidak wajib]</a></li>
                            <p>Masukan link Trakteer e.g.( <a href="https://trakteer.id/moh-agung-nursalim/tip" style="color: red">https://trakteer.id/moh-agung-nursalim/tip</a> ),jika belum ada maka daftar <a href="https://trakteer.id/" style="color: red ">disini</a>.Trakteer adalah sebuah platform yang membantu konten kreator untuk mendapatkan dukungan finansial sebagai bentuk apresiasi dari para penikmat karyanya.Link trakteer akan di tampilkan di setiap postingan athor.</p>

                            <li class="font-weight-bold">Instagram  <a style="color: rgb(50, 50, 230)">[jika ada]</a></li>
                            <p>Masukan username Instagram,e.g.( mohagungn )</p>

                            <li class="font-weight-bold">Twitter <a style="color: rgb(50, 50, 230)">[jika ada]</a></li>
                            <p>Masukan username Twitter e.g. ( MAgungnursalim )</p>

                            <li class="font-weight-bold">Bio <a style="color: rgb(50, 50, 230)">[tidak wajib]</a></li>
                            <p>Masukan bio anda,ekspresikan diri di bio.</p>
                          </ul>
                         
                          
                      </ol>
                    </div>
                  </div>
                  
                </div>
              </div>
        </div>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
