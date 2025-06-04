<section>
    <!-- response-----container -->
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

    <div class="header-title">
        <div class="logo">
            <h2><i class="fas fa-address-card"></i> Lead Management</h2>
            <p>View Inquries and Subcriber's Mail </p>
        </div>
    </div>
    
    <div class="top-banners-section">
        <div class="total-messages-banner">
            <div class="total-message-banner-container">
                <div class="total-message-not-read">
                    <div class="total-message-container">
                        <p>Total Messages: <span class="totalMessageCount"></span></p> 
                    </div>
                    <div class="not-read-btn">
                        <div class="not-read-read">
                            <p>Not Read <span class="totalMessageNotReadCount"></span></p>
                            <p>Read <span class="totalMessageReadCount"></span></p>
                        </div>
                        <button onclick="openAllMessages()">View Messages</button>
                    </div>
                </div>
                <div class="icons">
                    <i class="fas fa-comments"></i>
                </div>
            </div>
        </div>
        <div class="total-messages-banner">
            <div class="total-message-banner-container">
                <div class="total-message-container">
                    <div class="total-message-container">
                        <p>Total Subcriber's Mail <span class=""></span></p>
                        <p class="subcriber-count"></p>
                    </div>
                    <div class="not-read-btn subcriber-btn-container">
                        <button onclick="openAllMails()">View Subcriber's</button>
                    </div>
                </div>
                <div class="icons">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- messagess -->
    <div class="messages-containers">
        <div class="messages-containers-header">
            <h3>Incoming Messages</h3>
            <div class="messages-search-container">
                <input type="search" placeholder="search here.....">
                <button>Search</button>
            </div>
            <div class="messages-header-btns">
                <button class="view-all-client" onclick="openAllMessages()">View Messages</button>
            </div>
        </div>
        <div class="show-message-container">
            <!-- message are displayed here -->
        </div>
    </div>
    <div class="message-details-banner">
        <div class="message-details-container">

            <!-- message-details-shwon -->
        </div>
    </div>

    <div class="all-messages-section">
        <div class="all-messages-container">
            <img src="/real-estate-website/assest/close.png" class="close-all-message" onclick="closeDetailChat()"  width="50" alt="">
            <div class="header-all-message">
                <h2>Messages</h2>
                <div class="search-input">
                    <input type="search" placeholder="search...">
                    <button>search</button>
                </div>
                <div class="all-read-notread">
                    <p>All: <span class="all-read totalMessageCount"></span></p>
                    <p>Read: <span class="all-read totalMessageReadCount"></span></p>
                    <p>Not Read: <span class="all-not-read totalMessageNotReadCount"></span></p>
                </div>
            </div>
            <div class="show-all-meassage-section">
                <!-- all messages will be displayed here -->
            </div>
        </div>
    </div>

    <div class="all-email-subcribers-section">
        <div class="email-subcriber-container">
            <img src="/real-estate-website/assest/close.png" class="close-all-mails" onclick="closeAllMails()"  width="50" alt="">
            <div class="email-subcriber-header">
                <h2>Subscriber's mails</h2>
                <div class="subcriber-search-input">
                    <input type="search" placeholder="search...">
                    <button>search</button>
                </div>
                <div class="total-emails-container">
                    <p>Total Mail: <span class="subcriber-count totalEmailSubCount">20</span></p>
                </div>
            </div>
            <div class="show-all-mail">
                <!-- show all mail -->
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



    function openDetailChat(){
        document.querySelector('.all-messages-section').classList.remove('active');
        document.querySelector('.message-details-banner').classList.add('active');
    }
    function closeDetailChat(){
        document.querySelector('.message-details-banner').classList.remove('active');
        location.reload();
    }

    function openAllMessages(){
        document.querySelector('.message-details-banner').classList.remove('active');
        document.querySelector('.all-messages-section').classList.add('active');
    }
    function closeAllMessages(){
        document.querySelector('.all-messages-section').classList.remove('active');
        location.reload();
    }

    function openAllMails(){
        document.querySelector('.all-email-subcribers-section').classList.add('active');
    }
    function closeAllMails(){
        document.querySelector('.all-email-subcribers-section').classList.remove('active');
    }

    fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=messages')
    .then(response => response.json())
    .then(data =>{
        const showMessagesContainer = document.querySelector('.show-message-container');
        showMessagesContainer.innerHTML = '';
        const showAllMeassageSection = document.querySelector('.show-all-meassage-section');
        showAllMeassageSection.innerHTML = '';

        const limitedMessageContainer = data.slice(0, 10);

        // getlength count of all messages and unread count and read cuont
        const displayAllCount = document.querySelectorAll('.totalMessageCount');
        displayAllCount.forEach(allCount=>{
            allCount.textContent = String(data.length).padStart(2, '0');
        })
        
        const displayUnreadCount = document.querySelectorAll('.totalMessageNotReadCount');
        const unreadCounts = data.filter(unreadMsg => unreadMsg.status === "Not Read").length;
        displayUnreadCount.forEach(unreadCount => {
            unreadCount.textContent = String(unreadCounts).padStart(2, '0');
        });

        const displayReadCount = document.querySelectorAll('.totalMessageReadCount');
        const readCounts =  data.filter(readMsg => readMsg.status === "Read").length;
        displayReadCount.forEach(readCount => {
            readCount.textContent = String(readCounts).padStart(2, '0');
        });

        if(Array.isArray(limitedMessageContainer) && limitedMessageContainer.length > 0){

            limitedMessageContainer.forEach((chat, index)=>{
                chat.index = index; 
                const createChat = document.createElement('div');
                createChat.classList.add('chat-container')
                
                createChat.innerHTML =`
                    <div class="chatContainer">
                        <div class="chatIndex">
                            <p class="chatName">${index + 1}</p>
                        </div>
                        <div class="chatNameEmail">
                            <div>
                                <p class="chatName">${chat.fullname}</p>
                                <p class="chatName"><a href="mailto:${chat.email}">${chat.email}</a></p>
                            </div>
                            <div class="status-time-date">
                                <p class="messageStatus" id="status-${index}" style="color: ${chat.status === 'Read' ? 'blue' : 'red'}">${chat.status }</p>
                                <p>${chat.time}</p>
                                <p>${chat.date}</p>
                            </div>
                        </div>
                    </div>
                `;
                showMessagesContainer.appendChild(createChat)

                const messageDetails = createChat.querySelector('.chatContainer');
                messageDetails.addEventListener('click', () =>{ 
                    showDetails(chat);
                });
            })
        }

        if(Array.isArray(data) && data.length > 0){

            data.forEach((chat, index)=>{
                const createChat = document.createElement('div');
                createChat.classList.add('all-chat-container')
                createChat.innerHTML =`
                    <div class="chatContainer">
                        <div class="chatIndex">
                            <p class="chatName">${index + 1}</p>
                        </div>
                        <div class="chatNameEmail">
                            <div>
                                <p class="chatName">${chat.fullname}</p>
                                <p class="chatName"><a href="mailto:${chat.email}">${chat.email}</a></p>
                            </div>
                            <div class="status-time-date">
                                <p class="messageStatus" id="status-${index}" style="color: ${chat.status === 'Read' ? 'blue' : 'red'}">${chat.status }</p>
                                <p>${chat.time}</p>
                                <p>${chat.date}</p>
                            </div>
                        </div>
                    </div>
                `;
                showAllMeassageSection.appendChild(createChat)
                const messageDetails = createChat.querySelector('.chatContainer');
                messageDetails.addEventListener('click', () =>{ 
                    showDetails(chat);
                });
            })
        }
    });

    function showDetails(chat){
        openDetailChat();

        fetch('/real-estate-website/admin-folder/pagesAndcontent.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
            body: `markAsRead=1&id=${chat.id}`
        })
        .then(res => res.json())
        .then(response => {
            if (response.success) {
                const statusText = document.getElementById(`status-${chat.index}`);
                if (statusText) {
                    statusText.textContent = "Read";
                    statusText.style.color = 'blue'
                }
            }
        });

        const displayMessageDetails = document.querySelector('.message-details-container');
        displayMessageDetails.innerHTML = '';

        const messageContiner = document.createElement('div');
        messageContiner.classList.add('detail-message-container');

        messageContiner.innerHTML = `
            <div class="top-message-header">
                <div class="back-arrow-container"  onclick="closeDetailChat()">
                    <p class="back-arrow-to-home"><i class="fas fa-home"></i></p>
                </div>
                <div class="name-email-chat">
                    <p>${chat.fullname}</p>
                    <p><a href="mailto:${chat.email}">${chat.email}</a></p>
                </div>
            </div>
            <div class="showChatContainer">
                <div class="showUserChat">
                    <p>${chat.messages}</p>
                </div>
            </div>
            <div class="chatButton">
                <button class="deleteChat">Delete</button>
            </div>
        `;
        displayMessageDetails.appendChild(messageContiner);

        // Add after appending `messageContiner` to `displayMessageDetails`
    const deleteButton = messageContiner.querySelector('.deleteChat');
    deleteButton.addEventListener('click', () => {
        if (confirm('Are you sure you want to delete this message?')) {
            fetch('/real-estate-website/admin-folder/pagesAndcontent.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `deleteMessage=1&id=${chat.id}`,
            })
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    alert('Message deleted successfully');
                    closeDetailChat(); // Close the details view
                    document.querySelectorAll('.chat-container').forEach(container => {
                        // Check if the email and message match the deleted one
                        if (
                            container.innerHTML.includes(chat.email) &&
                            container.innerHTML.includes(chat.fullname)
                        ) {
                            container.remove(); // Remove from DOM
                        }
                    });
                } else {
                    alert('Failed to delete message');
                }
            })
            .catch(err => {
                console.error('Delete error:', err);
                alert('Error deleting message');
            });
        }
    });

    }


    // -------------for subcerber's mail-------------

    fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=newsletters')
    .then(response=>response.json())
    .then(data=>{
        const displaySubscriberMails = document.querySelector('.show-all-mail');
        displaySubscriberMails.innerHTML = '';

        const totalMalis = document.querySelectorAll('.subcriber-count');
        const dataLength = data.length
        totalMalis.forEach(mailsCount =>{
            mailsCount.textContent = String(dataLength).padStart(2, '0');
        })

        data.forEach((mails, index)=>{
            const getMails = document.createElement('div');
            getMails.classList.add('getMails')
            getMails.innerHTML = `
                <div>
                    <p>${index + 1}</p>
                    <p>${mails.newsletteremail}</p>
                </div>
            `;
            displaySubscriberMails.appendChild(getMails)
        })
    })
</script>