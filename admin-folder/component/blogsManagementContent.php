<section>
    <div class="response-container-section" id="responseBox" style="display: <?= empty($blogError) ? 'none' : 'flex' ?>;">
    <img src="/real-estate-website/assest/close.png" width="30" class="close-response" alt="">
    <div class="response-container">
        <?php if (!empty($blogError)): ?>
            <p class="response"><?= htmlspecialchars($blogError) ?></p>
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
            <h2><i class="fas fa-file-alt"></i> Content Management</h2>
            <p>Add blogs and view blogs</p>
        </div>
        <div class="input-search-container">
            <input type="search" name="" id="" placeholder="search......">
            <button>Search</button>
        </div>
    </div>
    

    <div class="add-blogs-section">
        <div class="add-blogs-container">
            <img src="/real-estate-website/assest/close.png" width="50" class="closeAddBlogSection" onclick="closeAddBlogs()" alt="">
            <div class="add-blogs-head">
                <h3>Add New Blogs</h3>
            </div>
            <form action="/real-estate-website/admin-folder/pagesAndcontent.php" method="post" enctype="multipart/form-data">
                <div class="form-container">
                    <div>
                        <label for="blog-image">Blog Image:</label>
                        <input type="file" id="blog-image" name="blogImage" accept="image/*" required>
                    </div>

                    <div class="preview-image-conatiner">
                        <label>Image Preview:</label>
                        <div class="image-preview">
                            <img id="imagePreview" src="#" alt="Preview" style="display: none; ">
                        </div>
                    </div>

                    <div>
                        <label for="blogHeading">Blog Heading:</label>
                        <input type="text" id="blogHeading" name="blogHeading" placeholder="News of .....">
                    </div>
                    <div>
                        <label for="blogDate">Blog Date</label>
                        <input type="text" id="blogDate" name="blogDate" placeholder="12/12/2025">
                    </div>
                    <div>
                        <label for="blog-details">Blog Details</label>
                        <textarea rows="6" name="blogDtails" id="blog-details" placeholder="Details.."></textarea>
                    </div>
                    <div class="button-container">
                        <input type="submit" name="addblog" value="Publish Blog">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="display-blog-container">
        <div class="items-header">
            <div class="header-logo">
                <h2>Avaliable Blogs</h2>
            </div>
            <div class="blogs-header-btn">
                <button onclick="openViewAllSection()">View all Blogs</button>
                <button onclick="openAddBlogs()">Add New Blogs</button>
            </div>
        </div>
        <div class="display-blogs">
            <!-- blogs will be displayed here -->
        </div>
    </div>


    <div class="editing-add-blogs-section">
        <div class="editing-add-blogs-container">
            <img src="/real-estate-website/assest/close.png" width="50" class="editcloseAddBlogSection" onclick="closeEditBlogSection()" alt="">
            <div class="editing-add-blogs-head">
                <h3>Editing Blogs</h3>
            </div>
            <form action="/real-estate-website/admin-folder/pagesAndcontent.php" method="post" enctype="multipart/form-data">
                <div class="editing-form-container">
                    <div>
                        <label for="edit-blog-image">Blog Image:</label>
                        <input type="file" id="edit-blog-image" name="editblogImage" accept="image/*">
                    </div>

                    <div class="preview-image-conatiner">
                        <label> Old Image Preview:</label>
                        <div class="image-preview">
                            <img class="oldimagePreview" src="#" alt="Preview">
                        </div>
                    </div>

                    <div class="new-image-conatiner">
                        <label>New Image Preview:</label>
                        <div class="new-image-preview">
                            <img id="newimagePreview" src="#" alt="Preview" style="display: none; ">
                        </div>
                    </div>

                        <input type="hidden" id="editblogId" name="editblogId" value="">

                    <div>
                        <label for="edit-blog-Heading">Blog Heading:</label>
                        <input type="text" id="edit-blog-Heading" name="editblogHeading" placeholder="News of .....">
                    </div>
                    <div>
                        <label for="eidt-blog-Date">Blog Date</label>
                        <input type="text" id="eidt-blog-Date" name="editblogDate" placeholder="12/12/2025">
                    </div>
                    <div>
                        <label for="edit-blog-details">Blog Details</label>
                        <textarea rows="6" name="editblogDtails" id="edit-blog-details" placeholder="Details.."></textarea>
                    </div>
                    <div class="editing-button-container">
                        <input type="submit" name="editingBlogBtn" value="Publish Edited Blog">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="blog-details-section">
        <div class="blog-details-container">
             <img src="/real-estate-website/assest/close.png" width="50" class="closeDetailBlogSection" onclick="closeDetailSection()" alt="">
            <div class="blog-header-details">
                <h3>BLOG DETAILS</h3>
            </div>

            <div class="display-blog-details">
                <!-- blog-details wil be displayed here -->
            </div>
        </div>
    </div>

    <div class="deleteListing-section">
        <div class="delete-container">
            <h3>DELETING <span class="BlogName"></span>...</h3>

            <div class="confirmation-note">
                <p>Are you sure you want to delete this listing?</p>
            </div>
            <div class="cancel-delete-btn">
                <button id="confirmDeleteBtn" class="confirmDeleteBtn">Yes, I'm Sure</button>
                <button onclick="hideDeleteConfirmation()">No, I'm Not</button>
            </div>
        </div>
    </div>

    <div class="view-all-blog">
        <div class="view-all-blog-container">
            <img src="/real-estate-website/assest/close.png" width="40" onclick="closeViewAllSection()" class="closeViewAllBlog" alt="">
            <div class="view-all-blog-header">
                 <div class="header-logo">
                    <h2>Avaliable Blogs</h2>
                </div>
                <div class="blogs-header-btn">
                    <p>Total Blogs: <span class="totalBlogs"></span></p>
                    <button class="viewAllAddBlog">Add New Blogs</button>
                </div>
            </div>
            <div class="show-all-blogs-container">
                <!-- blogs will be displayed here -->
            </div>
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



