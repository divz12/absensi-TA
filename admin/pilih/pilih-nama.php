<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['role'] != 'admin') {
    header('Location: ../../login.php');
    exit();
}
?>


<?php include('../includes/header.php'); ?>

<div id="layoutSidenav_content">
<main>

    <div class="container-fluid pt-4 px-4">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
            <h5>LIHAT REKAP ABSENSI</h5>
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
              <form action="reportbynama.php" method="POST">
                
                <div class="form-group">
                  <label>No Kartu</label>
                  <input type="text" name="no_kartu" placeholder="Masukkan No Kartu" class="form-control">
                </div>
                <br>

                <button type="submit" class="btn btn-success">LIHAT</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('../includes/footer.php'); ?>
