<!-- views/date_filter_ajax.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Filter Page with AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <h5>Date Filter</h5>

    <!-- Date Filter Form -->
    <form id="dateFilterForm">
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" required>

        <button type="button" id="filterButton">Filter</button>
    </form>

    <!-- Container for displaying filtered results -->
    <div></div>

    <script>
        $(document).ready(function() {
            // Attach a click event to the filter button
            $("#filterButton").on("click", function() {
                // Get the start date and end date values
                var startDate = $("#start_date").val();

                // Send an AJAX request to the server
                $.ajax({
                    url: "<?= base_url('datefilter/filter'); ?>",
                    type: "post",
                    data: {
                        start_date: startDate
                    },
                    success: function(data) {
                        // Display the filtered results in the container
                        $("#filteredResults").html(data);
                    }
                });
            });
        });
    </script>

</body>

</html>