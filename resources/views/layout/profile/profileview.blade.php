<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px 20px;
            text-align: center;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .user-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .bio {
            font-size: 16px;
            margin-bottom: 20px;
        }

        
    </style>
</head>
<body>
@include('komponen.navbarprofile')
<div class="container profile-container" style="margin-top: 100px">
    <img src="aset/profile.png" alt="Profile Image" class="profile-image">
    <div class="user-name">{{ Auth::user()->name }}</div>
    <div class="bio">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae quasi architecto quis in temporibus. Vero?</div>
    <!-- Tambahan informasi lainnya seperti email, tanggal lahir, dll bisa ditambahkan di sini -->
</div>

<div class="container pt-5 pb-5">
    <h2>Data Berita</h2>
    
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Berita</th>
                <th>Gambar</th>
                <th>Pembuat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datapost as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->title}}</td>
                <td>
                    <img src="{{ asset('img/' . $a->image) }}" alt="Gambar Berita" class="rounded" style="width: 150px">
                </td>
                <td>{{$a->author}}</td>
                <td class="text-center">
                    <a href="{{ route('edit-data', $a->id)}}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('delete-data', $a->id) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('singlepage', ['id' => $a->id]) }}" class="btn btn-success">Lihat Post</a>
    
    
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center" >
        {{ $datapost->links() }}
    </div>
   
    </div>
    </div>
    
    <div class="modal fade" id="exampleModalBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"> Input Berita </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('input-data') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
    
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
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label class="font-weight-bold">KONTEN</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Blog">{{ old('content') }}</textarea>
                    
                        <!-- error message untuk content -->
                        @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
          </div>
        </div>
      </div>
      </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
