<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
    <link rel="stylesheet" href="styles.css" />
    <title>Bootstap 5 Responsive Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>CoderBalo</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

            <div class="container-fluid px-4">
                
                <!-- BOXES -->
                <?php require_once "functions.php" ?>
                <div class="row g-3 my-2">
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo getCountOfCOVID19Encounter();?>
                                </h3>
                                <p class="fs-5">COVID-19 ENCOUNTER</p>
                            </div>
                            <i class="fa-solid fa-viruses fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo getCountOfVaccinated();?>
                                </h3>
                                <p class="fs-5">VACCINATED</p>
                            </div>
                            <i class="fa-solid fa-syringe fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo getCountOfFever();?>
                                </h3>
                                <p class="fs-5">FEVER</p>
                            </div>
                            <i class="fa-solid fa-temperature-full fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo getCountOfAdults();?>
                                </h3>
                                <p class="fs-5">ADULT</p>
                            </div>
                            <i class="fa-solid fa-person fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo getCountOfMinors();?>
                                </h3>
                                <p class="fs-5">MINOR</p>
                            </div>
                            <i class="fa-solid fa-child fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    <?php echo getCountOfForeigners();?>
                                </h3>
                                <p class="fs-5">FOREIGNER</p>
                            </div>
                            <i class="fa-solid fa-plane fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
                <!-- /BOXES -->

                <!-- Contact Tracer Data Table -->
                <div class="row my-5">  
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="fs-4">Contact Tracer Data</h3>
                        <button class="btn btn-primary" id="addRecordButton" data-bs-toggle="modal" data-bs-target="#personModal">Add New Record</button>
                    </div>
                    <div class="col">
                        <?php
                            try {
                                $records = getRecords();

                                if (count($records) > 0) {
                                    echo "<table class='table bg-white rounded shadow-sm table-hover' id='dataTable'>";

                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Id</th>";
                                    echo "<th>Name</th>";
                                    echo "<th>Sex</th>";
                                    echo "<th>Age</th>";
                                    echo "<th>Mobile</th>";
                                    echo "<th>Email</th>";
                                    echo "<th>Temp</th>";
                                    echo "<th>Diagnosed</th>";
                                    echo "<th>Encountered</th>";
                                    echo "<th>Vaccinated</th>";
                                    echo "<th>Nationality</th>";
                                    echo "<th>Actions</th>";    
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";

                                    foreach ($records as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['sex'] . "</td>";
                                        echo "<td>" . $row['age'] . "</td>";
                                        echo "<td>" . $row['mobile_number'] . "</td>";
                                        echo "<td>" . $row['email_address'] . "</td>";
                                        echo "<td>" . $row['body_temp_celsius'] . "</td>";
                                        echo "<td>" . $row['covid19_diagnosed'] . "</td>";
                                        echo "<td>" . $row['covid19_encounter'] . "</td>";
                                        echo "<td>" . $row['vaccinated'] . "</td>";
                                        echo "<td>" . $row['nationality'] . "</td>";
                                        echo "<td>";
                                        echo "<button class='editButton btn btn-sm btn-primary' data-toggle='modal' data-target='#editModal'>Edit</button>";
                                        echo "<button class='deleteButton btn btn-sm btn-danger' data-toggle='modal' data-target='#deleteModal'>Delete</button>";
                                        echo "</td>";
                                        //echo "<td>";
                                        //echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //echo ' <a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        //echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                } else {
                                    echo "<div class='alert alert-danger'> <em> No records were found.</em></div>";
                                }
                            } catch (Exception $e) {
                                echo "An error occurred: " . $e->getMessage();
                            }
                        ?>
                    </div>
                </div>
                <!-- /Contact Tracer Data Table -->

                <!-- MODAL -->
                <div class="modal fade" id="personModal" tabindex="-1" aria-labelledby="personModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="personModalLabel">Add New Record</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="recordId" />
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingName" name="name" placeholder="Jon Doe">
                                    <label for="floatingName">Name</label> 
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingAge" name="age" placeholder="Your age">
                                    <label for="floatingAge">Age</label> 
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sex</label><br/>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexOptions" id="sexRadioMale" value="Male">
                                        <label class="form-check-label" for="sexRadioMale">Male</label> 
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexOptions" id="sexRadioFemale" value="Female">
                                        <label class="form-check-label" for="sexRadioFemale">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexOptions" id="sexRadioCustom" value="Custom">
                                        <label class="form-check-label" for="sexRadioCustom">Custom</label>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingMobile" name="mobile" placeholder="09123456789">
                                    <label for="floatingMobile">Mobile Number</label> 
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com">
                                    <label for="floatingEmail">Email address</label> 
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingTemperature" name="temp" placeholder="09123456789">
                                    <label for="floatingMobile">Temperature (Celsius)</label>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">COVID-19 Diagnosed?</label><br/>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="diagnosedOptions" id="diagnosedRadioYes" value="Yes">
                                        <label class="form-check-label" for="diagnosedRadioYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="diagnosedOptions" id="diagnosedRadioNo" value="No">
                                        <label class="form-check-label" for="diagnosedRadioNo">No</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">COVID-19 Encountered?</label><br/> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="encounteredOptions" id="encounteredRadioYes" value="Yes">
                                        <label class="form-check-label" for="encounteredRadioYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="encounteredOptions" id="encounteredRadioNo" value="No">
                                        <label class="form-check-label" for="encounteredRadioNo">No</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Vaccinated?</label><br/> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vaccinatedOptions" id="vaccinatedRadioYes" value="Yes">
                                        <label class="form-check-label" for="vaccinatedRadioYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vaccinatedOptions" id="vaccinatedRadioNo" value="No">
                                        <label class="form-check-label" for="vaccinatedRadioNo">No</label>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingNationality" name="nationality" placeholder="Filipino, American, etc.">
                                    <label for="floatingMobile">Nationality</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button id="submitButton" type="button" form="insertForm" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <script src="script.js"></script>
</body>

</html>