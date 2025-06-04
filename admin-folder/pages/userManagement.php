<?php
       include '../admin-checkAuth.php';
           include "../admin-config.php";
    // session_start();
    $listingError = $_SESSION['listingMessage'] ?? '';
    unset($_SESSION['listingMessage']);


        $adminUserId = $_SESSION["adminuser_id"];
    $query = $conn->query("SELECT surname, othername, email, gender, position, address FROM adminauthusers WHERE id = $adminUserId");

    if($query->num_rows === 1) {
        $adminUser = $query->fetch_assoc();
        
        $surname = $adminUser['surname'];
        $othername = $adminUser['othername'];
        $email = $adminUser['email'];
        $gender = $adminUser['gender'];
        $position = $adminUser['position'];
        $address = $adminUser['address'];
    } else {
        $surname = "adminUser";
        $othername = "adminUser";
        $email = "adminUser";
        $gender = "adminUser";
        $position = "adminUser";
        $address = "adminUser";
    }

    // CODE FOR PROFILE PICTURE
    $adminUserId = $_SESSION["adminuser_id"];
    $sql = "SELECT profile_picture FROM adminauthusers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $adminUserId);
    $stmt->execute();
    $stmt->bind_result($profilePic);
    $stmt->fetch();
    $stmt->close(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/userManagementContent.css">
    <!-- <link rel="stylesheet" href="styles/profile.css"> -->
    <style>
        body{
            width: 100%;
            position: relative;
        }
        .header{
            width: 100%;
            position: sticky;
            top: 0;
            left: 0;
            z-index: 999;
        }
        .body-content{
            width: 100%;
            display: flex;
            align-items: start;
            justify-content: space-between;
            gap: 30px;
        }
        .sidebar-container{
            width: 30%;
            position: sticky;
            left: 0;
            top: 68px;
        }
        .listing-content-container{
            width: 100%;
        }
        .responsive-sidebar-bar{
            display: none;
        }
        @media screen and (max-width: 767px) {
            .responsive-sidebar-bar{
                display: block;
                background-color: whitesmoke;
                max-width: 50px;
                width: 100%;
                position: sticky;
                top: 66px;
            }
            .sidebar-container{
                max-width: 280px;
                width: 100%;
                height: 89%;
                position: fixed;
                top: 58px;
                left: -1200px;
                transition: 0.3s ease-in-out;
            }
            .sidebar-container.active{
                left:0;
            }
        }

        @media screen and (min-width: 768px) and (max-width: 1023px) {
            .responsive-sidebar-bar{
                display: block;
                background-color: whitesmoke;
                max-width: 50px;
                width: 100%;
                position: sticky;
                top: 66px;
            }
            .sidebar-container{
                max-width: 280px;
                width: 100%;
                height: 89%;
                position: fixed;
                top: 60px;
                left: -1200px;
                transition: 0.3s ease-in-out;
            }
            .sidebar-container.active{
                left:0;
            }
        }

    </style>
</head>

   
<body>
    <div class="header">
        <?php 
            include "../component/header.php";
        ?>
    </div>

    <div class="responsive-sidebar-bar">
        <img src="/real-estate-website/assest/open-nav.png"  class="open-nav"  width="40" alt="open-nav.png">
    </div>

    <div class="body-content">
        <div class="sidebar-container">
            <?php 
                 include "../component/sidebar.php";
            ?>
        </div>
        <div class="listing-content-container">
              <?php 
                 include "../component/userMangementContent.php";
            ?>
        </div>
        <!-- WELCOME TO MY New Listing dashboard -->
    </div>
</body>
</html>

<script>
    document.querySelector('.responsive-sidebar-bar').addEventListener('click',()=>{
        document.querySelector('.sidebar-container').classList.add('active');
    })
    document.querySelector('.close-nav').addEventListener('click',()=>{
        document.querySelector('.sidebar-container').classList.remove('active');
    })
</script>