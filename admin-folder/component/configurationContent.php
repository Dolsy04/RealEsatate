<section>
    <div class="response-container-section" id="responseBox" style="display: <?= empty($signInError) ? 'none' : 'flex' ?>;">
    <img src="/real-estate-website/assest/close.png" width="30" class="close-response" alt="">
    <div class="response-container">
        <?php if (!empty($signInError)): ?>
            <p class="response"><?= htmlspecialchars($signInError) ?></p>
            <?php endif; ?>
        </div>
    </div>
            
    <div class="upload-image-container">
        <div class="inner-upload-image">
            <h3>Upload Profile Picture</h3>
            <img src="/real-estate-website/assest/close.png" width="50" class="close-banner" alt="close">
            <div class="preview-image-input">
                <div class="preview-image">
                    <img id="preview" src="" width="100" alt="Profile Preview" style="display: none;">
                </div>

                <div class="picture-input-container">
                    <form action="uploadProfile.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <label for="profilePicture">Select a Picture:</label>
                            <input type="file" name="profilePicture" id="profilePicture" accept="image/*" required>
                        </div>
                        <br>
                        <input type="submit" value="Upload" name="uploadprofile">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-user-profile">
        <div class="admin-user-profile-contaainer">
            <img src="/real-estate-website/assest/close.png" width="50" class="closeProfile" alt="">
            <div class="admin-image-name-email">
                <div class="admin-image">
                    <img src="<?= $profilePic ? '/real-estate-website/admin-folder/uploads/profile_pictures/' . $profilePic : '' ?>" width="100" alt="">
                </div>
                <div class="admin-name-email">
                    <h3>Welcome, <?= htmlspecialchars($surname) ?> <?= htmlspecialchars($othername) ?></h3>

                    <p> <?= htmlspecialchars($email)?></p>
                    <button class="openUploadBanner">Upload Image</button>
                </div>
            </div>
            <div class="admin-gender">
                <!-- <p>Gender</p> -->
                <p> <?= htmlspecialchars($gender)?></p>
            </div>
            <div class="admin-postion">
                    <!-- <p>Position</p> -->
                    <p> <?= htmlspecialchars($position)?></p>
            </div>
            <div class="admin-address">
                    <!-- <p>Home Address</p> -->
                    <p> <?= htmlspecialchars(string: $address)?></p>
            </div>
        </div>
    </div>

    <div class="header-title">
        <div class="logo">
            <h2><i class="fas fa-cogs"></i> Configuration</h2>
            <p>Add admin users and view users </p>
        </div>
    </div>

    <div class="add-admin-user-section">
        <div class="add-admin-user-container">
            <div class="add-admin-user-card">
                <img src="/real-estate-website/assest/users.png"  width="150"alt="">
                <div class="add-user-btn">
                    <button onclick="openadduserSection()">Add User</button>
                </div>
            </div>
        </div>
    </div>

    <div class="add-user-section">
        <div class="section-container">
            <img src="/real-estate-website/assest/close.png" width="40" class="closeAddUser" onclick="closeadduserSection()" alt="">
            <div class="title-text">
                <h3>Register Admin</h3>
            </div>
            <form action="/real-estate-website/admin-folder/admin-signup-auth.php" method="post">
                <p>PERSONAL INFO</p>

                <div>
                    <label>surname:</label>
                    <input type="text" placeholder="Insert your surname" name="surname">
                </div>
                <div>
                    <label>Othername:</label>
                    <input type="text" placeholder="Insert your othername" name="othername">
                </div>
                <div>
                    <label>Email:</label>
                    <input type="Email" placeholder="Insert your Email" name="email">
                </div>
                <div>
                    <label>Gender:</label>
                    <input type="text" placeholder="Insert your Gender" name="gender">
                </div>
                <div>
                    <label>Position:</label>
                    <input type="text" placeholder="What is your Position in the Company" name="position">
                </div>
                <div>
                    <label>Home Address:</label>
                    <input type="text" placeholder="Insert your Home Address" name="address">
                </div>
                <div>
                    <label>Password:</label>
                    <input type="Password" placeholder="Insert your Password" name="password">
                </div>

                <div class="signUp-btn">
                    <input type="submit" value="Register" name="register">
                </div>
            </form>
           
        </div>
    </div>
</section>

<script>

    document.querySelector('.closeProfile').addEventListener('click',()=>{
        document.querySelector('.admin-user-profile').classList.remove('active')
    })
  // ===========for uploading profile==============
    function showUploadProfileBanner(){
        document.querySelector('.upload-image-container').classList.add('active')
    }
    function hideUploadProfileBanner(){
        document.querySelector('.upload-image-container').classList.remove('active')
    }
    document.querySelector('.openUploadBanner').addEventListener('click', showUploadProfileBanner);
    document.querySelector('.close-banner').addEventListener('click', hideUploadProfileBanner);
    //------------ previwe profile picture-----

    function uploadprofile(){
        const profileInput = document.getElementById('profilePicture');
        const previewImg = document.getElementById('preview');

        profileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                previewImg.src = URL.createObjectURL(file);
                previewImg.style.display = 'block';
            }
        });
    }
    uploadprofile();


    document.querySelector('.close-response').addEventListener('click', () => {
        document.getElementById('responseBox').style.display = 'none';
    });
    setTimeout(()=>{
        document.getElementById('responseBox').style.display = 'none';
    },10000)

    function openadduserSection(){
        document.querySelector('.add-user-section').classList.add('active')
    }
    function closeadduserSection(){
        document.querySelector('.add-user-section').classList.remove('active')
    }
</script>