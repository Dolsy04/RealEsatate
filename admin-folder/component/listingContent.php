<section>
    <div class="response-container-section" id="responseBox" style="display: <?= empty($listingError) ? 'none' : 'flex' ?>;">
        <img src="/real-estate-website/assest/close.png" width="30" class="close-response" alt="">
        <div class="response-container">
            <?php if (!empty($listingError)): ?>
                <p class="response"><?= htmlspecialchars($listingError) ?></p>
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

    <div class="listing-header-container">
        <div class="listing-header">
             <h2><i class="fas fa-list"></i> Listing Management</h2>
             <p>Add, Edit and Remove Listing</p>
        </div>
        <div class="input-search-container">
            <input type="search" name="" id="" placeholder="search......">
            <button>Search</button>
        </div>
    </div>
    
    <div class="addlisting-form">
        <div class="adlisting-header">
            <h3>Add an Apartment</h3>
        </div>
        <form action="/real-estate-website/admin-folder/pagesAndcontent.php" method="post" enctype="multipart/form-data">
            <div class="form-container">
                <div>
                    <label for="apartment-image">Apartment Image:</label>
                    <input type="file" id="apartment-image" name="apartmentImage" accept="image/*" required>
                </div>

        <div class="preview-image-conatiner">
            <label>Image Preview:</label>
            <div class="image-preview">
                <img id="imagePreview" src="#" alt="Preview" style="display: none; ">
            </div>
        </div>

                <div>
                    <label for="apartment-name">Apartment Name:</label>
                    <input type="text" id="apartment-name" name="apartmentName" placeholder="Name">
                </div>
                <div>
                    <label for="apartment-location">Apartment Location:</label>
                    <input type="text" id="apartment-location" name="apartmentlocation" placeholder="Location">
                </div>
                <div>
                    <label for="apartment-room">Bedroom</label>
                    <input type="text" id="apartment-room" name="apartmentroom" placeholder="Rooms">
                </div>
                <div>
                    <label for="apartment-bath">Bathroom</label>
                    <input type="text" id="apartment-bath" name="apartmentBath" placeholder="Bathroom">
                </div>
                <div>
                    <label for="apartment-sqft">squre feet</label>
                    <input type="text" id="apartment-sqft" name="apartmentSqft" placeholder="Squre Feet">
                </div>
                <div>
                    <label for="apartment-amount">Apartment Amount</label>
                    <input type="text" id="apartment-amount" name="apartmentAmount" placeholder="Amount">
                </div>
                <div>
                    <label for="apartment-details">Apartment Details</label>
                    <textarea rows="6" name="apartmentDtails" id="apartment-details" placeholder="Details.."></textarea>
                </div>
                <div class="button-container">
                    <input type="submit" name="addApartment" value="Add Apartment">
                </div>
            </div>
        </form>
    </div>

    <div class="showListing-container">
        <h2>Avaliable Apartment</h2>
        <div class="showlisting-item">
            <!-- lisiting will be displayed here -->
        </div>
        <div class="viewall-container">
            <button onclick="showAllLisiting()" class="view-lisiting">View all Listing</button>
        </div>
    </div>

    <div class="showlistingDetails">
        <div class="showlistingDetailsContainer">
            <div class="detailsHead">
                <h3>Lisiting Details</h3>
                <img src="/real-estate-website/assest/close.png" class="closeSection" width="50" alt="">
            </div>
            <div class="showListing-Details-Container">
                <div class="datils-text-container">
                    <!-- All item will be displayed -->
                </div>
            </div>
        </div>
    </div>

    <div class="all-listing-section">
        <div class="alllistingContainer">
            <div class="alllistingHead">
                <div class="all-lisitng-search-container">
                    <h3>All Lisiting</h3>
                    <div class="all-lisitng-search">
                        <input type="search" name="" id="" placeholder="search......">
                        <button>Search</button>
                    </div>
                </div>
                <img src="/real-estate-website/assest/close.png" class="closeAlllisitng" width="50" alt="">
            </div>
            <div class="allisting-Container">
                <div class="all-lisiting-container">
                    <!-- All item will be displayed -->
                </div>
            </div>
        </div>
    </div>

    <div class="editLisiting-form"> 
        <div class="editingLisiting-container">
            <div class="adlisting-header edit-header">
                <h3>Edit Lisiting</h3>
                <img src="/real-estate-website/assest/close.png" class="closeEditingSection" width="50" alt="">
            </div>
            <form action="/real-estate-website/admin-folder/pagesAndcontent.php" method="post" enctype="multipart/form-data">
                <div class="form-container editing-form-container">
                    <div>
                        <label for="updateapartment-image">Apartment Image:</label>
                        <input type="file" id="updateapartment-image" name="updateapartmentImage" accept="image/*">
                    </div>

                    <div class="preview-image-conatiner">
                        <label>Before Image Preview:</label>
                        <div class="image-preview">
                            <img id="updateimagePreview" src="#" alt="Preview" style="display: none;">
                        </div>
                    </div>

                    <div class="preview-image-conatiner">
                        <label>After Image Preview:</label>
                        <div class="new-image-preview">
                            <img id="newupdateimagePreview" src="#" alt="Preview" style="display: none;">
                        </div>
                    </div>

                       <input type="hidden" name="updateapartmentId" id="updateapartment-id" value="">

                    <div>
                        <label for="updateapartment-name">Apartment Name:</label>
                        <input type="text" id="updateapartment-name" name="updateapartmentName" placeholder="Name">
                    </div>
                    <div>
                        <label for="updateapartment-location">Apartment Location:</label>
                        <input type="text" id="updateapartment-location" name="updateapartmentlocation" placeholder="Location">
                    </div>
                    <div>
                        <label for="updateapartment-room">Bedroom</label>
                        <input type="text" id="updateapartment-room" name="updateapartmentroom" placeholder="Rooms">
                    </div>
                    <div>
                        <label for="updateapartment-bath">Bathroom</label>
                        <input type="text" id="updateapartment-bath" name="updateapartmentBath" placeholder="Bathroom">
                    </div>
                    <div>
                        <label for="updateapartment-sqft">squre feet</label>
                        <input type="text" id="updateapartment-sqft" name="updateapartmentSqft" placeholder="Squre Feet">
                    </div>
                    <div>
                        <label for="updateapartment-amount">Apartment Amount</label>
                        <input type="text" id="updateapartment-amount" name="updateapartmentAmount" placeholder="Amount">
                    </div>
                    <div>
                        <label for="updateapartment-details">Apartment Details</label>
                        <textarea rows="6" name="updateapartmentDtails" id="updateapartment-details" placeholder="Details.."></textarea>
                    </div>
                    <div class="button-container">
                        <input type="submit" name="updateApartment" value="Save Edit">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="deleteListing-section">
        <div class="delete-container">
            <h3>DELETING <span class="listingName"></span>...</h3>

            <div class="confirmation-note">
                <p>Are you sure you want to delete this listing?</p>
            </div>
            <div class="cancel-delete-btn">
                <button id="confirmDeleteBtn" class="confirmDeleteBtn">Yes, I'm Sure</button>
                <button onclick="hideDeleteConfirmation()">No, I'm Not</button>
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

