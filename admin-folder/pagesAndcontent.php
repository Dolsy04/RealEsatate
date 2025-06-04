<?php 
session_start();
include "admin-config.php";
// _____________________APARTMENT ________CODE________________
if (isset($_POST['addApartment'])) {

    $apartmentName = trim($_POST['apartmentName']);
    $apartmentLocation = trim($_POST['apartmentlocation']);
    $apartmentroom = trim($_POST['apartmentroom']);
    $apartmentBathrooms = trim($_POST['apartmentBath']);
    $apartmentSqft = trim($_POST['apartmentSqft']);
    $apartmentAmount = trim($_POST['apartmentAmount']);
    $apartmentDtails = trim($_POST['apartmentDtails']);


    $imagePath = "";
    if (isset($_FILES['apartmentImage']) && $_FILES['apartmentImage']['error'] == 0) {
        $targetDir = "../ListingImages/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // create folder if not exist
        }

        $fileName = time() . "_" . basename($_FILES["apartmentImage"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["apartmentImage"]["tmp_name"], $targetFile)) {
            $imagePath = $fileName; // instead of $targetFile

        } else {
            $_SESSION['listingMessage'] = 'Failed to upload image';
            header("Location: /real-estate-website/admin-folder/pages/newListing.php");
            exit();
        }
    } else {
        $_SESSION['listingMessage'] = 'No image selected';
        header("Location: /real-estate-website/admin-folder/pages/newListing.php");
        exit();
    }

    // ✅ Check for empty fields
    if (
        empty($apartmentName) || empty($apartmentLocation) || empty($apartmentBathrooms) ||
        empty($apartmentSqft) || empty($apartmentroom) || empty($apartmentAmount) || empty($apartmentDtails)
    ) {
        $_SESSION['listingMessage'] = 'All fields are required';
        header("Location: /real-estate-website/admin-folder/pages/newListing.php");
        exit();
    }

    // ✅ Use prepared statement
    $stmt = $conn->prepare("INSERT INTO listingdb 
        (apartmentname, apartmentlocation, apartmentbedroom, apartmentbathroom, apartmentsqurefeet, apartmentamount, apartmentdetails,  apartmentimage) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        $_SESSION["listingMessage"] = "Prepare failed: " . $conn->error;
        header("Location: /real-estate-website/admin-folder/pages/newListing.php");
        exit();
    }

    $stmt->bind_param("ssssssss", $apartmentName, $apartmentLocation, $apartmentroom, $apartmentBathrooms, $apartmentSqft, $apartmentAmount, $apartmentDtails, $imagePath);

    if ($stmt->execute()) {
        $_SESSION["listingMessage"] = "Listing Added Successfully!";
        header("Location: /real-estate-website/admin-folder/pages/newListing.php");
        exit();
    } else {
        $_SESSION["listingMessage"] = "Error adding Listing: " . $stmt->error;
        header("Location: /real-estate-website/admin-folder/pages/newListing.php");
        exit();
    }
}

// -------------Retiving listing data from database---------------------//

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch']) && $_GET['fetch'] === 'listings') {
    // Return listings
    $getListing = "SELECT * FROM listingdb ORDER BY id DESC";
    $queryListing = $conn->query($getListing);

    if ($queryListing) {
        $listing = $queryListing->fetch_all(MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($listing);
    } else {
        echo json_encode(["error" => "Failed to fetch listings"]);
    }
    exit();
}



if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch']) && $_GET['fetch'] === 'listing_paginated') {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 9;
    $offset = ($page - 1) * $perPage;

    $getListing = "SELECT * FROM listingdb LIMIT $perPage OFFSET $offset";
    $queryListing = $conn->query($getListing);

    $totalListingResult = $conn->query("SELECT COUNT(*) AS total FROM listingdb");
    $totalRow = $totalListingResult->fetch_assoc();
    $total = $totalRow['total'];

    if ($queryListing) {
        $listingData = $queryListing->fetch_all(MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode([
            'listing' => $listingData,
            'total' => $total,
            'page' => $page,
            'perPage' => $perPage
        ]);
    } else {
        echo json_encode(['error' => 'Failed to fetch Properties']);
    }
    exit();
}

