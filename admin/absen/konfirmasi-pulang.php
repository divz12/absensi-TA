<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['role'] != 'admin') {
    header('Location: ../../login.php');
    exit();
}
?>


<?php include('../includes/header.php'); ?>

<?php 
  
  include('../../koneksi.php');
  
  $id = $_GET['id'];
  
  $query = "SELECT * FROM tbl_rekap WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
            KELUAR
            </div>
            <div class="card-body">
              <form action="simpan-pulang.php" method="POST">
                
                <div class="form-group">
                  <label>No Kartu</label>
                  <input type="text" name="no_kartu" value="<?php echo $row['no_kartu'] ?>" placeholder="Masukkan NISN Siswa" class="form-control">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>
                <br>

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap'] ?>" placeholder="Masukkan Nama Lengkap Siswa" class="form-control">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>
                <br>

                <div class="form-group">
                  <label>Kelas</label>
                  <input type="text" name="nama_kelas" value="<?php echo $row['nama_kelas'] ?>" placeholder="Masukkan Nama Lengkap Siswa" class="form-control">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>
                <br>

                <div class="form-group">
                  <label>Jurusan</label>
                  <input type="text" name="nama_jurusan" value="<?php echo $row['nama_jurusan'] ?>" placeholder="Masukkan Nama Lengkap Siswa" class="form-control">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>
                <br>

                
                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php include('../includes/footer.php'); ?>
