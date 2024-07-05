<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['role'] != 'admin') {
    header('Location: ../../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/logo.png">
  <title>
    Absensi - Rekap Absen
  </title>
  <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
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
              <a href="absen-manual.php" class="btn btn-md btn-success" style="margin-bottom: 15px"><i class="fa fa-solid fa-user-plus mr-4"></i> TAMBAH ABSEN </a>
            </div>
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
                margin-left: 1000px;
            
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
             <div class="container"  style="margin-bottom: 15px"></div>
              <table id="myTable" class="myTable" style="width:100%">
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

<!--   Core JS Files   -->
          <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

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