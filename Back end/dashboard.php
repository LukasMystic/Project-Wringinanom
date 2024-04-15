<?php
  require_once 'database.php';
  $ecommerces = getAllEcomData();

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="shortcut icon" href="https://static.vecteezy.com/system/resources/previews/010/160/674/original/coffee-icon-sign-symbol-design-free-png.png" type="image/png">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Icons+Round'>
  <link rel='stylesheet' href="style.css">
</head>
<body>

<!-- Navbar -->
<nav id="navbar">
  <ul class="navbar-items flexbox-col">
    <li class="navbar-logo flexbox-left">
      <a class="navbar-item-inner flexbox">
        <img src="Dewi-Anom-logo.png" alt="Coffee Logo">
      </a>
    </li>
    <!-- <li class="navbar-item flexbox-left">
        <a class="navbar-item-inner flexbox-left" id="search-trigger">
          <div class="navbar-item-inner-icon-wrapper flexbox">
            <ion-icon name="search-outline"></ion-icon>
          </div>
          <span class="link-text">Search</span>
        </a>
      </li> -->
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="dashbord.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="bag-outline"></ion-icon>
        </div>
        <span class="link-text">E-commerce</span>
      </a>
    </li>
      <li class="navbar-item flexbox-left">
        <a href="profile.php" class="navbar-item-inner flexbox-left">
            <div class="navbar-item-inner-icon-wrapper flexbox">
                <ion-icon name="newspaper-outline"></ion-icon>
            </div>
            <span class="link-text">News</span>
        </a>
    </li>
    <li class="navbar-item flexbox-left">
        <a href="profile.php" class="navbar-item-inner flexbox-left">
            <div class="navbar-item-inner-icon-wrapper flexbox">
                <ion-icon name="file-tray-outline"></ion-icon>
            </div>
            <span class="link-text">Package</span>
        </a>
    </li>
    <li class="navbar-item flexbox-left">
        <a href="profile.php" class="navbar-item-inner flexbox-left">
            <div class="navbar-item-inner-icon-wrapper flexbox">
                <ion-icon name="call-outline"></ion-icon>
            </div>
            <span class="link-text">Contact</span>
        </a>
    </li>
    <li class="navbar-item flexbox-left">
        <a href="profile.php" class="navbar-item-inner flexbox-left">
            <div class="navbar-item-inner-icon-wrapper flexbox">
                <ion-icon name="folder-outline"></ion-icon>
            </div>
            <span class="link-text">Archive</span>
        </a>
    </li>
    <li class="navbar-item flexbox-left">
        <a href="profile.php" class="navbar-item-inner flexbox-left">
            <div class="navbar-item-inner-icon-wrapper flexbox">
                <ion-icon name="person-outline"></ion-icon>
            </div>
            <span class="link-text">About Us</span>
        </a>
    </li>
  </ul>
</nav>

  <!-- Search pop up -->
  <div id="search-popup" class="search-popup">
    <button onclick="closeSearchPopup()" aria-label="close" class="x">❌</button>
    <div class="content">
      <h2>Searching</h2>
      <!-- Your search bar or content goes here -->
      <?php
        // Initialize variables for search
        $searchTerm = "";

        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
        }
        ?>
        
      <form method="GET" action=""id="search-form">
        <input type="text" name="search" class="search-bar" placeholder="Search by full name or email" value="<?php echo $searchTerm; ?>">
        <div class="button_slide slide_down" onclick="document.getElementById('search-form').submit()">
        <ion-icon name="search-outline"></ion-icon>
        </div>
      <input type="hidden" name="submit_search" value="1">
     </form>
  </div>
</div>

