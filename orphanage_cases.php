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
                        <h3><span>Recent Orphanage Cases</span></h3>

                    </div>
                </div>
            </div>
            <div class="row">
                <table id="example" class="table table-hover table-striped display">
                    <thead>
                        <tr>
                            <th>Child Name</th>
                            <th>Incident Description</th>
                            <th>Name of Orphanage</th>
                            <th>Orphanage Email</th>
                            <th>Orphanage Phone</th>
                            <th>Orphanage State</th>
                            <th>Orphanage Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM tb_orphanage_incident join orphanage on orphanage.id = tb_orphanage_incident.id"; // Change 'your_table_name' to your actual table name
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["child_name"] . "</td>";
                                echo "<td>" . $row["child_description"] . "</td>";
                                echo "<td>" . $row["name_"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["phone"] . "</td>";
                                echo "<td>" . $row["state"] . "</td>";
                                echo "<td>" . $row["address"] . "</td>";
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
    </section>



</main>

<?php include 'footer.php' ?>