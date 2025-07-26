<?php
error_reporting(0);
$host= "localhost";
$user= "root";
$password= "";
$db= "dreamhomeproject";

$data = mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM users";
$result_users=mysqli_query($data,$sql);

$sql="SELECT * FROM property";
$result_property=mysqli_query($data,$sql);

$sql="SELECT * FROM admin";
$result_admin=mysqli_query($data,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  
  <header>
    <nav class="navbar">
      <div class="nav-container">
        <div class="logo-area">
          <a href="admin.php">
            <img src="resources/logo-design-concept-real-estate-business.png" alt="Real Estate Logo" class="logo" />
          </a>
        </div>
        <ul class="nav-links">
          <li><a href="#" onclick="showSection('properties')" >Properties</a></li>
          <li><a href="#" onclick="showSection('add-property')">Add Properties</a></li>
          <li><a href="#" onclick="showSection('users')">Users</a></li>
          <li><a href="#" onclick="showSection('orders')">Orders</a></li>
        </ul>
      </div>
      
    </nav>
  </header>

  
  <div class="dashboard">
    <aside class="sidebar">
      <div class="admin-profile">
        <?php
        while($row = mysqli_fetch_assoc($result_admin)){
        ?>
        <h3><?php echo $row['admin_f_name'] . ' ' . $row['admin_l_name']; ?></h3>
        <p><?php echo $row['email'] ?></p>
        <?php
        }
        ?>
      </div>
      <ul>
        <li><a href="#" onclick="showSection('properties')">Properties</a></li>
        <li><a href="#" onclick="showSection('add-property')">Add Property</a></li>
        <li><a href="#" onclick="showSection('users')">Users</a></li>
        <li><a href="#" onclick="showSection('orders')">Orders</a></li>
        
      </ul>
    </aside>
    

    <main class="main-content">
      <section id="add-property" class="table-section hidden">
        <h2>Add Property</h2>
        <form id="propertyForm" method="post">
          <div class="form-group">
            <label for="propertytype">Property Type:</label>
            <select name="propertytype" id="propertytype" required>
              <option value="">-- Property type --</option>
              <option value="house">House</option>
              <option value="villa">Villa</option>
            </select>
          </div>

          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
          </div>

          <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>
          </div>
          <div class="short">
            <div class="form-group">
            <label for="bedrooms">Bedrooms:</label>
            <input type="number" id="bedrooms" name="bedrooms" min="0" required>
          </div>

          <div class="form-group">
            <label for="bathrooms">Bathrooms:</label>
            <input type="number" id="bathrooms" name="bathrooms" min="0" required>
          </div>

          <div class="form-group">
            <label for="squareFeet">Square Feet:</label>
            <input type="number" id="squareFeet" name="squareFeet" min="0" required>
          </div>

          <div class="form-group">
            <label for="price">Price (USD):</label>
            <input type="number" id="price" name="price" required>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn update">Submit</button>
            <button type="reset" class="btn delete">Clear</button>
          </div>
        </form>
      </section>
      <div class="toast-container" id="toast-container"></div>

      

      <section id="users" class="table-section hidden">
        
        <h2>View Users</h2>
        <table>
          <thead>
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result_users)){
            ?>
            <tr>
              <td><?php echo $row['id']; ?> </td>
              <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
              <td><?php echo $row['email']; ?> </td>
              <td>
                <a href="deleteuser.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this user?');" class="btn delete">Delete</a>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </section>

      <section id="properties" class="table-section hidden">
        <h2>Property Details</h2>
        <table>
          <thead>
            <tr>
              <th>Property ID</th>
              <th>Title</th>
              <th>Location</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result_property)){
            ?>
            <tr>
              <td><?php echo $row['property_id']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['location']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td>
                <button class="btn update">Update</button>
                <button class="btn delete">Delete</button>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </section>
      <section id="orders" class="table-section hidden">
        <h2>Order Details</h2>
        <table>
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Property ID</th>
              <th>Property Name</th>
              <th>User ID</th>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>O002</td>
              <td>P001</td>
              <td>Modern Villa</td>
              <td>U123</td>
              <td>Nadeera Shasika</td>
              <td>
                <button class="btn update">Confirm</button>
                <button class="btn delete">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
  </div>

  
  <div class="footer-container">
    <footer class="footer">
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
          <img class="logo-footer" src="resources/logo-design-concept-real-estate-business.png" alt="Company Logo">
        </div>

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

      <div class="footer-bottom">
        <p>&copy; 2025 Dream Homes. All rights reserved.</p>
      </div>
    </footer>
  </div>

  <script>
  function showSection(id) {
    document.querySelectorAll('.table-section').forEach(section => {
      section.classList.add('hidden');
    });
    document.getElementById(id).classList.remove('hidden');
  }

  
  window.addEventListener("DOMContentLoaded", () => {
    showSection('properties');
  });
</script>


<script>
document.getElementById("propertyForm").addEventListener("submit", function(e) {
    e.preventDefault(); 

    const form = e.target;
    const formData = new FormData(form);

    fetch('add_property.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(data => {
    showToast(data.includes("✅") ? "success" : "error", data);
    if (data.includes("✅")) {
        form.reset();
    }
})
    
    .catch(error => {
        alert("Something went wrong: " + error);
    });
});

function showToast(type, message) {
    const toastContainer = document.getElementById("toast-container");
    const toast = document.createElement("div");
    toast.className = `toast ${type}`;
    toast.textContent = message;
    toastContainer.appendChild(toast);

    // Remove after 4 seconds
    setTimeout(() => {
        toast.remove();
    }, 4000);
}
</script>


</body>
</html>
