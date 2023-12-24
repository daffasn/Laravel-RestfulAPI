<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style="background-color: rgb(218, 246, 249);">
    
    <div class="container">
      <div class="row d-flex align-items-center vh-100">
        <div class="col-xl-8 d-none d-xl-block">
          <img src="{{ asset('images/background2.jpg') }}" width="650" loading="lazy">
        </div>
        <div class="col-xl-4 d-md-block">
          <div class="card">
            <div class="card-body">
              <h1 class="text-center mb-5">LOGIN</h1>
              <form method="POST" action="{{ route('login') }}">
                @csrf

                @foreach ($errors->all() as $message)
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
                @endforeach

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input id="exampleInputEmail1" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input id="exampleInputPassword1" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>
                <div class="mb-3 form-check">
                  <p>Belum memiliki akun? Register <a href="{{ route('register') }}">disini</a>.</p>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
              </form>
            </div>
          </div>          
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>