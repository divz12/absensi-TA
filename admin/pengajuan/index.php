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
              <h3 class="mt-2">Data Pengajuan</h3>
              <br>
            <div class="d-flex align-items-center justify-content-between mb-4">
              
              <a href="pengajuan.php" class="btn btn-md btn-success" style="margin-bottom: 15px"><i class="fa fa-solid fa-user-plus mr-4"></i> TAMBAH PENGAJUAN </a>
              
              </div>
              <div class="table-responsive">
                    <table class="table table-striped table-bordered mt-2 mb-2" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NO. KARTU</th>
                    <th scope="col">NAMA LENGKAP</th>
                    <th scope="col">KELAS</th>
                    <th scope="col">JURUSAN</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">ALASAN</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('../../koneksi.php');
                      $no = 1;
                      $query = mysqli_query($connection,"SELECT * FROM tbl_pengajuan");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['no_kartu'] ?></td>
                      <td><?php echo $row['nama_lengkap'] ?></td>
                      <td><?php echo $row['nama_kelas'] ?></td>
                      <td><?php echo $row['nama_jurusan'] ?></td>
                      <td><?php echo $row['keterangan'] ?></td>
                      <td><?php echo $row['detail'] ?></td>
                      <td><img src='../../siswa/masuk/<?php echo $row['foto']; ?>' width="100"></td>
                      <td><?php echo $row['status'] ?></td>

                
                    <?php echo "<td>
                        <a href='simpan-setuju.php?id=" . $row['id'] . "&status=approved'>Approve</a> |
                        <a href='simpan-setuju.php?id=" . $row['id'] . "&status=rejected'>Reject</a>
                    </td>";
                    echo "</tr>";
                      }
                ?>
                   
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

<?php include('../includes/footer.php'); ?>