<!-- Main -->
<main id="main" class="flexbox-col view-width">
    <h2>E-Commerce Data</h2>
    <div class="wrapper">

      <!-- Search Bar -->
      <div class="search-bar" style="padding-bottom: 10px;">
        <button type="button" class="search-button" id="search-trigger"><ion-icon name="search-outline"></ion-icon></button>
      </div>
      <div class="table">
        <div class="row header">
          <div class="cell">
            No
          </div>
          <div class="cell">
            Gambar
          </div>
          <div class="cell">
            Nama Barang
          </div>
          <div class="cell">
            Description
          </div>
          <div class="cell">
            Link
          </div>
          <div class="cell">
            Aksi
          </div>
        </div>
          <?php
            $num = 1; 
            foreach ($ecommerces as $ecom): 
          ?>
          <div class="row">
              <!-- No -->
              <div class="cell" data-title="Number"><?= $num++; ?></div>

              <!-- Gambar -->
              <div class="cell"> 
                <img src="<?= 'img/' . $ecom["gambar"] ?>" alt="">
              </div>

              <!-- Nama -->
              <div class="cell"><?= $ecom["nama"]?></div>

              <!-- Description -->
              <div class="cell"><?= $ecom["description"]?></div>

              <!-- Link -->
              <div class="cell">
                <a href="<?= $ecom["link"]?>" style="color: black;">
                <ion-icon name="link-outline"></ion-icon> 
                </a>
              </div>

              <!-- Aksi -->
              <div class="cell" data-title="Action">
                  <a href="">
                      <div class="button_slide slide_down">View</div>
                  </a> 
                  <a href="">
                      <div class="button_slide slide_left">Edit</div>
                  </a> 
                  <a href="#" onclick="showConfirmationPopup('<?= $ecom['id']; ?>')">
                      <div class="button_slide slide_right">Delete</div>
                  </a>
              </div>    
          </div>
          <?php endforeach; ?>
      </div>
    </div>

    <!-- Add new user -->
    <div class="add-user-button-wrapper flexbox-right">
      <div class="add_button" id = "button-6">
        <div id ="spin"></div>
        <a href="create_profile.php">Tambah Data</a>
      </div>
    </div>

  </main>

<!-- Delete button pop up -->
<div id="confirmationPopup" class="confirmation-popup">
  <div class="popup-content">
      <p>Are you sure you want to delete this user?</p>
      <div class="popup-buttons">
          <div class = "button_slide slide_down" id = "confirmDelete"onclick="deleteUser()">Yes</div>
          <div class = "button_slide slide_right" id = "cancelDelete" onclick="closeConfirmationPopup()">No</div>
      </div>
  </div>
</div>
<!-- Script for navbar -->
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>

<!-- Script for delete popup -->
<!-- Update -->
<script>
  var currentTargetUserId; // Variable to store the targetUserId

  function showConfirmationPopup(targetUserId) {
      document.getElementById("confirmationPopup").style.display = "flex";
      currentTargetUserId = targetUserId;
  }

  function closeConfirmationPopup() {
      document.getElementById("confirmationPopup").style.display = "none";
  }

  function deleteUser() {
      if (currentTargetUserId !== undefined) {
          // Additional logic to delete the user using currentTargetUserId
          alert('Deleting user with ID: ' + currentTargetUserId);
          // You can make an AJAX request to delete the user on the server side
          window.location.href = 'delete_profile.php?targetUserId=' + currentTargetUserId;
      } else {
          alert('Error: Unable to retrieve user ID');
      }
      closeConfirmationPopup();
  }
</script>

<!-- Script for search popup -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const searchTrigger = document.getElementById('search-trigger');
  const searchPopup = document.getElementById('search-popup');

  searchTrigger.addEventListener('click', function () {
    searchPopup.style.display = 'flex';
  });
});

function closeSearchPopup() {
  const searchPopup = document.getElementById('search-popup');
  searchPopup.style.display = 'none';
}
function submitSearchForm() {
        document.getElementById('search-form').submit();
}
</script>
<footer>
    <p>&copy; 2024 Dewi Anom. All rights reserved.</p>
    <!-- Add social media -->
</footer>
</body>
</html>