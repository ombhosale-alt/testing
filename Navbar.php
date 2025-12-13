<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Assistant Project</title>
    <!-- Bootstrap CSS -->
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="css.css">

    <!-- text font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">


</head> 
<?php
    // Set default body class if not already set
    if (!isset($bodyClass)) {
        $bodyClass = "";
    }
?>

<body class="<?= $bodyClass ?>">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <!-- White logo for transparent background -->
                <img src="assets/images/logo/white-logo.png" alt="logo" style="height: 90px;" id="logo-white"
                    class="logo-img show-logo">

                <!-- Color logo for scrolled background -->
                <img src="assets/images/logo/color-logo.png" alt="logo" style="height: 90px;" id="logo-color"
                    class="logo-img hide-logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="About.php">About</a></li>

                    <li class="nav-item"><a class="nav-link" href="Gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="Curriculum.php">Curriculum</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            
                </ul>
                <div class="d-flex">
                    <button class="btn btn-login"><a class="nav-link" href="login.php">Login</button>
                    <button class="btn btn-announcements"><a class="nav-link" href="Announcement.php"> <i class="fa-solid fa-bullhorn mx-2"></i>
                        Announcements</button></a>
                </div>
            </div>
        </div>
    </nav>