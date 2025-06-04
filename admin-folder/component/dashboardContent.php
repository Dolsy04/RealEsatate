<section>
    <div class="upload-image-container">
        <div class="inner-upload-image">
            <h3>Upload Profile Picture</h3>
            <img src="../assest/close.png" width="50" class="close-banner" alt="">
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
                    <img src="<?= $profilePic ? 'uploads/profile_pictures/' . $profilePic : '' ?>" width="100" alt="">
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

    <div class="upper-section">

        <div class="top-section-container div-banner">
            <div class="left-banner">
                <div class="text">
                    <p>Total Properties</p>
                    <p class="total-properties"></p>
                </div>
                <div class="top-icon">
                    <i class="fas fa-building"></i>
                </div>
            </div>
        </div>

        <div class="middle-section-container div-banner">
            <div class="left-banner">
                 <div class="text">
                    <p>Message Notification</p>
                    <p class="total-messages"></p>
                </div>
                <div class="top-icon">
                    <i class="fas fa-landmark"></i>
                </div>
            </div>
        </div>

        <div class="right-section-container div-banner">
            <div class="left-banner">
                 <div class="text">
                    <p>Blogs</p>
                    <p class="total-blogs"></p>
                </div>
                <div class="top-icon">
                    <i class="fas fa-home"></i>          
                </div>
            </div>
        </div>
        <div class="right-section-container div-banner">
            <div class="left-banner">
                 <div class="text">
                    <p>Our Agents</p>
                    <p class="total-agents"></p>
                </div>
                <div class="top-icon">
                    <i class="fas fa-dollar-sign"></i> 
                </div>
            </div>
        </div>

    </div>

    <div class="middle-section">
        <div class="middle-section-container">
            <div class="header-agent-section">
                <p>Agent Profiles</p>
                <div class="header-btn">
                    <button class="add-new-agent">Add Agent</button>
                    <button class="view-all-agent">View All</button>
                </div>
            </div>
            <div class="agent-container">
                <!-- agent will be displayed here------ -->
            </div>
        </div>
    </div>

       <div class="register-agent">
        <div class="register-agent-container">
            <div class="register-agent-header">
                <h3>Register an Agent</h3>
                <img src="/real-estate-website/assest/close.png" width="30" class="closeAddAgent" alt="Close">
            </div>
            <form action="/real-estate-website/admin-folder/pagesAndcontent.php" method="post">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="phonenumber">Contact Number</label>
                    <input type="tel" name="phonenumber" id="phonenumber">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address">
                </div>
                <div class="button-container">
                    <input type="submit" value="Save Agent" name="addagent">
                </div>
            </form>
        </div>
    </div>

    <div class="show-all-agent">
        <img src="/real-estate-website/assest/close.png" width="30" class="close-show-all-agent" alt="">
        <div class="show-all-agent-container">
            <div class="inner-show-all-agent">
                <div class="agent-header">
                    <h3>Agent List</h3>
                    <div class="agent-search-container">
                        <input type="search" placeholder="search here.....">
                        <button>Search</button>
                    </div>
                    <div class="agent-header-btns">
                        <button class="view-all-agent">View All Agents</button>
                        <button class="add-new-agent">Add Agents</button>
                    </div>
                </div>

                <div class="display-all-agent">
                    <!-- agnet will be displayed here ------- -->
                </div>
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
    
    // ============for view and add agent =============

    function openRegisterAgent(){
        hideAllAgentBanner();
        document.querySelector('.register-agent').classList.add('active');
    }
    function closeRegisterAgent(){
        document.querySelector('.register-agent').classList.remove('active');
    }
    document.querySelectorAll('.add-new-agent').forEach(btn => {
        btn.addEventListener('click', openRegisterAgent);
    });
    document.querySelector('.closeAddAgent').addEventListener('click', closeRegisterAgent);


    function showAllAgentBanner(){
        document.querySelector('.show-all-agent').classList.add('active')
        closeRegisterAgent();
    }
    function hideAllAgentBanner(){
        document.querySelector('.show-all-agent').classList.remove('active')
        closeRegisterAgent();
    }
    document.querySelectorAll('.view-all-agent').forEach(btn => {
        btn.addEventListener('click', showAllAgentBanner);
    });
    document.querySelector('.close-show-all-agent').addEventListener('click', hideAllAgentBanner);


    // ===============show profile picture preview========
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
    
    //================= displaying agent top 5 and all agent 

    fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=agents')
    .then(response => response.json())
    .then(data => {
        const agentDisplay = document.querySelector('.agent-container');
        agentDisplay.innerHTML = ""; // Clear container

        //--------for all agent showing -------------- 
        const displayAllAgent = document.querySelector('.display-all-agent');
        displayAllAgent.innerHTML = ""; // Clear container
        

        const limitedAgentListing = data.slice(0, 5)
        // code for showing only five agent on dashboard
        if (Array.isArray(limitedAgentListing) && limitedAgentListing.length > 0) {
            // Create the table
            const table = document.createElement('table');
            table.classList.add('agent-table');

            table.innerHTML = `
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            `;

            const tbody = table.querySelector('tbody');

            limitedAgentListing.forEach((agent, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${agent.fullname}</td>
                    <td>${agent.email}</td>
                    <td>${agent.gender}</td>
                    
                `;
                tbody.appendChild(row);
            });

            agentDisplay.appendChild(table);
        } else {
            agentDisplay.innerHTML = "<p>No agents found or error retrieving data.</p>";
        }

        // code for showing all agent
        if (Array.isArray(data) && data.length > 0) {
            // Create the table
            const table = document.createElement('table');
            table.classList.add('agent-table');

            table.innerHTML = `
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            `;

            const tbody = table.querySelector('tbody');

            data.forEach((agent, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${agent.fullname}</td>
                    <td>${agent.email}</td>
                    <td>${agent.phonenumber}</td>
                    <td>${agent.gender}</td>
                    <td>${agent.address}</td>
                `;
                tbody.appendChild(row);
            });

            displayAllAgent.appendChild(table);
        } else {
            displayAllAgent.innerHTML = "<p>No agents found or error retrieving data.</p>";
        }
    })
    .catch(error => {
        console.error("Fetch error:", error);
    });

    fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=listings')
    .then(response => response.json())
    .then(data => {
        const dataLength = data.length;
        document.querySelector('.total-properties').textContent = String(dataLength).padStart("2", 0);
    });
    fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=messages')
    .then(response => response.json())
    .then(data =>{
        const dataLength = data.length;
        document.querySelector('.total-messages').textContent = String(dataLength).padStart("2", 0);
    });
    fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=blogs')
    .then(response=>response.json())
    .then(data => {
        const dataLength = data.length;
        document.querySelector('.total-blogs').textContent = String(dataLength).padStart("2", 0);
    });
      fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=agents')
    .then(response => response.json())
    .then(data => {
        const dataLength = data.length;
        document.querySelector('.total-agents').textContent = String(dataLength).padStart("2", 0);
    });
</script>
