<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="container">
    <div class="close-nav-container">
        <img src="/real-estate-website/assest/close.png" class="close-nav" width="50" alt="">
    </div>
    <aside>
        <nav>
            <ul>
                <li>
                    <a href="/real-estate-website/admin-folder/admin-dashboard.php" class="<?= $currentPage == 'admin-dashboard.php' ? 'active' : '' ?>"><i class="fas fa-chart-pie"></i> Dashboard</a>
                </li>
                <li>
                    <a href="/real-estate-website/admin-folder/pages/newListing.php" class="<?= $currentPage == 'newListing.php' ? 'active' : '' ?>"><i class="fas fa-list"></i> Listing Management</a>
                </li>
                <li>
                    <a href="/real-estate-website/admin-folder/pages/userManagement.php" class="<?= $currentPage == 'userManagement.php' ? 'active' : '' ?>"><i class="fas fa-users"></i> Agent Management</a>
                </li>
                <li>
                    <a href="/real-estate-website/admin-folder/pages/leadManagement.php" class="<?= $currentPage == 'leadManagement.php' ? 'active' : '' ?>"><i class="fas fa-address-card"></i> Lead Management</a>
                </li>
                <li>
                    <a href="/real-estate-website/admin-folder/pages/blogsManagement.php" class="<?= $currentPage == 'blogsManagement.php' ? 'active' : '' ?>"><i class="fas fa-file-alt"></i> Content Management</a>
                </li>
                <li>
                    <a href="/real-estate-website/admin-folder/pages/configurationManagement.php" class="<?= $currentPage == 'configurationManagement.php' ? 'active' : '' ?>"><i class="fas fa-cogs"></i> Configuration</a>
                </li>
                <li>
                    <a href="/real-estate-website/admin-folder/pages/logout.php" class="logout-btn" style="color: whitesmoke; "><i class="fas fa-sign-out-alt"></i> Logout</a>
                 </li>
            </ul>
        </nav>
    </aside>
    <hr>
    <footer>
        <p>&copy;2025 LOGO DASHBOARD - All Right Reserved</p>
    </footer>
</div>
