<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h2>Database Export</h2>
    <table>
        <thead>
            <tr>
                <th>SL.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Registration Date</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td><?= $record['id']; ?></td>
                    <td><?= $record['name']; ?></td>
                    <td><?= $record['email']; ?></td>
                    <td><?= $record['age']; ?></td>
                    <td><?= $record['password']; ?></td>
                    <td><?= $record['phone']; ?></td>
                    <td><?= $record['registrationdate']; ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>