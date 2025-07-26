<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <title>Luxury Real Estate - Login</title>
</head>
<body>

    <header>
        <nav class="navbar">
          <div class="nav-container">
            
            <div class="logo-area">
              <a href="home.php"><img     src="resources/logo-design-concept-real-estate-business.png" alt="Real     Estate Logo" class="logo" /></a>
              
            </div>
    
            <ul class="nav-links">
              <li><a href="home.php">Home</a></li>
              <li><a href="login.php">Properties</a></li>
              <li><a href="login.php">About </a></li>
              <li><a href="login.php">Contact</a></li>
            </ul>
            
          </div>
        
        </nav>
    </header> 

    <div class="banner">
        <img class="banner-img" src="resources/luxury-architecture-exterior-design.jpg" alt="Luxury Real Estate Banner">
        <div class="login-container">
            <h2>Login to your account</h2>
            <h4>
                <?php
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];
                ?>
            </h4>

            <form action="logincheck.php" method="post" class="login-form">
               <label for="role">Select Role</label>
               <select name="role" id="role" required>
                 <option value="">-- Choose Role --</option>
                 <option value="user">User</option>
                 <option value="admin">Admin</option>
               </select>
           
               <label for="email">Email</label>
               <input type="email" name="email" id="email" placeholder="Enter your email" required>
           
               <label for="password">Password</label>
               <input type="password" name="pass" id="password" placeholder="Enter your password" required>
           
               <button type="submit" name="submit">Login</button>
           
               <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p> 
            </form>
        </div> 
    </div>


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
                <li><a href="aboutus.php">About </a></li> 
              <li><a href="contactus.php">Contact</a></li>
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