<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            background-image: url('hotel_blek');
            
        }
    </style>
</head>
<body>
<?php
session_start(); // Tambahkan ini di awal file

include "koneksi.php";
// Fungsi untuk memvalidasi login
function validate_login($username, $password)
{
    global $koneksi;

    // Melindungi dari serangan SQL Injection
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    // Query untuk memeriksa apakah username dan password sesuai
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        // Login berhasil
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_role'] = $row['role'];
        return true;
    } else {
        // Login gagal
        return false;
    }
}

// Menggunakan $_POST untuk mengambil data dari form login
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (validate_login($username, $password)) {
        // Login berhasil, arahkan ke halaman utama sesuai peran
        if ($_SESSION['user_role'] == 'admin') {
            header("Location: index.php");
        } else {
            header("Location: user.php");
        }
        exit();
    } else {
        // Login gagal
        $error_message = "Username atau password salah.";
    }
}
    ?>

    <div class="container">
        <h1 class="text-center">Form Login</h1>
        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>