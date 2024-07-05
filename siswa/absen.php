<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <title>
    Absensi
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />


  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body>



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
                    <th scope="col">TANGGAL</th>
                    <th scope="col">MASUK</th>
                    <th scope="col">KELUAR</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">FOTO</th>
                  </tr>
                </thead>
                <tbody>
 <?php
 // koneksi database
include('../koneksi.php');


 // menampilkan data pegawai
 $data = mysqli_query($connection,"SELECT * FROM tbl_rekap ");
?>
<?php

 if ($data->num_rows > 0) {
            while($row = $data->fetch_assoc()) {
echo " <tr>";

 echo "<td>" . $row['nama_lengkap'] . "</td>";
 echo "<td>" . $row['nama_kelas'] . "</td>";
 echo "<td>" . $row['nama_jurusan'] . "</td>";
 echo "<td>" . $row['tanggal'] . "</td>";
 echo "<td>" . $row['masuk'] . "</td>";
 echo "<td>" . $row['keluar'] . "</td>";
 echo "<td>" . $row['keterangan'] . "</td>";
 echo "<td> <img src='masuk/" .  $row['foto'] . "' width='100'></td>";
 echo "</tr>";
            }
 }
 ?>
 </table><br>	<br>




<!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>