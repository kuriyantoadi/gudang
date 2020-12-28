      <?php include('header.php'); ?>

      <div class="container">
        <div style="margin-top: 20px;" class="jumbotron">
          <h1 class="display-6">
            <center>Halaman Admin
          </h1>
          <p class="lead">
            <center>Sekarang anda Panel Admin
          </p>
          </p>
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
    </script>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>

</html>