<header>
            <?php include("navbar.php"); ?>
        </header>
        <main>
            <div class="container welcome">
                <h1 class="wlcm">Welcome, <span class="wlcm-nm"><?php echo  $_SESSION["firstname"]; ?></span></h1>
            </div>
        </main>

        <section class="usertable ">
            <!-- Vertical navbar -->
            <div class="contains">
                <nav class="vertical-nav  " id="sidebar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContents" aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContents">
                        <ul class=" nav flex-column  mb-0">
                            <li class="nav-item" id="customerdashboard" title="Dahboard">
                                <a href="CustomerDashboard.php" class="nav-link " >
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item active" id="customerservicehistory" title="Service History">
                                <a href="Customer-Servicehistory.php" class="nav-link " >
                                    Service History </a>
                            </li>
                            <li class="nav-item" id="customerserviceschedule" title="Service Schedule">
                                <a href="#" class="nav-link " >
                                    Service Schedule </a>
                            </li>
                            <li class="nav-item" id="customerfavourite" title="Favourite Pros">
                                <a href="CustomerFavouriteSP.php" class="nav-link " >
                                    Favourite Pros </a>
                            </li>
                            <li class="nav-item" id="customerInvoice" title="Invoices">
                                <a href="#" class="nav-link " >
                                    Invoices </a>
                            </li>
                            <li class="nav-item" id="customernotification" title="Notification">
                                <a href="#" class="nav-link " >
                                    Notifications
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
