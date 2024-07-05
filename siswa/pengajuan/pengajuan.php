<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/logo.png">
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
  <div class="container-fluid pt-4 px-4" style="margin-top: 50px;">
    <div class="row">
      <div class="col-sm-8 offset-md-2">
        <div class="card">
          <div class="card-body">
            <h5>PENGAJUAN SISWA</h5>
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
            <form action="../pengajuan/konfirmasi-pengajuan.php" method="POST">

              <div class="form-group">
                <label>NO KARTU</label>
                <input type="text" name="no_kartu" value="2854878696" placeholder="Silahkan Tap Kartu" class="form-control" readonly onfocus="this.setAttribute('readonly', 'readonly');" style="cursor: not-allowed;">
              </div>
              <br>


              <button type="submit" class="btn btn-success">KIRIM</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>