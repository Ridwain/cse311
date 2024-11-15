<?php
// Include database connection (dbcon.php should contain your DB connection)
include('dbcon.php');

// Check if specialization data is provided
if (isset($_POST['specialization'])) {
    $specialization = $_POST['specialization'];

    // Query the database to fetch doctors with the selected specialization
    $sql = "SELECT ID, Full_name FROM Doctor_info WHERE Specialities = '$specialization'";
    $result = mysqli_query($connection, $sql);

    // Check if there are any doctors
    if (mysqli_num_rows($result) > 0) {
        // Start with a default option
        echo '<option value="">Select Doctor</option>';

        // Loop through the results and output each doctor
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['ID'] . '">' . $row['Full_name'] . '</option>';
        }
    } else {
        // If no doctors found, display a message
        echo '<option value="">No doctors available</option>';
    }
} else {
    echo '<option value="">Select Doctors</option>';
}
