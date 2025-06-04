<?php
    session_start();
    include 'admin-config.php';
    $signInError = $_SESSION['signInError'] ?? '';
    unset($_SESSION['signInError']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Estate/admin-signIN</title>
    <link rel="stylesheet" href="admin-auth.css">
</head>
<body>
<section>
    <div class="section-container">
        <div class="logo-container">
            <div>
                <img src="../assest/image4.jpg" width="50" alt="">
                <h1>AL-HUDAH</h1>
            </div>
            <a href="../index.html">&#8592; Exit Page</a>
        </div>

        <div class="title-text">
            <h3>Admin Sign-In</h3>
            <p>This page is restricted for admin only</p>
        </div>

        <?php if (!empty($signInError)): ?>
            <p class="response"><?= $signInError ?></p>
        <?php endif; ?>

        <form action="admin-auth-process.php" method="post">
            <label for="email">Email*</label><br>
            <div class="email-container">
                <input type="email" name="email" id="email" placeholder="Enter Email"><br>
            </div>

            <label for="password">Password*</label><br>
            <div class="password-container">
                <div class="password-input-container">
                    <input type="password" name="password" id="password" autocomplete="off" placeholder="*******"><br>
                    <img src="/assest/show.png" width="30" alt="" class="toggle-password">
                </div>
            </div>
            <div class="submit-container">
                <input type="submit" value="Sign In" name="signIn">
            </div>
        </form>

        <p class="exitpage">Click here to <a href="../index.html">&#8592; Go Back</a></p>
    </div>
</section>
</body>
</html>
