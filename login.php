<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>3D Student Login/Register</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      height: 100vh;
      background: #0d1b2a url('https://www.transparenttextures.com/patterns/brick-wall-dark.png');
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
      perspective: 1200px;
      overflow: hidden;
      position: relative;
    }

    /* Lamp */
    .lamp-container {
      position: absolute;
      top: 30px;
      width: 100%;
      display: flex;
      justify-content: center;
      z-index: 1;
    }

    .lamp {
      width: 80px;
      height: 30px;
      background: #2c3e50;
      border-radius: 5px 5px 0 0;
      box-shadow: 0 10px 30px rgba(255, 255, 200, 0.6);
      position: relative;
      animation: glow 2s ease-in-out infinite alternate;
    }

    .lamp::after {
      content: '';
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      border-left: 120px solid transparent;
      border-right: 120px solid transparent;
      border-top: 200px solid rgba(255, 255, 200, 0.06);
      filter: blur(4px);
    }

    @keyframes glow {
      from { box-shadow: 0 10px 30px rgba(255, 255, 200, 0.4); }
      to   { box-shadow: 0 10px 40px rgba(255, 255, 200, 0.8); }
    }

    /* 3D Card Container */
    .card-container {
      width: 400px;
      height: 520px;
      position: relative;
      transform-style: preserve-3d;
      transition: transform 1s;
    }

    .form-card {
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.07);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(15px);
      position: absolute;
      top: 0;
      left: 0;
      backface-visibility: hidden;
      color: white;
      padding: 40px;
    }

    .form-card h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .form-control, .form-select {
      background-color: rgba(246, 241, 241, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
    }

    .form-control::placeholder {
      color: #bbb;
    }

    .form-control:focus, .form-select:focus {
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
      border-color: white;
    }

    .btn-slide {
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: #fff;
      font-weight: bold;
      transition: 0.3s;
      border: none;
      margin-top: 10px;
    }

    .btn-slide:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px #00c6ff;
    }

    .toggle-link {
      text-align: center;
      color: #ccc;
      cursor: pointer;
      margin-top: 20px;
    }

    .toggle-link:hover {
      color: white;
      text-decoration: underline;
    }

    /* Register side flipped */
    .register-card {
      transform: rotateY(180deg);
    }

    /* Flip effect on parent container */
    .flipped {
      transform: rotateY(180deg);
    }
  </style>
</head>
<body>

  <!-- Lamp -->
  <div class="lamp-container">
    <div class="lamp"></div>
  </div>

  <!-- 3D Flip Card Container -->
  <div class="card-container" id="cardContainer">

    <!-- Login Card -->
    <div class="form-card login-card">
      <h2> Student Login</h2>
      <form>
        <div class="mb-3">
          <label>User Type</label>
          <select class="form-select">
            <option>Student</option>
            <option>Teacher</option>
            <option>Admin</option>
          </select>
        </div>
        <div class="mb-3">
          <label>Username</label>
          <input type="text" class="form-control" placeholder="Enter username">
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Enter password">
        </div>
       <a href="index.php"> <button type="submit" class="btn btn-slide w-100">Login</button></a>
        <div class="toggle-link" onclick="flipCard()">Don't have an account? Register</div>
      </form>
    </div>

    <!-- Register Card -->
    <div class="form-card register-card">
      <h2> New Student Register</h2>
      <form>
        <div class="mb-3">
          <label>Full Name</label>
          <input type="text" class="form-control" placeholder="Enter full name">
        </div>
        <div class="mb-3">
          <label>Email</label>
          <input type="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Create password">
        </div>
        <div class="mb-3">
          <label>Confirm Password</label>
          <input type="password" class="form-control" placeholder="Confirm password">
        </div>
        <button type="submit" class="btn btn-slide w-100">Register</button>
        <div class="toggle-link" onclick="flipCard()">Already have an account? Login</div>
      </form>
    </div>

  </div>

  <!-- JavaScript for 3D Flip -->
  <script>
    function flipCard() {
      document.getElementById("cardContainer").classList.toggle("flipped");
    }
  </script>
</body>
</html>
