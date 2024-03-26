<?php $msg = "";
include 'header.php' ?>

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
        $type = $_POST["type"];
        $title = $_POST["title"];
        $description = $_POST["desc"];
        $state = $_POST["state"];
        $addr = $_POST["addr"];
        $randomNumber = rand(1000, 9999);
        // Upload image
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // File uploaded successfully, now insert data into database
                $image_name = basename($_FILES["image"]["name"]);

                // Prepare and execute SQL statement to insert data into database
                $stmt = $conn->prepare("INSERT INTO tb_cases (case_id, category, case_title, case_description, cover_image,
                case_state, case_address) VALUES (?,?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $randomNumber, $type, $title, $description, $image_name, $state, $addr);

                if ($stmt->execute()) {
                    $msg = "New record created successfully.";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $conn->close();
    }
    ?>
    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 style="font-size: 50px;" class="contact-title">Report an Incident</h1>
                    <h2>Please fill in form below</h2>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="report.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <h3 style="color:green"><?php echo $msg; ?></h3>
                                <div class="form-group">
                                    <select class="form-control w-100" name="type" required>
                                        <option value="">--- Choose Case Type ---</option>
                                        <option value="abuse">Child Abuse Incident</option>
                                        <option value="kidnap">Missing Child Incident</option>
                                    </select>
                                </div>
                            </div><br /><br /><br />
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="state" class="form-control w-100" required name="state" id="state">
                                        <option value="">--- Choose Case State ---</option>
                                        <option value="Abia">Abia</option>
                                        <option value="Adamawa">Adamawa</option>
                                        <option value="Akwa Ibom">Akwa Ibom</option>
                                        <option value="Anambra">Anambra</option>
                                        <option value="Bauchi">Bauchi</option>
                                        <option value="Bayelsa">Bayelsa</option>
                                        <option value="Benue">Benue</option>
                                        <option value="Borno">Borno</option>
                                        <option value="Cross River">Cross River</option>
                                        <option value="Delta">Delta</option>
                                        <option value="Ebonyi">Ebonyi</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Enugu">Enugu</option>
                                        <option value="Gombe">Gombe</option>
                                        <option value="Imo">Imo</option>
                                        <option value="Jigawa">Jigawa</option>
                                        <option value="Kaduna">Kaduna</option>
                                        <option value="Kano">Kano</option>
                                        <option value="Katsina">Katsina</option>
                                        <option value="Kebbi">Kebbi</option>
                                        <option value="Kogi">Kogi</option>
                                        <option value="Kwara">Kwara</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nasarawa">Nasarawa</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                        <option value="Plateau">Plateau</option>
                                        <option value="Rivers">Rivers</option>
                                        <option value="Sokoto">Sokoto</option>
                                        <option value="Taraba">Taraba</option>
                                        <option value="Yobe">Yobe</option>
                                        <option value="Zamfara">Zamfara</option>
                                        <option value="FCT">FCT</option>
                                    </select>
                                </div>
                            </div><br /><br /><br />
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="title" id="title" type="text" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Case Title'" placeholder="Enter Case Title">
                                </div>
                            </div>
                            <br /><br />
                            <div class="col-12 mt-9">
                                <div class="form-group">
                                    <input class="form-control w-100" name="addr" id="addr" cols="20" required rows="2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Case Full Address'" placeholder=" Enter Case Full Address" />
                                </div>
                            </div>
                            <div class="col-12 mt-9">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="desc" id="desc" cols="20" required rows="2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Case Description'" placeholder=" Enter Case Description"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                                </div>
                            </div>

                        </div>
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