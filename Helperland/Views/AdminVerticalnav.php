 <!-- Preloader Start-->
 <div id="preloader">
    <div id="pre-status">
      <div class="preload-placeholder"></div>
    </div>
  </div>
  <!-- Preloader End-->
 
<div class="wrapper">
    <header>
      <nav class="navbar navbar-expand-lg fixed-top">
        <div class="navbar-brand" style="cursor:pointer">helperland</div>


        <div class="navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown users">
              <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="./assets/image/admin-user.png" class="userimg">James Smith
              </a>
             
            </li>
            <li class="nav-item">
              <a class="nav-link " href=<?= $base_url . "./?controller=helperland&function=Logout" ?>>
                <img src="./assets/image/logout.png" class="logout">
              </a>
            </li>
          </ul>

        </div>
      </nav>
    </header>
    <section class="main-item">
      <nav class="vertical-nav " id="sidebar">
        <button class="  navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContents" aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation" id="toggles">
          <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContents">
          <ul class=" nav flex-column  mb-0">
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Service Management </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Role Management </a>
            </li>

            <li class="nav-item dropdown " id="drop1">
              <a href="#" class="nav-link ">
                Coupon Code Management <span class="angel"><i class="fa fa-angle-right"></i></span>
              </a>
              <ul class="dropdowns" id="drops1">
                <li class="nav-item"><a href="#" class="nav-link">All Transactions</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Generate Payment</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Customer Invoices</a></li>
              </ul>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Escalation Management </a>
            </li>
            <li class="nav-item adminservicerequest">
              <a href="./Admin-ServiceRequest.php" class="nav-link ">
                Service Requests </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Service Providers</a>
            </li>

            <li class="nav-item active usermanage">
              <a href="./Admin-UserManagement.php" class="nav-link ">
                User Management </a>
            </li>
            <li class="nav-item dropdown " id="drop2">
              <a href="#" class="nav-link ">
                Finance Module <span class="angels"><i class="fa fa-angle-right"></i></span>
              </a>
              <ul class="dropdowns" id="drops2">
                <li class="nav-item"><a href="#" class="nav-link">All Transactions</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Generate Payment</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Customer Invoices</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Zip Code Management </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Rating Management </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link ">
                Inquiry Management </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                Newsletter Management </a>
            </li>
            <li class="nav-item dropdown" id="drop3">
              <a href="#" class="nav-link ">
                Content Management <span class="angels"><i class="fa fa-angle-right"></i></span>
              </a>
              <ul class="dropdowns" id="drops3">
                <li class="nav-item"><a href="#" class="nav-link">Coupon Codes</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Usage History</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>