<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src="js/login.js"></script>
    <script src="js/jquery-latest.js"></script>

    <script src="" charset="utf-8"></script>
    <link rel="stylesheet" href="css/login.css">

  <div class="login-page">

    <div class="form">

      <form class="login-form" method="post" action="cek_login.php">
        <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "
            <div class='alert alert-danger' role='alert'>
              <center>Maaf Password anda salah!
            </div>";
                    } elseif ($_GET['pesan'] == "logout") {
                        echo "
            <div class='alert alert-warning' role='alert'>
              <center>Anda Berhasil Logout
            </div>
            ";
                    } elseif ($_GET['pesan'] == "gagal1") {
                        echo "
            <div class='alert alert-warning' role='alert'>
              <center>Mohon anda Login lagi
            </div>
            ";
                    } elseif ($_GET['pesan'] == "belum_login") {
                        echo "
                        <div class='alert alert-warning' role='alert'>
                          <center>Mohon anda Login lagi
                        </div>";
                    }
                }
                echo "<br>";
                ?>
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="password" placeholder="password"/>
        <button>login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
    </div>
  </body>
</html>
