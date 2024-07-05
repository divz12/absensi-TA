

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Absensi - Halaman Utama</title>
 
    <link href="assets/img/logo.png" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <header>
    <div class="container">
      <h1 class="logo"></h1>

      <style>
        @import url('https://fonts.googleapis.com/css?family=Work+Sans:400,600');
body {
	margin: 0;
	background: #222;
	font-family: 'Work Sans', sans-serif;
	font-weight: 800;
}

.container {
	width: 80%;
	margin: 0 auto;
}

header {
  background: #1a1a2e;
}

header::after {
  content: '';
  display: table;
  clear: both;
}

.logo {
  float: left;
  padding: 10px 0;
}

nav {
  float: right;
}

nav ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

nav li {
  display: inline-block;
  margin-left: 70px;
  padding-top: 20px;

  position: relative;
}

nav a {
  color: #ffffff;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 18px;
}

nav a:hover {
  color: #A9A9A9;
}

nav a::before {
  content: '';
  display: block;
  height: 5px;
  background-color: #444;

  position: absolute;
  top: 0;
  width: 0%;

  transition: all ease-in-out 250ms;
}

nav a:hover::before {
  width: 100%;
} 

</style>

      <nav>
        <ul>
          <li><a href="login.php">Login</a></li>
          <li><a href="./siswa/rekap/rekap.php">Rekap Absen</a></li>
        </ul>
      </nav>
    </div>
  </header> 

    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #1a1a2e;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #0F3460,
        #1A1A2E
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #1A1A2E,
        #0F3460
    );
    right: -30px;
    bottom: -80px;
}
.login-container{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
.login-container *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}


label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
.login-container button{
    margin-top: 50px;
    width: 100%;
    background-color: #0F3460;
    color: #FFFFFF;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}


    </style>


</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
        <div class="login-container">
        <center>
                <h1>HALAMAN UTAMA</h1>
    <br>
        </center>
    <button class="masuk" onclick="window.location.href='siswa/masuk/kehadiran.php'"> MASUK </button>
    <button class="pulang" onclick="window.location.href='siswa/pulang/pulang.php'">PULANG</button>
    <button class="pengajuan" onclick="window.location.href='siswa/pengajuan/pengajuan.php'">PENGAJUAN IZIN/SAKIT</button>
        </div>
</body>
</html>
