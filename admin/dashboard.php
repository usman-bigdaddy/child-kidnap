<body>
    <title></title>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <?php
    include 'header.php';
    include '../connect.php';


    $sql_total = "SELECT COUNT(*) AS total_cases FROM tb_cases";
    $result_total = $conn->query($sql_total);
    $total_cases = ($result_total->num_rows > 0) ? $result_total->fetch_assoc()["total_cases"] : 0;

    // Count abuse cases
    $sql_abuse = "SELECT COUNT(*) AS abuse_cases FROM tb_cases WHERE category = 'abuse'";
    $result_abuse = $conn->query($sql_abuse);
    $abuse_cases = ($result_abuse->num_rows > 0) ? $result_abuse->fetch_assoc()["abuse_cases"] : 0;

    // Count kidnap cases
    $sql_kidnap = "SELECT COUNT(*) AS kidnap_cases FROM tb_cases WHERE category = 'kidnap'";
    $result_kidnap = $conn->query($sql_kidnap);
    $kidnap_cases = ($result_kidnap->num_rows > 0) ? $result_kidnap->fetch_assoc()["kidnap_cases"] : 0;
    $conn->close();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Cases</h5>
                        <p class="card-text"><?php echo $total_cases; ?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Abuse Cases</h5>
                        <p class="card-text"><?php echo $abuse_cases; ?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kidnap Cases</h5>
                        <p class="card-text"><?php echo $kidnap_cases; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>