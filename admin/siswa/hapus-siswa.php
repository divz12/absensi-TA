<?php

include('../../koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tbl_siswa WHERE id = '$id'";

if($connection->query($query)) {
    header("location: siswa.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>