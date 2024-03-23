<?php include 'header.php' ?>

<main>
    <div class="slider-area">
        <div class="slider-active">

            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInUp" data-delay=".6s">Our Helping to<br> the world.</h1>
                                <P data-animation="fadeInUp" data-delay=".8s">Onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut bore et dolore magnt, sed do eiusmod.</P>

                                <div class="hero__btn">
                                    <a href="report.php" class="btn hero-btn mb-10" data-animation="fadeInLeft" data-delay=".8s">Report</a>
                                    <a href="#" class="cal-btn ml-15" data-animation="fadeInRight" data-delay="1.0s">
                                        <i class="flaticon-null"></i>
                                        <p>0808279****</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInUp" data-delay=".6s">Our Helping to<br> the world.</h1>
                                <P data-animation="fadeInUp" data-delay=".8s">Onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut bore et dolore magnt, sed do eiusmod.</P>

                                <div class="hero__btn">
                                    <a href="industries.html" class="btn hero-btn mb-10" data-animation="fadeInLeft" data-delay=".8s">Donate</a>
                                    <a href="industries.html" class="cal-btn ml-15" data-animation="fadeInRight" data-delay="1.0s">
                                        <i class="flaticon-null"></i>
                                        <p>+12 1325 41</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>


    <section class="home-blog-area section-padding30">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-9 col-sm-10">
                    <div class="section-tittle text-center mb-90">
                        <span>Recent Cases</span>
                        <h2>Latest News from our recent cases</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                include 'connect.php';
                $sql = "SELECT * FROM tb_cases limit 4"; // Change 'your_table_name' to your actual table name
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
            <div class="header-right-btn d-none d-lg-block ml-20 text-center">
                <a href="cases.php" class="btn header-btn">View More</a>
            </div>
        </div>
    </section>




</main>

<?php include 'footer.php' ?>