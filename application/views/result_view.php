<!-- views/search_results.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>

    <?php if (!empty($results)) : ?>
        <table border="1" cellpadding="20" cellspacing="0" class="table table-hover table-border" id="mytable">

            <h1 align="center">Registered members</h1>
            <div class="btn btn-info" data-toggle="modal" data-target="#exampleModal">New Member</div>
            <tr>
                <th>SL.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Registration Date</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($results as $result) : ?>
                <tr>
                    <td><?php echo $result->id; ?></td>
                    <td><?php echo $result->name; ?></td>
                    <td><?php echo $result->email; ?></td>
                    <td><?php echo $result->age; ?></td>
                    <td><?php echo $result->password; ?></td>
                    <td><?php echo $result->phone; ?></td>
                    <td><?php echo $result->registrationdate; ?></td>
                    <td><a href="<?php echo base_url(); ?>Maincontroller/edit/<?php echo $result->id; ?>" class="btn btn-primary">Edit</a>
                        <a href="<?php echo base_url(); ?>Maincontroller/delete/<?php echo $result->id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

</body>

</html>