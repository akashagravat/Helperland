<?php
include('header.php');
$emails = $_SESSION['username'];
$url = "http://localhost/helper/";
$base_url = "http://localhost/helper/";
// Session destroy and back button clicked  
if (!isset($_SESSION['username'])) {
    header('Location:' . $url);
}
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="./assets/css/Customer-Dashboard.css?v=21">
<link rel="stylesheet" href="./assets/css/ServiceProivderUpcomingService.css?v=99">
<link rel="stylesheet" href="./assets/css/sprating.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<title>My Ratings</title>
</head>

<body>
    <?php
    include('SPVerticalnav.php');
    ?>

    <div class="toppart">
        <div class="float-left ml-3">Rating <select id="selectbtn">
                <option value="1" selected>All</option>
                <option value="2">Very Good</option>
                <option value="3">Good</option>
                <option value="4">Poor</option>
                <option value="5">Very Poor</option>

            </select></div>
        <div class="float-right mr-3" style="display: inline-flex;">Sorting
            <div class="dropdown">
                <button class="btn dropdown-toggle" style="    border: none;
                 background: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="./assets/Image/filter.png" style="margin-top: -12px;"> </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="rs"> <input type="radio" class="mr-2 ml-2" name="sorts" value="1">Customer name: Ascending</div>
                    <div class="rs"><input type="radio" class="mr-2  ml-2" name="sorts" value="2">Customer name: Descending</div>
                    <div class="rs"><input type="radio" class="mr-2  ml-2" name="sorts" value="3" checked>Service date: Latest</div>
                    <div class="rs"> <input type="radio" class="mr-2  ml-2" name="sorts" value="4">Service date: Oldest</div>
                    <div class="rs"><input type="radio" class="mr-2  ml-2" name="sorts" value="5">Rating: High to Low</div>
                    <div class="rs"> <input type="radio" class="mr-2  ml-2" name="sorts" value="6">Rating: Low to High</div>

                </div>
            </div>
        </div>

    </div>


    <!-- <div class="sp-ratings">
        <div class="ratig mb-5">
            <div class="ratingsall">

                <div class="col firstcol">
                    <div class="col">8211</div>
                    <div class="col"><b>Gaurang Patel</b></div>

                </div>
                <div class="col secondcol">
                    <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
                    <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>

                </div>
                <div class="col thirdcol">
                    <div><b>Ratings</b></div>
                    <div class="col">
                        <div class="row star">


                            <i class="fa fa-star s1"></i>
                            <i class="fa fa-star s2"></i>
                            <i class="fa fa-star s3"></i>
                            <i class="fa fa-star s4"></i>
                            <i class="fa fa-star s5"></i>

                            <span>Good</span>
                        </div>
                    </div>

                </div>
            </div>
            <hr class="ratinghr">
            <div class="cname "><b>Customer Comment:</b></div>
            <div class="cname">fsfsd</div>
        </div>
    </div> -->

    <!-- <div class="">
              Shows <select>
            <option>10</option>
            <option>20</option>
            <option>25</option>

        </select>

    </div> -->

    <table id="ratingspall">
        <thead>
            <tr>
                <th></th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    </section>
    </div>


    <div id="iframeloading" style=" top: -8%;
            display: none;
            position: fixed;
            left: 0%;
            height: 100%;">
        <img src="./assets/Image/preloader.gif" alt="loading" />
    </div>

    <?php
    include('footer.php');
    include('./spratingajax.php');
    ?>


</body>

</html>