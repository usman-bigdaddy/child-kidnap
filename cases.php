<?php include 'header.php' ?>

<main>

    <!-- <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-20 text-center">
                            <h2>Cases</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <section class="home-blog-area section-padding30">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-9 col-sm-10">
                    <div class="section-tittle text-center mb-90">
                        <h3><span>Recent Cases</span></h3>

                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                include 'connect.php';
                $sql = "SELECT * FROM tb_cases"; // Change 'your_table_name' to your actual table name
                if (isset($_GET['q']) && !empty($_GET['q'])) {
                    $q = $_GET['q'];
                    $sql = "SELECT * FROM tb_cases where category= '$q'";
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-xl-6 col-lg-6 col-md-6">';
                        echo '    <div class="home-blog-single mb-30">';
                        echo '        <div class="blog-img-cap">';
                        echo '            <div class="blog-img">';
                        echo '                <img style=height:320px src="uploads/' . $row["cover_image"] . '" alt>';
                        echo '                <div class="blog-date text-center">';
                        echo '                    <span>' . date("d", strtotime($row["case_date"])) . '</span>'; // Assuming you have a 'date' column in your database
                        echo '                    <p>' . date("M", strtotime($row["case_date"])) . '</p>';
                        echo '                </div>';
                        echo '            </div>';
                        echo '            <div class="blog-cap">';
                        echo '                <h3><a href="blog_details.html">' . $row["case_title"] . ' | ' . $row["category"] . ' Case </a></h3>'; // Assuming you have a 'title' column in your database
                        echo '                <p>' . $row["case_description"] . '</p>'; // Assuming you have a 'type' column in your database
                        echo '            </div>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>



</main>

<?php include 'footer.php' ?>