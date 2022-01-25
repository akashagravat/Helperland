<header>
            <?php if (!isset($_SESSION['username'])) { ?>
             <nav class="navbar navbar-expand-lg fixed-top navbar-light">
                    <a class="navbar-brand" href="index.php"><img src="./assets/image/white-logo-transparent-background.png"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars " style="color:white;padding: 5px;"></i></span>
                    </button>
                    <div class="collapse navbar-collapse float-right" id="navbarNavDropdown">
                        <ul class="navbar-nav ">
                            <li class="nav-item link1">
                                <a class="nav-link box-5" id="box-1" href="BookService.php" title="Book a Cleaner">Book a
                                    Cleaner </a>
                                <a class="nav-link box-5" href="Price.php" title="Prices">Prices</a>
                                <a class="nav-link box-5" href="OurGuaruntee.php" title="Our Guranteee">Our Guaruntee</a>
                                <a class="nav-link box-5" href="Blog.php" title="Blog">Blog</a>
                                <a class="nav-link box5" href="Contact.php" title="Contact Us">Contact Us</a>

                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="#login" id="box-2" title="Login" data-toggle="modal" data-target="#LoginModal">Login </a>

                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" id="box-3" title="Become a Helper" href="ServiceProvider-Become-a-pro.php">Become a Helper </a>

                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="./assets/image/flag.png">
                                </a>
                                <div class="dropdown-menu img" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">India</a>
                                    <a class="dropdown-item" href="#">US</a>
                                    <a class="dropdown-item" href="#">UK</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

         <?php   } ?>
            <?php if (isset($_SESSION['username'])) {
                include('navbar.php');
            } ?>
        </header>
