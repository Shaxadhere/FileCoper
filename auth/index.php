<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Shehzad Ahmed">

  <title>Login - File Coper</title>

  <link href="../assets/images/favicon.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;display=swap" rel="stylesheet">
  <link href="../assets/css/font-awesome.css" crossorigin="anonymous" rel="stylesheet">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/styles.css" rel="stylesheet">

<style>
  .nm-gp-pp{
    padding: 0px 0px 0px 10px;
  }
  .form-control{
    padding: 0px 0px 0px 40px;
  }
</style>

</head>

<body>
  <!-- // Preloader -->
  <div id="nm-preloader" class="nm-aic nm-vh-md-100">
    <div class="nm-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- Preloader // -->

  <main id="page-content" class="d-flex nm-aic nm-vh-md-100" style="position: relative;">
    <div class="overlay"></div>

    <div class="nm-tm-wr">
      <div class="container">
        <form action="auth" method="post">
          <div class="nm-hr nm-up-rl-3">
            <h2>ARTT Lecture Manager</h2>
          </div>

          <div class="input-group nm-gp">
            <span class="nm-gp-pp"><i class="fas fa-user"></i></span>
            <input name="Username" type="text" class="form-control" id="inputUsername" tabindex="1" placeholder="Username" required>
          </div>

          <div class="input-group nm-gp">
            <span class="nm-gp-pp"><i class="fas fa-lock"></i></span>
            <input name="Password" type="password" class="form-control" id="inputPassword" tabindex="2" placeholder="Password" required>
          </div>

          <div class="input-group nm-gp">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label nm-check" for="rememberMe">Keep me logged in</label>
            </div>
          </div>

          <div class="row nm-aic nm-mb-1">
            <div class="col-sm-6 nm-mb-1 nm-mb-sm-0">
              <button name="login" type="submit" class="btn btn-primary nm-hvr nm-btn-2">Log In</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </main>

  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/script.js"></script>

</body>

</html>