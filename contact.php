<?php 
    include './admin-folder/admin-config.php';
    session_start();

    date_default_timezone_set('Africa/Lagos');

    if(isset($_POST['sendMessage'])){
        $fullname = trim($_POST['fullName']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);
        $date = date("d-m-Y");
        $time = date("H:i:s");



        if(empty($fullname) || empty($email) || empty($message)){
            $_SESSION['contactFormMessage'] = 'All Fiels Are Required';
            header("Location: /real-estate-website/contact.php");
            exit(); 
        }


        $stmt = $conn->prepare("INSERT INTO messagesdb (fullname, email, messages, date, time) VALUES (?, ?, ?, ?, ?)");

        if($stmt === false){
            $_SESSION['contactFormMessage'] = 'Failed to Prepared. Relaod and try Again';
            header("Location: /real-estate-website/contact.php");
            exit(); 
        }

        $stmt->bind_param("sssss", $fullname, $email, $message, $date, $time);

        if($stmt->execute()){
            $_SESSION['contactFormMessage'] = 'Message Sent Successfully';
            header("Location: /real-estate-website/contact.php");
            exit();
        }else{
            $_SESSION['contactFormMessage'] = 'Error Sending Message. Try Again'. $stmt->error ;
            header("Location: /real-estate-website/contact.php");
            exit(); 
        }
    }

    $listingError = $_SESSION['contactFormMessage'] ?? '';
    unset($_SESSION['contactFormMessage']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Estate/about-us</title>
    <link rel="stylesheet" href="contact.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="index.html"><h1>LOGO</h1></a>
        </div>
        <nav>

            <img src="./assest/close-nav.png" width="50" alt="close navigation menu" class="close-nav">
            <div class="logo-container">
                <a href="index.html"><h1>LOGO</h1></a>
            </div>
            
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html#about">About Us</a></li>
                <li><a href="index.html#services">Services</a></li>
                <li><a href="properties.html">Properties</a></li>
                <li><a href="blog.html">Blogs</a></li>
                <li><a class="active-link" href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <img src="./assest/open-nav.png" width="40px" alt="" class="open-nav headerDropAmination">
    </header>
    
    <main>
        <section class="hero-section">
            <div class="hero-container">
                <h2>Reach Out to US</h2>
                <div class="hero-text-container">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo perspiciatis ad mollitia repellat sunt. Vel distinctio omnis molestias, incidunt magnam voluptatum sed, rem alias magni maiores expedita quod. Harum, assumenda.</p>
                </div>
            </div>
        </section>
        
        <section class="quick-contact-and-form">
            <div class="qcaf-container">
                <div class="inner-qcaf-container">
                    <div class="qcaf-left-side">
                        <h2>Our Quick Contact</h2>
                        <p class="qcaf-left-side-text">Get in touch with us by locating us, trough mobile call or email.</p>
    
                        <div class="inner-left-side">
                            <p>Address: <span><em> <i class="bx bxs-location-plus" style="color: #0000ff;"></i> No4, Behind olorunda local goverment osogbo osun state.</em></span></p>
                            <p>Email 1: <a href="mailto:hospital@gmail.com"> <i class="bx bxs-envelope"></i> hospitalolorunda@gmail.com</a></p>
                            <p>Email 2: <a href="mailto:hospital@gmail.com"> <i class="bx bxs-envelope"></i>  olorundahospital@gmail.com</a></p>
                            <p>Mobile 1: <a href="tel:111111111111"> <i class="bx bxs-phone"></i> 08113441673</a></p>
                            <p>Mobile 2: <a href="tel:08129219899"> <i class="bx bxs-phone"></i> 08129219899</a></p>
                        </div>
                    </div>
                    <div class="qcaf-right-side">
                        <h2>Send us a Message</h2>

                        <div class="response-container" id="responseBox" style="display: <?= empty($listingError) ? 'none' : 'block' ?>;">
                            <img src="./assest/close.png" width="30" class="close-message" alt="">
                            <?php if (!empty($listingError)): ?>
                                <p class="response"><?= htmlspecialchars($listingError) ?></p>
                            <?php endif; ?>
                        </div>

                       
    
                        <div class="inner-right-side">
                            <form action="contact.php" method="post">
                                <fieldset>
                                    <legend>FullName</legend>
                                    <div>
                                        <input type="text" placeholder="John Doe" name="fullName">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Email</legend>
                                    <div>
                                        <input type="email" placeholder="your@gmail.com" name="email">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Message</legend>
                                    <textarea rows="6" placeholder="Hello," name="message"></textarea>
                                </fieldset>
                                <div class="submit-btn-container">
                                    <button class="submit-message-btn" name="sendMessage">Send Message <i class=" bx bxs-right-arrow"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           </section>
    
           <section class="map">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9486604734584!2d4.5378321735151355!3d7.795260707082593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103787116cc8431d%3A0x2f69ab487ab2ad34!2sRing%20Rd%2C%20Osun!5e0!3m2!1sen!2sng!4v1736567583732!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
           </section>

           <section class="faqs">
                <h2>Frequently Asked Questions</h2>
            <div class="faqs-container">
                <div class="faqs-item">
                    <div class="faq-right-section">
                        <details>
                            <summary>What services do you offer?</summary>
                            <div class="faq-answer">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure omnis est, exercitationem modi culpa reprehenderit laborum numquam facere quos voluptate sed animi consequatur in adipisci ut aliquid voluptates obcaecati consequuntur.</p>
                            </div>
                        </details>
                        <details>
                            <summary>How do I get started?</summary>
                            <div class="faq-answer">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure omnis est, exercitationem modi culpa reprehenderit laborum numquam facere quos voluptate sed animi consequatur in adipisci ut aliquid voluptates obcaecati consequuntur.</p>
                            </div>
                        </details>
                        <details>
                            <summary>Can I get a refund?</summary>
                            <div class="faq-answer">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure omnis est, exercitationem modi culpa reprehenderit laborum numquam facere quos voluptate sed animi consequatur in adipisci ut aliquid voluptates obcaecati consequuntur.</p>
                            </div>
                        </details>
                        <details>
                            <summary>How can I contact support?</summary>
                            <div class="faq-answer">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure omnis est, exercitationem modi culpa reprehenderit laborum numquam facere quos voluptate sed animi consequatur in adipisci ut aliquid voluptates obcaecati consequuntur.</p>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </section>

        <section class="newsletter-section">
            <div class="newsletter-container">
                <div>
                    <h2>Stay Updated!</h2>
                    <p>Subscribe to receive the latest property listings and news.</p>
                </div>
                <form action="/real-estate-website/admin-folder/pagesAndcontent.php" method="post">
                    <input type="email" name="newsletterInput" placeholder="Enter your email">
                    <br>
                    <div class="button-container">
                        <button name="newsletterBtn">Subscribe</button>
                    </div>
                </form>
            </div>
        </section>
    
    </main>
    
    <footer>
        <div class="footer-container">
            <div class="footer-section first-footer-section">
                <h1>LOGO</h1>
                <p>Helping you find your <br> perfect property, every step <br>of the way</p>

                <ul class="social-icon">
                    <li><a href=""><i class="bx bxl-instagram"></i></a></li>
                    <li><a href=""><i class="bx bxl-facebook"></i></a></li>
                    <li><a href=""><i class="bx bxl-linkedin"></i></a></li>
                    <li><a href=""><i class="bx bxl-twitter"></i></a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Legal</h2>
                <ul>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Terms & Conditions</a></li>
                    <li><a href="">Agents Profile</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Resources</h2>
                <ul>
                    <li><a href="">Buying Guide</a></li>
                    <li><a href="">Selling Guide</a></li>
                    <li><a href="">Renting Guilde</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Quick Link</h2>
                <ul>
                    <li><a href="">Properties</a></li>
                    <li><a href="">Blogs</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Get in touch</h2>
                <ul>
                    <li>Phone: <a href="tel:">+234 811 1344 1673</a></li>
                    <li>Email: <a href="mailto:">comapny@alhuda.com</a></li>
                    <li>Address: 121 Main road, <br>Osogbo, Osun State</li>
                </ul>
            </div>
        </div>
        <hr>
        <p>&copy; <span class="copyright-year"></span> AL-HUDAH - All Right Reserved</p>
    </footer>
    
    <script>

        document.querySelector('.close-message')?.addEventListener('click', () => {
            document.getElementById('responseBox').style.display = 'none';
        });
        setTimeout(()=>{
            document.getElementById('responseBox').style.display = 'none';
        },10000)

        function openNav(){
            const navContainer = document.querySelector("nav");
            navContainer.classList.add("active");
        }
        function closeNav(){
            const navContainer = document.querySelector("nav");
            navContainer.classList.remove("active");
        }
        document.querySelector(".open-nav").addEventListener("click", openNav,);
        document.querySelector(".close-nav").addEventListener("click", closeNav,);

        const navLink = document.querySelectorAll(".nav-link");
        navLink.forEach((navLinkElement) => {
            navLinkElement.addEventListener("click", () => {
                closeNav();
            });
        });
    
        const dateAPI = new Date().getFullYear();
        document.querySelector('.copyright-year').innerHTML = dateAPI
    </script>
</body>
</html>