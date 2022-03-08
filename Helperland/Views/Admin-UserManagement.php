<?php
include('AdminHeader.php');
?>
<title>Admin-UserManagement</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="./assets/css/Admin-UserManagement.css?v=241">
</head>

<body>
  <?php
  include('./AdminVerticalnav.php');
  ?>
  <div class="blocks">
    <div class="headings">
      <h2>User Management</h2>
      <div class="adduser">
        <button class="btn adduserbtn" data-toggle="modal" data-target="#addnewuser"><i class="fa fa-plus-circle plus" aria-hidden="true"></i>Add New User</button>
      </div>
    </div>
  </div>
  <form id="search">
    <div class="form-row">
      <select id='selUser' class="">
        <option selected="true" disabled="disabled">User name</option>

      </select>

      <select id='selUserRole' class=" ">
        <option selected="true" disabled="disabled">User role</option>
        <option value='1'>Admin</option>
        <option value='2'>ServiceProvider</option>
        <option value='3'>Customer </option>
      </select>
      <div class="input-group mobiles ">
        <div class="input-group-prepend" id="mobilenum">
          <div class="input-group-text">+49</div>
        </div>
        <input type="tel" class="form-control" id="phone" placeholder="Phone Number" maxlength="10" size="10">
      </div>
      <div class="form-group zips ">

        <input type="number" class="form-control  zips" id="zipcode" placeholder="Zip Code">
      </div>




      <button type="submit" class="btn  search ">Search</button>
      <button class="btn  reset " type="reset" id="reset">Clear</button>
    </div>
  </form>


  <div class="table_usermanagement" style="width: 100%;">
    <table class="table table-hover" id="tblusermanagement">

      <thead id="headings">
        <tr>
          <th></th>
          <th scope="col">User Name </th>
          <th scope="col">Role </th>
          <th scope="col">Date of Registration </th>
          <th scope="col">User Type</th>
          <th scope="col">Phone</th>
          <th scope="col">Postal Code</th>
          <th scope="col" class="action">Status </th>
          <th scope="col " class="action">Actions </th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
    <section class="table-view-card table-card">
      <table class="cardview" id="cardview" style="width: 100%;">
        <thead>
          <tr>
            <td></td>
          </tr>
        </thead>
        <tbody>

        </tbody>

      </table>





    </section>
  </div>


  <p class="allright">©2018 Helperland. All rights reserved.</p>
  </section>

  </div>

  <!--Add New User Modal -->
  <div class="modal fade" id="addnewuser" tabindex="-1" role="dialog" aria-labelledby="addnewuser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body edit_user">

          <div class="form-row  mt-1">
            <div class="col-12">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control " id="firstName" placeholder="First Name">
              <div class="first-name-msg"></div>

            </div>

          </div>
          <div class="form-row mt-1">
            <div class="col-12">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control " id="lastname" placeholder="Last Name">
              <div class="last-name-msg"></div>

            </div>
          </div>
          <div class="form-row mt-1">
            <div class="col-12">
              <label for="useremail">Email</label>
              <input type="email" class="form-control check_email " id="useremail" placeholder="Email">
              <div class="email-msg float-left"></div>
              <div class="error-email float-right"></div>
            </div>

          </div>
          <div class="form-row mt-1">
            <div class="form-group col-12">
              <label for="inlineFormInputGroup">Mobile Number</label>
              <div class="input-group ">
                <div class="input-group-prepend">
                  <div class="input-group-text">+49</div>
                </div>
                <input type="tel" class="form-control" id="mobilenum" name="mobile" placeholder="Mobile number" maxlength="10" size="10">
              </div>
              <div class="mobile-msg"></div>
            </div>
          </div>
          <div class="form-row mt-1">
            <div class="form-group col-12">
              <label for="password">Password</label>
              <input type="password" class="form-control " id="password" name="password" placeholder="Password">
              <div class="password-msg"></div>
            </div>

          </div>
          <div class="form-row mt-1">
            <div class="form-group col-12">
              <label for="cpassword">Confirm Password</label>
              <input type="password" class="form-control " id="cpassword" name="cpassword" placeholder="Confirm Password">
              <div class="cpassword-msg"></div>

            </div>
          </div>
          <div class="form-row mt-1">
            <div class="col-12">
              <button type="submit" id="submit-btn" name="CustomerSignup" class="btn registration " disabled data-dismiss="modal">Add New User</button>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

  <?php
  include('./Adminfooter.php');
  ?>
  <script src="./assets/js/AdminUserManagement.js?v=2199"></script>
  <script src="./assets/js/CustomerSignUp.js?v=231"></script>
 
</body>

</html>