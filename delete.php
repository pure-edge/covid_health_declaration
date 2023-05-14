<?php
include 'db_config.php';

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM " . TBL_NAME . " WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the prepared statement
    $query_run = mysqli_stmt_execute($stmt);

    if($query_run)
    {
        echo mysqli_stmt_affected_rows($stmt) . " affected rows\n";
        echo 'Success';
        /*echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');*/
    }
    else
    {
        echo 'Something went wrong';
        //echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>