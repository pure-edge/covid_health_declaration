<?php
// NOTE: I DIDN'T USE THIS FILE. 
// SUPPOSE TO BE I WILL CALL THIS FOR AJAX.RELOADING THE DATATABLE AFTER ADDING/EDITING RECORDS.
// BUT I KEEP ON GETTING ERRORS, AND I COULDN'T FIGURE OUT HOW TO DO IT.
// HOWEVER, I WILL KEEP THIS JUST IN CASE I WILL NEED IT IN THE FUTURE 

include 'db_config.php';

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$connection) {
    throw new Exception("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM ". TBL_NAME . " ORDER BY id DESC";
$result = mysqli_query($connection, $query);

if (!$result) {
    echo json_encode(array('error' => 'Failed to retrieve data'));
} 
else {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        // Rename the keys as desired
        $newRow = array(
            'Id' => $row['id'],
            'Name' => $row['name'],
            'Sex' => $row['sex'],
            'Age' => $row['age'],
            'Mobile' => $row['mobile_number'],
            'Email' => $row['email_address'],
            'Temp' => $row['body_temp_celsius'],
            'Diagnosed' => $row['covid19_diagnosed'],
            'Encountered' => $row['covid19_encounter'],
            'Vaccinated' => $row['vaccinated'],
            'Nationality' => $row['nationality'],
            'Actions'=> '',
        );

        $data[] = $newRow;
    }

    echo json_encode($data);
}

mysqli_free_result($result);
mysqli_close($connection);
?>