//----------- CODE FOR SHOWING PREVIEW IMAGE-------------
    document.getElementById("apartment-image").addEventListener("change", function () {
        const file = this.files[0];
        const preview = document.getElementById("imagePreview");
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block";
        }
    });
    document.getElementById("updateapartment-image").addEventListener("change", function () {
        const file = this.files[0];
        const preview = document.getElementById("newupdateimagePreview");
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = "block";
        }
    });



//----------- CODE FOR SHOWING AVAILIABlE LISTING-------------
    // fetch('/real-estate-website/admin-folder/pagesAndcontent.php')
    // .then(response => response.json())
    // .then(data => {
    //     const displayListing = document.querySelector('.showlisting-item');

    //     const limitedListings = data.slice(0, 6);

    //     limitedListings.forEach(listing => {
    //         const listingDisplay = document.createElement('div');

    //         listingDisplay.innerHTML = `
    //             <div class="listingItemContainer">
    //                 <div class="listingList">
    //                     <div class="listingImage">
    //                         <img src="/real-estate-website/ListingImages/${listing.apartmentimage}" alt="house" />
    //                     </div>
    //                     <h3>${listing.apartmentname}</h3>
    //                     <p class="lisistingLocation"><i class="fas fa-map-marker-alt"></i> ${listing.apartmentlocation}</p>
    //                     <p><i class="fas fa-bed"></i> ${listing.apartmentbedroom} Bed</p>
    //                      <p><i class="fas fa-bath"></i> ${listing.apartmentbathroom} Bath</p>
    //                     <p><i class="fas fa-ruler-combined"></i> ${listing.apartmentsqurefeet} sqft</p>
    //                     <p><i class="fas fa-money-bill-wave"></i> ₦${listing.apartmentamount}</p>
    //                     <div class="card-buttons">
    //                         <button class="details-btn">Details</button>
    //                         <button class="editBtn">Edit</button>
    //                         <button>Delete</button>
    //                     </div>
    //                 </div>    
    //             </div>
    //         `;

    //         // ✅ Append the listing to the container
    //         displayListing.appendChild(listingDisplay);

    //         // ✅ Select only THIS card's Details button
    //         const detailsBtn = listingDisplay.querySelector('.details-btn');
    //         detailsBtn.addEventListener('click', () => showDeatilsFunction(listing));

    //         const editBtn = listingDisplay.querySelector('.edit-btn');
    //         editBtn.addEventListener('click', () => {
    //             opnEditSection();


    //             // ✅ Fill the form with THIS listing's data
    //             document.getElementById('updateapartment-name').value = listing.apartmentname;
    //             document.getElementById('updateapartment-location').value = listing.apartmentlocation;
    //             document.getElementById('updateapartment-room').value = listing.apartmentbedroom;
    //             document.getElementById('updateapartment-bath').value = listing.apartmentbathroom;
    //             document.getElementById('updateapartment-sqft').value = listing.apartmentsqurefeet;
    //             document.getElementById('updateapartment-amount').value = listing.apartmentamount;
    //             document.getElementById('updateapartment-details').value = listing.apartmentdetails;
    //             document.getElementById('updateapartment-id').value = listing.id;

    //             // ✅ Preview current image
    //             const previewImage = document.getElementById('updateimagePreview');
    //             previewImage.src = `/real-estate-website/ListingImages/${listing.apartmentimage}`;
    //             previewImage.style.display = 'block';
    //         })    
    //     });
    // });


