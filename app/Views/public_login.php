<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body class="bg-dark">

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-5 col-lg-4 mx-auto mt-5">
        <div class="card-login shadow">
          <h4 class="text-center">LOGIN</h4>
          <form action="">
            <div class="input-group">
              <label>Username</label>
              <input type="text">
            </div>
            <div class="input-group">
              <label>Password</label>
              <input type="password">
              <small><a href="">Lupa Password?</a></small>
            </div>

            <button class="btn btn-primary d-block mx-auto">LOGIN</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?= session()->get("message"); ?>
</body>

</html>