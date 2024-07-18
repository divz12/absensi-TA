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
            <div class="d-flex align-items-center justify-content-between mb-4">
              <h6 class="mb-0">Rekap Absen</h6>
            </div>

            <a href="absen-manual.php" class="btn btn-md btn-success" style="margin-bottom: 15px"><i class="fa fa-solid fa-user-plus mr-4"></i> TAMBAH ABSEN </a>

            
            <div class="menu-malasngoding">
                <li class="dropdown"><a href="" class="btn btn-info" >LAPORAN</a>
                <ul class="isi-dropdown">
                    <li><a href="../pilih/pilih-nama.php">No Kartu</a></li>
                    <li><a href="../pilih/pilih-kelas.php">Kelas</a></li>
                    <li><a href="../pilih/pilih-tanggal.php">Tanggal</a></li>
                </ul>
            </li>
          </div>
          <style>

          .menu-malasngoding ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
          }
        
          .menu-malasngoding > ul > li {
            float: left;

          }


          .menu-malasngoding li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 8px 6px;
            text-decoration: none;
          }
        
          .menu-malasngoding li a:hover{
            background-color: #2525ff;
          }

            li.dropdown {
            display: inline-block;
            
            
          }

        
          .dropdown:hover .isi-dropdown {
            display: block;
          }
        
          .isi-dropdown a:hover {
            color: #fff !important;
          }
        
          .isi-dropdown {
            position: absolute;
            display: none;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            background-color: #f9f9f9;
                margin-left: 920px;
          }
        
          .isi-dropdown a {
            color: #3c3c3c !important;
          }
        
          .isi-dropdown a:hover {
            color: #232323 !important;
            background: #f3f3f3 !important;
          }

            .tengah{
                text-align: right;
                
            }
        </style>
        
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
                    <th scope="col">FOTO</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">MASUK</th>
                    <th scope="col">KELUAR</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('../../koneksi.php');
                      $no = 1;
                      $query = mysqli_query($connection,"SELECT * FROM tbl_rekap");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['no_kartu'] ?></td>
                      <td><?php echo $row['nama_lengkap'] ?></td>
                      <td><?php echo $row['nama_kelas'] ?></td>
                      <td><?php echo $row['nama_jurusan'] ?></td>
                      <td><?php echo $row['keterangan'] ?></td>
                      <td><img src='../../siswa/masuk/<?php echo $row['foto']; ?>' width="100"></td>
                      <td><?php echo $row['tanggal'] ?></td>
                      <td><?php echo $row['masuk'] ?></td>
                      <td><?php echo $row['keluar'] ?></td>
                    <td class="text-center">
                        <a href="konfirmasi-pulang.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-light">PULANG <i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="hapus-absen.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">HAPUS <i class="fa-solid fa-circle-xmark"></i></a>
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
