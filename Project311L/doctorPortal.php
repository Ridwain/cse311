<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

if (!isset($_SESSION['user_id'])) {
    header("Location: doctorLogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor's Portal</title>
  <link rel="stylesheet" href="portal.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Sacramento&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,700&display=swap" rel="stylesheet">
</head>
<body onload="loadContent('dashboard')">
  <header class="header">
    <h1>Welcome to Doctor's Portal</h1>
  </header>
  <nav id="sidenav" class="sidenav">
    <h1 id="brandName">WCH</h1>
    <a href="javascript:void(0)" onclick="loadContent('dashboard')">Dashboard</a>
    <a href="javascript:void(0)" onclick="loadContent('appointments')">Appointments</a>
    <a href="javascript:void(0)" onclick="loadContent('patients')">Patients</a>
    <a href="javascript:void(0)" onclick="loadContent('search')">Search 🔍</a>
    <a href="dLogout.php" class="btn">Log Out</a>
  </nav>

  <!-- Main Content Area -->
  <div id="main">
    <div id="content">
      
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="docScript.js"></script>
</body>
</html>
