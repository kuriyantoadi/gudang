<?php
  session_start();
  if ($_SESSION['status']!="pusat") {
      header("location:../../index.php?pesan=belum_login");
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
        <h2 class="mt-4" style="margin-bottom: 30px">
          <center>Tambah Material Baru</center>
        </h2>
        <form action="" method="post">

          <table class="table table-bordered table-hover">
            <tr>
              <td>ID material</td>
              <td>
                <input type="text" class="form-control" name="id_material" required >
              </td>
            </tr>
            <tr>
              <td>Nama Material</td>
              <td>
                <input type="text" class="form-control" name="nama_material" required>
              </td>
            </tr>
            <tr>
              <td>Jumlah Material</td>
              <td>
                <input type="text" class="form-control" name="jumlah_material" required>
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

          </table><center>
            <button type="submit" name="simpan" value="upload" class="btn btn-success" >Submit</button>
          </center>
      </div>
    </div>

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
<?php

//proses
    if (isset($_POST['simpan'])) {
        $id_material = $_POST['id_material'];
        $nama_material = $_POST['nama_material'];
        $jumlah_material = $_POST['jumlah_material'];
        $jenis_satuan_material = $_POST['jenis_satuan_material'];

        //script validasi data
        include '../../koneksi.php';
        $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM gudang_pusat WHERE id_material='$id_material' or nama_material='$nama_material'"));
        if ($cek > 0) {
            echo "<script>window.alert('ID Material atau Nama Material yang anda masukan sudah ada')
    window.location='material-baru.php'</script>";
        } else {
            mysqli_query($koneksi, "INSERT INTO gudang_pusat values(
          '',
          '$id_material',
          '$nama_material',
          '$jumlah_material',
          '$jenis_satuan_material'

          )");

            echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='index.php'</script>";
        }
    }
 ?>
