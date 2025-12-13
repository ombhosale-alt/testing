<?php
$bodyClass = "scrolled-page";
include 'Navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>📚 College Timetable</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to right, #74ebd5, #acb6e5);
      font-family: 'Poppins', sans-serif;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease-in-out;
    }

    .card:hover {
      transform: scale(1.02);
    }

    .timetable {
      display: none;
    }

    .timetable.active {
      display: block;
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .student-info {
      background-color: #ffffffcc;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      display: none;
      position: relative;
    }

    .student-info.active {
      display: block;
      animation: fadeIn 0.5s ease-in-out;
    }

    .badge {
      font-size: 0.85rem;
      padding: 6px 12px;
      border-radius: 12px;
    }

    .dark-mode {
      background: #2c3e50 !important;
      color: #f1f1f1;
    }

    .live-clock {
      font-weight: bold;
      font-size: 1.2rem;
      color: #2c3e50;
      text-align: center;
      margin-bottom: 15px;
    }

    .btn-reset {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 999;
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <h2 class="text-center fw-bold mb-4 text-dark">📅 College Timetable Viewer</h2>
    <div class="live-clock" id="clock">🕒</div>

    <!-- Form -->
    <div class="card p-4 mb-4">
      <form id="branchForm" class="row g-4 needs-validation" novalidate>
        <div class="col-md-6">
          <label for="studentName" class="form-label">👨‍🎓 Student Name</label>
          <input type="text" class="form-control" id="studentName" placeholder="Enter your name" required>
          <div class="invalid-feedback">Please enter your name.</div>
        </div>

        <div class="col-md-6">
          <label for="branchSelect" class="form-label">🏫 Select Branch</label>
          <select class="form-select" id="branchSelect" required>
            <option value="" disabled selected>-- Choose Branch --</option>
            <option value="cse">💻 Computer Science</option>
            <option value="it">🖥 IT</option>
            <option value="ece">📡 Electronics</option>
            <option value="mech">⚙ Mechanical</option>
            <option value="civil">🏗 Civil</option>
          </select>
          <div class="invalid-feedback">Please select a branch.</div>
        </div>

        <div class="col-md-6">
          <label for="yearSelect" class="form-label">📖 Year</label>
          <select class="form-select" id="yearSelect" required>
            <option value="" disabled selected>-- Choose Year --</option>
            <option value="1">1st Year</option>
            <option value="2">2nd Year</option>
            <option value="3">3rd Year</option>
          </select>
          <div class="invalid-feedback">Please select your year.</div>
        </div>

        <div class="col-md-6">
          <label for="daySelect" class="form-label">📅 Day</label>
          <select class="form-select" id="daySelect" required>
            <option disabled selected value="">-- Choose Day --</option>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            <option>Saturday</option>
          </select>
          <div class="invalid-feedback">Please select a day.</div>
        </div>

        <div class="col-12 d-flex justify-content-center gap-3">
          <button type="submit" class="btn btn-success btn-lg px-4">Show Timetable</button>
          <button type="button" class="btn btn-warning btn-lg px-4" id="resetBtn">🔄 Reset</button>
        </div>
      </form>
    </div>

    <!-- Student Info -->
    <div class="student-info" id="studentDetails">
      <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2"
        onclick="copyStudentInfo()">📋 Copy</button>
    </div>

    <!-- Timetable -->
    <div id="timetableContainer"></div>
  </div>

  <button id="scrollTop" class="btn btn-danger btn-reset">⬆ Top</button>

  <script>
    const timetableData = {
      cse: {
        title: "💻 Computer Science",
        color: "primary",
        years: {
          1: {
            Monday: ["Maths", "Physics", "Break", "C Programming", "English", "Workshop", "BEE"],
            Tuesday: ["C Programming", "English", "Break", "Maths", "Workshop", "Physics", "BEE"],
            Wednesday: ["English", "Workshop", "Break", "BEE", "Maths", "Physics", "C Programming"],
            Thursday: ["Physics", "C Programming", "Break", "English", "BEE", "Workshop", "Maths"],
            Friday: ["Workshop", "Maths", "Break", "Physics", "BEE", "C Programming", "English"],
            Saturday: ["BEE", "C Programming", "Break", "Maths", "English", "Sports", "Sports"]
          },
          2: {
                        Monday: ["DBMS", "DTE", "Break", "DSP", "SML", "Robotics", "Python"],
                        Tuesday: ["Python", "Robotics", "Break", "SML", "DTE", "DBMS", "DSP"],
                        Wednesday: ["DTE", "DBMS", "Break", "Python", "Robotics", "DSP", "SML"],
                        Thursday: ["Robotics", "DSP", "Break", "Python", "SML", "DTE", "DBMS"],
                        Friday: ["SML", "DTE", "Break", "Python", "Robotics", "DBMS", "DSP"],
                        Saturday: ["DSP", "Python", "Break", "SML", "DBMS", "Sports", "Sports"]
                    },
                    3: {
                        Monday: ["OSY", "FAM", "Break", "ADM", "MAD", "Data Analytics", "AIML"],
                        Tuesday: ["MAD", "Data Analytics", "Break", "AIML", "OSY", "ADM", "FAM"],
                        Wednesday: ["AIML", "OSY", "Break", "ADM", "FAM", "MAD", "Data Analytics"],
                        Thursday: ["ADM", "MAD", "Break", "FAM", "AIML", "Data Analytics", "OSY"],
                        Friday: ["FAM", "AIML", "Break", "Data Analytics", "OSY", "MAD", "ADM"],
                        Saturday: ["Project", "Seminar", "Break", "Self Study", "MAD", "OSY", "AIML"]
                    },
                }
            },
            it: {
                title: "🖥 IT",
                color: "danger",
                years: {
                    1: {
                        Monday: ["Maths", "Physics", "Break", "C Programming", "English", "Workshop", "BEE"],
                        Tuesday: ["C Programming", "English", "Break", "Maths", "Workshop", "Physics", "BEE"],
                        Wednesday: ["English", "Workshop", "Break", "BEE", "Maths", "Physics", "C Programming"],
                        Thursday: ["Physics", "C Programming", "Break", "English", "BEE", "Workshop", "Maths"],
                        Friday: ["Workshop", "Maths", "Break", "Physics", "BEE", "C Programming", "English"],
                        Saturday: ["BEE", "C Programming", "Break", "Maths", "English", "Sports", "Sports"]
                    },
                    2: {
                        Monday: ["DBMS", "OOP", "Break", "DSU", "MIC", "DTE", "Java"],
                        Tuesday: ["Java", "MIC", "Break", "OOP", "DBMS", "DTE", "DSU"],
                        Wednesday: ["DSU", "MIC", "Break", "DBMS", "OOP", "Java", "DTE"],
                        Thursday: ["MIC", "DTE", "Break", "OOP", "Java", "DBMS", "DSU"],
                        Friday: ["OOP", "Java", "Break", "DBMS", "DTE", "MIC", "DSU"],
                        Saturday: ["DTE", "MIC", "Break", "Java", "DBMS", "Sports", "Sports"]
                    },
                    3: {
                        Monday: ["OSY", "FAM", "Break", "ADM", "MAD", "Data Analytics", "AIML"],
                        Tuesday: ["MAD", "Data Analytics", "Break", "AIML", "OSY", "ADM", "FAM"],
                        Wednesday: ["AIML", "OSY", "Break", "ADM", "FAM", "MAD", "Data Analytics"],
                        Thursday: ["ADM", "MAD", "Break", "FAM", "AIML", "Data Analytics", "OSY"],
                        Friday: ["FAM", "AIML", "Break", "Data Analytics", "OSY", "MAD", "ADM"],
                        Saturday: ["Project", "Seminar", "Break", "Self Study", "FAM", "MAD", "Data Analytics"]
                    },
                }
            },
            ece: {
                title: "📡 Electronics",
                color: "dark",
                years: {
                    1: {
                        Monday: ["Maths", "Physics", "Break", "C Programming", "English", "Workshop", "BEE"],
                        Tuesday: ["C Programming", "English", "Break", "Maths", "Workshop", "Physics", "BEE"],
                        Wednesday: ["English", "Workshop", "Break", "BEE", "Maths", "Physics", "C Programming"],
                        Thursday: ["Physics", "C Programming", "Break", "English", "BEE", "Workshop", "Maths"],
                        Friday: ["Workshop", "Maths", "Break", "Physics", "BEE", "C Programming", "English"],
                        Saturday: ["BEE", "C Programming", "Break", "Maths", "English", "Sports", "Sports"]
                    },
                    2: {
                        Monday: ["EDC", "DE", "Break", "Networks", "EMI", "Filters", "Electronics Workshop"],
                        Tuesday: ["Networks", "EMI", "Break", "EDC", "Electrinics Workshop", "DE", "Filters"],
                        Wednesday: ["Electrinics Workshop", "DE", "Break", "Networks", "Filters", "EMI", "EDC"],
                        Thursday: ["Filters", "EMI", "Break", "Networks", "Electronics Workshop", "DE", "EDC"],
                        Friday: ["DE", "EDC", "Break", "Networks", "Filters", "EMI", "Electronics Workshop"],
                        Saturday: ["EMI", "Networks", "Break", "DE", "EDC", "Sports", "Sports"]
                    },
                    3: {
                        Monday: ["IoT", "Mobile Communication", "Break", "AMP", "ES", "VLSI Design", "Control System"],
                        Tuesday: ["ES", "VLSI Design", "Break", "IoT", "Mobile Communication", "Control System", "AMP"],
                        Wednesday: ["Control System", "AMP", "Break", "Mobile Communication", "IoT", "ES", "VLSI Design"],
                        Thursday: ["Mobile Communication", "IoT", "Break", "AMP", "ES", "VLSI Design", "Control System"],
                        Friday: ["VLSI Design", "Control System", "Break", "Mobile Communication", "IoT", "AMP", "ES"],
                        Saturday: ["Project", "Seminar", "Break", "Self Study", "IoT", "ES", "Control System"]
                    },
                }
            },
            mech: {
                title: "⚙ Mechanical",
                color: "info",
                years: {
                    1: {
                        Monday: ["Maths", "Physics", "Break", "C Programming", "English", "Workshop", "BEE"],
                        Tuesday: ["C Programming", "English", "Break", "Maths", "Workshop", "Physics", "BEE"],
                        Wednesday: ["English", "Workshop", "Break", "BEE", "Maths", "Physics", "C Programming"],
                        Thursday: ["Physics", "C Programming", "Break", "English", "BEE", "Workshop", "Maths"],
                        Friday: ["Workshop", "Maths", "Break", "Physics", "BEE", "C Programming", "English"],
                        Saturday: ["BEE", "C Programming", "Break", "Maths", "English", "Sports", "Sports"]
                    },
                    2: {
                        Monday: ["Thermo", "CAD", "Break", "Fluids", "Workshop Practice", "MT", "Engineering Maths"],
                        Tuesday: ["Workshop Practice", "MT", "Break", "Engineering Maths", "Fluids", "Thermo", "CAD"],
                        Wednesday: ["Fluids", "Thermo", "Break", "Engineering Maths", "CAD", "MT", "Workshop Practice"],
                        Thursday: ["CAD", "MT", "Break", "Fluids", "Thermo", "Engineering Maths", "Workshop Practice"],
                        Friday: ["Engineering Maths", "Workshop Practice", "Break", "Fluids", "Thermo", "MT", "CAD"],
                        Saturday: ["MT", "Thermo", "Break", "CAD", "Fluids", "Sports", "Sports"]
                    },
                    3: {
                        Monday: ["Heat Transfer", "Kinematics", "Break", "Design", "IE", "Numarical Methods", "Thermo"],
                        Tuesday: ["Design", "IE", "Break", "Kinematics", "Numarical Methods", "Thermo", "Heat Transfer"],
                        Wednesday: ["Kinematics", "Numarical Methods", "Break", "IE", "Heat Transfer", "Design", "Thermo"],
                        Thursday: ["IE", "Heat Transfer", "Break", "Numarical Methods", "Thermo", "Kinematics", "Design"],
                        Friday: ["Numarical Methods", "Thermo", "Break", "Design", "IE", "Kinematics", "Heat Transfer"],
                        Saturday: ["Project", "Seminar", "Break", "Self Study", "IE", "Thermo", "Design"]
                    },
                }
            },
            civil: {
                title: "🏗 Civil",
                color: "secondary",
                years: {
                    1: {
                        Monday: ["Maths", "Physics", "Break", "C Programming", "English", "Workshop", "BEE"],
                        Tuesday: ["C Programming", "English", "Break", "Maths", "Workshop", "Physics", "BEE"],
                        Wednesday: ["English", "Workshop", "Break", "BEE", "Maths", "Physics", "C Programming"],
                        Thursday: ["Physics", "C Programming", "Break", "English", "BEE", "Workshop", "Maths"],
                        Friday: ["Workshop", "Maths", "Break", "Physics", "BEE", "C Programming", "English"],
                        Saturday: ["BEE", "C Programming", "Break", "Maths", "English", "Sports", "Sports"]
                    },
                    2: {
                        Monday: ["Hydraulics", "Concrete", "Break", "Survey", "Civil Drawing", "Applied Maths", "Thermal"],
                        Tuesday: ["Survey", "Civil Drawing", "Break", "Applied Maths", "Concrete", "Thermal", "Hydraulics"],
                        Wednesday: ["Applied Maths", "Concrete", "Break", "Thermal", "Hydraulics", "Survey", "Civil Drawing"],
                        Thursday: ["Concrete", "Thermal", "Break", "Hydraulics", "Civil Drawing", "Applied Maths", "Survey"],
                        Friday: ["Civil Drawing", "Applied Maths", "Break", "Thermal", "Hydraulics", "Survey", "Concrete"],
                        Saturday: ["Thermal", "Concrete", "Break", "Applied Maths", "Survey", "Sports", "Sports"]
                    },
                    3: {
                        Monday: ["Transport", "Geotech", "Break", "Structural", "Construction", "Surveying II", "Design of Steel"],
                        Tuesday: ["Structural", "Construction", "Break", "Transport", "Geotech", "Surveying II", "Design of Steel"],
                        Wednesday: ["Construction", "Surveying II", "Break", "Design of Steel", "Geotech", "Structural", "Transport"],
                        Thursday: ["Surveying II", "Design of Steel", "Break", "Construction", "Structural", "Transport", "Geotech"],
                        Friday: ["Geotech", "Structural", "Break", "Construction", "Surveying II", "Transport", "Design of Steel"],
                        Saturday: ["Project", "Seminar", "Break", "Self Study", "Surveying II", "Geotech", "Transport"]
                    }
                }
            }
        }
      



    function createTimetable(branch, year, day) {
      const data = timetableData[branch];
      const subjects = data?.years?.[year]?.[day];
      if (!subjects) return `<div class="alert alert-warning mt-3">⚠ No timetable available for the selected day.</div>`;

      const times = ["10:00 - 11:00", "11:00 - 12:00", "12:00 - 1:00", "1:00 - 2:00", "2:00 - 3:00", "3:00 - 4:00", "4:00 - 5:00"];
      const rows = subjects.map((sub, i) =>
        `<tr><td>${times[i]}</td><td><span class="badge bg-${data.color}">${sub}</span></td></tr>`
      ).join("");

      return `
        <div class="card timetable mt-4 active">
          <div class="card-header bg-${data.color} text-white fw-bold">${data.title} - Year ${year} - ${day}</div>
          <div class="card-body">
            <table class="table table-bordered table-striped text-center">
              <thead class="table-${data.color}">
                <tr><th>Time</th><th>Subject</th></tr>
              </thead>
              <tbody>${rows}</tbody>
            </table>
          </div>
        </div>
      `;
    }

    // Handle form submission
    document.getElementById("branchForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const form = this;
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }

      const name = document.getElementById("studentName").value.trim();
      const branch = document.getElementById("branchSelect").value;
      const year = document.getElementById("yearSelect").value;
      const day = document.getElementById("daySelect").value;

      const branchText = document.querySelector(`#branchSelect option[value='${branch}']`).textContent;
      const yearText = document.querySelector(`#yearSelect option[value='${year}']`).textContent;

      // Show student details
      const detailsDiv = document.getElementById("studentDetails");
      detailsDiv.innerHTML = ` 
        <h4 class="fw-bold mb-3 text-primary">🧾 Student Timetable Details</h4>
        <p><strong>👤 Name:</strong> ${name}</p>
        <p><strong>🏫 Branch:</strong> ${branchText}</p>
        <p><strong>📘 Year:</strong> ${yearText}</p>
        <p><strong>📅 Day:</strong> ${day}</p>
        <div class="alert alert-success mt-3 mb-0">✅ Timetable loaded successfully!</div>
      `;
      detailsDiv.classList.add("active");

      // Show the timetable
      const timetableHTML = createTimetable(branch, year, day);
      const timetableContainer = document.getElementById("timetableContainer");
      timetableContainer.innerHTML = timetableHTML;
      timetableContainer.scrollIntoView({ behavior: "smooth" });
    });

    // Reset form
    document.getElementById("resetBtn").addEventListener("click", function () {
      document.getElementById("branchForm").reset();
      document.getElementById("branchForm").classList.remove("was-validated");
      document.getElementById("studentDetails").classList.remove("active");
      document.getElementById("timetableContainer").innerHTML = "";
    });

    // Copy student info
    function copyStudentInfo() {
      const info = document.getElementById("studentDetails").innerText;
      navigator.clipboard.writeText(info).then(() => {
        alert("📋 Student information copied!");
      });
    }

    // Scroll to top
    document.getElementById("scrollTop").addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Live clock
    function updateClock() {
      const clock = document.getElementById("clock");
      const now = new Date();
      clock.textContent = `🕒 ${now.toLocaleTimeString()}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
  </script>
</body>

</html>
