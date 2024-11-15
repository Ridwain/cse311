<?php
// Check if `page` parameter is set
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $allowed_pages = ['dashboard', 'makeAppointment', 'search'];
  
  //  Check if requested page is allowed
  if (in_array($page, $allowed_pages)) {
    $file_path = "patientContent/$page.php";
    
    // Check if file exists before including
    if (file_exists($file_path)) {
      include $file_path;
    } else {
      echo "<p>Error: The requested page file '$file_path' does not exist.</p>";
    }
  } else {
    echo "<p>Page not found.</p>";
  }
} else {
  echo "<p>No page specified.</p>";
}
