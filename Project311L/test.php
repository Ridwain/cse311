<!-- <select id="Specialities" class="form-control">
    <option value="">Select Specialization</option>
    <?php
    $sql = "SELECT Distinct Specialities FROM Doctor_info";
    $query = mysqli_query($connection, $sql);
    foreach ($query as $data) {
        echo '<option value="' . $data["ID"] . '">' . $data["Specialities"] . ' </option>';
    }
    ?>
</select> -->


<?php
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lan="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=ed" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script>
        function ctor(val) {
            $.ajax({
                type: "POST",
                url: "getdoctor.php",
                data: {
                    specialities: val
                },
                success: function(response) {
                    $("#Full_name").html(response);
                }
            });
        }
    </script> -->

</head>

<body>
    <Header>
        <h1><strong>Appointment Form</strong></h1>
        <br><br>
    </Header>
    <form method="POST" action="">
        <div class="form-group">
            <label for="patient_id">Patient Id</label>
            <input type="text" class="form-control" id="patient_id" name="patient_id" placeholder="Patient Id">
        </div>
        <div class="form-group">
            <label for="patient_name">Patient Name</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Patient Name">
        </div>
        <div class="form-group">
            <label for="patient_email">Patient Email</label>
            <input type="email" class="form-control" id="patient_email" name="patient_email" placeholder="Patient Email">
        </div>

        <div class="form-group">
            <label for="Specialities">Specialization</label>
            <select name="Specialities" class="form-control" onchange="getdoctor(this.value);" required="required">
                <option value="">Select Specialization</option>
                <?php
                $ret = mysqli_query($connection, "SELECT  * FROM Specialities;");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <option value="<?php echo htmlentities($row['Specialities']); ?>">
                        <?php echo htmlentities($row['Specialities']); ?>
                    </option>
                <?php } ?>
            </select>


        </div>
        <div class="form-group">
            <label for="Full_name">Doctor Name</label>
            <select id="Full_name" name="Full_name" class="form-control">
                <option value="">Select Doctor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_id">Doctor Id</label>
            <input type="text" class="form-control" id="ID" name="ID" placeholder="Doctor Id">
        </div>

        <div class="form-group">
            <label for="date">Appointment Date</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Appointment Date">
        </div>
        <div class="form-group">
            <label for="time_slot">Time Slot</label>
            <input type="text" class="form-control" id="time_slot" name="time_slot" placeholder="Time Slot">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        // JavaScript function to make AJAX call
        function getdoctor(specialization) {
            // Check if a specialization is selected
            if (specialization) {
                console.log('hello world');
                console.log(specialization);
                // Make an AJAX call to fetch doctors based on specialization
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