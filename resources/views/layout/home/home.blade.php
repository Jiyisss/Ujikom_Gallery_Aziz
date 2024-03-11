<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.wrapper-native {
    display: flex;
    justify-content: center;
    margin-top: 3%;
    margin-bottom: 6%;
}

.container-native {
    width: auto;
    columns: 4;
}

.container-native .box-native {
    width: 200px;
    margin-bottom: 10px;
    break-inside: avoid;
}

.container-native .box-native img{
    max-width: 100%;
    border-radius: 15px;
}

.body-img-native {
    position: relative;
    overflow: hidden;
}

.body-img-native img {
    vertical-align: middle;
    transition: transform 0.3s ease-in-out;
}

        .card{
            margin-top: 20px;
            
        }
                .card {
            /* Agar efek zoom tidak menimbulkan scroll */
        }

        .card img {
             /* Efek transisi ketika gambar di-zoom */
        }

        .box-native:hover img {
            transform: scale(1.1);
            border-radius: 15px; /* Zoom gambar ketika mouse hover */
        }

    </style>
</head>
<body>
@include('komponen.navbar')
<div class="wrapper-native">
    <div class="container-native" style="margin-top: 100px">
        @foreach ($datapost as $p)
      
  
            <div class="box-native" >
                <div class="body-img-native">
                    <a href="{{ route('singlepage', ['id' => $p->id]) }}">
                        <img src="{{ asset('img/' . $p->image) }}">
                    </a>
                </div>
            </div>
   
        @endforeach
      
    </div>
</div>
                    {{-- <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/Rei chiquita.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/download.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/kitty and rei ayanami.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                <div class="col-6">    
                <div class="card rounded-4">
   
    <a href="{{url('singlepage')}}">                 
        <img src="aset/download (1).jpg" class="card-img-top img-fluid" alt="...">
    </a>   
                    </div>
                </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/Rei chiquita.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/download.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/kitty and rei ayanami.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                <div class="col-6">    
                <div class="card rounded-4">
   
    <a href="{{url('singlepage')}}">                 
        <img src="aset/download (1).jpg" class="card-img-top img-fluid" alt="...">
    </a>
                    </div>
                </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/Rei chiquita.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/download.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/kitty and rei ayanami.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                <div class="col-6">    
                <div class="card rounded-4">
   
    <a href="{{url('singlepage')}}">                 
        <img src="aset/download (1).jpg" class="card-img-top img-fluid" alt="...">
    </a>    
                    </div>
                </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/Rei chiquita.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/download.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="card rounded-4">
                         <a href="{{url('singlepage')}}">
                        <img src="aset/kitty and rei ayanami.jpg" class="card-img-top img-fluid" alt="...">
                    </a>
                    </div>
                    </div> --}}
                    
                   
                  
        


    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>

</body>
</html>