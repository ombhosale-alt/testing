<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Projects – YSPM Satara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    iframe {
        width: 100%;
        height: 300px;
        border: none;
        border-radius: 8px;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s;
    }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-900 text-white py-6">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold">Our Team's Projects</h1>
            <p class="text-lg mt-2">Check out different types of projects developed by our team members</p>
        </div>
    </header>

    <!-- Projects Section -->
    <section class="py-12">
        <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">

            <!-- Member 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 card">
                <h2 class="text-xl font-semibold mb-2 text-blue-800">Gaurav Pawar</h2>
                <p class="mb-4 text-gray-600">Project: PrimeCart (E-Commerce web)</p>

                <!-- Preview iframe -->
                <iframe src="primecart" title="Gaurav's Project" class="w-full h-64 border rounded"></iframe>

                <!-- Button to view full project -->
                <a href="primecart" target="_blank"
                    class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    View Full Project
                </a>
            </div>


            <!-- Member 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 card">
                <h2 class="text-xl font-semibold mb-2 text-blue-800">Om Bhosale</h2>
                <p class="mb-4 text-gray-600">Project: Online Shop vegatable</p>

                <iframe src="cardgame.html" title="card game"></iframe>
                <!-- Button to view full project -->
                <a href="cardgame.html" target="_blank"
                    class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    View Full Project
                </a>
            </div>

            <!-- Member 3 -->
            <div class="bg-white rounded-lg shadow-md p-6 card">
                <h2 class="text-xl font-semibold mb-2 text-blue-800">Payal Kadam</h2>
                <p class="mb-4 text-gray-600">Project: Smart Notes Organizer</p>
                <iframe src="projects/amit-notes/index.html" title="Payal Kadam"></iframe>
            </div>

            <!-- Member 4 -->
            <div class="bg-white rounded-lg shadow-md p-6 card">
                <h2 class="text-xl font-semibold mb-2 text-blue-800">Sejal Gaikwad</h2>
                <p class="mb-4 text-gray-600">Project: College Event Portal</p>
                <iframe src="projects/pooja-events/index.html" title="Sejal Gaikwad"></iframe>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <?php include('Footer.php'); ?>

</body>

</html>