// ----------------Editing-------or-----------Updating Listing-------------------

if (isset($_POST['updateApartment'])) {
    $id = $_POST['updateapartmentId'];

    $apartmentName = trim($_POST['updateapartmentName']);
    $apartmentLocation = trim($_POST['updateapartmentlocation']);
    $apartmentroom = trim($_POST['updateapartmentroom']);
    $apartmentBathrooms = trim($_POST['updateapartmentBath']);
    $apartmentSqft = trim($_POST['updateapartmentSqft']);
    $apartmentAmount = trim($_POST['updateapartmentAmount']);
    $apartmentDtails = trim($_POST['updateapartmentDtails']);

    // Check if a new image was uploaded
    if (isset($_FILES['updateapartmentImage']) && $_FILES['updateapartmentImage']['error'] === 0) {
        $targetDir = "../ListingImages/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES["updateapartmentImage"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["updateapartmentImage"]["tmp_name"], $targetFile)) {
            $imagePath = $fileName;
        } else {
            $_SESSION['editListingMessage'] = 'Failed to upload new image.';
            header("Location: /real-estate-website/admin-folder/pages/newListing.php");
            exit();
        }
    } else {
        // Get existing image from DB
        $imageQuery = $conn->prepare("SELECT apartmentimage FROM listingdb WHERE id = ?");
        $imageQuery->bind_param("i", $id);
        $imageQuery->execute();
        $imageResult = $imageQuery->get_result();
        $row = $imageResult->fetch_assoc();
        $imagePath = $row['apartmentimage'];
    }

    // Update listing
    $stmt = $conn->prepare("UPDATE listingdb SET 
        apartmentname = ?, apartmentlocation = ?, apartmentbedroom = ?, 
        apartmentbathroom = ?, apartmentsqurefeet = ?, apartmentamount = ?, 
        apartmentdetails = ?, apartmentimage = ? WHERE id = ?");

    if (!$stmt) {
        $_SESSION["listingMessage"] = "Prepare failed: " . $conn->error;
        header("Location: /real-estate-website/admin-folder/pages/newListing.php");
        exit();
    }

    $stmt->bind_param("ssssssssi", $apartmentName, $apartmentLocation, $apartmentroom,
        $apartmentBathrooms, $apartmentSqft, $apartmentAmount, $apartmentDtails,
        $imagePath, $id);

    if ($stmt->execute()) {
        $_SESSION["listingMessage"] = "Listing updated successfully!";
    } else {
        $_SESSION["listingMessage"] = "Update error: " . $stmt->error;
    }

    header("Location: /real-estate-website/admin-folder/pages/newListing.php");
    exit();
}



