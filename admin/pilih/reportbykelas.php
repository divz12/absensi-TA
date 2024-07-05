<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi - Kelas</title>
    <link href="../../assets/img/logo.png" rel="icon">
    <link rel="stylesheet">
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
$nama_kelas = $_POST['nama_kelas']; // Ambil ID dari parameter URL

 // menampilkan data pegawai
 $data = mysqli_query($connection,"SELECT * FROM tbl_rekap WHERE nama_kelas = '$nama_kelas' ");
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
 <center>		
<?php
include('../../koneksi.php');
$data_masuk = mysqli_query($connection,"SELECT * FROM tbl_rekap where nama_kelas = '$nama_kelas' AND keterangan='hadir'");
$jumlah_masuk = mysqli_num_rows($data_masuk);

$data_sakit = mysqli_query($connection,"SELECT * FROM tbl_rekap where nama_kelas = '$nama_kelas' AND keterangan='sakit'");
$jumlah_sakit = mysqli_num_rows($data_sakit);

$data_izin = mysqli_query($connection,"SELECT * FROM tbl_rekap where nama_kelas = '$nama_kelas' AND keterangan='izin'");
$jumlah_izin = mysqli_num_rows($data_izin);

$data_Alpa = mysqli_query($connection,"SELECT * FROM tbl_rekap where nama_kelas = '$nama_kelas' AND keterangan='alpa'");
$jumlah_Alpa = mysqli_num_rows($data_Alpa);
?> 


 
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
<td><?php echo $jumlah_Alpa; ?></td>
</tr>







</body>
</html>