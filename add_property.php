<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "dreamhomeproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    echo "Database connection error.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
        echo "Unauthorized access.";
        exit();
    }

    $admin_email = $_SESSION['email'];
    $stmt = $data->prepare("SELECT admin_id FROM admin WHERE email = ?");
    $stmt->bind_param("s", $admin_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    $stmt->close();

    if (!$admin) {
        echo "Admin not found.";
        exit();
    }

    $admin_id = $admin['admin_id'];

    $type = $_POST['propertytype'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $area_sqft = $_POST['squareFeet'];
    $price = $_POST['price'];

    $stmt = $data->prepare("INSERT INTO property (admin_id, type, title, location, bedrooms, bathrooms, area_sqft, price)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiiid", $admin_id, $type, $title, $location, $bedrooms, $bathrooms, $area_sqft, $price);

    if ($stmt->execute()) {
        echo "✅ Property added successfully!";
    } else {
        echo "❌ Failed to add property: " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($data);
?>
