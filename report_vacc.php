<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Lookup</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Check Status</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="fname">Enter First Name:</label>
        <input type="text" id="fname" name="fname">
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database credentials
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $dbname = "user_db"; // Replace with your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement using prepared statements
        $sql = "SELECT fname, lname, age, gender, last_vaccination_date, appointment_date, status FROM `ap-status` WHERE fname = ?";
        $stmt = $conn->prepare($sql);

        // Bind parameters to statement
        $fname = $_POST['fname'];
        $stmt->bind_param("s", $fname);

        // Execute statement
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if records exist
        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<h2>Status Information</h2>";
            echo "<table>";
            echo "<tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Gender</th><th>Last Vaccination Date</th><th>Appointment Date</th><th>Status</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["fname"] . "</td>";
                echo "<td>" . $row["lname"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["last_vaccination_date"] . "</td>";
                echo "<td>" . $row["appointment_date"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No status records found for first name: $fname</p>";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
