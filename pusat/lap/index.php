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

  <title>Gudang Pusat</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/simple-sidebar.css" rel="stylesheet">
  <!-- Date Picker -->
	<link rel="stylesheet" href="../../plugins/datepicker/bootstrap-datetimepicker.min.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

					<!-- Sidebar -->

					<!-- /#sidebar-wrapper -->

					<!-- Page Content -->
		<div id="page-content-wrapper">

					  <?php include('menu.php'); ?>
						<?php
               include "../../koneksi.php";
            ?>

					  <div class="container">
							<h3 class="mt-4" style="margin-bottom: 30px">
							  <center>Data Laporan Material</center>
							</h3>
							<form action="../../cetak_material.php" method="post">
							  
							  
									<table class="table table-bordered table-hover">
										<tr>
										  <td>Dari Tanggal</td>
										  <td>
											<div class="input-group date form_date col-sm-12" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
											<input type="text" name="dari" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
										  </td>
										</tr>
										<tr>
										  <td>Sampai Tanggal</td>
										  <td>
											<div class="input-group date form_date col-sm-12" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
											<input type="text" name="sampai" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
										  </td>
										</tr>		
											
											<th colspan="4"><input type="reset" value="Reset" class="btn btn-danger pull pull-right"/>
											<input type="submit" class="btn btn-primary pull pull-right" value="Export PDF" name="pdf"></th>
											
									</table>		
							</form>
							<?php
                //proses jika sudah klik tombol pencarian data
                if(isset($_POST['pencarian'])){
                //menangkap nilai form
                $tanggal_awal=$_POST['dari'];
                $tanggal_akhir=$_POST['sampai'];
                if(empty($tanggal_awal) || empty($tanggal_akhir)){
                //jika data tanggal kosong
                echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
									<div class='box box-primary'>
								<div class='register-box-body'>
									<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar</p>
									<div class='row'>
										<div class='col-xs-8'></div>
										<div class='col-xs-4'>
											<button type='button' onclick=location.href='home-manajer.php' class='btn btn-block btn-warning'>Back</button>
										</div>
									</div>
								</div>
									</div>";
                }
                else {
									$query=mysql_query($koneksi, "SELECT * FROM lap_pusat WHERE tanggal  between  '$tanggal_awal' AND '$tanggal_akhir';");
                }
            ?>	
					 </div>
					 
            <?php
            }
            else{
                unset($_POST['pencarian']);
            }
            ?>
            
		</div>
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
  <!-- datepicker -->
<script type="text/javascript" src="../../plugins/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../plugins/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../../plugins/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
	 $('.form_date').datetimepicker({
			language:  'id',
			weekStart: 1,
			todayBtn:  1,
	  autoclose: 1,
	  todayHighlight: 1,
	  startView: 2,
	  minView: 2,
	  forceParse: 0
		});
</script>
</body>

</html>