<?php
include 'dbcon.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: patientLogin.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient's Portal</title>
  <link rel="stylesheet" href="portal.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Sacramento&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,700&display=swap" rel="stylesheet">

  <script type="text/javascript">
    function preventBack() {
      window.history.forward()
    };
    setTimeout("preventBack()", 0);
    window.onunload = function() {
      null;
    }
  </script>
</head>

<body onload="loadContent('dashboard')">
  <header class="header">
    <h1>Welcome to Patient's Portal</h1>
  </header>
  <nav id="sidenav" class="sidenav">
    <h1 id="brandName">WCH</h1>
    <a href="javascript:void(0)" onclick="loadContent('dashboard')">Dashboard</a>
    <a href="javascript:void(0)" onclick="loadContent('makeAppointment')">Make Appointment</a>
    <a href="javascript:void(0)" onclick="loadContent('search')">Search 🔍</a>
    <a href="pLogout.php" class="btn">Log Out</a>

  </nav>

  <!-- Main Content Area -->
  <div id="main">
    <div id="content">

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="patientScript.js"></script>
  <script>
    // JavaScript function to make AJAX call
    function getdoctor(specialization) {
      // Check if a specialization is selected
      if (specialization) {

        const selectedValue = document.querySelector('select[name="Specialities"]').value;
        console.log(selectedValue);
        //Make an AJAX call to fetch doctors based on specialization
        $.ajax({
          type: 'POST', // HTTP request type (POST)
          url: 'getdoctor.php', // PHP file to process the request
          data: {
            specialization: specialization
          }, // Send specialization as POST data
          success: function(response) { // On success, do the following
            // Update the doctors dropdown with the response (list of doctors)
            $('#Full_name').html(response);
          },
          error: function() {
            alert('Error fetching doctors.');

          }
        });
      } else {
        // If no specialization is selected, reset the doctor dropdown
        $('#Full_name').html('<option value="">Select Doctor</option>');

      }
    }
  </script>
</body>

</html>