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
    <link rel="stylesheet" href="aboutus.css"/>
    <title>AboutUs</title>
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

    <section class="about-section">
        <div class="about-container">
          <h1 class="about-heading">About Us</h1>
          <p class="about-intro">
            At <strong>Luxury Real Estate</strong>, we are dedicated to helping you find the perfect home, property, or investment. Our goal is to connect buyers and sellers through a reliable, user-friendly, and secure real estate platform.
          </p>
    
          <div class="about-grid">
            <div class="about-box">
              <h3>Who We Are</h3>
              <p>We are a professional real estate agency with years of experience in buying, selling, and managing properties across the country. Our platform brings modern tech to traditional property services.</p>
            </div>
            <div class="about-box">
              <h3>Our Mission</h3>
              <p>To provide a smooth and secure property browsing experience for users, and efficient tools for agents and admins to manage listings and customer interactions.</p>
            </div>
            <div class="about-box">
              <h3>What We Offer</h3>
              <p>Verified property listings, easy search features, secure user login, and full admin control to manage, update, or remove properties—all on one platform.</p>
            </div>
          </div>
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