<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['role'] != 'admin') {
    header('Location: ../../login.php');
    exit();
}
?>

<?php 
  
  include('../../koneksi.php');

  include 'functions.php';
  
  $id = $_GET['id'];
  
  $query = "SELECT * FROM tbl_siswa WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);


$students = getStudents();
$classes = getClasses();
$majors = getMajors();

?>


<?php include('../includes/header.php'); ?>

<div id="layoutSidenav_content">
<main>

    <div class="container-fluid pt-4 px-4">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
            <h5>EDIT SISWA</h5>
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
              <form action="update-siswa.php" method="POST">
                
                <div class="form-group">
                  <label>No. Kartu</label>
                  <input type="text" name="no_kartu" value="<?php echo $row['no_kartu'] ?>" placeholder="Masukkan No. Kartu" class="form-control">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>
                <br>

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap'] ?>" placeholder="Masukkan Nama Lengkap" class="form-control">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>
                <br>

                <div class="form-group">
                <label for="kelas_id">Kelas</label>
                <select id="kelas_id" name="kelas_id" class="form-select" required>
                  <option value="" selected disabled hidden>-- Pilih Kelas --</option>
                    <?php while ($class = $classes->fetch_assoc()) { ?>
                      <option value="<?php echo $class['id']; ?>"><?php echo $class['nama_kelas']; ?></option>
                   <?php } ?>
                </select>
                </div>
                <br>

                <div class="form-group">
                <label for="jurusan_id">Jurusan</label>
                <select id="jurusan_id" name="jurusan_id" class="form-select" required>
                  <option value="" selected disabled hidden>-- Pilih Kelas --</option>
                    <?php while ($major = $majors->fetch_assoc()) { ?>
                      <option value="<?php echo $major['id']; ?>"><?php echo $major['nama_jurusan']; ?></option>
                    <?php } ?>
                </select>
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
