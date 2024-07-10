<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Absensi Siswa</title>
  <link href="../../assets/img/logo.png" rel="icon">
  <link rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

</head>

<body class="bg-dark">


  <div class="container card" style="margin-top: 30px">
    <div class="card-header">
      <h3> REKAP ABSENSI <?php echo date('Y'); ?></h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-responsive" id="myTable">
        <thead>
          <tr>
            <th>No</th>
            <th scope="col">NAMA LENGKAP</th>
            <th scope="col">KELAS</th>
            <th scope="col">JURUSAN</th>
            <th scope="col">KETERANGAN</th>
            <th scope="col">FOTO</th>
            <th scope="col">TANGGAL</th>
            <th scope="col">MASUK</th>
            <th scope="col">KELUAR</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // koneksi database
          include "../../koneksi.php";
          $no_kartu = $_POST['no_kartu']; // Ambil ID dari parameter URL

          // menampilkan data pegawai
          $data = mysqli_query($connection, "SELECT * FROM tbl_rekap WHERE no_kartu = $no_kartu");
          $no = 1; // Inisialisasi nomor urut

          while ($row = mysqli_fetch_array($data)) {
          ?>




            <tr>
              <td class="text-center"><?php echo $no; ?></td>
              <td class="text-center"><?php echo $row['nama_lengkap']; ?></td>
              <td class="text-center"><?php echo $row['nama_kelas']; ?></td>
              <td class="text-center"><?php echo $row['nama_jurusan']; ?></td>
              <td class="text-center"><?php echo $row['keterangan']; ?></td>
              <td class="text-center"><img src='../../siswa/masuk/<?php echo $row['foto']; ?>' width="100"></td>
              <td class="text-center"><?php echo $row['tanggal']; ?></td>
              <td class="text-center"><?php echo $row['masuk']; ?></td>
              <td class="text-center"><?php echo $row['keluar']; ?></td>
            </tr>
          <?php
            $no++; // Increment nomor urut setiap kali loop
          }
          ?>
      </table><br> <br>
<!--
      <?php
      include('../../koneksi.php');
      $data_masuk = mysqli_query($connection, "SELECT * FROM tbl_rekap where no_kartu = $no_kartu AND keterangan='hadir'");
      $jumlah_masuk = mysqli_num_rows($data_masuk);

      $data_sakit = mysqli_query($connection, "SELECT * FROM tbl_rekap where no_kartu = $no_kartu AND keterangan='sakit'");
      $jumlah_sakit = mysqli_num_rows($data_sakit);

      $data_izin = mysqli_query($connection, "SELECT * FROM tbl_rekap where no_kartu = $no_kartu AND keterangan='izin'");
      $jumlah_izin = mysqli_num_rows($data_izin);

      $data_alpa = mysqli_query($connection, "SELECT * FROM tbl_rekap where no_kartu = $no_kartu AND keterangan='alpa'");
      $jumlah_alpa = mysqli_num_rows($data_alpa);
      ?>




      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center">JUMLAH KEHADIRAN</th>
            <th scope="col" class="text-center">JUMLAH SAKIT</th>
            <th scope="col" class="text-center">JUMLAH IZIN</th>
            <th scope="col" class="text-center">JUMLAH ALPA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center"><?php echo $jumlah_masuk; ?></td>
            <td class="text-center"><?php echo $jumlah_sakit; ?></td>
            <td class="text-center"><?php echo $jumlah_izin; ?></td>
            <td class="text-center"><?php echo $jumlah_alpa; ?></td>
          </tr>
        -->

        <button class="btn btn-primary"><a href="../../index.php" style="color: white;">KEMBALI</a></button>



          <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
          <script>
            $(document).ready(function() {
              $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    pageSize: 'A4'
                  },
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'print',
                  // 'colvis',
                ]
              });
            });
          </script>

          </script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>