<body>
  <div class="wrapper">
    <header>
      <?php include("navbar.php"); ?>
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
            <li class="nav-item dsbrod">
              <a href="#" class="nav-link ">
                Dashboard
              </a>
            </li>
            <li class="nav-item newservice">
              <a href="./NewServiceRequestSP.php" class="nav-link ">
                New Service Requests
              </a>
            </li>
            <li class="nav-item active upcomingservice">
              <a href="./ServiceProviderUpcomingService.php" class="nav-link ">
                Upcoming Services
              </a>
            </li>
            <li class="nav-item schedule">
              <a href="./SPServiceSchedule.php" class="nav-link ">
                Service Schedule
              </a>
            </li>
            <li class="nav-item history">
              <a href="./ServiceHistorySP.php" class="nav-link ">
                Service History
              </a>
            </li>
            <li class="nav-item ratings">
              <a href="./SPRating.php" class="nav-link ">
                My Ratings
              </a>
            </li>
            <li class="nav-item blockcustomer">
              <a href="./BlockCustomer.php" class="nav-link ">
                Block Customer
              </a>
            </li>
          </ul>
        </div>
      </nav>