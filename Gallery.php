<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - YSPM Satara College</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* Custom CSS for animations and transitions */
    .gallery-item {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .gallery-item img {
        transition: transform 0.5s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.05);
    }

    .filter-btn {
        transition: all 0.2s ease;
    }

    .filter-btn.active {
        background-color: #2563eb;
        color: white;
    }

    #lightbox {
        transition: opacity 0.3s ease;
    }
    </style>
</head>

<body class="bg-gray-50">



    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="hidden bg-blue-800 text-white md:hidden pb-4">
        <div class="container mx-auto px-4 flex flex-col space-y-2">
            <a href="#" class="py-2 hover:bg-blue-700 px-4 rounded">Home</a>
            <a href="#" class="py-2 hover:bg-blue-700 px-4 rounded">About</a>
            <a href="#" class="py-2 bg-blue-600 px-4 rounded font-semibold">Gallery</a>
            <a href="#" class="py-2 hover:bg-blue-700 px-4 rounded">Academics</a>
            <a href="#" class="py-2 hover:bg-blue-700 px-4 rounded">Contact</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div style="background: linear-gradient(to right, #8499C6, #8499C6);" class="text-white py-20 mt-20px">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">College Gallery</h1>
            <p class="text-xl max-w-2xl mx-auto">Explore the vibrant campus life and events at YSPM Satara College
                through our photo collection</p>
        </div>
    </div>


    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center space-x-2 space-y-2 mb-8">
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300 active" data-filter="all">All
                Events</button>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300"
                data-filter="campus">Campus</button>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300"
                data-filter="events">Events</button>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300"
                data-filter="sports">Sports</button>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300"
                data-filter="classrooms">Classrooms</button>
        </div>


        <!-- Gallery Grid -->
        <div id="gallery-section" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <!-- Campus Photos -->
            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="campus">
                <img src="assets/images/collage Enterance .jpg"
                    alt="Front entrance of YSPM Satara College with modern architecture and lush green lawns"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">College Entrance</h3>
                    <p class="text-gray-600 text-sm">Main entrance of our prestigious college</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="campus">
                <img src="assets/images/logo/campus view.jpg"
                    alt="YSPM Satara College campus with well-maintained gardens and buildings"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Campus View</h3>
                    <p class="text-gray-600 text-sm">Beautiful green spaces across the campus</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="campus">
                <img src="assets/images/Facuilty.jpg"
                    alt="Panoramic view of YSPM Satara College campus with well-maintained gardens and buildings"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Faculty</h3>
                    <p class="text-gray-600 text-sm">Faculty that empowers students with knowledge and confidence</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="campus">
                <img src="assets/images/logo/Library.jpg"
                    alt="Modern library at YSPM Satara College with students studying at tables and bookshelves"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Central Library</h3>
                    <p class="text-gray-600 text-sm">Well-stocked library with quiet study areas</p>
                </div>
            </div>

            <!-- Event Photos -->
            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="events">
                <img src="assets/images/Annual Fest.jpg"
                    alt="Annual college fest with stage decorations and students performing cultural dance"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Annual Fest</h3>
                    <p class="text-gray-600 text-sm">Cultural performances by students</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="events">
                <img src="assets/images/logo/Science Exe.jpg"
                    alt="Science exhibition at YSPM Satara with students showcasing their projects"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Science Exhibition</h3>
                    <p class="text-gray-600 text-sm">Innovative projects by science students</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="events">
                <img src="assets/images/Award Cermony.jpg"
                    alt="Students receiving awards on stage during annual prize distribution ceremony"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Award Ceremony</h3>
                    <p class="text-gray-600 text-sm">Celebrating academic excellence</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="events">
                <img src="assets/images/logo/Oriented program.jpg"
                    alt="Students receiving awards on stage during annual prize distribution ceremony"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Orientation Program</h3>
                    <p class="text-gray-600 text-sm">Orientation: Your first step towards a bright future!</p>
                </div>
            </div>

            <!-- Sports Photos -->
            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="sports">
                <img src="assets/images/logo/spday.jpg" alt="Sports Day" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Sports Day</h3>
                    <p class="text-gray-600 text-sm">Annual athletics competition</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="sports">
                <img src="assets/images/Cricket match.jpg" alt="Cricket Match" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Cricket Match</h3>
                    <p class="text-gray-600 text-sm">Inter-college cricket tournament</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="sports">
                <img src="assets/images/logo/Kabbdi.jpg" alt="Cricket Match" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Kabaddi Match</h3>
                    <p class="text-gray-600 text-sm">Kabaddi is a game of breath, strength, and swift strategy</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="sports">
                <img src="assets/images/logo/Vollyball].jpg" alt="Volley Ball Match" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Volley Ball Match</h3>
                    <p class="text-gray-600 text-sm">Volleyball is a thrilling game of teamwork and powerful spikes</p>
                </div>
            </div>

            <!-- Classroom Photos -->
            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="classrooms">
                <img src="assets/images/Computer Lab.jpg" alt="Computer Lab" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Computer Lab</h3>
                    <p class="text-gray-600 text-sm">High-tech computing facilities</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="classrooms">
                <img src="assets/images/logo/classroom.jpg" alt="Classroom Session" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Classroom Session</h3>
                    <p class="text-gray-600 text-sm">Interactive learning environment</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="classrooms">
                <img src="assets/images/Chemistry lab (1).jpg" alt="Chemistry lab" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Chemistry Lab</h3>
                    <p class="text-gray-600 text-sm">Practical scientific learning</p>
                </div>
            </div>

            <div class="gallery-item rounded-lg bg-white shadow-md overflow-hidden" data-category="classrooms">
                <img src="assets/images/logo/Semanar hall.jpg" alt="Seminar Hall" class="w-full h-48 object-cover" />
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Seminar Hall</h3>
                    <p class="text-gray-600 text-sm">Seminar Hall – The Hub of Knowledge</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal (hidden by default) -->
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center hidden">
        <div class="relative max-w-4xl w-full">
            <button id="close-lightbox"
                class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300">&times;</button>
            <img id="lightbox-image" src="" alt="" class="max-h-[80vh] mx-auto">
            <div class="text-white text-center mt-4 text-lg" id="lightbox-caption"></div>
        </div>
    </div>


    <script>
    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Update active button
        filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const filter = button.dataset.filter;

        // Filter items
        galleryItems.forEach(item => {
            if (filter === 'all' || item.dataset.category === filter) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        // 👇 Scroll to the gallery section
        const gallerySection = document.getElementById('gallery-section');
        gallerySection.scrollIntoView({ behavior: 'smooth' });
    });
});


    // Lightbox functionality
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const closeLightbox = document.getElementById('close-lightbox');

    galleryItems.forEach(item => {
        const img = item.querySelector('img');
        const title = item.querySelector('h3').textContent;
        const desc = item.querySelector('p').textContent;

        img.addEventListener('click', () => {
            lightboxImage.src = img.src;
            lightboxImage.alt = img.alt;
            lightboxCaption.textContent = $ {
                title
            } - $ {
                desc
            };
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });

    closeLightbox.addEventListener('click', () => {
        lightbox.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            lightbox.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });
    </script>

</body>

</html>

<?php include('Footer.php') ?>