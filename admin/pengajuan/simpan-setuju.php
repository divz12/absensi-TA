<?php
include('../../koneksi.php');

$id = $_GET['id'];
$status = $_GET['status'];

if ($status == 'approved') {
    // Pindahkan data ke tabel rekap
    $sql_select = "SELECT * FROM tbl_pengajuan WHERE id='$id'";
    $result = $connection->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $no_kartu = $row['no_kartu'];
        $nama_lengkap = $row['nama_lengkap'];
        $nama_kelas = $row['nama_kelas'];
        $nama_jurusan = $row['nama_jurusan'];
        $keterangan = $row['keterangan'];
        $foto = $row['foto'];
        $tanggal = $row['tanggal'];
        $masuk = $row['masuk'];
        $keluar = $row['keluar'];


        $sql_insert = "INSERT INTO tbl_rekap (no_kartu, nama_lengkap, nama_kelas, nama_jurusan, keterangan, foto, tanggal, masuk, keluar) VALUES ('$no_kartu', '$nama_lengkap', '$nama_kelas', '$nama_jurusan', '$keterangan', '$foto', '$tanggal', '$masuk', '$keluar')";
        if ($connection->query($sql_insert) === TRUE) {
            // Hapus data dari tabel pengajuan
            $sql_delete = "DELETE FROM tbl_pengajuan WHERE id ='$id'";
            if ($connection->query($sql_delete) === TRUE) {
                echo "Pengajuan berhasil diapprove dan dipindahkan ke rekap.";
            } else {
                echo "Error: " . $connection->error;
            }
        } else {
            echo "Error: " . $sql_insert . "<br>" . $connection->error;
        }
    }
} else {
    // Update status pengajuan menjadi rejected
    $sql = "UPDATE tbl_pengajuan SET status='$status' WHERE id ='$id'";
    if ($connection->query($sql) === TRUE) {
        echo "Pengajuan berhasil diupdate.";
    } else {
        echo "Error: " . $connection->error;
    }
}

$connection->close();
header("Location: index.php");
exit;
?>