// ----------code for showing response --------------
    document.querySelector('.close-response').addEventListener('click', () => {
        document.getElementById('responseBox').style.display = 'none';
    });
    setTimeout(()=>{
        document.getElementById('responseBox').style.display = 'none';
    },10000)

//----------- CODE FOR SHOWING PREVIEW IMAGE-------------
    document.getElementById("blog-image").addEventListener("change", function () {
        const file = this.files[0];
        const preview = document.getElementById("imagePreview");
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block";
        }
    });
    document.getElementById("edit-blog-image").addEventListener("change", function () {
        const file = this.files[0];
        const preview = document.getElementById("newimagePreview");
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block";
        }
    });


// ------------functions

function openAddBlogs(){
    document.querySelector('.add-blogs-section').classList.add('active');
}
function closeAddBlogs(){
    document.querySelector('.add-blogs-section').classList.remove('active');
    location.reload();
}

function openEditBlogSection(){
    document.querySelector('.editing-add-blogs-section').classList.add('active');
}
function closeEditBlogSection(){
    document.querySelector('.editing-add-blogs-section').classList.remove('active');
    location.reload();
}

function openDetailSection(){
    document.querySelector('.blog-details-section').classList.add('active');
}
function closeDetailSection(){
    document.querySelector('.blog-details-section').classList.remove('active');
    location.reload();
}

function openDeleteConfirmation(){
    const deleteSection = document.querySelector('.deleteListing-section')
    deleteSection.classList.add('active')
}
function hideDeleteConfirmation(){
    const deleteSection = document.querySelector('.deleteListing-section')
    deleteSection.classList.remove('active')
}

function openViewAllSection(){
    document.querySelector('.view-all-blog').classList.add('active')
}
function closeViewAllSection(){
    document.querySelector('.view-all-blog').classList.remove('active')
    location.reload();
}

