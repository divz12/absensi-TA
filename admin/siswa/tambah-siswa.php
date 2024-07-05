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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/logo.png">
  <title>
    Absensi - Tambah Data
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