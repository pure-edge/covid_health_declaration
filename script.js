$(document).ready(function() {
    $('#dataTable').DataTable({
        "paging": true, // Enable pagination
        "searching": true, // Enable search bar
        "order": [], // Enable sorting
        columnDefs: [
            { targets: [0], visible: false }  // Hide the first column (index 0)
        ],
        "info": true, // Enable showing information
        "lengthChange": true, // Enable changing the number of entries displayed per page
        "scrollX": true, // Enable horizontal scrolling
        "language": {
            "paginate": {
                "previous": "&laquo;", // Customizing pagination previous button
                "next": "&raquo;" // Customizing pagination next button
            }
        }
    });
    
    // clear all inputs on modal close
    $('#personModal').on('hidden.bs.modal', function () {
        $(this).find('input').val('');
        $('input[type="radio"]').prop('checked', false);
    });

    // clear all inputs on add new record button
    $('#addRecordButton').on('click', function () {
        $(this).find('input').val('');
        $('input[type="radio"]').prop('checked', false);

        $('#personModalLabel').text('Add New Record');
        $('#submitButton').text('Add');
    });

    // fill-up the modal with the data from the table row whose edit button was clicked
    $('.editButton').on('click', function() {
        // Retrieve the row data and populate the form inputs
        var dataTable = $('#dataTable').DataTable();
        var row = dataTable.row($(this).closest('tr'));
        var rowData = row.data();

        $('#recordId').val(rowData[0]);
        $('#floatingName').val(rowData[1]);
        $('#floatingAge').val(rowData[3]);
        $('#floatingMobile').val(rowData[4]);
        $('#floatingEmail').val(rowData[5]);
        $('#floatingTemperature').val(rowData[6]);
        $('#floatingNationality').val(rowData[10]);

        if (rowData[2] === 'Male') {
            $('#sexRadioMale').prop('checked', true);
        } else if (rowData[2] === 'Female') {
            $('#sexRadioFemale').prop('checked', true);
        }

        if (rowData[7] === 'Yes') {
            $('#diagnosedRadioYes').prop('checked', true);
        } else if (rowData[7] === 'No') {
            $('#diagnosedRadioNo').prop('checked', true);
        }

        if (rowData[8] === 'Yes') {
            $('#encounteredRadioYes').prop('checked', true);
        } else if (rowData[8] === 'No') {
            $('#encounteredRadioNo').prop('checked', true);
        }
        
        if (rowData[9] === 'Yes') {
            $('#vaccinatedRadioYes').prop('checked', true);
        } else if (rowData[9] === 'No') {
            $('#vaccinatedRadioNo').prop('checked', true);
        }

        $('#personModalLabel').text('Edit Record');
        $('#submitButton').text('Save');
        $('#personModal').modal('show');
    });

    $('.deleteButton').on('click', function() {
        console.log('deleting new record...');
        // Retrieve the row data and populate the form inputs
        var dataTable = $('#dataTable').DataTable();
        var row = dataTable.row($(this).closest('tr'));
        var rowData = row.data();

        console.log(rowData);
        $.ajax({
            url: 'delete.php',
            method: 'POST',
            data: {
                id: rowData[0]
            },
            success: function(response) {
                // Handle the success response
                console.log(response);
                // Reload the page
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle the error response
                console.error(xhr.responseText);
            }
        });
    });

    $('#submitButton').on('click', function() {
        let data = {
            id: $('#recordId').val(),
            name: $('#floatingName').val(),
            sex: $('input[name="sexOptions"]:checked').val(),
            age: $('#floatingAge').val(),
            mobile: $('#floatingMobile').val(),
            email: $('#floatingEmail').val(),
            temperature: $('#floatingTemperature').val(),
            diagnosed: $('input[name="diagnosedOptions"]:checked').val(),
            encountered: $('input[name="encounteredOptions"]:checked').val(),
            vaccinated: $('input[name="vaccinatedOptions"]:checked').val(),
            nationality: $('#floatingNationality').val()
        }

            // Convert jQuery objects to plain values
        data.sex = data.sex || '';
        data.diagnosed = data.diagnosed || '';
        data.encountered = data.encountered || '';
        data.vaccinated = data.vaccinated || '';
        
        console.log('recorId: '+ $('#recordId').val());
        console.log('id: '+ data.id);

        // Check if it's an insert or edit operation
        if (data.id === '') {
            console.log('adding new record...');
            // Perform AJAX request to submit the data for insertion
            $.ajax({
                url: 'insert.php',
                method: 'POST',
                data: data,
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    // Reload the page
                    location.reload();
                    $('#personModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText);
                    $('#personModal').modal('hide');
                }
            });
        } else {
            console.log('editing new record...');
            console.log(data)
            // Perform AJAX request to submit the data for updating
            $.ajax({
            url: 'update.php',
                method: 'POST',
                data: data,
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    // Reload the page
                    location.reload();
                    $('#personModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText);
                    $('#personModal').modal('hide');
                }
            });
        }
    });
});