<?php
  session_start();
  if ($_SESSION['status']!="admin") {
      header("location:../index.php?pesan=belum_login");
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>admin</title>

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
        <h3 class="mt-4" style="margin-bottom: 30px">
          <center>Data User</center>
        </h3>
        <form action="" method="post">
        <a href="userbaru.php" style="margin-bottom: 30px" type="button" class="btn btn-sm btn-primary" name="button">Input User Baru</a>
          <table class="table table-bordered table-hover">
            <tr>
                  <th><center>No.</th>
                  <th><center>Id User</th>
                  <th><center>Username</th>
                  <!--<th><center>Password</th>-->
                  <th><center>User level</th>
                  <th><center>Opsi</th>

            </tr>
            <?php
          include('../koneksi.php');
          $data = mysqli_query($koneksi, "SELECT * from user");
          $no =1;
          while ($d = mysqli_fetch_array($data)) {
              ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td align="center"><?php echo $d['id']; ?></td>
              <td align="center"><?php echo $d['username']; ?></td>
              <!--<td align="center"><?php echo $d['password']; ?></td>-->
              <td align="center"><?php echo $d['level']; ?></td>
              <td align="center">
                <a type="bottom" class="btn btn-warning btn-sm" href="useredit.php?id=<?php echo $d['id']; ?>">Edit</a>
                <a type="button" class="btn btn-danger btn-sm" href="userdelete.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Anda yakin Hapus data material <?php echo $d['nama_material']; ?> ?')">Hapus</a>
              </td>

            </tr>
            <?php
          } ?>
          </table>
      </div>
    </div>
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
