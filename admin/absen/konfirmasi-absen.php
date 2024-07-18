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

$no_kartu = $_POST['no_kartu'];

$query = "SELECT tbl_siswa.*, tbl_kelas.nama_kelas, tbl_jurusan.nama_jurusan FROM tbl_siswa 
            JOIN tbl_kelas ON tbl_siswa.kelas_id = tbl_kelas.id 
            JOIN tbl_jurusan ON tbl_siswa.jurusan_id = tbl_jurusan.id
            WHERE no_kartu = '$no_kartu' ";

$result = mysqli_query($connection, $query);

$row = mysqli_fetch_array($result);

{
    ?>

    <div class="container-fluid pt-4 px-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5>KONFIRMASI ABSEN</h5>
              <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
          
              <form action="simpan-absen.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label>No kartu</label> 
                    <br>
                    <textarea class="form-control" name="no_kartu" id="exampleFormControlTextarea1" rows="1" readonly><?php echo $row['no_kartu'] ?></textarea>
                </div>
                <br>

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <textarea class="form-control" name="nama_lengkap" id="exampleFormControlTextarea1" rows="1" readonly><?php echo $row['nama_lengkap'] ?></textarea>
                </div>
                <br>

                <div class="form-group">
                  <label>Kelas</label>
                  <textarea class="form-control" name="nama_kelas" id="exampleFormControlTextarea1" rows="1" readonly><?php echo $row['nama_kelas'] ?></textarea>
                </div>
                <br>

                <div class="form-group">
                  <label>Jurusan</label>
                  <textarea class="form-control" name="nama_jurusan" id="exampleFormControlTextarea1" rows="1" readonly><?php echo $row['nama_jurusan'] ?></textarea>
                </div>
                <br>

                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" accept="image/*" capture="camera" name="foto"><br><br>
                </div>
                <br>

                
                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>

                <?php 
                } ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php include('../includes/footer.php'); ?>
