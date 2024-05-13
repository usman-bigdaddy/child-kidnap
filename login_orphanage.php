<?php
include 'header.php' ?>

<main>

    <?php
    $msg_login = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_btn"])) {
        include 'connect.php';
        $email = $_POST["email"];
        $password = $_POST["password"];
        $stmt = $conn->prepare("SELECT * FROM orphanage WHERE email = ?");
        $stmt->bind_param("s", $email);
        $email = $_POST["email"];
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($_POST["password"] === $row["password"]) {
                echo "hello email";
                $_SESSION['orphanage_email'] = $email;
                $url = "home.php"; // URL of the next page
                echo "<script>window.location.href = '$url';</script>";
            } else {
                $msg_login = "Invalid password";
            }
        } else {
            $msg_login = "Invalid email";
        }
        $stmt->close();
        $conn->close();
    }
    ?>
    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 style="font-size: 50px;" class="contact-title">Login as an Orphanage</h1>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="login_orphanage.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 mt-9">
                                <div class="form-group">
                                    <input class="form-control w-100" name="email" id="email" required placeholder=" Enter Email" />
                                </div>
                            </div>
                            <div class="col-12 mt-9">
                                <div class="form-group">
                                    <input class="form-control w-100" type="password" name="password" id="password" required placeholder=" Enter Password" />
                                </div>
                            </div>

                        </div>
                        <?php echo $msg_login; ?><br />
                        <div class="form-group mt-3">
                            <button type="submit" name="add_btn" class="button button-contactForm boxed-btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




</main>

<?php include 'footer.php' ?>