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
    $sql = "SELECT * FROM tb_cases"; // Change 'your_table_name' to your actual table name
    if (isset($_GET['q']) && !empty($_GET['q'])) {
        $q = $_GET['q'];
        $sql = "SELECT * FROM tb_cases where category= '$q'";
    }
    $result = $conn->query($sql);
    ?>
    <div class="container">
        <div class="row">
            <table id="example" class="table table-hover table-striped display">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>State</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Days</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $status = $row["case_status"]; // Convert status to lowercase for comparison
                            $color = ""; // Initialize color variable

                            switch ($status) {
                                case "Pending":
                                    $color = "red"; // Red color for pending status
                                    break;
                                case "Solved":
                                    $color = "green"; // Green color for solved status
                                    break;
                            }
                            $case_date = new DateTime($row["case_date"]); // Convert case_date to DateTime object
                            $current_date = new DateTime(); // Get current date as DateTime object
                            $interval = $current_date->diff($case_date);
                            echo "<tr>";
                            echo "<td style='color: $color'>" . $row["case_status"] . "</td>";
                            echo "<td>" . $row["category"] . "</td>";
                            echo "<td>" . $row["case_title"] . "</td>";
                            echo "<td>" . $row["case_description"] . "</td>";
                            echo "<td>" . $row["case_state"] . "</td>";
                            echo "<td>" . $row["case_address"] . "</td>";
                            echo "<td>" . $row["case_date"] . "</td>";
                            echo "<td style='color: $color'>" . $interval->days  . "</td>";
                            echo "<td><img src='../uploads/" . $row["cover_image"] . "' alt='Image' style='max-width: 100px;'></td>";

                            echo "<td>";
                            echo "<div class='btn-group'>";
                            // Only display the "Solve" button if the status is not "solved"
                            if ($row["case_status"] != "Solved") {
                                echo "<a href='delete.php?id=" . $row["case_id"] . "' class='btn btn-danger'>Delete</a>";
                                echo "<a style=margin-left:5px href='solve.php?id=" . $row["case_id"] . "' class='btn btn-success'>Solve</a>";
                            }
                            echo "</div>";
                            echo "</td>";


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