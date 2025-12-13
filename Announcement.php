<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Assistance - Announcements</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

  <style>
    body {
      background: #f9f9fb;
      font-family: 'Poppins', sans-serif;
    }
    .page-title {
      text-align: center;
      margin: 40px 0 20px;
      font-weight: 700;
      color: #2c3e50;
    }
    .announcement-card {
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: #fff;
      border: none;
      position: relative;
    }
    .announcement-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.12);
    }
    .badge-category {
      font-size: 0.8rem;
      padding: 5px 10px;
      border-radius: 20px;
    }
    .search-bar {
      margin: 20px auto;
      max-width: 600px;
    }
    .date {
      font-size: 0.9rem;
      color: #666;
    }
    .pinned {
      border-left: 6px solid #e74c3c;
    }
    .expired {
      opacity: 0.6;
      background: #f1f1f1;
    }
    .read-more {
      color: #007bff;
      cursor: pointer;
      font-size: 0.9rem;
    }
    .pin-icon {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 1.2rem;
      color: #e74c3c;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2 class="page-title animate_animated animate_fadeInDown">📢 Announcements</h2>

    <!-- Search & Filter -->
    <div class="d-flex justify-content-center search-bar">
      <input type="text" class="form-control me-2" id="searchInput" placeholder="Search announcements...">
      <select class="form-select me-2" id="filterCategory">
        <option value="all">All</option>
        <option value="exam">Exams</option>
        <option value="event">Events</option>
        <option value="notice">Notice</option>
      </select>
      <button class="btn btn-dark" id="sortBtn"><i class="bi bi-sort-down"></i> Sort by Date</button>
    </div>

    <!-- Announcements Grid -->
    <div class="row g-4 mt-2" id="announcementList">

      <!-- Announcement 1 (Pinned + New) -->
      <div class="col-md-6 announcement-item exam pinned animate_animated animate_fadeInUp" data-date="2025-08-22">
        <div class="card announcement-card p-3">
          <i class="bi bi-pin-fill pin-icon"></i>
          <div class="d-flex justify-content-between align-items-center">
            <span class="badge bg-danger badge-category"><i class="bi bi-journal-bookmark"></i> Exam</span>
            <span class="badge bg-success">New</span>
          </div>
          <h5 class="mt-3">Mid-Term Exam Schedule Released</h5>
          <p class="date"><i class="bi bi-calendar-event"></i> Aug 22, 2025</p>
          <p class="announcement-text">The detailed schedule for the mid-term exams is now available on the college portal. Please check and prepare accordingly. Students must also carry valid ID proof during the exams. Seating charts will be displayed one day before.</p>
          <span class="read-more">Read more</span>
        </div>
      </div>

      <!-- Announcement 2 -->
      <div class="col-md-6 announcement-item event animate_animated animate_fadeInUp" data-date="2025-09-05">
        <div class="card announcement-card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <span class="badge bg-primary badge-category"><i class="bi bi-trophy"></i> Event</span>
          </div>
          <h5 class="mt-3">Annual Sports Day</h5>
          <p class="date"><i class="bi bi-calendar-event"></i> Sept 5, 2025</p>
          <p class="announcement-text">Join us for the annual sports day celebrations filled with competitions, fun, and excitement. Registrations are open in the Student Affairs office.</p>
          <span class="read-more">Read more</span>
        </div>
      </div>

      <!-- Announcement 3 (Expired) -->
      <div class="col-md-6 announcement-item notice expired animate_animated animate_fadeInUp" data-date="2025-08-10">
        <div class="card announcement-card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <span class="badge bg-warning text-dark badge-category"><i class="bi bi-megaphone"></i> Notice</span>
          </div>
          <h5 class="mt-3">Holiday Notice</h5>
          <p class="date"><i class="bi bi-calendar-event"></i> Aug 10, 2025</p>
          <p class="announcement-text">The college was closed on August 10th in observance of Independence Day preparations. Regular classes resumed the following day.</p>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Features Script -->
  <script>
    const searchInput = document.getElementById("searchInput");
    const filterCategory = document.getElementById("filterCategory");
    const announcements = document.querySelectorAll(".announcement-item");
    const sortBtn = document.getElementById("sortBtn");

    // Search + Filter
    function filterAnnouncements() {
      let searchValue = searchInput.value.toLowerCase();
      let categoryValue = filterCategory.value;

      announcements.forEach(item => {
        let text = item.innerText.toLowerCase();
        let matchesSearch = text.includes(searchValue);
        let matchesCategory = categoryValue === "all" || item.classList.contains(categoryValue);

        if (matchesSearch && matchesCategory) {
          item.style.display = "block";
          item.classList.add("animate__fadeInUp");
        } else {
          item.style.display = "none";
        }
      });
    }

    searchInput.addEventListener("keyup", filterAnnouncements);
    filterCategory.addEventListener("change", filterAnnouncements);

    // Sort by date (latest first)
    sortBtn.addEventListener("click", () => {
      let list = document.getElementById("announcementList");
      let items = Array.from(list.querySelectorAll(".announcement-item"));

      items.sort((a, b) => new Date(b.dataset.date) - new Date(a.dataset.date));
      items.forEach(i => list.appendChild(i));
    });

    // Read More toggle
    document.querySelectorAll(".read-more").forEach(btn => {
      btn.addEventListener("click", function() {
        let text = this.previousElementSibling;
        text.classList.toggle("expanded");
        if (text.classList.contains("expanded")) {
          text.style.maxHeight = "100%";
          this.innerText = "Read less";
        } else {
          text.style.maxHeight = "60px";
          this.innerText = "Read more";
        }
      });
    });
  </script>
</body>
</html>