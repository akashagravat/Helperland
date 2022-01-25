<?php include('./header.php'); ?>

<link rel="stylesheet" href="./assets/css/Contacts.css">

<title>Contact</title>

</head>

<body>

    <header>
        <?php
        include('./navbar.php');
        ?>
        <img src="./assets/Image/group-16_2.png" class="img-fluid price-banner" alt="Responsive image">

    </header>
    <section>
        <div class="pricewrapper">
            <p class="contactext text-center">Contact Us</p>
            <div class="container">
                <div class="sepimg">
                    <img src="./assets/Image/separator.png" class="sepretor">

                </div>
            </div>
            <div class="container blocks">
                <div class="row contactus">
                    <div class="col-md-4 col-sm-6 col-12 locaton">
                        <div class="location"><img src="./assets/Image/forma-1_2.png" class="locate"></div>
                        <div class="locatedesc">1111 Lorem ipsum text 100, Lorem ipsum AB</div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 phone-call">
                        <div class="phone"><img src="./assets/Image/phone-call.png" class="phon"></div>
                        <div class="phonedesc">
                            <p>+49 (40) 123 56 7890</p>
                            <p>+49 (40) 987 56 0000</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-8 col-12 email-mail">
                        <div class="email"><img src="./assets/Image/vector-smart-object.png" class="mail"></div>
                        <div class="emaildesc">info@helperland.com</div>
                    </div>
                </div>
            </div>

            <hr class="line">
    </section>
    <section class="contactus">
        <div class="container forms">
            <h3 class="gettouch">Get In Touch With US</h3>
            <form class="cntfm">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" placeholder="Last name">
                    </div>
                </div>
                <div class="form-row part2">
                    <div class="col-md-6 mb-2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+49</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Email address">
                    </div>
                </div>
                <div class="form-row dropdowns">
                    <select id="disabledSelect" class="form-control drop">
                        <option>Subject</option>
                    </select>
                </div>

                <div class="form-row msg">
                    <textarea class="form-control message" placeholder="Message"></textarea>
                </div>

                <div class="form-row sbmt">
                    <input class="btn btn-sbt" type="submit" value="Submit">

                </div>

            </form>
        </div>
    </section>
    <section class="maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79219931298!2d72.5004358!3d23.0348564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1639749098244!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>
    </section>
    <section class="newsletter text-center ">
        <div class="container">
            <h3 class="ournews ">GET OUR NEWSLETTER</h3>
            <form action="#" method="Post">
                <input type="text" name="text" placeholder="YOUR EMAIL">
                <button type="button" class="btn btn5">
                    <p>Subscribe</p>
                </button>
            </form>
        </div>
    </section>
    </div>
    <?php
    include('./footer.php');
    ?>
</body>

</html>