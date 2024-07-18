<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['role'] != 'admin') {
    header('Location: ../../login.php');
    exit();
}
?>

<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $no_kartu = $_POST['no_kartu'];
        $nama_siswa = $_POST['nama_siswa'];
        $kelas_id = $_POST['kelas_id'];
        $jurusan_id = $_POST['jurusan_id'];
        $message = addStudent($no_kartu, $nama_siswa, $kelas_id, $jurusan_id);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $message = deleteStudent($id);
    }
}

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
            <h5>TAMBAH SISWA</h5>
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
              <form action="simpan-siswa.php" method="POST">
                
                <div class="form-group">
                  <label>No. Kartu</label>
                  <input type="text" name="no_kartu" placeholder="Masukkan No. Kartu Siswa" class="form-control">
                </div>
                <br>

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Siswa" class="form-control">
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
                
                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php include('../includes/footer.php'); ?>
