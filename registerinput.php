<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "dreamhomeproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $f_name = trim($_POST['f_name']);
    $l_name = trim($_POST['l_name']);
    $email = trim($_POST['email']);
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if ($pass !== $confirm_pass) {
        echo "Passwords do not match!";
        exit;
    }

    

    // Use prepared statement to prevent SQL injection
    $stmt = $data->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $f_name, $l_name, $email, $pass);

    if ($stmt->execute()) {
        echo "Register successful";
        header("Location: login.php");
        exit;
    } else {
        echo "Register unsuccessful: " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($data);
?>
