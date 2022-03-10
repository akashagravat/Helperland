<?php include('./header.php'); 

$base_url = "http://localhost/helper/";
?>

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
            <form class="cntfm" method="POST" action=<?= $base_url."./?controller=helperland&function=ContactUs"?>>
              <?php if(isset($_SESSION['message'])){ ?>
                <div class="form-row mb-3">
                    <p class="text-center bg-success text-white px-4 py-2 mx-auto my-auto">
                    <?php echo $_SESSION['message']; ?>
                    </p>
                </div>
                <?php } ?>
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" id="firstName" name="firstname"  placeholder="First name" required>
                        <div class="first-name-msg"></div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
                        <div class="last-name-msg"></div>
                    </div>
                </div>
                <div class="form-row part2">
                    <div class="col-md-6 mb-1">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+49</div>
                            </div>
                            <input type="text" class="form-control" id="mobilenum" name="mobile"  placeholder="Mobile Number" maxlength="10" size="10" required>
                        </div>
                        <div class="mobile-msg"></div>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="useremail" name="email" placeholder="Email address" required>
                        <div class="email-msg "></div>
                    </div>
                </div>
                <div class="form-row dropdowns">
                    <select id="disabledSelect" class="form-control drop" name="sub" >
                        <option>Subject</option>
                        <option>Subscription</option>
                        <option>Feedback</option>
                    </select>
                </div>

                <div class="form-row msg">
                    <textarea class="form-control message" name="message" placeholder="Message" required></textarea>
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
    <script src="./assets/js/CustomerSignUp.js"></script>
    <script>
       $(document).ready(function(){
        $('.mainnav .nav-item').removeClass('active');
            $('.Contact ').addClass('active');
            $('.mobile-nav .nav-item ').removeClass('active');
            $('.mobile-nav .navcontact ').addClass('active');
       
        });
    </script>
    </script>
</body>

</html>