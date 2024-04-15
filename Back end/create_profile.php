<?php
    require_once 'database.php';

    if(isset($_POST["addBtn"])){
        addEcomData($_POST, $_FILES['gambar']);
        header("Location: dashbord.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Create Profile</title>
  <link rel="shortcut icon" href="https://static.vecteezy.com/system/resources/previews/010/160/674/original/coffee-icon-sign-symbol-design-free-png.png" type="image/png">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Icons+Round'>
  <link rel="stylesheet" href="style-create.css" type="text/css">
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

<!-- Main -->
<main id="main" class="flexbox-col view-width">
  <h2> Tambah Barang</h2>
    <div class="container">
      <div class="container-img">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/Manchester_United_FC_crest.svg/1200px-Manchester_United_FC_crest.svg.png" alt="">
      </div>
      <div class="form">
        <form method="POST" enctype="multipart/form-data">
          <p>Gambar</p>
            <input type="file" id="photo" class="input-box" name="gambar" accept="img/*">
          <p>Nama<p>
            <input type="text" class="input-box" name="nama">
          <p>Deskripsi<p>
            <textarea id="textarea" name="description"></textarea>
          <p>Link<p>
            <input type="text" class="input-box" name="link">
          <button class="btn-form" name="addBtn">Submit</button>
        </form>
      </div>
    </div>
</main>

<!-- Script for navbar -->
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script type="module" src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
<footer>
    <p>&copy; 2024 Dewi Anom. All rights reserved.</p>
    <!-- Add social media -->
</footer>
<script>
    // create.js
    function displayImage(input) {
        var uploadedImage = document.getElementById('uploadedImage');
        uploadedImage.innerHTML = ''; // Clear previous content

        var img = document.createElement('img');
        img.src = 'https://img.freepik.com/premium-photo/festive-colorful-background-with-sparkles-bokeh-ai_958332-509.jpg?size=626&ext=jpg&ga=GA1.1.1803636316.1701302400&semt=ais'; // Set the path to your default image
        img.style.width = '100%';
        img.style.height = 'auto';
        uploadedImage.appendChild(img);

        if (input.files && input.files[0] && validatePhotoSize(input)) {
            var reader = new FileReader();

            reader.onload = function(e) {
                img.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Set a default blank image when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        displayImage({ files: [] });
    });

    // function validatePhotoSize(input) {
    //     const maxFileSizeKB = 64;
    //     if (input.files.length > 0) {
    //         const fileSizeKB = input.files[0].size / 1024; // Convert bytes to KB
    //         if (fileSizeKB > maxFileSizeKB) {
    //         alert("Error: Photo size must be at most 64KB.");
    //         input.value = ''; // Clear the input field
    //         } else {
    //             return true;
    //         }
    //     }
    //     }

    function validateForm() {
        // Get form elements
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var email = document.getElementById('email').value;
        var photoInput = document.getElementById('photo');

        // Check if required fields are empty
        if (firstName.trim() === '' || lastName.trim() === '' || email.trim() === '') {
            alert('Please fill in all required fields.');
            return false; // Prevent form submission
        }

        // Check email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return false; // Prevent form submission
        }

        // Check if an image is uploaded
        if (photoInput.files.length === 0) {
            alert('Please upload an image.');
            return false; // Prevent form submission
        }

        // If all validations pass, allow form submission
        return true;
    }
</script>

</body>
</html>