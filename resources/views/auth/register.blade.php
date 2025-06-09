<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - AdminLTE</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>My</b>App</a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
          @csrf

          <div class="mb-3 input-group">
            <input type="text" name="name" class="form-control" placeholder="Full name" required />
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-user"></span></div>
            </div>
          </div>

          <div class="mb-3 input-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required />
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
          </div>

          <div class="mb-3 input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required />
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
          </div>

          <div class="mb-3 input-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required />
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
          </div>

          <div class="mb-3 input-group">
            <select name="department_id" class="form-control" required>
              <option value="" disabled selected>Select Department</option>
              @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="row">
            <div class="col-8">
              <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- AdminLTE and dependencies scripts -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
