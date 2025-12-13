<?php include('Navbar.php') ?>
<section>
    <div class="video-bg">
        <video autoplay muted loop>
            <source src="assets/images/background-video/video-2.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>
    <div class="overlay-text">
        <h1 class="videotext">Student Assistant</h1>
        <p>Your smart partner for Notes, Guidance, and Growth</p>
    </div>
</section>

<section class="feature-section">
    <div class="container">
        <h2 class="text-center mb-4">"Everything You Need to Succeed"</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-box text-center p-4 shadow-sm rounded-4 ">
                    <p class="features-icon fs-1 text-primary"><i class="fa-solid fa-book"></i></p>

                    <a href="Study material.php" class="feature-link">
                        <h4>Study Materials</h4>
                    </a>
                    <p>Access notes, PDFs, and resources.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-box text-center p-4 shadow-sm rounded-4 ">
                    <a href="Timetable.php" class="feature-link">
                        <p class="features-icon fs-1 text-success"><i class="fa-solid fa-calendar-days"></i></p>

                        <h4>Time Table</h4>
                    </a>
                    <p>View class and exam schedules.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-box text-center p-4 shadow-sm rounded-4 ">
                    <p class="features-icon fs-1 text-warning"><i class="fa-solid fa-laptop-code"></i></p>
                    <a href="#" class="feature-link">
                        <h4>Career Guidance</h4>
                    </a>
                    <p>Plan your future path with confidence.</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="feature-box text-center p-4 shadow-sm rounded-4 ">
                    <p class="features-icon fs-1 text-danger"><i class="fa-solid fa-file-lines"></i></p>
                    <a href="Assignment Traker.php" class="feature-link">
                        <h4>Assignments</h4>
                    </a>
                    <p>Track and submit your assignments.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="team-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Meet the Team</h2>
        <div class="meet-our-team-carousel owl-carousel owl-theme">
            <div class="item text-center">
                <img src="assets/images/logo.png" class="team-member-image" width="120" alt="Team Member">
                <h5>Om Bhosale</h5>
                <p>UI/UX & Testing</p>
            </div>
            <div class="item text-center">
                <img src="assets/images/logo.png" class="team-member-image" width="120" alt="Team Member">
                <h5>Payal Kadam</h5>
                <p>Content Creator</p>
            </div>
            <div class="item text-center">
                <img src="assets/images/logo.png" class="team-member-image" width="120" alt="Team Member">
                <h5>Sejal Gaikwad</h5>
                <p>Content Creator</p>
            </div>
            <div class="item text-center">
                <img src="assets/images/logo.png" class="team-member-image" width="120" alt="Team Member" />
                <h5>Gaurav Pawar</h5>
                <p>Developer & Designer</p>
            </div>

        </div>
    </div>
</section>


<section class="cta-section text-center text-white py-5" style="background-color: #7387B9;">
    <div class="container">
        <h2>Explore Our Projects!</h2>
        <p>Our passionate team has built a variety of innovative projects — from academic tools to smart solutions.</p>
        <p>Want to see what we've created? Click below and get inspired!</p>
        <a href="viewproject.php" class="btn btn-light btn-lg mt-3">View Projects</a>
    </div>
</section>





<section class="counter-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="counter-box card">
                    <h2 class="count" data-target="1200">0</h2>
                    <p>Registered Students</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="counter-box card">
                    <h2 class="count" data-target="350">0</h2>
                    <p>Assignments Submitted</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="counter-box card">
                    <h2 class="count" data-target="75">0</h2>
                    <p>Courses Available</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="counter-box card">
                    <h2 class="count" data-target="98">0</h2>
                    <p>Success Rate (%)</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white">
    <div class="container subscribe-section">
        <div class="row align-items-center mx-auto">
            <!-- Left Column: Text + Form -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold">Join Our Learning Community</h2>
                <p class="text-muted">Subscribe to our newsletter for the latest updates on innovative learning tools
                    and educational resources.</p>

                <form class="row g-2" action="subscribe.php" method="POST">
                    <div class="col-12 col-sm-8">
                        <input type="email" class="subscribe-input" name="email" placeholder="Enter your email"
                            required>
                    </div>
                    <div class="col-12 col-sm-4">
                        <button type="submit" class="subscribe-button w-100">SUBSCRIBE</button>
                    </div>
                </form>

            </div>

            <!-- Right Column: Image -->
            <div class="col-lg-6 text-center">
                <img src="assets/images/png.png" alt="Subscribe Illustration"
                    class="subscribe-illustration">
                <!-- Replace with your actual image path -->
            </div>
        </div>
    </div>
</section>

<?php include('Footer.php') ?>