//-----------FUNCTION CODE FOR SHOWING DETAILS-------------

let listingToDeleteId = null;

fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=listings')
    .then(response => response.json())
    .then(data => {
        const displayListing = document.querySelector('.showlisting-item');

        const limitedListings = data.slice(0, 4);

        limitedListings.forEach(listing => {
            const listingDisplay = document.createElement('div');

            listingDisplay.innerHTML = `
                <div class="listingItemContainer">
                    <div class="listingList">
                        <div class="listingImage">
                            <img src="/real-estate-website/ListingImages/${listing.apartmentimage}" alt="house" />
                        </div>
                        <h3>${listing.apartmentname}</h3>
                        <p class="lisistingLocation"><i class="fas fa-map-marker-alt"></i> ${listing.apartmentlocation}</p>
                        <p><i class="fas fa-bed"></i> ${listing.apartmentbedroom} Bed</p>
                        <p><i class="fas fa-bath"></i> ${listing.apartmentbathroom} Bath</p>
                        <p><i class="fas fa-ruler-combined"></i> ${listing.apartmentsqurefeet} sqft</p>
                        <p><i class="fas fa-money-bill-wave"></i> ₦${listing.apartmentamount}</p>
                        <div class="card-buttons">
                            <button class="details-btn">Details</button>

                            <button class="edit-btn">Edit</button>

                            <button onclick="openDeleteConfirmation()" name="deleteApartment">Delete</button>
                        </div>
                    </div>    
                </div>
            `;

            displayListing.appendChild(listingDisplay);

            // DETAILS BUTTON
            const detailsBtn = listingDisplay.querySelector('.details-btn');
            detailsBtn.addEventListener('click', () => showDeatilsFunction(listing));

            // -------------------------EDIT BUTTON
            const editBtn = listingDisplay.querySelector('.edit-btn');
            editBtn.addEventListener('click', () => {
                opnEditSection();

                // ✅ Fill the form with THIS listing's data
                document.getElementById('updateapartment-name').value = listing.apartmentname;
                document.getElementById('updateapartment-location').value = listing.apartmentlocation;
                document.getElementById('updateapartment-room').value = listing.apartmentbedroom;
                document.getElementById('updateapartment-bath').value = listing.apartmentbathroom;
                document.getElementById('updateapartment-sqft').value = listing.apartmentsqurefeet;
                document.getElementById('updateapartment-amount').value = listing.apartmentamount;
                document.getElementById('updateapartment-details').value = listing.apartmentdetails;
                document.getElementById('updateapartment-id').value = listing.id;

                // ✅ Preview current image
                const previewImage = document.getElementById('updateimagePreview');
                previewImage.src = `/real-estate-website/ListingImages/${listing.apartmentimage}`;
                previewImage.style.display = 'block';
            });



            const deleteBtn = listingDisplay.querySelector('button[name="deleteApartment"]');
            deleteBtn.addEventListener('click', () => {
                listingToDeleteId = listing.id; // Store current ID

                // ✅ Update the name in the modal
                const nameSpan = document.querySelector('.listingName');
                if (nameSpan) {
                    nameSpan.textContent = `"${listing.apartmentname}"`;
                    nameSpan.style.textTransform = 'uppercase';
                    nameSpan.style.fontWeight = 'bold';
                }

                openDeleteConfirmation(); // Show confirmation modal
            });

        });
    });



