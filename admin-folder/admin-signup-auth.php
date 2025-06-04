<?php
session_start();
include 'admin-config.php';

if (isset($_POST['register'])) {
    $surname = trim($_POST['surname']);    
    $othername = trim($_POST['othername']);    
    $email = trim($_POST['email']);    
    $gender = trim($_POST['gender']);    
    $position = trim($_POST['position']);    
    $address = trim($_POST['address']);    
    $password = $_POST['password'];

    // 1. Check for empty fields
    if (
        empty($surname) || empty($othername) || empty($email) ||
        empty($gender) || empty($position) || empty($address) || empty($password)
    ) {
        $_SESSION['signInError'] = 'All fields are required.';
        header('Location: admin-signup.php');
        exit();
    }

    // 2. Check if email already exists
    $checkemail = $conn->query("SELECT email FROM adminauthusers WHERE email = '$email'");
    if ($checkemail->num_rows > 0) {
        $_SESSION['signInError'] = 'Email Already Registered.';
        header('Location: admin-signup.php');
        exit();
    }

    // 3. Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 4. Insert new admin
    $stmt = $conn->prepare("INSERT INTO adminauthusers (surname, othername, email, gender, position, address, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $surname, $othername, $email, $gender, $position, $address, $hashedPassword);
    
    if ($stmt->execute()) {
        // Registration success
        header("Location: admin-auth.php");
        exit();
    } else {
        $_SESSION['signInError'] = 'Error registering admin.';
        header('Location: admin-signup.php');
        exit();
    }
}
?>
