
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






    <section class="footers">
    <footer>
        <div class="row footer">
            <div class="col-lg-2 logo1">
                <a href="#">
                    <img src="./assets/image/white-logo-transparent-background.png" alt="helperland" class="logos">
                </a>
            </div>
            <div class="col-lg-8 links">
                <nav>
                    <div class="nav menus">
                        <a href="./index.php" class="btn btn3">HOME</a>
                        <a href="./About.php" class="btn btn3">ABOUT</a>
                        <a href="#" class="btn btn3">TESTIMONIALS</a>
                        <a href="./Faq.php" class="btn btn3">FAQS</a>
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
            <p>©2018 Helperland. All rights reserved. <span>Terms and Conditions | Privacy Policy</span></p>
        </div>
    </footer>
</section>

<!--Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>
    <script src="./assets/js/Script.js"></script>
    <script src="./assets/js/Preloader.js"></script>
    <script src="./assets/js/Bookservice.js?v=22091"></script>
    
<?php if (isset($_SESSION['status'])) { ?>
    <script>
        $(document).ready(function() {

            Swal.fire({
                title: '<?php echo $_SESSION['status_msg']; ?>',
                text: '<?php echo $_SESSION['status_txt']; ?>',
                icon: '<?php echo $_SESSION['status']; ?>',
                confirmButtonText: 'Done'
            })

        });
    </script>
<?php
    unset($_SESSION['status_msg']);
    unset($_SESSION['status_txt']);
    unset($_SESSION['status']);
}
?>

