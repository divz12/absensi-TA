<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi - Nama</title>
    <link href="../../assets/img/logo.png" rel="icon">
    <link rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #292929;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1100px;
        }
        h4 {
            text-align: right;
            margin-bottom: 20px;
            margin-top: 5px;
        }
        h3 {
            text-align: center;
            margin-bottom: 5px;
            font-size: large;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
         a{
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
        .tengah{
        text-align: left;
        margin-bottom: 5px;
    }
    </style>


<div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <h3> REKAP ABSENSI </h3>
            </div>
            <h4><?php echo date('F Y'); ?></h4>

            <div class="card-body">
             <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
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
 $data = mysqli_query($connection,"SELECT * FROM tbl_rekap WHERE no_kartu = $no_kartu");
 while($row = mysqli_fetch_array($data)){
 ?>




 <tr>
 <td><?php echo $row['nama_lengkap']; ?></td>
 <td><?php echo $row['nama_kelas']; ?></td>
 <td><?php echo $row['nama_jurusan']; ?></td>
 <td><?php echo $row['keterangan']; ?></td>
 <td><img src='../../siswa/masuk/<?php echo $row['foto']; ?>' width="100"></td>
 <td><?php echo $row['tanggal']; ?></td>
 <td><?php echo $row['masuk']; ?></td>
 <td><?php echo $row['keluar']; ?></td>
 </tr>
 <?php
 }
 ?>
 </table><br>	<br>
	
<?php
//include('../../koneksi.php');
//$data_masuk = mysqli_query($connection,"SELECT * FROM tbl_rekap where no_kartu = $no_kartu AND keterangan='hadir'");
//$jumlah_masuk = mysqli_num_rows($data_masuk);

//$data_sakit = mysqli_query($connection,"SELECT * FROM tbl_rekap where no_kartu = $no_kartu AND keterangan='sakit'");
//$jumlah_sakit = mysqli_num_rows($data_sakit);

//$data_izin = mysqli_query($connection,"SELECT * FROM tbl_rekap where no_kartu = $no_kartu AND keterangan='izin'");
//$jumlah_izin = mysqli_num_rows($data_izin);

//$data_alpa = mysqli_query($connection,"SELECT * FROM tbl_rekap where no_kartu = $no_kartu AND keterangan='alpa'");
//$jumlah_alpa = mysqli_num_rows($data_alpa);
?> 


 
<!--
            <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">JUMLAH KEHADIRAN</th>
                    <th scope="col">JUMLAH SAKIT</th>
                    <th scope="col">JUMLAH IZIN</th>
                    <th scope="col">JUMLAH ALPA</th>
                  </tr>
                </thead>
                <tbody>
<tr>
<td><?php echo $jumlah_masuk; ?></td>
<td><?php echo $jumlah_sakit; ?></td>
<td><?php echo $jumlah_izin; ?></td>
<td><?php echo $jumlah_alpa; ?></td>
</tr>
-->

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