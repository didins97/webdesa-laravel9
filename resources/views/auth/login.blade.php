<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bootstrap 5 - Login Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
  <style>
    :root{
    --main-bg:#f4623a;
    }

    .main-bg {
    background: var(--main-bg) !important;
    }

    input:focus, button:focus {
    border: 1px solid var(--main-bg) !important;
    box-shadow: none !important;
    }

    .form-check-input:checked {
    background-color: var(--main-bg) !important;
    border-color: var(--main-bg) !important;
    }

    .card, .btn, input{
    border-radius:0 !important;
    }

  </style>
</head>

<body class="main-bg">
  <!-- Login Form -->
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Login Admin</h2>
          </div>
          <div class="card-body">
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
              <div class="mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"/>
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"/>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn text-light main-bg">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
