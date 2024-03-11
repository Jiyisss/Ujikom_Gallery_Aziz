<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    @include('komponen.navbar')
    <div class="container">
    <div class="card rounded-5 shadow" style="margin-top: 100px">
        <div class="container p-3">
    <form action="{{route('input-data')}}" method="POST" enctype="multipart/form-data">
        @csrf


            <div class="form-group">
                <label class="font-weight-bold">GAMBAR</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
            
                <!-- error message untuk title -->
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">JUDUL</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Blog">
            
                <!-- error message untuk title -->
                @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Pembuat</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" placeholder="Masukkan Judul Blog">
            
                <!-- error message untuk title -->
                @error('author')
                    <div class="alert alert-danger mt-2 mb-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
  
            <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>