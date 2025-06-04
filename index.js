// alert('working');


// =============Responsive Nav Toggle=========
function openNav(){
    const navContainer = document.querySelector(".nav-btn");
    navContainer.classList.add("active");
}
function closeNav(){
    const navContainer = document.querySelector(".nav-btn");
    navContainer.classList.remove("active");
}
document.querySelector(".open-nav").addEventListener("click", openNav,)
document.querySelector(".close-nav").addEventListener("click", closeNav,)

const navLink = document.querySelectorAll(".nav-link");
navLink.forEach((navLinkElement) => {
    navLinkElement.addEventListener("click", () => {
        closeNav();
    })
})


// =============Header styling==============
window.addEventListener("scroll",()=>{
    if(window.scrollY > 15){
        document.querySelector('header').classList.add("active");
        document.querySelector('header nav').classList.add("active");
        document.querySelector('.header-admin-btn').classList.add("active");
    }else{
        document.querySelector('header').classList.remove("active");
        document.querySelector('header nav').classList.remove("active");
        document.querySelector('.header-admin-btn').classList.remove("active");
    }
})

// ===============Testimonial=========
const testimonials = [
    {
      name: "Tom Holland",
      position: "CEO at Wenner Tech.",
      image: "./assest/image1.jpg",
      stars: "★★★★★",
      text: "Working with this team was a game-changer! Their expertise and personalized approach made buying my first home a breeze. They took the time to understand my needs and guided me through every step, making the process feel seamless. I felt confident and well-informed, and I couldn't have asked for a better experience.",
      signature: "Tom Holland"
    },
    {
      name: "Jane Smith",
      position: "CEO at Delux Shoe.",
      image: "./assest/image2.jpg",
      stars: "★★★★★",
      text: "Absolutely loved working with them! They were always responsive and truly listened to what I needed. I’ll definitely be recommending them to my friends and family.",
      signature: "Jane Smith"
    },
    {
      name: "Ahmed Musa",
      position: "Chairman of Product Team at Lilux Industry.",
      image: "./assest/image3.jpg",
      stars: "★★★★☆",
      text: "The team was very professional and helpful. There were a few hiccups along the way, but everything was resolved in the end and I’m happy with the result.",
      signature: "Ahmed Musa"
    },
    {
        name: "Busari Halimah",
        position: "Product Manager at Alibaba Co.",
        image: "./assest/image4.jpg",
        stars: "★★★★☆",
        text: "The team was very professional and helpful. There were a few hiccups along the way, but everything was resolved in the end and I’m happy with the result.",
        signature: "Busari Halimah"
     }
];

let index = 0;

function changeSlide(direction) {
    index += direction;
    if (index < 0) index = testimonials.length - 1;
    if (index >= testimonials.length) index = 0;

    const t = testimonials[index];
    document.getElementById('testimonialImg').src = t.image;
    document.getElementById('clientName').textContent = t.name;
    document.getElementById('clientposition').textContent = t.position;
    document.querySelector('.stars').textContent = t.stars;
    document.getElementById('testimonialText').textContent = t.text;
    document.getElementById('clientSignature').textContent = t.signature;
}
window.onload = () => {
    changeSlide(0);
}



// =============BLOGS DISPLAY============
function openDetailSection(){
    document.querySelector('.blog-details-section').classList.add('active');
}
function closeDetailSection(){
    document.querySelector('.blog-details-section').classList.remove('active');
}

fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=blogs')
.then(response=>response.json())
.then(data => {
    const displayBlogs = document.querySelector('.blog-list');
    displayBlogs.innerHTML = "";

    //  console.log('Total blogs fetched:', data.length);
    // console.log(data);
    const sliceData = data.slice(0,3)
    sliceData.forEach(blogs => {
        const sliceBlogDetails =  blogs.blogdetail.slice(0, 50) + '....';
        console.log(sliceBlogDetails);


        const createBlogs = document.createElement('div');
        createBlogs.classList.add('createBlogs');
        createBlogs.innerHTML = `
            <div class="blog-item propertiesItemAnimation">
                <div class="blog-image">
                   <img src="/real-estate-website/BlogsImages/${blogs.blogimage}" width="100" alt="${blogs.blogheading}" />
                </div>
                <div class="blog-content">
                     <h3 class="blog-heading">${blogs.blogheading}</h3>
                    <p class="blog-sliced-detail">${sliceBlogDetails} <button class="readmoreBtn">read more</button></p>
                    <hr>
                    <div class="readmore-date">
                        <p class="blog-date">${blogs.blogdate}</p>
                        <button class="detailsBtn">Read More &#8594;</button>
                    </div>
                </div>
            </div>
        `;
        displayBlogs.appendChild(createBlogs);

        const detailsBtn = createBlogs.querySelector('.detailsBtn');
        detailsBtn.addEventListener('click', ()=> showBlogsDetails(blogs));

        const readmoreBtn = createBlogs.querySelector('.readmoreBtn');
        readmoreBtn.addEventListener('click', ()=> showBlogsDetails(blogs)); 
        });
    });


function showBlogsDetails(blogs){
    openDetailSection();
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
                        <button class="detailsBtn" onclick="closeDetailSection()">Cancel</button>
                    </div>
                </div>
            </div>
        `;
        displayAllBlogs.appendChild(createAllBlogs);
}


// ==================DISPLAY PROPERTIES==================

function showDatailsBanners(){
    const openSeaction = document.querySelector('.showlistingDetails')
    openSeaction.classList.add('active');
}
function hideDatailsBanners(){
    const openSeaction = document.querySelector('.showlistingDetails')
    openSeaction.classList.remove('active');
}

fetch('/real-estate-website/admin-folder/pagesAndcontent.php?fetch=listings')
.then(response =>response.json())
.then(data =>{
    const propertiesList = document.querySelector('.properties-list');
    propertiesList.innerHTML ='';

    console.log('Total properties fetched:', data.length);
    console.log(data);

    slicedData = data.slice(0,3);

    slicedData.forEach(listing => {
        const createProperties = document.createElement('div');
        createProperties.classList.add("createProperties");
        
        createProperties.innerHTML = `
            <div class="properties-item propertiesItemAnimation">
                <div class="image-container">
                    <img src="/real-estate-website/ListingImages/${listing.apartmentimage}" alt="house" />
                </div>
                <div class="property-details">
                    <h3>${listing.apartmentname}</h3>
                    <p class="lisistingLocation"><i class="fas fa-map-marker-alt"></i> ${listing.apartmentlocation}</p>
                    <ul>
                        <li><i class="fas fa-bed"></i> ${listing.apartmentbedroom} Bed</li>
                        <li><i class="fas fa-bath"></i> ${listing.apartmentbathroom} Bath</li>
                        <li><i class="fas fa-ruler-combined"></i> ${listing.apartmentsqurefeet} sq.ft</li>
                    </ul>
                    <hr>
                    <div class="amount-avaliable">
                        <p class="property-amount">₦${listing.apartmentamount}</p>
                        <button class="details-btn">Details</button>
                    </div>
                </div>
            </div>
        `;
        propertiesList.appendChild(createProperties);
        const detailsBtn = createProperties.querySelector('.details-btn');
        detailsBtn.addEventListener('click', () => showDeatilsFunction(listing));
    })

})


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
                    <button onclick="hideDatailsBanners()">Cancel</button>
                </div>
            </div>
        </div>
    `;

    displayDetails.appendChild(detailsListingContainer);
}


// ==============copyright====year=======

const dateAPI = new Date().getFullYear();
document.querySelector('.copyright-year').innerHTML = dateAPI
