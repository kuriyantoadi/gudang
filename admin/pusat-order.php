            <?php include('header.php'); ?>

            <div class="container">
                <h3 class="mt-4" style="margin-bottom: 30px">
                    <center>Tampil Data Order</center>
                </h3>
                <form action="update_masuk.php" method="post">

                    <a href="pusat-lap-preorder.php" style="margin-bottom: 20px" type="bottom" class="btn btn-warning btn-sm">Laporan PreOrder</a>
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <center>No
                                </th>
                                <th>
                                    <center>ID Order</td>
                                <th>
                                    <center>Tanggal Order</td>
                               
                                <th>
                                    <center>Delivery Note
                                </th>
                            </tr>
                        </thead>
                        <?php
                        include('../koneksi.php');
                        $data = mysqli_query($koneksi, " SELECT DISTINCT kode_order, tanggal_order, kondisi, status FROM t_order ORDER BY kode_order DESC;");
                        $no = 1;
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $d['kode_order']; ?></td>
                                <td align="center"><?php echo $d['tanggal_order']; ?></td>

                                <td>
                                    <center><a type="bottom" class="btn btn-danger btn-sm" href="pusat-order-cetak.php?kode_order=<?php echo $d['kode_order']; ?>"> Cetak</a>
                                </td>

                            </tr>
                        <?php
                        } ?>
                    </table>
            </div>
        </div>
    </div>

    </form>

    <!-- /#page-content-wrapper -->




    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/datatables/js/jquery.dataTables.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>


</html>