<?php include('header.php') ?>

    <!-- awal preoder -->
    <div class="container">
        <h3 class="mt-4" style="margin-bottom: 30px">
            <center>Tabel Pre-Order Cabang
        </h3>
        <table class="table table-bordered table-hover">
            <tr>
                <th>
                    <center>No
                </th>
                <th>
                    <center>Tanggal Order
                </th>
                <th>
                    <center>Kode Order
                </th>
                <th>
                    <center>Nama Material
                        </td>
                <th>
                    <center>Jumlah Material
                        </td>
                <th>
                    <center>Kondisi
                </th>
                <th>
                    <center>Status
                </th>


            </tr>
            <?php
            include('../koneksi.php');
            $kode_order = $_GET['kode_order'];

            $data = mysqli_query($koneksi, "SELECT * from t_order where kode_order=$kode_order");
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
                //
                $cek_material = $d['nama_material'];
                if (!empty($cek_material)) {
                } ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['tanggal_order']; ?></td>
                    <td><?php echo $d['kode_order']; ?></td>
                    <td><?php echo $d['nama_material']; ?></td>
                    <td>
                        <center><?php echo $d['jumlah_material']; ?>
                    </td>
                    <td>
                        <center><?php echo $d['kondisi']; ?>
                    </td>
                    <td>
                        <center><?php echo $d['status']; ?>
                    </td>


                </tr>
            <?php
            } ?>
        </table>
    </div>


    <!-- akhir preorder -->
    <!-- /#wrapper -->



    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        window.print();

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>