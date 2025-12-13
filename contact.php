<?php
$bodyClass = "scrolled-page";
include 'Navbar.php';
?>
<div class="container mt-5 pt-5">
    <div class="row align-items-center mt-5">
        <!-- Contact Form -->
        <div class="col-md-6 mb-4">
            <div class="card p-4 shadow-lg border-0 rounded-4">
                <div class=" text-center ">
                    <h3 class="m-0">Get in Touch</h3>
                </div>
                <form action="insert.php" method="POST">
                    <?php if (isset($_GET['status']) && $_GET['status'] === 'success') : ?>
                    <div class="alert alert-success">Message sent successfully!</div>
                    <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error') : ?>
                    <div class="alert alert-danger">Something went wrong. Please try again.</div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                            placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                            placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control form-control-lg" id="number" name="number"
                            placeholder="1234567890">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="4"
                            placeholder="Write your message here..."></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill">Send Message</button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Image -->
        <div class="col-md-6 text-center">
            <img src="assets/images/pngtree-in-the-style-of-chromatic-sculptural-slabs-vector-png-image_6949885.png"
                alt="Contact Illustration" class="img-fluid rounded-4 shadow-sm" style="max-height: 450px;">
        </div>
    </div>
</div>




<?php include('Footer.php') ?>