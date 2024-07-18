<?php

include('../../koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tbl_kelas WHERE id = '$id'";

if($connection->query($query)) {
    header("location: kelas.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>