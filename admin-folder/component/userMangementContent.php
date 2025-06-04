<section>
    <!-- ----------------Response container----------- -->

    <div class="response-container-section" id="responseBox" style="display: <?= empty($listingError) ? 'none' : 'flex' ?>;">
        <img src="/real-estate-website/assest/close.png" width="30" class="close-response" alt="">
        <div class="response-container">
            <?php if (!empty($listingError)): ?>
                <p class="response"><?= htmlspecialchars($listingError) ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="header-title">
        <div class="logo">
            <h2><i class="fas fa-users"></i> Users Management</h2>
            <p>Here view and Edit Agent Profile and view all customer details</p>
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
<!-- all agent code ------ -->
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

    <div class="all-agent">
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
        <div class="all-agent-container">
    <!-- agent are displayed here--- -->
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
<!-- all client code ------------ -->

  

    <!-- update agent------------ -->

    <div class="update-agent">
        <div class="register-agent-container">
            <div class="register-agent-header">
                <h3>Update an Agent</h3>
                <img src="/real-estate-website/assest/close.png" width="30" class="closeUpdateAgent" alt="Close">
            </div>
            <form action="/real-estate-website/admin-folder/pagesAndcontent.php" method="post">

                <input type="hidden" name="updateagentId" id="updateagent-id" value="">

                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="updatefullname" id="updatefullname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="updateemail" id="updateemail">
                </div>
                <div class="form-group">
                    <label for="phonenumber">Contact Number</label>
                    <input type="tel" name="updatephonenumber" id="updatephonenumber">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="updategender" id="updategender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="updateaddress" id="updateaddress">
                </div>
                <div class="button-container">
                    <input type="submit" value="Update Agent" name="updateaddagent">
                </div>
            </form>
        </div>
    </div>

    <!-- deleting confirmation----- -->

     <div class="deleteAgent-section">
        <div class="delete-container">
            <h3>DELETING <span class="AgentName"></span>...</h3>

            <div class="confirmation-note">
                <p>Are you sure you want to delete this Agent?</p>
            </div>
            <div class="cancel-delete-btn">
                <button id="confirmDeleteBtn" class="confirmDeleteBtn">Yes, I'm Sure</button>
                <button onclick="closeDeleteBanner()">No, I'm Not</button>
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
        document.querySelector('.close-response')?.addEventListener('click', () => {
            document.getElementById('responseBox').style.display = 'none';
        });
        setTimeout(()=>{
            document.getElementById('responseBox').style.display = 'none';
        },10000)


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

        function openUpdateBanner(){
            document.querySelector('.update-agent').classList.add('active')
        }
        function closeUpdateBanner(){
            document.querySelector('.update-agent').classList.remove('active')
        }
        document.querySelector('.closeUpdateAgent').addEventListener('click', closeUpdateBanner)
        
        function openDeleteBanner(){
            document.querySelector('.deleteAgent-section').classList.add('active');
        }
        function closeDeleteBanner(){
            document.querySelector('.deleteAgent-section').classList.remove('active');
        }
    
    // ------fetch all agent lisitng --------------
    fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=agents')
    .then(response => response.json())
    .then(data => {
        const agentDisplay = document.querySelector('.all-agent-container');
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
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th colspan="2">Action</th>
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
                    <td>${agent.phonenumber}</td>
                    <td>${agent.gender}</td>
                    <td>${agent.address}</td>
                    <td><button class="edit-agent" data-id="${agent.id}">Edit</button></td>
                    <td><button class="delete-agent" data-id="${agent.id}" onclick="openDeleteBanner()">Delete</button></td>
                `;
                tbody.appendChild(row);

                // ------code--for--updating----
                
                const updatebtn = row.querySelector('.edit-agent');
                updatebtn.addEventListener('click', ()=>{
                    openUpdateBanner();

                    document.getElementById('updateagent-id').value = agent.id;
                    document.getElementById('updatefullname').value = agent.fullname;
                    document.getElementById('updateemail').value = agent.email;
                    document.getElementById('updatephonenumber').value = agent.phonenumber;
                    document.getElementById('updategender').value = agent.gender;
                    document.getElementById('updateaddress').value = agent.address;
                });

                // delete btn ---------------
                const deleteBtn = row.querySelector('.delete-agent');
                deleteBtn.addEventListener('click', ()=>{
                    agentIdToDelete = agent.id
                     const agentName = document.querySelector('.AgentName');
                    agentName.textContent = `${agent.fullname}`;
                    openDeleteBanner();
                    hideAllAgentBanner();
                });
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
                        <th colspan="2">Action</th>
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
                    <td><button class="edit-agent" data-id="${agent.id}">Edit</button></td>
                    <td><button class="delete-agent" data-id="${agent.id}">Delete</button></td>
                `;
                tbody.appendChild(row);

                // ------code--for--updating----
                
                const updatebtn = row.querySelector('.edit-agent');
                updatebtn.addEventListener('click', ()=>{
                    openUpdateBanner();

                    document.getElementById('updateagent-id').value = agent.id;
                    document.getElementById('updatefullname').value = agent.fullname;
                    document.getElementById('updateemail').value = agent.email;
                    document.getElementById('updatephonenumber').value = agent.phonenumber;
                    document.getElementById('updategender').value = agent.gender;
                    document.getElementById('updateaddress').value = agent.address;
                });

                // delete btn ---------------
                const deleteBtn = row.querySelector('.delete-agent');
                deleteBtn.addEventListener('click', ()=>{
                    agentIdToDelete = agent.id
                     const agentName = document.querySelector('.AgentName');
                    agentName.textContent = `${agent.fullname}`;
                    openDeleteBanner();
                    hideAllAgentBanner();
                });
            });

            displayAllAgent.appendChild(table);
        } else {
            displayAllAgent.innerHTML = "<p>No agents found or error retrieving data.</p>";
        }
    })
    .catch(error => {
        console.error("Fetch error:", error);
    });


    // -----------delete agent--------------
    let agentIdToDelete = null;

    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (agentIdToDelete) {
            fetch('/real-estate-website/admin-folder/pagesAndcontent.php', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/x-www-form-urlencoded'
                 },
                    body: `deleteagentId=${agentIdToDelete}`
            })
            .then(response => response.text())
            .then(data => {
                location.reload();  // Reload to update UI
            })
            .catch(error => {
                console.error("Delete error:", error);
            });

            closeDeleteBanner();
        }
    });

    // -----------fetch all customers------

    // fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=customers')
    // .then(response => response.json())
    // .then(data => {
    //     const customerDisplay = document.querySelector('.all-customer-container');
    //     customerDisplay.innerHTML = ""; // Clear container
    //     // document.querySelector('.total').textContent = data.length
    //     const limitedCustomerListing = data.slice(0, 5)

    //     if (Array.isArray(limitedCustomerListing) && limitedCustomerListing.length > 0) {
    //         // Create the table
    //         const table = document.createElement('table');
    //         table.classList.add('agent-table');

    //         table.innerHTML = `
    //             <thead>
    //                 <tr>
    //                     <th>S/N</th>
    //                     <th>Full Name</th>
    //                     <th>Email</th>
    //                     <th>Phone Number</th>
    //                     <th>Gender</th>
    //                     <th>Address</th>
    //                     <th colspan="2">Action</th>
    //                 </tr>
    //             </thead>
    //             <tbody>
    //             </tbody>
    //         `;

    //         const tbody = table.querySelector('tbody');

    //         limitedCustomerListing.forEach((agent, index) => {
    //             const row = document.createElement('tr');
    //             row.innerHTML = `
    //                 <td>${index + 1}</td>
    //                 <td>${agent.fullname}</td>
    //                 <td>${agent.email}</td>
    //                 <td>${agent.phonenumber}</td>
    //                 <td>${agent.gender}</td>
    //                 <td>${agent.address}</td>
    //                 <td><button class="edit-agent" data-id="${agent.id}">Edit</button></td>
    //                 <td><button class="delete-agent" data-id="${agent.id}">Delete</button></td>
    //             `;
    //             tbody.appendChild(row);
    //         });

    //         customerDisplay.appendChild(table);
    //     } else {
    //         customerDisplay.innerHTML = "<p>No agents found or error retrieving data.</p>";
    //     }
    // })
    // .catch(error => {
    //     console.error("Fetch error:", error);
    // });


</script>