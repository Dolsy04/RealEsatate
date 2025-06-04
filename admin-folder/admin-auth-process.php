<?php
session_start();
include 'admin-config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signIn'])) {
    $email = trim($_POST["email"]);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['signInError'] = 'All fields are required.';
        header('Location: admin-auth.php');
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM adminauthusers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $adminUser = $result->fetch_assoc();

        if (password_verify($password, $adminUser['password'])) {
            $_SESSION['adminuser_id'] = $adminUser['id'];
            $_SESSION['admin_logged_in'] = true; // <-- This is what protects other pages
            $_SESSION['admin_email'] = $adminUser['email']; // Optional

            header('Location: admin-dashboard.php');
            exit();
        } else {
            $_SESSION['signInError'] = 'Incorrect email or password.';
        }
    } else {
        $_SESSION['signInError'] = 'Access denied. You are not an admin.';
    }
} else {
    $_SESSION['signInError'] = 'Invalid request.';
}

header('Location: admin-auth.php');
exit();
?>