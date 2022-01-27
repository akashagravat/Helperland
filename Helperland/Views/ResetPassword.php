<?php include('header.php');?>

<!-- Reset Password Modal -->

    <link rel="stylesheet" href="./assets/css/ResetPassword.css">
    <title>ResetPassword</title>

</head>
<?php include('navbar.php'); ?>
<section class="resetpassword">

    <h4 class="row text-center">Reset Password</h4>
    <p class="error text-center bg-warning text-white" style="display: block; ">
        <?php
        if (isset($_SESSION['err'])) {
            echo $_SESSION['err'];
        }
        ?>
    </p>
    <div class="resetform">
        <form method="POST" id="resetform" action="http://localhost/helper/?controller=Helperland&function=ResetKeyPassword">
            <div class="form-row mb-3">
            <input type="text" class="form-control" id="reset" name="reset" placeholder="ResetKey" value="<?php if(isset($_GET['parameter'])){echo $_GET['parameter'];} ?>" hidden>
            </div>
            <div class="form-row mb-3">
                <label class="resetlabel">New Password</label>
                <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Password">
                <div class="password-msg"></div>
            </div>
            <div class="form-row mb-3">
                <label class="resetlabel">Confirm Password</label>
                <input type="password" class="form-control" id="newcpassword" name="newcpassword" placeholder="Confirm Password">
                <div class="cpassword-msg"></div>

            </div>


            <div class="form-group mt-3">
                <button type="submit" name="reset_password" class="btn btn-save">Save</button>
            </div>
        </form>
    </div>

</section>
<?php include("footer.php"); ?>

<script src="./assets/js/ResetPassword.js"></script>
</body>

</html>