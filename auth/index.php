<!doctype html>
<html lang="en">

<!-- Mirrored from nimoy.ceosdesigns.sk/template/v04/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Apr 2021 07:18:47 GMT -->

<head>
  <!-- // Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Required meta tags // -->

  <meta name="description" content="Login and Register Form HTML Template - developed by 'ceosdesigns' - sold exclusively on 'themeforest.net'">
  <meta name="author" content="ceosdesigns.sk">

  <title>Nimoy · Login and Register Form HTML Template</title>

  <!-- // Favicon -->
  <link href="../assets/images/favicon.png" rel="icon">
  <!-- Favicon // -->

  <!-- // Google Web Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;display=swap" rel="stylesheet">
  <!-- Google Web Fonts // -->

  <!-- // Font Awesome 5 Free -->
  <link href="../assets/css/font-awesome.css" crossorigin="anonymous" rel="stylesheet">
  <!-- Font Awesome 5 Free // -->

  <!-- // Template CSS files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/styles.css" rel="stylesheet">
  <!-- Template CSS files  // -->
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
        <form>
          <div class="nm-hr nm-up-rl-3">
            <h2>Login</h2>
            <ul class="social-buttons">
              <li class="nm-hvr">
                <a href="http://google.com/">
                  <i class="fab fa-google"></i>
                </a>
              </li>
              <li class="nm-hvr">
                <a href="https://twitter.com/">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="nm-hvr">
                <a href="https://www.facebook.com/">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
            </ul>
          </div>

          <div class="input-group nm-gp">
            <span class="nm-gp-pp"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" id="inputUsername" tabindex="1" placeholder="Username" required>
          </div>

          <div class="input-group nm-gp">
            <span class="nm-gp-pp"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" id="inputPassword" tabindex="2" placeholder="Password" required>
          </div>

          <div class="input-group nm-gp">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label nm-check" for="rememberMe">Keep me logged in</label>
            </div>
          </div>

          <div class="row nm-aic nm-mb-1">
            <div class="col-sm-6 nm-mb-1 nm-mb-sm-0">
              <button type="submit" class="btn btn-primary nm-hvr nm-btn-2">Log In</button>
            </div>

            <div class="col-sm-6 nm-sm-tr">
              <a class="nm-fs-1 nm-fw-bd" href="recover.html">Forgot Password?</a>
            </div>
          </div>

          <footer style="text-align: center; margin-top: 2rem; font-size: 0.75rem; color: #97a4af; font-weight: 400;">Don't have an account? <a class="nm-fs-1 nm-fw-bd" style="font-size: 0.75rem;" href="signup.html">Signup</a></footer>
        </form>
      </div>
    </div>
  </main>

  <!-- // Vendor JS files -->
  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <!-- Vendor JS files // -->

  <!-- Template JS files // -->
  <script src="../assets/js/script.js"></script>
  <!-- Template JS files // -->

  <!-- ======================================================= -->
  <!-- // Setting to allow preview of different color variants -->
  <!-- ======================================================= -->
  <div id="settings" style="position: fixed; top: 20%; right: 0%; width: 40px; height: 40px; background-color: #000; color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer;">
    <i class="fas fa-cog"></i>
    <div id="colors" style="position: absolute; top: 40px; left: 40px; width: 40px; height: 240px; background-color: #000;">
      <a id="blue" href="#" style="display: block; width: 40px; height: 40px; background-color: #007bff;"></a>
      <a id="beige" href="#" style="display: block; width: 40px; height: 40px; background-color: #eab8a9;"></a>
      <a id="burgundy" href="#" style="display: block; width: 40px; height: 40px; background-color: #af102e;"></a>
      <a id="fuchsia" href="#" style="display: block; width: 40px; height: 40px; background-color: #600da8;"></a>
      <a id="turquoise" href="#" style="display: block; width: 40px; height: 40px; background-color: #50c8cc;"></a>
      <a href="https://nimoy.ceosdesigns.sk/index.html" style="display: block; width: 40px; height: 40px; background-color: #000; color: #fff; display: flex; align-items: center; justify-content: center;"><i class="fas fa-home"></i></a>
    </div>
  </div>

  <script>
    let tmpLocation = window.location.href;
    let tmpEndLocation = tmpLocation.split("https://nimoy.ceosdesigns.sk/");
    let targetLocation = tmpEndLocation[tmpEndLocation.length - 1];
    targetLocation = targetLocation.replace(".html", "").replace("#", "");
    let targetLocationArray = [];

    if (targetLocation.includes("_")) {
      targetLocationArray = targetLocation.split("_");
      targetLocationArray[1] = "_" + targetLocationArray[1];
    } else {
      targetLocationArray[0] = targetLocation;
      targetLocationArray[1] = "";
    }

    let l = document.links;
    for (let i = 0; i < l.length; i++) {
      let tmp = l[i].attributes.href.nodeValue;
      l[i].attributes.href.nodeValue = tmp.replace("recover", "recover" + targetLocationArray[1]).replace("login", "login" + targetLocationArray[1]).replace("signup", "signup" + targetLocationArray[1]);
    }

    document.getElementById("blue").setAttribute('href', "./" + targetLocationArray[0] + ".html");
    document.getElementById("beige").setAttribute('href', "./" + targetLocationArray[0] + "_1.html");
    document.getElementById("burgundy").setAttribute('href', "./" + targetLocationArray[0] + "_2.html");
    document.getElementById("fuchsia").setAttribute('href', "./" + targetLocationArray[0] + "_3.html");
    document.getElementById("turquoise").setAttribute('href', "./" + targetLocationArray[0] + "_4.html");

    document.getElementById("colors").style.transition = 'all 0.2s';
    document.getElementById("settings").addEventListener("click", () => {
      let leftPosition = document.getElementById("colors").style.left;

      if (leftPosition == '40px') {
        document.getElementById("colors").style.left = '0px';
      } else {
        document.getElementById("colors").style.left = '40px';
      }
    });
  </script>
  <!-- ======================================================= -->
  <!-- Setting to allow preview of different color variants // -->
  <!-- ======================================================= -->
</body>

</html>