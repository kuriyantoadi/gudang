
            <?php include('header.php'); ?>

            <div class="container">
                <h3 class="mt-4" style="margin-bottom: 30px">
                    <center>Data Material Cabang</center>
                </h3>
                <a href="cabang-lap-material.php" style="margin-bottom: 30px; margin-right: 10px" type="button" class="btn btn-sm btn-warning" name="button">Laporan Material</a>
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                <center>No
                            </th>
                            <th>
                                <center>ID Material</td>
                            <th>
                                <center>Nama Material</td>
                            <th>
                                <center>Jumlah Material</td>
                            <th>
                                <center>Jenis Satuan Material</td>
                            
                        </tr>
                    </thead>
                    <?php
                    include('../koneksi.php');
                    $data = mysqli_query($koneksi, "SELECT * from gudang_cabang");
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['id_material']; ?></td>
                            <td><?php echo $d['nama_material']; ?></td>
                            <td>
                                <center><?php echo $d['jumlah_material']; ?>
                            </td>
                            <td>
                                <center><?php echo $d['jenis_satuan_material']; ?>
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

        function cetak() {
            window.print();
        }
    </script>

</body>

</html>