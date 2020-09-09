<?php
  session_start();
  if ($_SESSION['status']!="pusat") {
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

  <title>Gudang pusat</title>

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

      <?php include 'menu.php' ?>


    </div>
  </div>


    <!-- /#page-content-wrapper -->

    <div class="container">
      <h3 class="mt-4" style="margin-bottom: 30px">
        <center>Data Material</center>
      </h3>
        <table class="table table-bordered table-hover">
          <tr>
            <th>
              <center>No </th>
            <!-- <th>
              <center>ID Material</td> -->
            <th>
              <center>Nama Material</td>
            <th>
              <center>Jumlah Material</td>
            <th>
              <center>Jenis Satuan Material</td>

            <!-- <th>
              <center>Edit</td>
            <th>
              <center>Hapus</td> -->
          </tr>
          <?php
        include('../../koneksi.php');
        $data = mysqli_query($koneksi, "SELECT * from gudang_pusat");
        $no =1;
        while ($d = mysqli_fetch_array($data)) {
            ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <!-- <td><?php echo $d['id_material']; ?></td> -->
            <td><?php echo $d['nama_material']; ?></td>
            <td><center><?php echo $d['jumlah_material']; ?></td>
            <td><center><?php echo $d['jenis_satuan_material']; ?></td>


          </tr>
          <?php
        } ?>
        </table>
    </div>



  <!-- awal preoder -->
  <div class="container">
  <h3 style="margin-bottom: 30px">
  <?php
  $id_material = $_GET['id_material'];
  $kode_order = $_GET['kode_order'];

  $data1 = mysqli_query($koneksi, "SELECT * from t_order where kode_order='$kode_order' and id_material='$id_material' ");

  while ($d = mysqli_fetch_array($data1)) {
      ?>


  <center>Tabel Pre-Order</h3>
    <form action="acc-up.php" method="post">
  <table class="table table-bordered table-hover">
    <tr>
      <td>Nama Material</td>
      <td>
        <input type="text" class="form-control" name="id_material" value="<?php echo $d['id_material']; ?>" hidden>
        <input type="text" class="form-control" name="kode_order" value="<?php echo $d['kode_order']; ?>" hidden>
        <input type="text" class="form-control" name="nama_material" value="<?php echo $d['nama_material'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>Jumlah Material</td>
      <td>
        <input type="text" class="form-control" name="jumlah_material" value="<?php echo $d['jumlah_material'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>Status</td>
      <td>
        <input type="text" class="form-control" name="status" value="ACC" readonly>
      </td>
    </tr>
    <tr>
      <td>Kondisi Material</td>
      <td>
        <input type="text" class="form-control" name="kondisi" value="" required>
      </td>
    </tr>
    <tr>
      <td>Ekpedisi</td>
      <td>
        <input type="text" class="form-control" name="ekspedisi" value="" required>
      </td>
    </tr>
    <tr>
      <td>Warehouse</td>
      <td>
        <input type="text" class="form-control" name="warehouse" value="" required>
      </td>
    </tr>
    <tr>
      <td>Devision</td>
      <td>
        <input type="text" class="form-control" name="devision" value="" required>
      </td>
    </tr>
    <tr>
      <td>Origin Place</td>
      <td>
        <input type="text" class="form-control" name="origin_place" value="" required>
      </td>
    </tr>
    <tr>
      <td>Destionation</td>
      <td>
        <input type="text" class="form-control" name="destionation" value="" required>
      </td>
    </tr>
    <tr>
      <td>PJ. Warehouse Pusat</td>
      <td>
        <input type="text" class="form-control" name="pj_warehouse_pusat" value="" required>
      </td>
    </tr>
    <tr>
      <td>PJ. Ekspedisi</td>
      <td>
        <input type="text" class="form-control" name="pj_ekspedisi" value="" required>
      </td>
    </tr>
    <tr>
      <td>PJ. Warehouse Pusat</td>
      <td>
        <input type="text" class="form-control" name="pj_warehouse_cbg" value="" required>
      </td>
    </tr>
    <tr>
      <td>Driver</td>
      <td>
        <input type="text" class="form-control" name="driver" value="" required>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <center><input type="submit" name="" value="Update" class="btn btn-info">
      </td>
    </tr>
  </form>

  </table>
<?php
  } ?>
  <!-- akhir preorder -->
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
