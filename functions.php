<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'covid');
define('TBL_NAME', 'person');

function getCount($sql) {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $count = $row["count"];

        // Close the database connection
        $conn->close();

        return $count;
    } else {
        // Close the database connection
        $conn->close();

        return 0;
    }
}

function getCountOfCOVID19Encounter() {
    $sql = "SELECT COUNT(*) as count FROM person WHERE covid19_encounter = 'Yes'";
    return getCount($sql);
}

function getCountOfVaccinated() {
    $sql = "SELECT COUNT(*) as count FROM person WHERE vaccinated = 'Yes'";
    return getCount($sql);
}

// Function to retrieve the count of records with body temperature greater than or equal to 37.8 Celsius
function getCountOfFever() {
    $sql = "SELECT COUNT(*) as count FROM person WHERE body_temp_celsius >= 37.8";
    return getCount($sql);
}

function getCountOfAdults() {
    $sql = "SELECT COUNT(*) as count FROM person WHERE age >= 18";
    return getCount($sql);
}

function getCountOfMinors() {
    $sql = "SELECT COUNT(*) as count FROM person WHERE age < 18";
    return getCount($sql);
}

function getCountOfForeigners() {
    $sql = "SELECT COUNT(*) as count FROM person WHERE nationality != 'Filipino'";
    return getCount($sql);
}

function getRecords() {
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if (!$connection) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
    
    $query = "SELECT * FROM ". TBL_NAME . " ORDER BY id DESC";
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        mysqli_close($connection);
        throw new Exception("Query failed: " . mysqli_error($connection));
    }
    
    $data = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    mysqli_free_result($result);
    mysqli_close($connection);
    
    return $data;
}

?>
