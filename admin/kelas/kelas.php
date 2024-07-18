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
        <div class="col-sm-12 ">
          <div class="card">
            <div class="card-body">
              <h3 class="mt-2">Data Kelas</h3>
              <br>
            <div class="d-flex align-items-center justify-content-between mb-4">
              
              <a href="tambah-kelas.php" class="btn btn-md btn-success" style="margin-bottom: 15px"><i class="fa fa-solid fa-user-plus mr-4"></i> TAMBAH DATA  </a>
              
              </div>
              <div class="table-responsive">
                    <table class="table table-striped table-bordered mt-2 mb-2" id="myTable">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Kelas</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('../../koneksi.php');
                      $no = 1;
                      $query = mysqli_query($connection,"SELECT * FROM tbl_kelas");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td class="text-center"><?php echo $no++ ?></td>
                      <td class="text-center"><?php echo $row['nama_kelas'] ?></td>
                      <td class="text-center">
                        <a href="edit-kelas.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">EDIT <i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="hapus-kelas.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">HAPUS <i class="fa-solid fa-circle-xmark"></i></a>
                      </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>


<?php include('../includes/footer.php'); ?>