//----------code for showing details--------------- 

function showDatailsBanners(){
    hideAllLisiting();
    const openSeaction = document.querySelector('.showlistingDetails')
    openSeaction.classList.add('active');
}
function hideDatailsBanners(){
    const openSeaction = document.querySelector('.showlistingDetails')
    openSeaction.classList.remove('active');
}
document.querySelector('.closeSection').addEventListener('click', hideDatailsBanners);

let detailslistingToDeleteId = null;
function showDeatilsFunction(listing) {
    showDatailsBanners();
    const displayDetails = document.querySelector('.datils-text-container');
    displayDetails.innerHTML = ''; // Clear previous content

    const detailsListingContainer = document.createElement('div');

    detailsListingContainer.innerHTML = `
        <div class="flex-details-container">
            <div class="right-details-container">
                <img src="/real-estate-website/ListingImages/${listing.apartmentimage}"/>
            </div>
            <div class="left-details-container">
                <h3>${listing.apartmentname}</h3>
                
                <div class="details-loaction-container">
                     <p><i class="fas fa-map-marker-alt"></i> ${listing.apartmentlocation}</p>
                </div>

                <div class="details-listing-details">
                     <p><i class="fas fa-bed"></i> ${listing.apartmentbedroom} Bedroom</p> |
                    <p><i class="fas fa-bath"></i> ${listing.apartmentbathroom} Bathbath</p> |
                    <p><i class="fas fa-ruler-combined"></i> ${listing.apartmentsqurefeet} sqft</p> |
                    <p><i class="fas fa-money-bill-wave"></i> ₦${listing.apartmentamount}</p>
                </div>
                <div class="details-details-container">
                    <p>${listing.apartmentdetails}</p>
                </div>
                <div class="details-buttons">
                    <button class="edit-btn">Edit</button>
                    <button onclick="openDeleteConfirmation()" name="deleteApartment">Delete</button>
                    <button onclick="hideDatailsBanners()">Cancel</button>
                </div>
            </div>
        </div>
    `;

    displayDetails.appendChild(detailsListingContainer);


    const editBtn = detailsListingContainer.querySelector('.edit-btn');
    editBtn.addEventListener('click', () => {
        hideAllLisiting();
        hideDatailsBanners()
        opnEditSection();

        // ✅ Fill the form with THIS listing's data
        document.getElementById('updateapartment-name').value = listing.apartmentname;
        document.getElementById('updateapartment-location').value = listing.apartmentlocation;
        document.getElementById('updateapartment-room').value = listing.apartmentbedroom;
        document.getElementById('updateapartment-bath').value = listing.apartmentbathroom;
        document.getElementById('updateapartment-sqft').value = listing.apartmentsqurefeet;
        document.getElementById('updateapartment-amount').value = listing.apartmentamount;
        document.getElementById('updateapartment-details').value = listing.apartmentdetails;
        document.getElementById('updateapartment-id').value = listing.id;

        // ✅ Preview current image
        const previewImage = document.getElementById('updateimagePreview');
        previewImage.src = `/real-estate-website/ListingImages/${listing.apartmentimage}`;
        previewImage.style.display = 'block';
    });



        const deleteBtn = detailsListingContainer.querySelector('button[name="deleteApartment"]');
            deleteBtn.addEventListener('click', () => {
                detailslistingToDeleteId = listing.id; // Store current ID

                // ✅ Update the name in the modal
                const nameSpan = document.querySelector('.listingName');
                if (nameSpan) {
                    nameSpan.textContent = `"${listing.apartmentname}"`;
                    nameSpan.style.textTransform = 'uppercase';
                    nameSpan.style.fontWeight = 'bold';
                }

                openDeleteConfirmation(); // Show confirmation modal
            });

}

// -------------FUNCTION FOR ALL LISTING-------------

