
      <?php include('header.php'); ?>


      <div class="container">
        <h3 class="mt-4" style="margin-bottom: 30px">
          <center>Edit User</center>
        </h3>
        <form action="edituser.php" method="post">
          <?php
            include '../koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from user where id='$id'");
            while ($d = mysqli_fetch_array($data)) {
                ?>

          <table class="table table-bordered table-hover">
            <tr>
              <td>ID user</td>
              <td>
                <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                <input type="text" class="form-control" name="id" value="<?php echo $d['id'] ?>" readonly>
              </td>
            </tr>
            <tr>
              <td>username</td>
              <td>
                <input type="text" class="form-control" name="username" value="<?php echo $d['username'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>password</td>
              <td>
                <input type="password" class="form-control" name="password" value="<?php echo $d['password'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>level user</td>
              <td>
                <select class="form-control" name="level">
                  <option value="admin">admin</option>
                  <option value="pusat">pusat</option>
                  <option value="cabang">cabang</option>
                </select>
              </td>
            </tr>


          </table>
          <center><input type="submit" name="" class="btn btn-primary" value="Update Data user"></center>
      </div>
    </div>
  <?php
            } ?>
    </form>

    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
