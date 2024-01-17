<!-- views/search_ajax.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page with AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <h4>Search member</h4>
    <!-- Search Form -->
    <form id="searchForm">
        <input type="text" name="keyword" id="keyword" placeholder="Enter your search term">
        <button type="button" id="searchButton">Search</button>
    </form>

    <!-- Container for displaying search results -->


    <script>
        $(document).ready(function() {
            // Attach a click event to the search button
            $("#searchButton").on("click", function() {
                // Get the search keyword
                var keyword = $("#keyword").val();

                // Send an AJAX request to the server
                $.ajax({
                    url: "<?= base_url('search/search'); ?>",
                    type: "post",
                    data: {
                        keyword: keyword
                    },
                    success: function(data) {
                        // Display the search results in the container
                        $("#searchResults").html(data);
                    }
                });
            });
        });
    </script>

</body>

</html>