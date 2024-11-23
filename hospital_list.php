<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VaccineWay</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   


    


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
         <img src="img/logo.jpg" class="img-fluid" alt="" style="width: 230px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                
                
            
        
            </div>
    
            <a href="index.php" class="btn btn-primary py-2 px-4 ms-3">Log out</a>
        </div>
    </nav>
<br>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 20px;
            width: 700px;
            height: 390px;
            margin-bottom: 20px;
            margin: auto;
        }


        thead, tbody, tfoot, tr, td, th {
    border-color: inherit;
    border-style: solid;
    border-width: 0;
    background-color: #1E90FF;
}

h2 {
    color: #fff;
    text-align: center;
    margin-top: 120px;
}
        form input[type="text"],
        form input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
        }
        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
            color: black;
        }
        td {
          color: white;
          font-size: 1.2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: red;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
   
</head>
<body>
    




<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        // Add hospital
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        $sql = "INSERT INTO hospitals_vac (name, address, phone) VALUES ('$name', '$address', '$phone')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
          
          alert('Data Inserted Successfully');
          
          </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['update'])) {
        // Update hospital
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $sql = "UPDATE hospitals_vac SET name='$name', address='$address', phone='$phone' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
          
         alert('Data Updated Sucessfully!');
          
           </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if (isset($_GET['delete'])) {
    // Delete hospital
    $id = $_GET['delete'];
    $sql = "DELETE FROM hospitals_vac WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
          
         alert('Data Updated Sucessfully!');
          
           </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['edit'])) {
    // Edit hospital
    $id = $_GET['edit'];
    $sql = "SELECT * FROM hospitals_vac WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<h2>Add Hospital</h2>
<form method="post" action="">
    Name: <input type="text" name="name" value="<?php echo isset($row) ? $row['name'] : ''; ?>" required><br>
    Address: <input type="text" name="address" value="<?php echo isset($row) ? $row['address'] : ''; ?>" required><br>
    Phone: <input type="text" name="phone" value="<?php echo isset($row) ? $row['phone'] : ''; ?>" required><br>
    <?php if (isset($row)) { ?>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" name="update" value="Update Hospital">
    <?php } else { ?>
        <input type="submit" name="add" value="Add Hospital">
    <?php } ?>
</form>

<h2>List of Hospitals</h2>
<?php
$sql = "SELECT * FROM hospitals_vac";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>
                    <a href='?edit=" . $row['id'] . "'>Edit</a> |
                    <a href='?delete=" . $row['id'] . "'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>


</body>
</html>