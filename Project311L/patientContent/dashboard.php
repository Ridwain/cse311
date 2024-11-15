<?php
session_start();
include 'dbcon.php';



// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: patientLogin.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Query to fetch patient details from Patient_Info table by joining with Users table
$query = "SELECT  
                Patient_Info.Full_name AS patient_name, 
                Patient_Info.Email AS patient_email,
                Patient_Info.Birth_date AS patient_birthdate,
                Patient_Info.Gender AS patient_gender,
                Patient_Info.Address AS patient_address,
                Patient_Info.Blood_Grp AS patient_blood_grp,
                Users.Phone_Number AS patient_phone_number,
                Patient_Info.user_id AS patient_user_id
          FROM 
                Patient_Info
          JOIN 
                Users 
          ON 
                Patient_Info.User_id = Users.ID 
          WHERE 
                Users.ID = '$user_id'";

$result = $connection->query($query);

// Check if the patient exists
if ($result && $result->num_rows > 0) {
    // Fetch the row data
    $patient = $result->fetch_assoc();
} else {
    echo "Patient information not found.";
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
    <title>Patient Dashboard</title>
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
        <h3 class="text-muted">Patient's <span class="text-primary">Info</span></h3>

        <div class="table-responsive mt-4">
            <table class="table table-bordered details-table">
                <thead class="thead-light">
                    <tr>
                        <th colspan="4" class="text-center">Patient Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td><?php echo htmlspecialchars($patient['patient_name']); ?></td>
                        <td>Email</td>
                        <td><?php echo htmlspecialchars($patient['patient_email']); ?></td>
                    </tr>
                    <tr>
                        <td>Birth Date</td>
                        <td><?php echo htmlspecialchars($patient['patient_birthdate']); ?></td>
                        <td>Gender</td>
                        <td><?php echo htmlspecialchars($patient['patient_gender']); ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo htmlspecialchars($patient['patient_address']); ?></td>
                        <td>Blood Group</td>
                        <td><?php echo htmlspecialchars($patient['patient_blood_grp']); ?></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><?php echo htmlspecialchars($patient['patient_phone_number']); ?></td>
                        <td>UHID</td>
                        <td><?php echo htmlspecialchars($patient['patient_user_id']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>