<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['role'] != 'admin') {
    header('Location: ../../login.php');
    exit();
}
?>

<?php 
  
  include('../../koneksi.php');
  
  $id = $_GET['id'];
  
  $query = "SELECT * FROM tbl_jurusan WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>


<?php include('../includes/header.php'); ?>

<div id="layoutSidenav_content">
<main>

    <div class="container-fluid pt-4 px-4">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
            <h5>EDIT JURUSAN</h5>
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
              <form action="update-jurusan.php" method="POST">
                
                <div class="form-group">
                  <label>Jurusan</label>
                  <input type="text" name="nama_jurusan" value="<?php echo $row['nama_jurusan'] ?>" placeholder="Masukkan Jurusan" class="form-control">
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
