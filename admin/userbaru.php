<?php
  session_start();
  if ($_SESSION['status']!="admin") {
      header("location:../login.php?pesan=belum_login");
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah User</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <?php include('menu.php'); ?>


      <div class="container">
        <h2 class="mt-4" style="margin-bottom: 30px">
          <center>Tambah Material Baru</center>
        </h2>
        <form action="tambah_user.php" method="post">

          <table class="table table-bordered table-hover">
            <!--<tr>
              <td>ID material</td>
              <td>
                <input type="text" class="form-control" name="id_material" required >
              </td>
            </tr>-->
            <tr>
              <td>username</td>
              <td>
                <input type="text" class="form-control" name="username" required>
              </td>
            </tr>
            <tr>
              <td>Password</td>
              <td>
                <input type="Password" class="form-control" name="Password" required>
              </td>
            </tr>
            <tr>
              <td>level User</td>
              <td>
                <select class="form-control" name="level">
				<option value="">~~SELECT~~</option>
				  <option value="admin">admin</option>
                  <option value="pusat">pusat</option>
                  <option value="cabang">cabang</option>
                </select>
              </td>
            </tr>

          </table><center>
            <button type="submit" name="submit" value="upload" class="btn btn-success" >Submit</button>
          </center>
      </div>
    </div>

    </form>

    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
