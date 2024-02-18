<?php
session_start();
include 'db/db_connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $email;
        echo "Login successful";
    } else {
        echo "Invalid email or password";
    }
} else {
    echo "Invalid email or password";
}

$conn->close();
?>
