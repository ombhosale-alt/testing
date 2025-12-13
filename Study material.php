<?php
$bodyClass = "scrolled-page";
include 'Navbar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academic Assistance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #eef2f3, #d9e4f5);
      font-family: 'Poppins', sans-serif;
    }

    /* Header */
    .page-header {
      background: linear-gradient(135deg, #4e73df, #1cc88a);
      color: white;
      padding: 60px 20px;
      text-align: center;
      margin-bottom: 60px;
      border-radius: 0 0 40px 40px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      position: relative;
      overflow: hidden;
    }
    .page-header h1 {
      font-size: 2.8rem;
      font-weight: bold;
      background: linear-gradient(to right, #fff, #ffeaa7);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .page-header p {
      font-size: 1.2rem;
      opacity: 0.9;
    }
    /* Wave effect */
    .page-header::after {
      content: "";
      position: absolute;
      bottom: -1px;
      left: 0;
      width: 100%;
      height: 60px;
      background: url('https://svgshare.com/i/ubU.svg') repeat-x;
    }

    /* Cards */
    .card {
      border: none;
      border-radius: 20px;
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.7);
      box-shadow: 0px 8px 25px rgba(0,0,0,0.1);
      transition: transform 0.5s, box-shadow 0.5s;
      text-align: center;
      padding: 25px;
      position: relative;
      animation: float 5s ease-in-out infinite;
    }
    .card:hover {
      transform: translateY(-15px) scale(1.05);
      box-shadow: 0px 15px 40px rgba(0,0,0,0.3);
    }

    /* Floating animation */
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }

    /* Icon */
    .card-icon {
      font-size: 55px;
      margin-bottom: 15px;
      transition: transform 0.5s, text-shadow 0.5s;
    }
    .card:hover .card-icon {
      transform: scale(1.3);
      text-shadow: 0 0 15px rgba(255,255,255,0.9);
    }

    /* Icon colors */
    .syllabus i { color: #3498db; }
    .notes i { color: #1abc9c; }
    .lab i { color: #e67e22; }
    .viva i { color: #9b59b6; }
    .mcq i { color: #e74c3c; }
    .imp i { color: #f1c40f; }

    /* Links */
    .card a {
      text-decoration: none;
      color: #1cc88a;
      font-weight: bold;
      transition: color 0.3s;
    }
    .card a:hover {
      color: #4e73df;
    }

    footer {
       padding: 15px;
     margin-top: 50px;
       }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="page-header">
    <h1><i class="fa-solid fa-book-open"></i> Student Assistance</h1>
    <p>Find syllabus, notes, papers and planners all in one place</p>
  </div>

  <div class="container">
    <div class="row g-4">

      <!-- Syllabus -->
      <div class="col-md-6 col-lg-4">
        <div class="card syllabus">
          <div class="card-icon"><i class="fa-solid fa-scroll"></i></div>
          <h5 class="card-title">MSBTE Diploma Syllabus</h5>
          <p class="text-muted">Download All Branch Syllabus</p>
          <a href="https://www.diplomasolution.com/2021/04/msbte-i-scheme-all-branch-all-semester.html">View Syllabus</a>
        </div>
      </div>

      <!-- Notes -->
      <div class="col-md-6 col-lg-4">
        <div class="card notes">
          <div class="card-icon"><i class="fa-solid fa-book"></i></div>
          <h5 class="card-title">MSBTE Notes Pdf</h5>
          <p class="text-muted">Download Free Notes</p>
          <a href="https://www.diplomasolution.com/2023/08/msbte-diploma-notes-pdf-diploma.html">View Notes</a>
        </div>
      </div>

      <!-- Lab Manual -->
      <div class="col-md-6 col-lg-4">
        <div class="card lab">
          <div class="card-icon"><i class="fa-solid fa-flask"></i></div>
          <h5 class="card-title">MSBTE Lab Manual Answer Pdf</h5>
          <p class="text-muted">Here You Will Get All Lab Manual Answer</p>
          <a href="https://www.diplomasolution.com/2021/05/msbte-i-scheme-lab-manual-answers-pdf.html">View Lab Manual Answers</a>
        </div>
      </div>

      <!-- Viva Qs -->
      <div class="col-md-6 col-lg-4">
        <div class="card viva">
          <div class="card-icon"><i class="fa-solid fa-comments"></i></div>
          <h5 class="card-title">External VIVA QS & Answers</h5>
          <p class="text-muted">Here You Will Get External VIVA Qs & Answers</p>
          <a href="https://www.diplomasolution.com/2021/06/msbte-external-oralpractical-subject.html">View Qs & Answers</a>
        </div>
      </div>

      <!-- MCQs -->
      <div class="col-md-6 col-lg-4">
        <div class="card mcq">
          <div class="card-icon"><i class="fa-solid fa-list-check"></i></div>
          <h5 class="card-title">MCQs With Answer Pdf</h5>
          <p class="text-muted">Here You Will Get MCQs With Answer Pdf</p>
          <a href="https://www.diplomasolution.com/2021/07/msbte-mcqs-msbte-i-scheme-diploma-all.html">View MCQs With Answer</a>
        </div>
      </div>

      <!-- IMP Questions -->
      <div class="col-md-6 col-lg-4">
        <div class="card imp">
          <div class="card-icon"><i class="fa-solid fa-star"></i></div>
          <h5 class="card-title">MSBTE IMP Qs & Answers</h5>
          <p class="text-muted">Refer This Questions</p>
          <a href="https://www.diplomasolution.com/2022/12/msbte-important-practice-questions-for.html">View IMP Qs & Answers</a>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>







<?php include('Footer.php') ?>