document.querySelector('.viewAllAddBlog').addEventListener('click',()=>{
     document.querySelector('.view-all-blog').classList.remove('active');
     openAddBlogs();
})
let BlogToDeleteId = null;
let BlogToDeleteElement = null;
fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=blogs')
.then(response=>response.json())
.then(data => {
    const displayBlogs = document.querySelector('.display-blogs');
    displayBlogs.innerHTML = '';

    const displayALLBlogs = document.querySelector('.show-all-blogs-container');
    displayALLBlogs.innerHTML = '';

    const sliceData = data.slice(0,4)
    sliceData.forEach(blogs => {
        const sliceBlogDetails =  blogs.blogdetail.slice(0, 50) + '....';
        console.log(sliceBlogDetails);

        const createBlogs = document.createElement('div');
        createBlogs.classList.add('createBlogs');
        createBlogs.innerHTML = `
            <div class="blog-item">
                <div class="blog-image-container">
                    <img src="/real-estate-website/BlogsImages/${blogs.blogimage}" width="100" alt="${blogs.blogheading}" />
                </div>
                <div class="blogs-body-container">
                    <h3 class="blog-heading">${blogs.blogheading}</h3>
                    <p class="blog-sliced-detail">${sliceBlogDetails} <button class="readmoreBtn">read more</button></p>
                    <p class="blog-date">${blogs.blogdate}</p>
                </div>
                <hr>
                <div class="blog-control-btns">
                    <button class="detailsBtn">Details</button>
                    <button class="edit-blog-btn">Edit</button>
                    <button name="deleteBlog">Delete</button>
                </div>
            </div>
        `;
        displayBlogs.appendChild(createBlogs);

        const detailsBtn = createBlogs.querySelector('.detailsBtn');
        detailsBtn.addEventListener('click', ()=> showBlogsDetails(blogs));

        const readmoreBtn = createBlogs.querySelector('.readmoreBtn');
        readmoreBtn.addEventListener('click', ()=> showBlogsDetails(blogs));

        const editBtn = createBlogs.querySelector('.edit-blog-btn');
        editBtn.addEventListener('click',()=>{
            openEditBlogSection();
            hideDeleteConfirmation();
            document.querySelector('.add-blogs-section').classList.remove('active');
            document.querySelector('.blog-details-section').classList.remove('active');
             document.querySelector('.view-all-blog').classList.remove('active');

            document.getElementById('edit-blog-Heading').value = blogs.blogheading;
            document.getElementById('eidt-blog-Date').value = blogs.blogdate;
            document.getElementById('edit-blog-details').value = blogs.blogdetail;
            document.getElementById('editblogId').value = blogs.id;

            const previewImage = document.querySelector('.oldimagePreview');
            previewImage.src = `/real-estate-website/BlogsImages/${blogs.blogimage}`;
            previewImage.style.display = 'block';

        })

        const deleteBtn = createBlogs.querySelector('button[name="deleteBlog"]');
        deleteBtn.addEventListener('click', () => {
            BlogToDeleteId = blogs.id; // Store current ID
            BlogToDeleteElement = createBlogs;

            // ✅ Update the name in the modal
            const nameSpan = document.querySelector('.BlogName');
            if (nameSpan) {
                nameSpan.textContent = `"${blogs.blogheading}"`;
                nameSpan.style.textTransform = 'uppercase';
                nameSpan.style.fontWeight = 'bold';
            }

            openDeleteConfirmation(); // Show confirmation modal

            document.querySelector('.editing-add-blogs-section').classList.remove('active');
            document.querySelector('.add-blogs-section').classList.remove('active');
            document.querySelector('.blog-details-section').classList.remove('active');
            document.querySelector('.view-all-blog').classList.remove('active')
        });
    });


    // __________________FOR SHOWING ALL BLOGS WITH THERE FUNCTIONS (WORKINGS WITH EACH BUTTONS)_________
    
    const dataLength = data.length;
    document.querySelector('.totalBlogs').textContent = dataLength;

    data.forEach(blogs => {
        const sliceBlogDetails =  blogs.blogdetail.slice(0, 50) + '....';
        console.log(sliceBlogDetails);

        const createBlogsForAll = document.createElement('div');
        createBlogsForAll.classList.add('createBlogsForAll');
        createBlogsForAll.innerHTML = `
            <div class="blog-item">
                <div class="blog-image-container">
                    <img src="/real-estate-website/BlogsImages/${blogs.blogimage}" width="100" alt="${blogs.blogheading}" />
                </div>
                <div class="blogs-body-container">
                    <h3 class="blog-heading">${blogs.blogheading}</h3>
                    <p class="blog-sliced-detail">${sliceBlogDetails} <button class="readmoreBtn">read more</button></p>
                    <p class="blog-date">${blogs.blogdate}</p>
                </div>
                <hr>
                <div class="blog-control-btns">
                    <button class="detailsBtn">Details</button>
                    <button class="edit-blog-btn">Edit</button>
                    <button name="deleteBlog">Delete</button>
                </div>
            </div>
        `;
        displayALLBlogs.appendChild(createBlogsForAll);

        const detailsBtn = createBlogsForAll.querySelector('.detailsBtn');
        detailsBtn.addEventListener('click', ()=> showBlogsDetails(blogs));

        const readmoreBtn = createBlogsForAll.querySelector('.readmoreBtn');
        readmoreBtn.addEventListener('click', ()=> showBlogsDetails(blogs));

        const editBtn = createBlogsForAll.querySelector('.edit-blog-btn');
        editBtn.addEventListener('click',()=>{
            openEditBlogSection();
            hideDeleteConfirmation();
            document.querySelector('.add-blogs-section').classList.remove('active');
            document.querySelector('.blog-details-section').classList.remove('active');
             document.querySelector('.view-all-blog').classList.remove('active');

            document.getElementById('edit-blog-Heading').value = blogs.blogheading;
            document.getElementById('eidt-blog-Date').value = blogs.blogdate;
            document.getElementById('edit-blog-details').value = blogs.blogdetail;
            document.getElementById('editblogId').value = blogs.id;

            const previewImage = document.querySelector('.oldimagePreview');
            previewImage.src = `/real-estate-website/BlogsImages/${blogs.blogimage}`;
            previewImage.style.display = 'block';

        })

        const deleteBtn = createBlogsForAll.querySelector('button[name="deleteBlog"]');
        deleteBtn.addEventListener('click', () => {
            BlogToDeleteId = blogs.id; // Store current ID
            BlogToDeleteElement = createBlogsForAll;

            // ✅ Update the name in the modal
            const nameSpan = document.querySelector('.BlogName');
            if (nameSpan) {
                nameSpan.textContent = `"${blogs.blogheading}"`;
                nameSpan.style.textTransform = 'uppercase';
                nameSpan.style.fontWeight = 'bold';
            }

            openDeleteConfirmation(); // Show confirmation modal

            document.querySelector('.editing-add-blogs-section').classList.remove('active');
            document.querySelector('.add-blogs-section').classList.remove('active');
            document.querySelector('.blog-details-section').classList.remove('active');
            document.querySelector('.view-all-blog').classList.remove('active');
        });
    });
})

