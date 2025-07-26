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
if (isset($_SESSION['email'])) {
    $sql = "SELECT p.*, a.admin_f_name, a.admin_l_name 
            FROM property p
            JOIN admin a ON p.admin_id = a.admin_id";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <title>DREAM Homes - Home</title>
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

    <div class="banner">
        <img class="banner-img" src="resources/luxury-architecture-exterior-design.jpg" alt="Luxury Real Estate Banner">
        <div class="banner-text">
            <h1>Find Your Dream Home</h1>
            <p>Explore top properties and discover the perfect place to call home.</p>
        </div>
        <div class="property-search-container">
            <form class="property-search-form">
            <input type="text" placeholder="Enter a city, neighborhood, etc." class="search-field">
            <select class="search-field">
                <option value="">All Types</option>
                <option value="home">Home</option>
                <option value="land">Land</option>
            </select>
            <select class="search-field">
                <option value="">Price Range</option>
                <option value="0-500k">$0 - $500k</option>
                <option value="500k-1m">$500k - $1M</option>
                <option value="1m+">$1M+</option>
            </select>
            <button type="submit" class="search-button">Search</button>
            </form>
        </div>  
    </div>

    <div class="services">
        <h2 class="services-title">Our Services</h2>
        <div class="services-container">
          
          <div class="service-card">
            <div class="icon">🏡</div>
            <h3>Buy a Properties</h3>
            <p>Explore homes, apartments, and land with detailed info and images.</p>
          </div>
      
          <div class="service-card">
            <div class="icon">📞</div>
            <h3>Contact & Support</h3>
            <p>Get in touch with our team for property inquiries and help.</p>
          </div>
      
          <div class="service-card">
            <div class="icon">🛠️</div>
            <h3>Admin Management</h3>
            <p>Admins can add, update, or remove property listings securely.</p>
          </div>
      
        </div>
    </div>


    <section class="listings">
      <h1 class="heading"> Listings Properties</h1>

      <div class="box-container">
        <?php 
        if (isset($_SESSION['email'])):?>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $count = 0; 
    
            while ($row = mysqli_fetch_assoc($result)) {
                if ($count >= 3) break;
    
                echo '<div class="box">
                        <div class="admin">
                            <h3>' . strtoupper(substr($row['admin_f_name'], 0, 1)) . strtoupper(substr($row['admin_l_name'], 0, 1)) . '</h3>
                            <div>
                                <p>' . htmlspecialchars($row['admin_f_name'] . ' ' . $row['admin_l_name']) . '</p>
                                <span>' . date("d-m-Y") . '</span>
                            </div>
                        </div>
    
                        <div class="thumb">
                            <p class="total-images"><span>4</span> Images</p>
                            <p class="type"><span>' . htmlspecialchars($row['type']) . '</span><span>For Sale</span></p>
                            <img src="resources/house_1.jpg" alt="House Image">
                        </div>
    
                        <h3 class="name">Modern ' . htmlspecialchars($row['type']) . '</h3>
                        <h4 class="title">' . htmlspecialchars($row['title']) . '</h4>
                        <p class="location">' . htmlspecialchars($row['location']) . '</p>
    
                        <div class="flex">
                            <p><i class="fas fa-bed"></i> ' . $row['bedrooms'] . ' Bedrooms</p>
                            <p><i class="fas fa-bath"></i> ' . $row['bathrooms'] . ' Bathrooms</p>
                            <p><i class="fas fa-ruler-combined"></i> ' . $row['area_sqft'] . ' sqft</p>
                            <p><strong>$' . number_format($row['price'], 2) . '</strong></p>
                        </div>
    
                        <a href="#" class="btn">Buy Now</a>
                    </div>';
    
                $count++; 
            }
        } else {
            echo "<p>No property listings found.</p>";
        }
        ?>
        <?php else: ?>
        <div class="login-prompt">
            <h3 style="text-align: center;">Please log in to view properties</h3>
            <div style="display: flex; justify-content: center; margin-top:20px;">
              <a href="login.php" class="btn">Login Now</a>
            </div>
        </div>
        <?php endif; ?>
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
              <h4>Services</h4>
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



  </header>
</body>
</html>
