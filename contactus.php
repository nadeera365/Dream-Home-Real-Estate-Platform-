<?php 
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "dreamhomeproject";
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactUs</title>
    <link rel="stylesheet" href="contactus.css"/>
</head>
<body>
    <header>
        <nav class="navbar">
          <div class="nav-container">
            
            <div class="logo-area">
              <a href="home.php"><img src="resources/logo-design-concept-real-estate-business.png" alt="RealEstate Logo" class="logo" /></a> 
            </div>
    
            <ul class="nav-links">
              <li><a href="home.php">Home</a></li>
              <li><a href="properties.php">Properties</a></li>
              <li><a href="aboutus.php">About </a></li> 
              <li><a href="contactus.php">Contact</a></li>
            </ul>
            <div class="login">
              <?php if (isset($_SESSION['email'])): ?>
                  <a href="logout.php">Logout</a>
              <?php else: ?>
                  <a href="login.php">Login</a>
              <?php endif; ?>
            </div>
          </div>
        
        </nav>
    </header> 

    <section class="contact-section">
        <div class="contact-container">
          <h1 class="contact-heading">Get in Touch</h1>
          <p class="contact-subtext">Have a question or need help? Fill out the form and we’ll get back to you as soon as possible.</p>
    
          <form class="contact-form" action="mailto:your-email@example.com" method="POST" enctype="text/plain">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <textarea name="message" placeholder="Write your message here..." rows="6" required></textarea>
            <button type="submit">Send Message</button>
          </form>
        </div>
    </section>

    <div class="footer-container">
        <footer class="footer">
          
          <!-- Top Social Bar -->
          <div class="footer-social">
            <span>Connect with us:</span>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-google"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
              <a href="#"><i class="fab fa-github"></i></a>
            </div>
          </div>

          <div class="footer-content">
            <div class="footer-box">
              <h4>Company</h4>
              <p>We help you find your dream property with ease, trust, and professionalism.</p>
              <img class="logo-footer" src="resources/logo-design-concept-real-estate-business.png" alt="">
            </div>
      
            <!-- Services -->
            <div class="footer-box">
              <ul>
                <li><a href="properties.php">View Property</a></li>
                <li><a href="properties.php">View Property</a></li>
                <li><a href="aboutus.html">About us</a></li>
                <li><a href="contactus.html">Agent Support</a></li>
              </ul>
            </div>
      
            <!-- Links -->
            <div class="footer-box">
              <h4>Quick Links</h4>
              <ul>
                <li><a href="#">Your Account</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
      
            <!-- Contact Info -->
            <div class="footer-box">
              <h4>Contact</h4>
              <p><i class="fas fa-map-marker-alt"></i> kegalle road, Sabaragamuwa Province, Sri Lanka</p>
              <p><i class="fas fa-envelope"></i> info@dreamhomes.com</p>
              <p><i class="fas fa-phone"></i> +94 773691188</p>
            </div>
      
          </div>
      
          <!-- Copyright -->
          <div class="footer-bottom">
            <p>&copy; 2025 Dream Homes. All rights reserved.</p>
          </div>
      
        </footer>
    </div>


</body>
</html>