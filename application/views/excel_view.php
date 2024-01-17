<!-- views/excel_view.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Download Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>

    <!-- Add a link to trigger the download -->
    <!-- <a href=" ">Download Excel</a> -->
    <br>


    <div class="table-responsiv">
        <table border="1" cellpadding="20" cellspacing="0" class="table table-hover table-border" id="mytable">
            <!-- <tr>
                <th>Csv File Download</th>
                <th>Pdf File Download</th>
                <th>Csv File Upload</th>
            </tr> -->
            <!-- <tr>
                <td><a href="<?php echo base_url(); ?>MainController/downloadCsv" class="btn btn-success" value="Export">
                        Export in CSV
                    </a></td>
                <td><a href="<?php echo base_url(); ?>Export/view" class="btn btn-success" value="Export">Export in PDF</a></td>
                <td><a href="<?php echo base_url(); ?>MainController/" class="btn btn-warning" value="Export">Import from CSV</a></td>
            </tr> -->
            <tr>
                <td><a href="<?php echo base_url(); ?>MainController/downloadCsvfiltered" class="btn btn-success" value="Export">
                        Export in CSV filter
                    </a></td>
                <!-- <td><a href="<?php echo base_url(); ?>Export/view" class="btn btn-success" value="Export">Export in PDF</a></td> -->
                <td>

                    <!-- <form method="post" action="" id="import_csv" enctype="multipart/form-data">

                        <input type="file" name="csv_file" size="20" required accept=".csv" />

                        <br /><br />

                        <input type="submit" name="import_csv" id="import_csv_btn" value="Import from CSV" class="btn btn-warning btn-lg" />
                        <div id="imported_csv_data"></div>
                    </form> -->
                </td>
            </tr>
        </table>
    </div>
    <!-- <script>
        $(document).ready(function() {
            load_data();

            function load_data() {
                $.ajax({
                    url: "<?php base_url(); ?>csv_import/load_data",
                    type: "post",
                    success: function(data) {
                        // Display the filtered results in the container
                        $("#imported_csv_data").html(data);
                    }
                });
            }

            $('#import_csv').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?php base_url(); ?>csv_import/import",
                    type: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('import_csv_btn').html('importing...');
                    },
                    success: function(data) {
                        $('#import_csv')[0].reset();
                        $('#import_csv_btn').attr('disabled', false);
                        $('#import_csv_btn').html('import done');
                    }
                })
            })
        });
    </script> -->
</body>

</html>