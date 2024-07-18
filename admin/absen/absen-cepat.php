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
              <h4>Pengaturan Jam Absensi</h4>
              <form action="simpan-absencpt.php" method="post">
                  <label for="enable_limit">Aktifkan Jam Pulang:</label>
                  <input type="checkbox" id="enable_limit" name="enable_limit"
                  <?php
                  // Membaca status batas jam kerja dari file JSON
                  $file = 'work_hours.json';
                  if (file_exists($file)) {
                      $data = json_decode(file_get_contents($file), true);
                      if ($data['enable_limit']) {
                          echo 'checked';
                      }
                  }
                  ?>>
                  <br><br>
                  <button type="submit" class="btn btn-success">UBAH</button>
              </form>

   
                <?php
                // Menampilkan status batas jam kerja saat ini
                if (file_exists($file)) {
                    echo "Status: " . ($data['enable_limit'] ? 'Aktif' : 'Tidak') . "<br>";
                } else {
                    echo "Belum ada pengaturan batas jam kerja yang disimpan.";
                }
                ?>

            </div>
          </div>
        </div>
      </div>
    </div>





<?php include('../includes/footer.php'); ?>
