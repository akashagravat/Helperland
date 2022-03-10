<script>
    $(document).ready(function(){
        username = "<?php echo $_SESSION['username'];?>";
        $('#tblusermanagement').on('click', ".activateuser", function(e) {
      e.preventDefault();
      uid = $(this).attr('id');
      stt = "Activate";
      statues = 'Yes';
      activeinactive();
    });

    $('#tblusermanagement').on('click', ".deactivateuser", function(e) {
      e.preventDefault();
      uid = $(this).attr('id');
      stt = "DeActivated";
      statues = 'No';
      activeinactive();
    });

    $('#cardview').on('click', ".activateuser", function(e) {
      e.preventDefault();
      uid = $(this).attr('id');
      stt = "Activate";
      statues = 'Yes';
      activeinactive();
    });

    $('#cardview').on('click', ".deactivateuser", function(e) {
      e.preventDefault();
      uid = $(this).attr('id');
      stt = "DeActivated";
      statues = 'No';
      activeinactive();
    });

    
    function activeinactive() {
      $("#preloader").show();
      $.ajax({
        type: "POST",
        url: "http://localhost/helper/?controller=Helperland&function=ActivateDeactivate",
        data: {
          'username': username,
          'status': statues,
          'uid': uid,
        },
        // dataType: "dataType",
        success: function(data) {
          if (data == 1) {
            Swal.fire({
              title: 'User Account Status Updated Successfully',
              text: '',
              icon: 'success',
              confirmButtonText: 'Done'
            });
            $("#tblusermanagement").DataTable().ajax.reload();
            $("#cardview").DataTable().ajax.reload();

          }
          if (data == 0) {

            Swal.fire({
              title: 'User Account Status Not Updated',
              text: '',
              icon: 'error',
              confirmButtonText: 'Done'
            });
            $("#tblusermanagement").DataTable().ajax.reload();
            $("#cardview").DataTable().ajax.reload();

          }
          $("#preloader").hide();
        }
      });
    }
    });
</script>