<?php
$bodyClass = "scrolled-page";
include 'Navbar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academic Calendar - Student Assistance</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f0f8ff, #e6f7ff);
      min-height: 100vh;
      
    }
   .calendar-section {
  background: #fff;
  border-radius: 20px;
  padding: 40px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  margin-top: 30px; /* <-- This adds space above the main content */
}

    .calendar-section h2 {
      font-weight: bold;
      color: #004085;
    }
    .btn-download {
      border-radius: 30px;
      padding: 12px 25px;
      font-size: 1.1rem;
      transition: all 0.3s ease-in-out;
    }
    .btn-download:hover {
      transform: scale(1.05);
    }
    footer {
       padding: 15px;
     margin-top: 50px;
       }
     #calendarResult {
      margin-top: 30px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="calendar-section text-center">
    <h2 class="mb-4">📅 MSBTE Academic Calendar</h2>
    <p class="mb-4 text-muted">Select your Branch & Year to view/download the academic calendar.</p>

    <!-- Selection Form -->
    <form id="calendarForm" class="row g-3 justify-content-center">
      <div class="col-md-4">
        <select class="form-select" id="branch" required>
          <option value="" selected disabled>-- Select Branch --</option>
          <option value="cse">Computer Engineering</option>
          <option value="mech">Mechanical Engineering</option>
          <option value="civil">Civil Engineering</option>
          <option value="elec">Electrical Engineering</option>
          <option value="etc">Electronics & Telecom</option>
        </select>
      </div>
      <div class="col-md-3">
        <select class="form-select" id="year" required>
          <option value="" selected disabled>-- Select Year --</option>
          <option value="1">First Year</option>
          <option value="2">Second Year</option>
          <option value="3">Third Year</option>
        </select>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Show Calendar</button>
      </div>
    </form>

    <!-- Result Section -->
    <div id="calendarResult"></div>
  </div>
</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const calendars = {
    cse: {
      1: "https://msbte.ac.in/uploads/circular/1747917020137_A.Y._2025-26_Academic_Calander.pdf",
      2: "https://sspi.net.in/wp-content/uploads/2024/08/MSBTE-A.Y.-2024-25-Academic-Calander_Revised_220820241300.pdf",
      3: "https://msbte.org.in/portal/academic-calendars/"
    },
    mech: {
      1: "https://msbte.org.in/portal/wp-content/uploads/2023/07/mech-firstyear-calendar.pdf",
      2: "https://msbte.org.in/portal/wp-content/uploads/2023/07/mech-secondyear-calendar.pdf",
      3: "https://msbte.org.in/portal/wp-content/uploads/2023/07/mech-thirdyear-calendar.pdf"
    },
    civil: {
      1: "https://msbte.org.in/portal/wp-content/uploads/2023/07/civil-firstyear-calendar.pdf",
      2: "https://msbte.org.in/portal/wp-content/uploads/2023/07/civil-secondyear-calendar.pdf",
      3: "https://msbte.org.in/portal/wp-content/uploads/2023/07/civil-thirdyear-calendar.pdf"
    },
    elec: {
      1: "https://msbte.org.in/portal/wp-content/uploads/2023/07/elec-firstyear-calendar.pdf",
      2: "https://msbte.org.in/portal/wp-content/uploads/2023/07/elec-secondyear-calendar.pdf",
      3: "https://msbte.org.in/portal/wp-content/uploads/2023/07/elec-thirdyear-calendar.pdf"
    },
    etc: {
      1: "https://msbte.org.in/portal/wp-content/uploads/2023/07/etc-firstyear-calendar.pdf",
      2: "https://msbte.org.in/portal/wp-content/uploads/2023/07/etc-secondyear-calendar.pdf",
      3: "https://msbte.org.in/portal/wp-content/uploads/2023/07/etc-thirdyear-calendar.pdf"
    }
  };

  document.getElementById("calendarForm").addEventListener("submit", function(e){
    e.preventDefault();
    const branch = document.getElementById("branch").value;
    const year = document.getElementById("year").value;
    const resultDiv = document.getElementById("calendarResult");

    if(branch && year && calendars[branch][year]) {
      resultDiv.innerHTML = `
        <div class="mt-4">
          <h5 class="text-success">Academic Calendar for <b>${document.getElementById("branch").options[document.getElementById("branch").selectedIndex].text}</b> - Year ${year}</h5>
          <a href="${calendars[branch][year]}" target="_blank" class="btn btn-success btn-download">📥 Download Calendar</a>
        </div>
      `;
    } else {
      resultDiv.innerHTML = `<p class="mt-4 text-danger">❌ Calendar not available for the selected branch/year.</p>`;
    }
  });
</script>
</body>
</html>

<?php include('Footer.php') ?>