<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
       body {
    background-image: url('aset/bglogin.gif');
    background-size: 200%;
    background-repeat: no-repeat;
    background-position: center;
}
/* Media query untuk ukuran layar sm atau mobile */
@media (max-width: 767px) {
    body {
        background-size: 700%; /* Ubah menjadi 'contain' untuk mengatur gambar agar selalu terlihat */
    }
}

        .login-container {
            margin-top: 100px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="container p-5">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row justify-content-center login-container">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('sesi.login')}}" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{Session::get('email')}}" autofocus required>
                                <div id="email-error" class="text-danger" style="display: none;">Invalid email format</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                              
                            </div>
                            <div class="text-center mb-3">
                           <a>Don't have account yet? create your account here</a><a href="{{url('register')}}"> register</a>
                        </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <script>
        function validateForm() {
            var emailInput = document.getElementById('email');
            var emailError = document.getElementById('email-error');
            var emailValue = emailInput.value;
            var emailPattern = /^\S+@\S+\.\S+$/;
            if (!emailPattern.test(emailValue)) {
                emailError.style.display = 'block';
                return false;
            } else {
                emailError.style.display = 'none';
                return true;
            }
        }
    </script>
</body>
</html>
