<body>
    <title></title>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <!-- Include DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
        <!-- Include DataTables JavaScript -->
        <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script>
            $(document).ready(function() {
                new DataTable('#example');
            });
        </script>
    </head>
    <?php
    include 'header.php';
    include '../connect.php';
    $sql = "SELECT * FROM tb_orphanage_incident join orphanage on orphanage.id = tb_orphanage_incident.id"; // Change 'your_table_name' to your actual table name
    $result = $conn->query($sql);
    ?>
    <div class="container">
        <div class="row">
            <h3>List of Orphanages Complaint</h3>
            <table id="example" class="table table-hover table-striped display">
                <thead>
                    <tr>
                        <th>Name of Orphanage</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>State</th>
                        <th>Address</th>
                        <th>Child Name</th>
                        <th>Child Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["name_"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "<td>" . $row["state"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td>" . $row["child_name"] . "</td>";
                            echo "<td>" . $row["child_description"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>