<?php
session_start();
include('koneksi.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "Username atau password tidak boleh kosong!";
    } else {
        $cekuser = mysqli_query($connection, "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'");
        $hitung = mysqli_num_rows($cekuser);

        if ($hitung > 0) {
            $ambildatarole = mysqli_fetch_array($cekuser);
            $role = $ambildatarole['role'];

            $_SESSION['log'] = 'logged';
            $_SESSION['role'] = $role;

            if ($role == 'admin') {
                header('Location: admin/dashboard.php');

            exit();
        } else {
            echo "Username atau password salah!";
        }
    }
}
}
?>
