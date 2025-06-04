<?php 
    session_start();
    include 'admin-config.php';

    if (isset($_POST['uploadprofile']) && isset($_FILES['profilePicture'])) {
    $adminUserId = $_SESSION["adminuser_id"];
    $file = $_FILES['profilePicture'];
    
    $filename = $file['name'];
    $tmpName = $file['tmp_name'];
    $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExt, $allowed)) {
        $newName = uniqid('profile_', true) . '.' . $fileExt;
        $destination = 'uploads/profile_pictures/' . $newName;
        
        if (!is_dir('uploads/profile_pictures')) {
            mkdir('uploads/profile_pictures', 0755, true);
        }

        move_uploaded_file($tmpName, $destination);

        // Update user record
        $sql = "UPDATE adminauthusers SET profile_picture = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $newName, $adminUserId);
        $stmt->execute();

        echo "Profile picture uploaded successfully!";
        header("Location: admin-dashboard.php");
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
    }
    exit();
}

?>