<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enable_limit = isset($_POST['enable_limit']) ? true : false;

    // Data yang akan disimpan ke file JSON
    $data = [
        'enable_limit' => $enable_limit
    ];

    // Menyimpan data ke file JSON
    file_put_contents('work_hours.json', json_encode($data));

    // Redirect kembali ke halaman form
    header('Location: absen-cepat.php');
    exit();
}
?>
