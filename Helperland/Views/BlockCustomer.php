<?php

include('header.php');
$emails = $_SESSION['username'];
$base_url = "http://localhost/helper/";
$url = "http://localhost/helper/";
// Session destroy and back button clicked
if (!isset($_SESSION['username'])) {
    header('Location:' . $url);
}

?>

<link rel="stylesheet" href="./assets/css/Customer-ServiceHistory.css?v=924">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

<link rel="stylesheet" href="./assets/css/Customer-Dashboard.css?v=912">
<link rel="stylesheet" href="./assets/css/CustomerFavSP.css?v=212">
<link rel="stylesheet" href="./assets/css/custblock.css">


<title>Block Customer</title>
</head>

<body>
    <div class="wrapper">
        <?php
        include('./SPVerticalnav.php');
        ?>


        <table class="table table-hover" id="tblblockcust">
            <p class="text-white bg-success text-center px-3 py-3 successmsg msgblock"></p>
            <p class="text-white bg-danger text-center px-3 py-3 errormsg msgblock"></p>

            <thead id="headings">
                <tr>
                    <th scope="row"></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        </section>
    </div>
    <?php
    include('footer.php');
    include('./custblockajax.php');
    ?>

</body>

</html>