let DetailBlogToDeleteId = null;
let DetailBlogToDeleteElement = null;

function showBlogsDetails(blogs){
    openDetailSection();
    document.querySelector('.view-all-blog').classList.remove('active');
    document.querySelector('.add-blogs-section').classList.remove('active');
    document.querySelector('.editing-add-blogs-section').classList.remove('active');

    const displayAllBlogs = document.querySelector('.display-blog-details');
    displayAllBlogs.innerHTML = '';

        const createAllBlogs = document.createElement('div');
        createAllBlogs.classList.add('createAllBlogs');
        createAllBlogs.innerHTML = `
            <div class="detail-blog-item">
                <div class="detail-blog-image-container">
                    <img src="/real-estate-website/BlogsImages/${blogs.blogimage}" width="100" alt="${blogs.blogheading}"/>
                </div>
                <div class="detail-blogs-body-inner-container">
                    <div class="detail-blogs-body-container">
                        <p class="detail-blog-date">${blogs.blogdate}</p>
                        <div class="details-heading">
                            <span class="blog-heading-title">HEADING:</span>
                            <span class="detail-blog-heading">${blogs.blogheading}</span>
                        </div>
                        <p class="blog-sliced-detail">${blogs.blogdetail}</p>
                        
                    </div>
                    <div class="detail-blog-control-btns">
                    <button class="edit-blog-btn">Edit</button>
                    <button class="detailsBtn" onclick="closeDetailSection()">Cancel</button>
                        <button name="deleteBlog">Delete</button>
                    </div>
                </div>
            </div>
        `;
        displayAllBlogs.appendChild(createAllBlogs);


        const editBtn = createAllBlogs.querySelector('.edit-blog-btn');
        editBtn.addEventListener('click',()=>{
            openEditBlogSection();
            document.querySelector('.blog-details-section').classList.remove('active');

            document.getElementById('edit-blog-Heading').value = blogs.blogheading;
            document.getElementById('eidt-blog-Date').value = blogs.blogdate;
            document.getElementById('edit-blog-details').value = blogs.blogdetail;
            document.getElementById('editblogId').value = blogs.id;

            const previewImage = document.querySelector('.oldimagePreview');
            previewImage.src = `/real-estate-website/BlogsImages/${blogs.blogimage}`;
            previewImage.style.display = 'block';
        });

        const deleteBtn = createAllBlogs.querySelector('button[name="deleteBlog"]');
        deleteBtn.addEventListener('click', () => {
            DetailBlogToDeleteId = blogs.id; // Store current ID
            DetailBlogToDeleteElement = createAllBlogs;

            // ✅ Update the name in the modal
            const nameSpan = document.querySelector('.BlogName');
            if (nameSpan) {
                nameSpan.textContent = `"${blogs.blogheading}"`;
                nameSpan.style.textTransform = 'uppercase';
                nameSpan.style.fontWeight = 'bold';
            }

            openDeleteConfirmation(); // Show confirmation modal
        });

}


document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
    if (BlogToDeleteId !== null) {
        fetch('/real-estate-website/admin-folder/pagesAndcontent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `deleteBlog=1&id=${BlogToDeleteId}`
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                if (BlogToDeleteElement) {
                    BlogToDeleteElement.remove(); // Remove blog from DOM
                }
                hideDeleteConfirmation();
            } else {
                alert(result.error || "Failed to delete listing.");
            }
        })
        .catch(err => {
            console.error("Delete error:", err);
            alert("An error occurred. Try Again");    
        });
    }
});
document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
    if (DetailBlogToDeleteId !== null) {
        fetch('/real-estate-website/admin-folder/pagesAndcontent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `deleteBlog=1&id=${DetailBlogToDeleteId}`
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                if (DetailBlogToDeleteElement) {
                    DetailBlogToDeleteElement.remove(); // Remove blog from DOM
                }
                hideDeleteConfirmation();
            } else {
                alert(result.error || "Failed to delete listing.");
            }
        })
        .catch(err => {
            console.error("Delete error:", err);
            alert("An error occurred. Try Again");    
        });
    }
});


</script>