<?php include 'header.php' ?>

<main>

    <div class="slider-area2">
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
    </div>
    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Please fill in form below to report an incident</h2>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="report.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control w-100">
                                        <option value="">--- Choose Case Type ---</option>
                                        <option value="abuse">Child Abuse Incident</option>
                                        <option value="kidnap">Missing Child Incident</option>
                                    </select>
                                </div>
                            </div><br /><br /><br />
                            <div class="col-12 mt-9">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Rpeort Incident</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




</main>

<?php include 'footer.php' ?>