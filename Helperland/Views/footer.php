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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/table2csv@1.1.6/src/table2csv.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>
<script src="./assets/js/Script.js"></script>
<?php if (isset($_SESSION)) { ?>
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