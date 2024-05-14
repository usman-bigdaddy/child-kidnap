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
    $orphanage_email = "";
    if (isset($_SESSION["orphanage_email"]) && !empty($_SESSION["orphanage_email"])) {
        $orphanage_email = $_SESSION["orphanage_email"];
    } else {
        $url = "login_orphanage.php"; // URL of the next page
        echo "<script>window.location.href = '$url';</script>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_btn"])) {
        include 'connect.php';
        $name = $_POST["name"];
        $description = $_POST["desc"];
        $stmt = $conn->prepare("INSERT INTO tb_orphanage_incident (id, child_name, child_description) VALUES (?,?,?)");
        $stmt->bind_param("sss", $_SESSION["orphanage_id"], $name, $description);
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
                    <h6 style="font-size: 50px;" class="contact-title">Welcome <?php echo $_SESSION["orphanage_name"] ?> orphanage</h6>
                    <h5>Report an Incident</h5>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="report_orphanage.php" method="post" enctype="multipart/form-data">
                        <div class="row">

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
                        <?php if (isset($_SESSION["orphanage_email"])) : ?>
                            <!-- Show the form if the session is set (user is logged in) -->
                            <div class="form-group mt-3">
                                <button type="submit" name="add_btn" class="button button-contactForm boxed-btn">Report</button>
                            </div>
                        <?php endif; ?>

                        <!-- <div class="form-group mt-3">
                            <button type="submit" name="add_btn" class="button button-contactForm boxed-btn">Report</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </section>




</main>

<?php include 'footer.php' ?>