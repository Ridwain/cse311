<?php
// Start the session to get user info
session_start();
include 'dbcon.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: doctorLogin.php');
    exit();
}

// Getting user_id from session (after login)
$user_id = $_SESSION['user_id'];

// Query to fetch doctor details from Doctor_info table by joining with Users table
$query = "SELECT 
                Doctor_info.ID As doctor_id, 
                Doctor_info.Full_name As doctor_name, 
                Doctor_info.Email As doctor_email,
                Doctor_info.Birth_date As doctor_birthdate,
                Users.Phone_Number As doctor_phone_number, 
                Doctor_info.Gender As doctor_gender,
                Doctor_info.Address As doctor_address,
                Doctor_info.Specialities As doctor_specialities
          FROM 
                doctor_info
          JOIN 
                Users 
          ON 
                Doctor_info.User_id = Users.ID 
          WHERE 
                Users.ID = '$user_id'";


$result = $connection->query($query);

// Check if the doctor exists
if ($result->num_rows > 0) {
    // Fetch the row data
    $doctor = $result->fetch_assoc();
} else {
    echo "Doctor information not found.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Doctor Dashboard</title>
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

<body>
    <div class="container mt-5">
        <h3 class="text-muted">Doctor's <span class="text-primary">Info</span></h3>


        <div class="table-responsive mt-4">
            <table class="table table-bordered details-table">
                <thead class="thead-light">
                    <tr>
                        <th colspan="4" class="text-center">Doctor Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td><?php echo htmlspecialchars($doctor['doctor_name']); ?></td>
                        <td><strong>Email</strong></td>
                        <td><?php echo htmlspecialchars($doctor['doctor_email']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Birth Date</strong></td>
                        <td><?php echo htmlspecialchars($doctor['doctor_birthdate']); ?></td>
                        <td><strong>Address</strong></td>
                        <td><?php echo htmlspecialchars($doctor['doctor_address']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Gender</strong></td>
                        <td><?php echo htmlspecialchars($doctor['doctor_gender']); ?></td>
                        <td><strong>Speciality</strong></td>
                        <td><?php echo htmlspecialchars($doctor['doctor_specialities']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number</strong></td>
                        <td><?php echo htmlspecialchars($doctor['doctor_phone_number']) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>