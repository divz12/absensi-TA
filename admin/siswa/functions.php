<?php
include('../../koneksi.php');

function getClasses() {
    global $connection;
    $sql = "SELECT * FROM tbl_kelas";
    $result = $connection->query($sql);
    return $result;
}

function getMajors() {
    global $connection;
    $sql = "SELECT * FROM tbl_jurusan";
    $result = $connection->query($sql);
    return $result;
}

function getStudents() {
    global $connection;
    $sql = "SELECT tbl_siswa.*, tbl_kelas.nama_kelas, tbl_jurusan.nama_jurusan FROM tbl_siswa 
            JOIN tbl_kelas ON tbl_siswa.kelas_id = tbl_kelas.id 
            JOIN tbl_jurusan ON tbl_siswa.jurusan_id = tbl_jurusan.id";
    $result = $connection->query($sql);
    return $result;
}

function addStudent($no_kartu, $nama_lengkap, $kelas_id, $jurusan_id) {
    global $connection;
    $sql = "INSERT INTO tbl_siswa (no_kartu, nama_lengkap, kelas_id, jurusan_id) VALUES ('$no_kartu', '$nama_lengkap', '$kelas_id', '$jurusan_id')";
    if ($connection->query($sql) === TRUE) {
        return "New student added successfully";
    } else {
        return "Error: " . $sql . "<br>" . $connection->error;
    }
}

function updateStudent($id, $no_kartu, $nama_lengkap, $kelas_id, $jurusan_id) {
    global $connection;
    $sql = "UPDATE tbl_siswa SET no_kartu = '$no_kartu', nama_lengkap = '$nama_lengkap', kelas_id = '$kelas_id', jurusan_id = '$jurusan_id') WHERE id = '$id'";
    if ($connection->query($sql) === TRUE) {
        return "Student updated successfully";
    } else {
        return "Error: " . $sql . "<br>" . $connection->error;
    }
}

function deleteStudent($id) {
    global $connection;
    $sql = "DELETE FROM tbl_siswa WHERE id = '$id'";
    if ($connection->query($sql) === TRUE) {
        return "Record deleted successfully";
    } else {
        return "Error: " . $sql . "<br>" . $connection->error;
    }
}

function getStudentById($id) {
    global $connection;
    $sql = "SELECT * FROM tbl_siswa WHERE id = '$id'";
    $result = $connection->query($sql);
    return $result->fetch_assoc();
}

?>