<?php $msg = "";
include 'header.php';
?>

<main>

    <!-- <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-20 text-center">
                            <h2>Report an Incident</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_btn"])) {
        include 'connect.php';
        $name = $_POST["name"];
        $description = $_POST["desc"];
        $id_of_orphanage = $_POST["id_of_orphanage"];
        $stmt = $conn->prepare("INSERT INTO tb_orphanage_incident (id, child_name, child_description) VALUES (?,?,?)");
        $stmt->bind_param("sss", $id_of_orphanage, $name, $description);
        if ($stmt->execute()) {
            $msg = "New record created successfully.";
        } else {
            $msg =  "Error: " . $stmt->error;
        }
        // $stmt->close();
        // $conn->close();
    }
    ?>
    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 style="font-size: 50px;" class="contact-title">Orphanage Report an Incident</h1>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="report_orphanage.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 mt-9">
                                <div class="form-group">
                                    <?php
                                    include 'connect.php';
                                    $sql = "SELECT id, name_ FROM orphanage";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        echo "<select class=form-control w-100 name='id_of_orphanage'>";
                                        echo "<option  value=''>Select Orphanage</option>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option  value='" . $row['id'] . "'>" . $row['name_'] . "</option>";
                                        }
                                        echo "</select>";
                                    } else {
                                        echo "No orphanages found";
                                    }

                                    // Close database connection
                                    $conn->close();
                                    ?>
                                </div>
                            </div><br /><br />
                            <div style="margin-top: 25px;" class="col-12 mt-9">
                                <div class="form-group">
                                    <input class="form-control w-100" name="name" id="name" required placeholder=" Enter Name of Child" />
                                </div>
                            </div>
                            <div class="col-12 mt-9">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="desc" id="desc" required placeholder=" Enter Case Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <?php echo $msg; ?>
                        <div class="form-group mt-3">
                            <button type="submit" name="add_btn" class="button button-contactForm boxed-btn">Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




</main>

<?php include 'footer.php' ?>