// -----------------Delete Listing-------------------
if (isset($_POST['deleteApartment']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // ✅ Get current image filename to delete it from server too
    $imageQuery = $conn->prepare("SELECT apartmentimage FROM listingdb WHERE id = ?");
    $imageQuery->bind_param("i", $id);
    $imageQuery->execute();
    $imageResult = $imageQuery->get_result();

    if ($imageResult->num_rows > 0) {
        $row = $imageResult->fetch_assoc();
        $imageFile = $row['apartmentimage'];
        $imagePath = "../ListingImages/" . $imageFile;

        // Delete from database
        $stmt = $conn->prepare("DELETE FROM listingdb WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $_SESSION['listingMessage'] = 'Listing Deleted Successfully';
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to delete from database.']);
        }


        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Listing not found.']);
    }

    $imageQuery->close();
    $conn->close();
    exit();
}

// ________________AGENT____________CODE_____________________

// --------------------------All AGENT SHOWING ------------------------

if(isset($_POST['addagent'])){
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $phonenumber = trim($_POST['phonenumber']);
    $gender = trim($_POST['gender']);
    $address = trim($_POST['address']);


    if(empty($fullname) || empty($email) || empty($phonenumber) || empty($gender) || empty($address)){
        $_SESSION["listingMessage"] = 'All field are required';
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO agentdb (fullname, email, phonenumber, gender, address) VALUES(?,?,?,?,?)");

    if($stmt === false){
         $_SESSION["listingMessage"] = "Prepare failed: " . $conn->error;
        header("Location: /real-estate-website/admin-folder/pages/userManagementContent.php");
        exit();
    }

    $stmt->bind_param("sssss", $fullname, $email, $phonenumber, $gender, $address);

    if($stmt->execute()){
        $_SESSION["listingMessage"] = "Agent Added Successfully!";
        header("Location: /real-estate-website/admin-folder/pages/userManagement.php");
        exit();
    }else{
        $_SESSION["listingMessage"] = "Error adding Agent: " . $stmt->error;
        header("Location: /real-estate-website/admin-folder/pages/userManagement.php");
        exit();
    }
}

// ---------------RETRIVE AGENT DATA-------------   
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch']) && $_GET['fetch'] === 'agents') {
    $getAgent = "SELECT * FROM agentdb";
        $queryagent = $conn->query($getAgent);

        if($queryagent){
            $agentData = $queryagent ->fetch_all(MYSQLI_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($agentData);
        }else{
            echo json_encode(["error" => "Failed to fetch Agent Datas"]);
        }
    exit();
}



// ------------------Updating AGENT DATA ------------------

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateaddagent'])) {
    $updateAgentid = isset($_POST['updateagentId']) ? intval($_POST['updateagentId']) : 0;
    $updatefullname = trim($_POST['updatefullname'] ?? '');
    $updateemail = trim($_POST['updateemail'] ?? '');
    $updatephonenumber = trim($_POST['updatephonenumber'] ?? '');
    $updategender = trim($_POST['updategender'] ?? '');
    $updateaddress = trim($_POST['updateaddress'] ?? '');

    // Basic validation
    if (empty($updateAgentid) || empty($updatefullname) || empty($updateemail) || empty($updatephonenumber) || empty($updategender) || empty($updateaddress)) {
        $_SESSION["listingMessage"] = 'All fields are required.';
        header("Location: /real-estate-website/admin-folder/pages/userManagement.php");
        exit();
    }

    // Email format check
    if (!filter_var($updateemail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["listingMessage"] = 'Invalid email address.';
        header("Location: /real-estate-website/admin-folder/pages/userManagement.php");
        exit();
    }

    $stmt = $conn->prepare("UPDATE agentdb SET fullname = ?, email = ?, phonenumber = ?, gender = ?, address = ? WHERE id = ?");
    
    if (!$stmt) {
        $_SESSION["listingMessage"] = "Database error: " . $conn->error;
        header("Location: /real-estate-website/admin-folder/pages/userManagement.php");
        exit();
    }

    $stmt->bind_param("sssssi", $updatefullname, $updateemail, $updatephonenumber, $updategender, $updateaddress, $updateAgentid);

    if ($stmt->execute()) {
        $_SESSION["listingMessage"] = "Agent updated successfully!";
    } else {
        $_SESSION["listingMessage"] = "Update failed: " . $stmt->error;
    }

    $stmt->close();
    header("Location: /real-estate-website/admin-folder/pages/userManagement.php");
    exit();
}


// --------deleting agent -------------

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteagentId'])) {

    $agentId = intval($_POST['deleteagentId']);

    $stmt = $conn->prepare("DELETE FROM agentdb WHERE id = ?");
if ($stmt) {
    $stmt->bind_param("i", $agentId);
    $stmt->execute();
    $_SESSION['listingMessage'] = 'Listing Deleted Successfully';
    $stmt->close();
    echo json_encode(["status" => "success"]);

} else {
    echo json_encode([
        "status" => "error",
        "message" => "Prepare failed: " . $conn->error
    ]);
}

}

// ___________________________MESSAGES ______________CODE_____________

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch']) && $_GET['fetch']==='messages'){
    $getMessages = "SELECT * FROM messagesdb ORDER BY date DESC, time DESC";
    $queryMessage = $conn->query($getMessages);

    if($queryMessage){
            $messageData = $queryMessage ->fetch_all(MYSQLI_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($messageData);
        }else{
            echo json_encode(["error" => "Failed to fetch Messages From database"]);
        }
    exit();
}

if (isset($_POST['markAsRead']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("UPDATE messagesdb SET status='Read' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    echo json_encode(['success' => $success]);
    exit();
}

if (isset($_POST['deleteMessage']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM messagesdb WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    echo json_encode(['success' => $success]);
    exit();
}


// ----------newsletter------------

if(isset($_POST['newsletterBtn'])){
    $emailSubcriber = trim($_POST['newsletterInput']);

    if(empty($emailSubcriber)){
         $_SESSION['newsletterMessage'] = 'Input your email';
        exit(); 
    }
    
    $stmt = $conn->prepare("INSERT INTO newsletterdb (newsletteremail) VALUES (?)");

    if($stmt === false){
         $_SESSION['newsletterMessage'] = 'Failed to Prepared. Relaod and try Again';
        header("Location: /real-estate-website/index.html");
        exit(); 
    }

    $stmt->bind_param("s", $emailSubcriber);

    if($stmt->execute()){
        $_SESSION['newsletterMessage'] = 'Email Sent Successfully';
        header("Location: /real-estate-website/index.html");
        exit();
    }else{
        $_SESSION['newsletterMessage'] = 'Error Sending Email. Try Again'. $stmt->error;
         header("Location: /real-estate-website/index.html");
        exit();
    }
}

// ----------retrive newsletter----------

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch']) && $_GET['fetch']==='newsletters'){
    $getSubcriberMail = "SELECT * FROM newsletterdb ORDER BY id DESC";
    $querySubcriberMail = $conn->query($getSubcriberMail);

    if($querySubcriberMail){
        $subcribersMail = $querySubcriberMail-> fetch_all(mode: MYSQLI_ASSOC);
        header('Content-Type: application/json');
            echo json_encode($subcribersMail);
        }else{
            echo json_encode(["error" => "Failed to fetch subcriber's Mails From database"]);
        }
    exit();
}


// ----------blogs Codes---------

if(isset($_POST['addblog'])){
    $blogHeading = trim($_POST['blogHeading']);
    $blogDate = trim($_POST['blogDate']);
    $blogDtails = trim($_POST['blogDtails']);


    $blogimagePath = "";
    if (isset($_FILES['blogImage']) && $_FILES['blogImage']['error'] == 0) {
        $targetDir = "../BlogsImages/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // create folder if not exist
        }

        $blogfileName = "_" . basename($_FILES["blogImage"]["name"]);
        $targetFile = $targetDir . $blogfileName;

        if (move_uploaded_file($_FILES["blogImage"]["tmp_name"], $targetFile)) {
            $blogimagePath = $blogfileName; // instead of $targetFile

        } else {
            $_SESSION['blogsError'] = 'Failed to upload image';
            header("Location: /real-estate-website/admin-folder/pages/blogsManagement.php");
            exit();
        }
    } else {
        $_SESSION['blogsError'] = 'No image selected';
        header("Location: /real-estate-website/admin-folder/pages/blogsManagement.php");
        exit();
    }

    if(empty($blogHeading) || empty($blogDate) || empty($blogDtails)){
        $_SESSION['blogsError']= 'All Field are Requried';
         header("Location: /real-estate-website/admin-folder/pages/blogsManagement.php");
        exit();
    }


    $stmt = $conn->prepare("INSERT INTO blogdb  (blogheading, blogdate, blogdetail, blogimage) 
        VALUES (?, ?, ?, ?)");

    if($stmt === false){
        $_SESSION['blogsError']= 'Failed preparing Database'. $conn->error;;
        header("Location: /real-estate-website/admin-folder/pages/blogsManagement.php");
        exit();
    }

    $stmt->bind_param("ssss", $blogHeading, $blogDate, $blogDtails, $blogimagePath);

    if ($stmt->execute()) {
        $_SESSION["blogsError"] = "Blog Added Successfully!";
        header("Location: /real-estate-website/admin-folder/pages/blogsManagement.php");
        exit();
    } else {
        $_SESSION["listingMessage"] = "Error adding Blog: " . $stmt->error;
        header("Location: /real-estate-website/admin-folder/pages/blogsManagement.php");
        exit();
    }
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch']) && $_GET['fetch'] === 'blogs'){
    $getBlogs = 'SELECT * FROM blogdb ORDER BY id DESC';
    $queryBlogs = $conn->query($getBlogs);

    if($queryBlogs){
        $blogs = $queryBlogs->fetch_all(MYSQLI_ASSOC);
        header('Content-Type: application/json');
            echo json_encode($blogs);
    }else{
        echo json_encode(["error" => "Failed to fetch blogs from database"]);
    }
    exit();
}


// =-------------------for client seeing side--------

// CLIENT SIDE - paginated blogs

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetch']) && $_GET['fetch'] === 'blogs_paginated') {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 9;
    $offset = ($page - 1) * $perPage;

    $getBlogs = "SELECT * FROM blogdb LIMIT $perPage OFFSET $offset";
    $queryBlogs = $conn->query($getBlogs);

    $totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM blogdb");
    $totalRow = $totalBlogsResult->fetch_assoc();
    $total = $totalRow['total'];

    if ($queryBlogs) {
        $blogData = $queryBlogs->fetch_all(MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode([
            'blogs' => $blogData,
            'total' => $total,
            'page' => $page,
            'perPage' => $perPage
        ]);
    } else {
        echo json_encode(['error' => 'Failed to fetch blogs']);
    }
    exit();
}




if(isset($_POST['editingBlogBtn'])){
    $id = intval($_POST['editblogId']);

    $editingblogHeading = trim($_POST['editblogHeading']);
    $editingblogDate = trim($_POST['editblogDate']);
    $editingblogDtails = trim($_POST['editblogDtails']);


    // Check if a new image was uploaded
    if (isset($_FILES['editblogImage']) && $_FILES['editblogImage']['error'] === 0) {
        $targetDir = "../BlogsImages/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $blogfileName = "_" . basename($_FILES["editblogImage"]["name"]);
        $targetFile = $targetDir . $blogfileName;

        if (move_uploaded_file($_FILES["editblogImage"]["tmp_name"], $targetFile)) {
            $blogimagePath = $blogfileName;
        } else {
            $_SESSION['listingMessage'] = 'Failed to upload new image.';
            header("Location: real-estate-website/admin-folder/pages/blogsManagement.php");
            exit();
        }
    } else {
        // Get existing image from DB
        $blogEditImageQuery = $conn->prepare("SELECT blogimage FROM blogdb WHERE id = ?");
        $blogEditImageQuery->bind_param("i", $id);
        $blogEditImageQuery->execute();
        $blogEditImageResult = $blogEditImageQuery->get_result();
        $row = $blogEditImageResult->fetch_assoc();
        $blogimagePath = $row['blogimage'];
    }

    $updateBlog = $conn->prepare("UPDATE blogdb SET blogheading = ?, blogdate = ?, blogdetail = ?, blogimage = ? WHERE id = ?");
        if ($updateBlog === false) {
            $_SESSION['listingMessage'] = 'Failed preparing update statement: ' . $conn->error;
            header("Location: /real-estate-website/admin-folder/pages/blogsManagement.php");
            exit();
        }

        $updateBlog->bind_param("ssssi", $editingblogHeading, $editingblogDate, $editingblogDtails, $blogimagePath, $id);

        if ($updateBlog->execute()) {
            $_SESSION['listingMessage'] = "Blog updated successfully!";
        } else {
            $_SESSION['listingMessage'] = "Failed to update blog: " . $updateBlog->error;
        }

    header("Location: /real-estate-website/admin-folder/pages/blogsManagement.php");
    exit();

}

if (isset($_POST['deleteBlog'])) {
    $id = intval($_POST['id']);

    // Fetch blog image
    $blogImageQuery = $conn->prepare("SELECT blogimage FROM blogdb WHERE id = ?");
    $blogImageQuery->bind_param("i", $id);
    $blogImageQuery->execute();
    $blogImageResult = $blogImageQuery->get_result();

    if ($blogImageResult->num_rows > 0) {
        $row = $blogImageResult->fetch_assoc();
        $blogImageFile = $row['blogimage'];
        $blogImagePath = "../BlogsImages/" . $blogImageFile;

        // Delete from DB
        $stmt = $conn->prepare("DELETE FROM blogdb WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if (file_exists($blogImagePath)) {
                unlink($blogImagePath);
            }
            $_SESSION['blogsError'] = 'Blogs Deleted Successfully';
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to delete blog from database.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Blog not found.']);
    }

    $blogImageQuery->close();
    $conn->close();
    exit();
}

?>
