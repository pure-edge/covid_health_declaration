<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'covid');
define('TBL_NAME', 'person');

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $temp = $_POST['temperature'];
    $diagnosed = $_POST['diagnosed'];
    $encountered = $_POST['encountered'];
    $vaccinated = $_POST['vaccinated'];
    $nationality = $_POST['nationality'];

    $sql = "INSERT INTO " . TBL_NAME . 
        " (name, sex, age, mobile_number, email_address, body_temp_celsius, covid19_diagnosed, " .
        "covid19_encounter, vaccinated, nationality) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssisssssss", $name, $sex, $age, $mobile, $email, 
        $temp, $diagnosed, $encountered, $vaccinated, $nationality);

    // Execute the prepared statement
    $query_run = mysqli_stmt_execute($stmt);

    if($query_run)
    {
        /*echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');*/
    }
    else
    {
        //echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>