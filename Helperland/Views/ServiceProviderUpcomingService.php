<?php
  include('header.php');
  $emails = $_SESSION['username'];
$url = "http://localhost/helper/";
$base_url ="http://localhost/helper/";
// Session destroy and back button clicked  
  if (!isset($_SESSION['username'])) {
    header('Location:' . $url);
  } 
?>
<link rel="stylesheet" href="./assets/css/ServiceProivderUpcomingService.css">
  <title>Upcoming Service</title>
</head>

<body>
  <div class="wrapper">
    <header>
      <div class="header-navigationbar">
        <nav class="navbar navbar-expand-lg fixed-top">
          <a class="navbar-brand"><img src="./assets/image/white-logo-transparent-background.png"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link item1" href="#">Prices & services</a>
              </li>
              <li class="nav-item wbg">
                <a class="nav-link warrenty" href="#">Warranty</a>
                <a class="nav-link blog" href="#">Blog</a>
                <a class="nav-link Contact" href="#">Contact</a>
              </li>
              <li class="nav-item dropdown notification">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bell ntf"></i><span class="badge badge-danger">2</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Notification1</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Notification2</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Notification3</a>
                </div>
              </li>


              <li class="nav-item dropdown users">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img src="./assets/image/admin-user.png">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">User Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Setting</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><form method="POST" action=<?= $base_url."./?controller=helperland&function=Logout"?>>
                                    <button class="dropdown-item" name="logout" type="submit">Logout</button>
                                </form></a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- Mobile Navbar -->

      <div class="mobile-nav">

        <nav class="navbar navbar-expand-lg fixed-top">
          <a class="navbar-brand"><img src="./assets/image/white-logo-transparent-background.png"></a>
          <div class="nav-brand dropdown notifications">
            <a class="dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-bell ntf"></i><span class="badge badge-danger">2</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Notification1</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Notification2</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Notification3</a>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContents"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContents">

            <ul class=" nav ">
              <li class="nav-item">
                <h1 class="wlcm">Welcome,
              <li class="nav-item"><span class="wlcm-nm"> <?php 
               echo   $_SESSION['firstname'];
              ?></span></li>
              </h1>

              </li>


              <li class="nav-item">
                <a href="#" class="nav-link ">
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  New Service Requests
                </a>
              </li>
              <li class="nav-item active">
                <a href="#" class="nav-link ">
                  Upcoming Services
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  Service Schedule
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  Service History
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  My Ratings
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  Block Customer
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  My Setting </a>
              </li>
              <li class="nav-item">
              <form method="POST" action=<?= $base_url."./?controller=helperland&function=Logout"?>>
                                  <button class="dropdown-item" name="logout" type="submit">Logout</button>
                                </form>
              </li>
              <li class="nav-item newnav">
                <a href="#" class="nav-link ">
                  Prices & services
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  Warranty </a>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link ">
                  Blog </a>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link ">
                  Contact </a>
              </li>

              <li class="nav-item fb-insta">
                <a href="#" class="nav-link"><i class="fa fa-facebook"></i><span><i
                      class="fa fa-instagram"></i></span></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>

    </header>
    <main>
      <div class="container welcome">
        <h1 class="wlcm">Welcome,<span class="wlcm-nm"> <?php 
               echo   $_SESSION['firstname'];
              ?></span></h1>
      </div>
    </main>

    <section class="usertable">
      <!-- Vertical navbar -->

      <nav class="vertical-nav " id="sidebar">
        <button class="  navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContents"
          aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation" id="toggles">
          <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContents">
          <ul class=" nav flex-column  mb-0">
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                New Service Requests
              </a>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link ">
                Upcoming Services
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Service Schedule
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Service History
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                My Ratings
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Block Customer
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <table class="table servicetable table-hover">
        <thead id="headings">
          <tr>
            <th scope="col">Service ID <img src="./assets/image/sort.png" class="sort"></th>
            <th scope="col">Service date <img src="./assets/image/sort.png" class="sort"></th>
            <th scope="col">Customer details <img src="./assets/image/sort.png" class="sort"></th>
            <th scope="col">Distance <img src="./assets/image/sort.png" class="sort"></th>
            <th scope="col">Actions <img src="./assets/image/sort.png" class="sort"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="serviceid">323436</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">15km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323437</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">10km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323438</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">15km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323439</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">15km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323440</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">10km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323441</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">25km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323442</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">15km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323443</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">05km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323444</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">15km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>
          <tr>
            <td class="serviceid">323445</td>
            <td scope="row">
              <div class="col date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</div>
              <div class="col time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</div>
            </td>
            <td scope="row">
              <div clas="col">David Bough </div>
              <div class="col address"><img src="./assets/image/layer-719.png" class="home">Musterstrabe 5,12345 Bonn</div>
            </td>
            <td class="distance">05km</td>
            <td><button type="button" class="btn btn-cancel">Cancel</button></td>
          </tr>

        </tbody>
      </table>


    </section>
    <section class="table-view-card ">
      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323436</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">15km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323437</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">10km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323438</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">15km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323439</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">15km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323440</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">10km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323441</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">25km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323442</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">15km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323443</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">05km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323444</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">15km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card table-card mt-4">
        <div class="card-body">
          <table class="card-view">
            <tbody>
              <tr>
                <td class="card-title row service-id">323445</td>
              </tr>
              <tr class="card-title row service-dt">
                <td class="card-title  date"><img src="./assets/image/calendar2.png" class="calender">09/04/2018</td>
                <td class="card-title ml-4 time"><img src="./assets/image/layer-712.png" class="clock">12:00 - 18:00</td>
              </tr>
              <tr>
                <td class="card-title row service-address-name">David Bough </td>
                <td class="card-title row service-address address"><img src="./assets/image/layer-719.png"
                    class="home">Musterstrabe 5,12345 Bonn</td>
              </tr>
              <tr>
                <td class="card-title row distance service-distance">05km</td>
              </tr>
              <tr>
                <td class="card-title service-cancel"><button type="button" class="btn cancel-btn">Cancel</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

<?php 
  include('footer.php');
?>
  <script src="./assets/js/Upcoming.js"></script>
</body>

</html>