function showALlListing(){
    fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=listings')
    .then(response => response.json())
    .then(data => { 
        const alllisitingcontainer = document.querySelector('.all-lisiting-container');

        data.forEach(listing => {
            const alllistingDisplay = document.createElement('div');

            alllistingDisplay.innerHTML = `
                <div class="listingItemContainer">
                    <div class="listingList">
                        <div class="listingImage">
                            <img src="/real-estate-website/ListingImages/${listing.apartmentimage}" width="200" alt="house" />
                        </div>
                        <h3>${listing.apartmentname}</h3>
                        <p class="lisistingLocation"><i class="fas fa-map-marker-alt"></i> ${listing.apartmentlocation}</p>
                        <p><i class="fas fa-bed"></i> ${listing.apartmentbedroom} Bed</p>
                         <p><i class="fas fa-bath"></i> ${listing.apartmentbathroom} Bath</p>
                        <p><i class="fas fa-ruler-combined"></i> ${listing.apartmentsqurefeet} sqft</p>
                        <p><i class="fas fa-money-bill-wave"></i> ₦${listing.apartmentamount}</p>
                        <div class="card-buttons">
                            <button class="details-btn">Details</button>
                            <button class="edit-btn">Edit</button>
                             <button onclick="openDeleteConfirmation()" name="deleteApartment">Delete</button>
                        </div>
                    </div>    
                </div>
            `;

            // ✅ Append the listing to the container
            alllisitingcontainer.appendChild(alllistingDisplay);

            // ✅ Select only THIS card's Details button
            const detailsBtn = alllistingDisplay.querySelector('.details-btn');
            detailsBtn.addEventListener('click', () => showDeatilsFunction(listing));


            const editBtn = alllistingDisplay.querySelector('.edit-btn');
            editBtn.addEventListener('click', () => {
                hideAllLisiting();
                hideDatailsBanners()
                opnEditSection();

                // ✅ Fill the form with THIS listing's data
                document.getElementById('updateapartment-name').value = listing.apartmentname;
                document.getElementById('updateapartment-location').value = listing.apartmentlocation;
                document.getElementById('updateapartment-room').value = listing.apartmentbedroom;
                document.getElementById('updateapartment-bath').value = listing.apartmentbathroom;
                document.getElementById('updateapartment-sqft').value = listing.apartmentsqurefeet;
                document.getElementById('updateapartment-amount').value = listing.apartmentamount;
                document.getElementById('updateapartment-details').value = listing.apartmentdetails;
                document.getElementById('updateapartment-id').value = listing.id;

                // ✅ Preview current image
                const previewImage = document.getElementById('updateimagePreview');
                previewImage.src = `/real-estate-website/ListingImages/${listing.apartmentimage}`;
                previewImage.style.display = 'block';
            });


               const deleteBtn = alllistingDisplay.querySelector('button[name="deleteApartment"]');
                deleteBtn.addEventListener('click', () => {
                hideDatailsBanners();
                detailslistingToDeleteId = listing.id;
                const nameSpan = document.querySelector('.listingName');
                if (nameSpan) {
                    nameSpan.textContent = `"${listing.apartmentname}"`;
                    nameSpan.style.textTransform = 'uppercase';
                    nameSpan.style.fontWeight = 'bold'; 
                    openDeleteConfirmation();
                }
            });
        });
    });
}


function showAllLisiting(){
    hideDatailsBanners();
    const openSection = document.querySelector('.all-listing-section')
    openSection.classList.add('active');
}
function hideAllLisiting(){
    const openSection = document.querySelector('.all-listing-section')
    openSection.classList.remove('active');
}
document.querySelector('.closeAlllisitng').addEventListener('click', hideAllLisiting);

// -----------Open and Close editing Section--------------
function opnEditSection(){
    const openEditSection = document.querySelector('.editLisiting-form');
    openEditSection.classList.add('active');
}
function closeEditSection(){
    const openEditSection = document.querySelector('.editLisiting-form');
    openEditSection.classList.remove('active');
}
document.querySelector('.closeEditingSection').addEventListener('click', closeEditSection)


// ----------------deleting Listing--------------

function openDeleteConfirmation(){
    const deleteSection = document.querySelector('.deleteListing-section')
    deleteSection.classList.add('active')
}
function hideDeleteConfirmation(){
    const deleteSection = document.querySelector('.deleteListing-section')
    deleteSection.classList.remove('active')
}


document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
    if (listingToDeleteId !== null) {
        fetch('/real-estate-website/admin-folder/pagesAndcontent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `deleteApartment=1&id=${listingToDeleteId}`
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Let backend set session message, then reload
                location.reload(); // Message will show after reload
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

document.querySelector('.confirmDeleteBtn').addEventListener('click', () => {
    if (detailslistingToDeleteId !== null) {
        fetch('/real-estate-website/admin-folder/pagesAndcontent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `deleteApartment=1&id=${detailslistingToDeleteId}`
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                location.reload(); // Message will show after reload
            } else {
                alert(result.error || "Failed to delete listing.");
            }
        })
        .catch(err => {
            console.error("Delete error:", err);
            alert("An error occurred.");
        });
    }
});


showALlListing();
</script>