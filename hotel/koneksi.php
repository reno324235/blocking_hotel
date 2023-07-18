<?php

/**
* Created by PhpStorm.
* User: alwizen
* Date: 20/05/2017
* Time: 7:41
*/

$host = "localhost"; // host
$user = "root";      // username
$pass = "";         // password
$db   = "hotel";     // name db

// koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'hotel')
    or die(mysqli_error($koneksi));

    if (isset($_POST['users'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
    
        $koneksi->query("INSERT INTO users(username, password, role) VALUES ('$username','$password','$role')");
    
        header("location:rekap.php");
    }
    
?>
