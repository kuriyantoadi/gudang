<?php
  session_start();
  if ($_SESSION['status']!="pusat") {
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

  <title>Gudang cabang</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/simple-sidebar.css" rel="stylesheet">

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
          <center>Edit Material</center>
        </h3>
        <form action="up_edit.php" method="post">
          <?php
            include '../../koneksi.php';
            $id_material = $_GET['id_material'];
            $data = mysqli_query($koneksi, "select * from gudang_pusat where id_material='$id_material'");
            while ($d = mysqli_fetch_array($data)) {
                ?>

          <table class="table table-bordered table-hover">
            <tr>
              <td>ID Material</td>
              <td>
                <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                <input type="text" class="form-control" name="id_material" value="<?php echo $d['id_material'] ?>" readonly>
              </td>
            </tr>
            <tr>
              <td>Nama Material</td>
              <td>
                <input type="text" class="form-control" name="nama_material" value="<?php echo $d['nama_material'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Jumlah Material</td>
              <td>
                <input type="text" class="form-control" name="jumlah_material" value="<?php echo $d['jumlah_material'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Jenis Satuan Material</td>
              <td>
                <select class="form-control" name="jenis_satuan_material">
                  <option value="Meter">Meter</option>
                  <option value="Batang">Batang</option>
                  <option value="Pcs">Pcs</option>
                </select>
              </td>
            </tr>


          </table>
          <center><input type="submit" name="" class="btn btn-primary" value="Update Data Material"></center>
      </div>
    </div>
  <?php
            } ?>
    </form>

    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
