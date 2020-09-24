<?php
  session_start();
  if ($_SESSION['status']!="cabang") {
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

  <title>Gudang Pusat</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../plugins/datatables/css/jquery.dataTables.min.css">

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
      <div style="margin-top: 20px;" class="jumbotron">
      <h1 class="display-6"><center>Halaman Cabang</h1>
      <p class="lead"><center>Sekarang anda Panel Gudang</p>
  </p>
</div>

      </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../../plugins/datatables/js/jquery.dataTables.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>
<script type="text/javascript">
  $(document).ready(function() {
        $('#example').DataTable();
  });
</script>

</html>
