<?php
// Memulai sesi
session_start();

// Memuat file DataModel.php
require_once 'DataModel/DataModel.php';

// Membuat instance dari DataModel
$DataModel = new DataModel();

// Mendeklarasikan variabel global $err untuk menyimpan pesan error
global $err;
$err = '';

// Mengecek apakah request method adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $job = $_POST['job'];
    $gender = $_POST['gender'];

    // Validasi server-side
    if (empty($name)) {
        $err .= 'Name is required. ';
    } elseif (strlen($name) < 3) {
        $err .= 'Name must be at least 3 characters. ';
    }

    if (empty($email)) {
        $err .= 'Email is required. ';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err .= 'Invalid email format. ';
    }

    if (empty($job)) {
        $err .= 'Job is required. ';
    }

    if (empty($gender)) {
        $err .= 'Gender is required. ';
    }

    // Jika tidak ada error, data akan disimpan
    if (empty($err)) {
        $data = [
            'name' => $name,
            'email' => $email,
            'job' => $job,
            'gender' => $gender,
            'mt_ip' => $_SERVER['REMOTE_ADDR'],
            'mt_browser' => $_SERVER['HTTP_USER_AGENT']
        ];
        // Memasukkan data ke database
        if (!$DataModel->create($data)) {
            $err = 'Failed to insert data';
        }
        // Menyimpan data ke sesi
        $_SESSION['old'] = $data;
    } else {
        // Menyimpan data form ke sesi jika ada error
        $_SESSION['old'] = $_POST;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS PEMWEB</title>
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
    <div class="container">
        <!-- Memuat form -->
        <?php require_once 'form.inc.php'; ?>

        <!-- Memuat tabel -->
        <?php require_once 'table.inc.php'; ?>
    </div>
    <script>
        <?php
        // Menampilkan pesan error jika ada
        if (!empty($err)) {
            echo "alert('$err')";
        }
        ?>
    </script>
</body>

</html>