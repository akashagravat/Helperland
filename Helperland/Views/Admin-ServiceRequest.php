<?php
include('AdminHeader.php');
?>
<title>Admin-ServiceRequest</title>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="./assets/css/Admin-ServiceRequest.css?v=211">

</head>

<body>
  <?php
  include('./AdminVerticalnav.php');
  ?>
  <div class="blocks">
    <div class="headings">
      <h2>Service Requests</h2>

    </div>

  </div>
  <div class="input-forms">
    <form>
      <div class="form-group service_id">

        <input type="number" class="form-control" id="serviceid" aria-describedby="service-id" placeholder="Service ID">
      </div>

      <select id='selCustomer' class="selCustomer">
        <option selected="true" disabled="disabled">Customer</option>

      </select>

      <select id='serviceProvider' class="serviceProvider">
        <option val="ServiceProviders" selected="true" disabled="disabled">Service Provider</option>
      </select>

      <select id='status' class="status">
        <option val="Status" selected="true" disabled="disabled">Status</option>
        <option value='1'>New</option>
        <option value='2'>Pending</option>
        <option value='3'>Completed</option>
        <option value='4'>Cancelled</option>

      </select>
      <div class="form-group startdate">
        <input type="text" id="startdate" class="form-control" placeholder="Enter Date" />

      </div>
      <div class="form-group endtdate">
        <input type="text" id="endtdate" class="form-control" placeholder="To Date" />

      </div>

      <button type="submit" class="btn  search ">Search</button>
      <button class="btn  reset " type="reset" id="reset">Clear</button>

    </form>
  </div>
  <div class="table_usermanagement">
    <table class="table table-hover" id="tblusermanagement">

      <thead id="headings">
        <tr>
          <th></th>
          <th scope="col">Service ID </th>
          <th scope="col">Service date </th>
          <th scope="col">Customer details </th>
          <th scope="col">Service provider </th>
          <th scope="col" class="action">Status </th>
          <th scope="col " class="action">Actions </th>

        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
    <section class="table-view-card table-card">
      <table class="cardview  mt-4" id="cardview">
        <thead>
          <td></td>
        </thead>
        <tbody>
        </tbody>
      </table>


    </section>
  </div>
  <p class="allright">©2018 Helperland. All rights reserved.</p>
  </section>

  </div>

  <!-- Booking Details Modal -->
  <div class="modal fade" id="bookingdetails" tabindex="-1" role="dialog" aria-labelledby="bookingdetails" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Service Details
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="float-right spdetails1 ">
          </div>
          <div class="custalldetails ">
            <p class="datesandtimes"><span class="bookdate">25/11/2021</span> <span class="bookstarttime">08:00 </span> - <span class="bookendtime">11:00</span></p>
            <p class="title-text totalrequiredtime"><b>Duration: </b> <span class="totalduration"> 3 </span> Hrs</p>
            <hr class="reschedulehr">
            <p class="title-text clientserviceid"><b>Service Id: </b> <span>12312</span></p>
            <p class="title-text extraservices"><b>Extras: </b> <span>2312</span></p>
            <div class="title-text paids"><b>Net Amount: </b>
              <div class="payment bookpayment ml-2"> <span>12312</span> €</div>
            </div>
            <hr class="reschedulehr">

            <p class="title-text serviceaddress"><b>Service Address: </b> <span>12312</span></p>
            <p class="title-text billingaddress"><b>Billing Address: </b> <span> 12312</span></p>
            <p class="title-text phonenumber"><b>Phone: </b> +49 <span class="mobilenumber"> 9988556644 </span></p>
            <p class="title-text clientemail"><b>Email: </b> <span> 12312</span></p>
            <hr class="reschedulehr">

            <p class="title-text commentsall"><b>Comments : </b> <span></span></p>

            <div class="mt-2 mb-2 petornot">
              <span><img src="./assets/Image/included.png"></span>I have pets at home
              <span><img src="./assets/Image/not-included.png"></span> I have pets at home

            </div>
            <hr class="reschedulehr">

            <div class="float-right spdetails2 ">
            </div>




          </div>

        </div>

      </div>
    </div>
  </div>
  <!--Edit Modal -->
  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Service Request</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body editservice">

          <div class="form-row">
            <div class="col-md-6 ">
              <label for="dates">Date</label>
              <input type="text" id="dates" class="form-control mb-2" placeholder="Enter Date" />

            </div>
            <div class="form-group col-md-6">
              <label for="time">Time</label>
              <select id="time" class="form-control">
                <option>32</option>
              </select>
            </div>
          </div>
          <h5 class="my-2">Service Address</h5>
          <div class="serviceaddress">
            <div class="form-row">
              <div class="col-md-6">
                <label for="street">Street name</label>
                <input type="text" class="form-control mb-2" id="street" placeholder="Street">
              </div>
              <div class="col-md-6">
                <label for="houseno">House number</label>
                <input type="number" class="form-control mb-2" id="houseno" placeholder="House number">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <label for="postal">Postal Code</label>
                <input type="text" class="form-control mb-2" id="postal" placeholder="Street">
              </div>
              <div class="form-group col-md-6">
                <label class="location">Location</label>
                <select id="location" class="located form-control">
                </select>
              </div>
            </div>
          </div>
          <h5 class="my-2">Invoicing Address</h5>

          <div class="invoicing">
            <div class="form-row">
              <div class="col-md-6">
                <label for="streets">Street name</label>
                <input type="text" class="form-control mb-2" id="streets" placeholder="Street">
              </div>
              <div class="col-md-6">
                <label for="housenos">House number</label>
                <input type="number" class="form-control mb-2" id="housenos" placeholder="House number">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <label for="postals">Postal Code</label>
                <input type="text" class="form-control mb-2" id="postals" placeholder="Street">
              </div>
              <div class="form-group col-md-6">
                <label class="location">Location</label>
                <select id="location" class="located form-control">
                </select>
              </div>
            </div>
          </div>

          <div class="form-group ">
            <label for="whyreschedule">Why do you want to reschedule service request?</label>
            <textarea class="form-control" id="whyreschedule" placeholder="Why do you want to reschedule service request?" rows="3" style="height: auto;"></textarea>
          </div>
          <div class="form-group ">
            <label for="callcenteremp">Call Center EMP Notes</label>
            <textarea class="form-control" id="callcenteremp" placeholder="Enter Notes" rows="3" style="height: auto;"></textarea>
          </div>
          <div class="form-row">

            <button type="submit" class="btn btn-reschedule form-control">Update</button>
          </div>


        </div>

      </div>
    </div>
  </div>

  <!--Refund Modal -->
  <div class="modal fade" id="refundmodal" tabindex="-1" role="dialog" aria-labelledby="editmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Refund Amount</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body refundblocks">

          <div class="form-row">
            <div class="paymentblock">
              <div class="mx-2">
                <p>Paid Amount</p>
                <p class="paidamount">54 €</p>

              </div>
              <div class="mx-2">
                <p>Refunded Amount</p>
                <p class="refundedamount">54 €</p>

              </div>
              <div class="mx-2">
                <p>In Balance Amount</p>
                <p class="balanceamount">54 €</p>

              </div>
            </div>

          </div>
          <div class="form-row ">
            <div class="col-md-6">
              <label>Amount</label>
              <div style="display: flex;">
                <input type="number" class="form-control addprice tagnm pricesinput">
                <select class="form-control tagnm percentages">
                  <option value="Percentage" selected>Percentage</option>
                  <option value="Fixed">Fixed</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label>Calculate</label>
              <div style="display: flex;">
                <button type="button" class="btn calculatebtn tagnm">Calculate</button>
                <input type="text" class="form-control calculateval tagnm" disabled style="cursor: not-allowed;">
              </div>
            </div>

          </div>
          <div class="form-group mt-2">
            <label for="whyreschedule">Why do you want to reschedule service request?</label>
            <textarea class="form-control" id="whyreschedule" placeholder="Why do you want to reschedule service request?" rows="3" style="height: auto;"></textarea>
          </div>
          <div class="form-group ">
            <label for="callcenteremp">Call Center EMP Notes</label>
            <textarea class="form-control" id="callcenteremp" placeholder="Enter Notes" rows="3" style="height: auto;"></textarea>
          </div>
          <div class="form-row">

            <button type="submit" class="btn refundamount form-control" disabled="disabled">Refund</button>
          </div>

        </div>

      </div>
    </div>
  </div>
  <div id="iframeloading" style="    top: -8%;
    display: none;
    position: fixed;
    left: 0%;
    height: 100%;">
    <img src="./assets/Image/preloader.gif" alt="loading" />
  </div>
  <?php
  include('./Adminfooter.php');
  ?>
  <script src="./assets/js/Admin-ServiceRequest.js?v=122"></script>


</body>

</html>