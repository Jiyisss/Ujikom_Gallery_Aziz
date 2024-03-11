<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Page</title>
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
       

        .card{
            margin-top: 20px;
            
        }
                .card {
            overflow: hidden; /* Agar efek zoom tidak menimbulkan scroll */
        }

     
    </style>
</head>
<body>
    @include('komponen.navbar')
    <div class="container mt-5">
        <div class="card mb-3 rounded-5 shadow" style="margin-top: 100px">
            <div class="row g-0">
            
              <div class="col-md-4">
                
                @if($datapost)
                <img src="{{ asset('img/' . $datapost->image) }}" class="img-fluid" style="object-fit: cover;" alt="...">
            @else
                <p>Data tidak ditemukan.</p>
            @endif
            

            
              </div>
          
              <div class="col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="/" class="fs-4 text-dark"><img src="aset/profile.png" height="50px" width="50px" style="margin-right: 15px;">{{$datapost->author}}</a>
                        </div>
                    </div>
                    <h5 class="card-title">{{$datapost->title}}</h5>
                    {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                    <p class="card-text"><small class="text-body-secondary">{{$datapost->created_at}}</small></p>
                    <div class="row like-button">
                        <div class="col-auto">
                        @if ($liked)
                            <a href="{{route('unlike', ['postId' => $datapost->id])}}" class="fa-solid fa-heart fs-2 text-danger" style="text-decoration: none"></a>
                           @else
                           <a href="{{route('like', ['postId' => $datapost->id])}}" class="fa-solid fa-heart fs-2 text-dark" style="text-decoration: none"></a>
                           @endif 
                           <a>{{$likecount}}</a>

                            
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-share fs-2 text-dark" onclick="copyUrlToClipboard()"></i>
                            <a>share</a>
                        </div>
                    </div>
                    <!-- Kolom komentar -->
                    <form action="{{route('komen', ['postId' => $datapost->id])}}" method="post">
                    <div class="row mt-3">
                       
                            @csrf
                        <div class="col">
                            <input type="text" name="comment" class="form-control" placeholder="Tulis komentar...">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-dark rounded-3">Kirim</button>
                        
                        </div>
                    
                    </div>
                </form>
                    <div class="container">
                        <div class="row">
                            @foreach ($komen as $k)
                            @foreach ($user as $u)
                            @if ($k->user_id == $u->id)
                            <div class="col-auto">
                                <a href="/" class="fs-5 text-dark"><img src="aset/profile.png" height="45px" width="45px" style="margin-right: 15px;">{{$u->name}}</a>
                            </div>
                            <div class="col">
                                <h3>{{$k->comment}}</h3>
                            </div>
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                
              
</div>
            </div>
        </div>
    </div>
    {{-- <h1 class="text-center mt-5">Lainnya Untuk Dijelajah</h1>
    <div class="container" style="margin-top: 50px">
        <div class="row row-cols-1 row-cols-lg-4 row-cols-md-4 row-cols-sm-2 g-12" data-masonry='{"percentPosition": true }'>
          
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/download (2).jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/download.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/kitty and rei ayanami.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
            <div class="col-6">    
            <div class="card rounded-4">
                    <img src="aset/download (1).jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/download (2).jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/download.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/kitty and rei ayanami.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
            <div class="col-6">    
            <div class="card rounded-4">
                    <img src="aset/download (1).jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/download (2).jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/download.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/kitty and rei ayanami.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
            <div class="col-6">    
            <div class="card rounded-4">
                    <img src="aset/download (1).jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/download (2).jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/download.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div>
                <div class="col-6">
                <div class="card rounded-4">
                    <img src="aset/kitty and rei ayanami.jpg" class="card-img-top img-fluid" alt="...">
                </div>
                </div> 
                
               
              
            </div>
        </div>
         --}}


    <!-- Bootstrap JS -->
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" async></script>
    <script>
        function copyUrlToClipboard() {
            // Menyalin URL ke clipboard
            var url = window.location.href;
            navigator.clipboard.writeText(url)
                .then(function() {
                    alert("URL telah disalin ke clipboard!");
                })
                .catch(function(error) {
                    console.error("Gagal menyalin URL ke clipboard: ", error);
                    alert("Gagal menyalin URL ke clipboard.");
                });
        }
    </script>
</body>
</html>
