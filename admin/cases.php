<body>
    <title></title>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["category"] . "</td>";
                            echo "<td>" . $row["case_title"] . "</td>";
                            echo "<td>" . $row["case_description"] . "</td>";
                            echo "<td>" . $row["case_date"] . "</td>";
                            echo "<td><img src='../uploads/" . $row["cover_image"] . "' alt='Image' style='max-width: 100px;'></td>";
                            echo "<td><a href='delete.php?id=" . $row["case_id"] . "' class='btn btn-danger'>Delete</a></td>";
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