<?php
session_start();
$_SESSION['email'] = $validated_email;
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "";
$db = "dreamhomeproject";



$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $email = trim($_POST['email']);
    $pass = $_POST['pass'];
    $role = $_POST['role']; 

    if ($role === 'admin') {
        
        $stmt = $data->prepare("SELECT * FROM admin WHERE email = ?");
    } else {
       
        $stmt = $data->prepare("SELECT * FROM users WHERE email = ?");
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row) {
        
        if ($pass === $row['password']) {
            
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_name'] = $row['first_name'] ?? $row['admin_f_name'];
            $_SESSION['role'] = $role;

            if ($role === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            $_SESSION['loginMessage'] = "Invalid password.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['loginMessage'] = "User not found.";
        header("Location: login.php");
        exit();
    }
}

mysqli_close($data);
?>
