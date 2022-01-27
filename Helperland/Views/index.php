<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <?php
    $base_url = "http://localhost/helper/";
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/Homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/validation.css">
    <?php
    if (!isset($_SESSION['username'])) { ?>
        <link rel="stylesheet" href="./assets/css/Homenav.css">
    <?php } ?>
    <?php
    if (isset($_SESSION['username'])) { ?>
        <link rel="stylesheet" href="./assets/css/HomeLogin.css">
    <?php } ?>



</head>

<body>
    <div class="wrapper">
        <?php include('Homenav.php'); ?>
        <main>
            <section class="banner">
                <ul class="dummy">
                    <h1> Lorem ipsum text</h1>

                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
                </ul>
                <div class="headbtn text-center">
                    <a class="book-btn" href="#" role="button">Let's Book a Cleaner</a>
                </div>


                <div class="headpart">
                    <div class="row justify-content-center flex-wrap parts">
                        <div class="col-lg-3 col-6 part1">
                            <div class="step">
                                <span>
                                    <img src="./assets/image/forma-1-copy.svg" alt="image1">
                                </span>
                                <p>Enter your postcode</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 part2">
                            <div class="step">
                                <span>
                                    <img src="./assets/image/group-22.png" alt="image2">
                                </span>
                                <p>Select your plan</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 part3">
                            <div class="step">
                                <span>
                                    <img src="./assets/image/forma-1.svg" alt="image3">
                                </span>
                                <p>Pay securely online</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6 ">
                            <div class="step">
                                <span>
                                    <img src="./assets/image/forma-1 (1).svg" alt="image4">
                                </span>
                                <p>Enjoy amazing service</p>
                            </div>
                        </div>


                    </div>
                </div>

                <a class="scroll-down" href="#why-helperland">
                    <div class="dwn">

                        <img src="./assets/image/ellipse-525.svg" class="eclipce">
                        <div class="download">
                            <img src="./assets/Image/shape-1.svg" alt="" class="download1">
                        </div>
                    </div>
                </a>



            </section>

        </main>


        <!--Login Modal -->
        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginForm" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Login to your account</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mb-5">
                        <div class="form-group">
                            <p class="bg-success text-white text-center">
                                <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                }
                                ?>
                            </p>

                        </div>
                        <form method="POST" action=<?= $base_url . "./?controller=Helperland&function=Login" ?>>

                            <div class="form-group email">
                                <input type="email" class="form-control" id="loginemail" name="loginemail" value="<?php if (isset($_COOKIE['emailcookie'])) {
                                                                                                                        echo $_COOKIE['emailcookie'];
                                                                                                                    } ?>" placeholder="Email">
                            </div>
                            <div class="email-msg mails mb-2"></div>
                            <div class="form-group password">
                                <input type="password" class="form-control" id="loginpassword" name="password" value="<?php if (isset($_COOKIE['passwordcookie'])) {
                                                                                                                            echo $_COOKIE['passwordcookie'];
                                                                                                                        } ?>" placeholder="Password">

                            </div>
                            <div class="form-check mb-2 my-sm-2">
                                <?php if (isset($_COOKIE)) { ?>
                                    <input class="form-check-input" name="remember" type="checkbox" checked id="inlineFormCheck" />
                                <?php } ?>
                                <?php if (!isset($_COOKIE)) { ?>
                                    <input class="form-check-input" name="remember" type="checkbox" id="inlineFormCheck" />
                                <?php } ?>
                                <label class="form-check-label" for="inlineFormCheck">
                                    Remember me
                                </label>
                            </div>
                            <div class="form-group mt-3">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="login" class="btn btn-login form-control">Login</button>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <a class="forgot-password" href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Forgot Password</a>
                        <p>Don't Have an account? <a href="Customer-Signup.php" class="create-account">Create an
                                account</a></p>

                    </div>
                </div>
            </div>
        </div>

        <!-- Forgot Password Modal -->

        <div class="modal fade" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="ForgotPassword" aria-hidden=" true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Forgot Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action=<?= $base_url . "./?controller=Helperland&function=ForgotMail" ?>>
                            <div class="form-group email">
                                <span class="email-msg float-left"></span>
                                <span class="error-emails float-right" style="color:green;"></span>
                                <input type="email" class="form-control forgot_email" id="forgotemail" name="forgot_email" placeholder="Email">
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" name="forgot_send" class="btn btn-login form-control">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a class="login-now" href="#" data-toggle="modal" data-target="#LoginModal" data-dismiss="modal">Login now</a>
                    </div>
                </div>
            </div>
        </div>




        <section class="why-helperland" id="why-helperland">
            <div class="container helperlands">
                <h2 class="text-center">Why Helperland</h2>
                <div class="row justify-content-center helperlandblock">
                    <div class="col-lg-4 col-sm-6 text-center">
                        <div class="img-block">
                            <img src="./assets/image/group-21.png" class="images" alt="image4">
                        </div>
                        <h3 class="justify-content-center d-flex align-items-center">Experience & Vetted Professionals
                        </h3>
                        <p>dominate the industry in scale and scope with an adaptable, extensive network that
                            consistently delivers exceptional results.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center">
                        <div class="img-block">
                            <img src="./assets/image/group-23.png" class="images" alt="computer">
                        </div>
                        <h3 class="justify-content-center d-flex align-items-center">Secure Online Payment
                        </h3>
                        <p class="computers">Payment is processed securely online. Customers pay safely online and
                            manage the booking.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center">
                        <div class="img-block">
                            <img src="./assets/image/group-24.png" class="images" alt="3rdhelper">
                        </div>
                        <h3 class="justify-content-center d-flex align-items-center">Dedicated Customer Service
                        </h3>
                        <p>to our customers and are guided in all we do by their needs. The team is always happy to
                            support you and offer all the information.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="blogs">
            <div class="container">
                <div class="blog-uppper-part">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisi sapien, suscipit ut
                                accumsan vitae, pulvinar ac libero.</p>
                            <p>Aliquam erat volutpat. Nullam quis ex odio. Nam bibendum cursus purus, vel efficitur urna
                                finibus vitae. Nullam finibus aliquet pharetra. Morbi in sem dolor. Integer pretium
                                hendrerit ante quis vehicula.</p>
                            <p>Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="image-wrapper">
                                <img src="./assets/image/group-36.png" class="blog-up-img" alt="Blog1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="our-blog">
                    <h2 class="text-center">Our Blog</h2>
                    <div class="row blog-wrapper">
                        <div class="col-lg-4 col-sm-6 ">
                            <div class="blog-detail">
                                <div class="blog-image">
                                    <img src="./assets/image/group-28.png" alt="blog-image1">
                                </div>
                                <div class="blog-content">
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <span>January 28, 2019</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus
                                        pulvinar aliquet.</p>
                                    <a href="#" title="Read More" class="read-more">Read More<img src="./assets/Image/shape-2.png" class="blogimg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 ">
                            <div class="blog-detail">
                                <div class="blog-image">
                                    <img src="./assets/image/group-29.png" alt="blog-image2">
                                </div>
                                <div class="blog-content">
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <span>January 28, 2019</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus
                                        pulvinar aliquet.</p>
                                    <a href="#" title="Read More" class="read-more">Read More<img src="./assets/Image/shape-2.png" class="blogimg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 ">
                            <div class="blog-detail">
                                <div class="blog-image">
                                    <img src="./assets/image/group-30.png" alt="blog-image3">
                                </div>
                                <div class="blog-content">
                                    <h3>Lorem ipsum dolor sit amet</h3>
                                    <span>January 28, 2019</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus
                                        pulvinar aliquet.</p>
                                    <a href="#" title="Read More" class="read-more">Read More<img src="./assets/Image/shape-2.png" class="blogimg"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="what-our-customer-say">

            <div class="container profile-page">
                <h2 class="text-center">What Our Customers Say</h2>
                <div class="row">
                    <div class="col-xl-4 col-lg-3 col-md-12 c21">
                        <div class="card  profile-header">
                            <div class="body1">
                                <div class="row profiles">
                                    <img src="./assets/image/message.png" class="chat">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="profile-image float-md-right">

                                            <img src="./assets/image/group-31.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-12 name">
                                        <h4 class="m-t-0 m-b-0"><strong>Lary Vatson</strong></h4>
                                        <span class="job_post">Manchester</span>
                                    </div>
                                    <div class="ctext">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus
                                        pulvinar aliquet
                                        consequat. Praesent nec malesuada nibh. <br><br>Nullam et metus congue, auctor
                                        augue sit amet,
                                        consectetur tortor.
                                        <a class="rm" href="#">
                                            Read Recipe<img src="./assets/image/shape-2.png" class="shp">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-3 col-md-12 c22">
                        <div class="card profile-header">
                            <div class="body">
                                <div class="row profiles">
                                    <img src="./assets/image/message.png" class="chat">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="profile-image float-md-right">

                                            <img src="./assets/image/group-32.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-12 name">
                                        <h4 class="m-t-0 m-b-0"><strong>Lary Vatson</strong></h4>
                                        <span class="job_post">Manchester</span>
                                    </div>
                                    <div class="ctext">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus
                                        pulvinar aliquet
                                        consequat. Praesent nec malesuada nibh. <br><br>Nullam et metus congue, auctor
                                        augue sit amet,
                                        consectetur tortor.
                                        <a class="rm" href="#">
                                            Read Recipe<img src="./assets/image/shape-2.png" class="shp">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-3 col-md-12 c23">
                        <div class="card profile-header">
                            <div class="body">
                                <div class="row profiles">
                                    <img src="./assets/image/message.png" class="chat">
                                    <div class="col-lg-4 col-md-4 col-12 ">
                                        <div class="profile-image float-md-right">

                                            <img src="./assets/image/group-33.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-12 name">
                                        <h4 class="m-t-0 m-b-0"><strong>Lary Vatson</strong></h4>
                                        <span class="job_post">Manchester</span>
                                    </div>
                                    <div class="ctext">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus
                                        pulvinar aliquet
                                        consequat. Praesent nec malesuada nibh. <br><br>Nullam et metus congue, auctor
                                        augue sit amet,
                                        consectetur tortor.
                                        <a class="rm" href="#">
                                            Read Recipe<img src="./assets/image/shape-2.png" class="shp">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="newsletter ">
                <a href="#" class="up_arrow"><img src="./assets/image/arrow-up.png" alt="up-arrow" class="arrow-up"></a>
                <a href="#" class="chats"><img src="./assets/image/Chat2.png" alt="chats"></a>
                <h4 class="text-center">GET OUR NEWSLETTER</h4>
                <div class="news d-flex justify-content-center text-center">
                    <div class="form-group">

                        <input type="email" placeholder="YOUR EMAIL" id="email" class="form-control email">
                    </div>

                    <button class="btn submit">Submit</button>

                </div>

            </div>



        </section>
        <section class="footers">
            <footer>
                <div class="row footer">
                    <div class="col-lg-2 logo">
                        <a href="#">
                            <img src="./assets/image/white-logo-transparent-background.png" alt="helperland" class="logos">
                        </a>
                    </div>
                    <div class="col-lg-8 links">
                        <nav>
                            <div class="nav menus">
                                <a href="./index.php" class="btn btn3">HOME</a>
                                <a href="About.php" class="btn btn3">ABOUT</a>
                                <a href="#" class="btn btn3">TESTIMONIALS</a>
                                <a href="Faq.php" class="btn btn3">FAQS</a>
                                <a href="#" class="btn btn3">INSURANCE POLICY</a>
                                <a href="#" class="btn btn3">IMPRESSUM</a>

                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-2 social">
                        <nav>
                            <div class="nav icons">
                                <a href="#" class="btn facebook"><i class="fa fa-facebook fb"></i></a>
                                <a href="#" class="btn instagram"><i class="fa fa-instagram insta"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row privacy-policy">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat nunc libero, ac malesuada
                        ligula aliquam ac. <span><a href="#">Privacy Policy</a></span></p>
                    <button class="btn ok" id="ok">OK!</button>
                </div>
            </footer>
        </section>

    </div>
    <!--  Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="./assets/js/Homepage.js"></script>

</body>

</html>