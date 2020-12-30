<?php
session_start();
if ($_SESSION['status']!="admin") {
    header("location:../../index.php?pesan=belum_login");
}


include '../koneksi.php';

$username = $_POST['username'];
$password = ($_POST['password']);
$level = $_POST['level'];

$exec = mysqli_query($koneksi, "insert into user values(
'',
'".$username."',
MD5('".$password."'),
'".$level."'

)");
 

 	if( $exec ){
 		echo "
 		<script>
 		alert('data admin berhasil ditambahkan');
 		document.location.href = 'datauser.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data admin gagal ditambahkan');
 		document.location.href = 'datauser.php';
 		</script>
 		";
 	}
 header("location:datauser.php");
