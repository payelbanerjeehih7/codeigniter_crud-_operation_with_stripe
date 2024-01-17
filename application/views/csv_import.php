<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container box">
        <h3>Import</h3>
        <form method="post" action="" id="import_csv" enctype="multipart/form-data">
            <label for="">Import Data</label>
            <input type="file" name="csv_file" size="20" required accept=".csv" />

            <br /><br />

            <button type="submit" name="import_csv_btn" class=" btn btn-info" id="import_csv_btn">Import CSV</button>
            </br>
        </form>
        <div id="imported_csv_data"></div>
    </div>
    <script>
        $(document).ready(function() {
            load_data();

            function load_data() {
                $.ajax({
                    url: "<?php base_url(); ?>csv_import/load_data",
                    type: "POST",
                    success: function(data) {
                        // Display the filtered results in the container
                        $("#imported_csv_data").html(data);
                    }
                });
            }

            $('#import_csv').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?php base_url(); ?>csv_import/parseExcel",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#import_csv_btn').html('importing...');
                    },
                    success: function(data) {
                        console.log(data)
                        $('#import_csv')[0].reset();
                        $('#import_csv_btn').attr('disabled', false);
                        $('#import_csv_btn').html('Import Done');
                        load_data();
                    }
                })
            });

        });
    </script>

</body>

</html>