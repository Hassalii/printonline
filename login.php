<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: index.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login-EasyPrint</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<a class="navbar-brand" href="index.php">
    <img src="img/logo.png" width="90" height="30" alt="">
</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Tentang <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Cara Pemesanan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Jasa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
      </li>
    </ul>
    <a href="login.php" class="btn btn-outline-success mr-2">Login</a>
    <a href="register.php" class="btn btn-outline-warning">Daftar</a>
  </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h3>Masuk Ke EasyPrint</h3>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username atau email" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />

        </form>
            
        </div>

        <div class="col-md-6">
            <!-- isi dengan sesuatu di sini -->
        </div>

    </div>
</div>
<br>
<br>
<br>
<div class="footer">
    <div class="footer-content">
      <div class="footer-section about">
        <img src="img/logo.png" width="200" height="80" alt="">
      </div>
      <div class="footer-section links">
        <h2>Informasi Umum</h2>
        <br>
        <ul>
          <a href="#">
            <li>Tentang Kami</li>
          </a>
          <a href="#">
            <li>Kebijakan Privasi</li>
          </a>
          <a href="#">
            <li>Syarat dan ketentuan </li>
          </a>
          <a href="#">
            <li>FAQ</li>
          </a>
          <a href="#">
            <li>Keuntungan Berlangganan</li>
          </a>
          <a href="#">
            <li>Bantuan</li>
          </a>
        </ul>
      </div>

      <div class="footer-section contact-form">
        <h2>Hubungi Kami</h2>
        <br>
        <form action="index.html" method="post">
          <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
          <button type="submit" class="btn btn-big contact-btn">
            <i class="fas fa-envelope"></i>
            Send
          </button>
        </form>
        <div class="contact">
          <a href="https://wa.me/6289520000128" style="color:white;">WhatsApp</a>
          <br>
          <a href="mailto:email@domain.com?subject=Ini%20adalah%20judul%20email%20default" style="color:white;">Email</a>
          <br>
          <a href="https://github.com/Hassalii" style="color:white;">Github</a>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      &copy; easyprint.com | Designed Hasan Ali
    </div>
  </div>
  <!-- // footer -->


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>
    
</body>
</html>