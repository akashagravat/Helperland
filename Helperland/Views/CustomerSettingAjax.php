<script>
    $(document).ready(function() {
        username = "<?php echo $_SESSION['username']; ?>";
        GetUserDetails();

        function GetUserDetails() {
            $.ajax({
                type: "POST",
                url: "http://localhost/helper/?controller=Helperland&function=CustomerDetails",
                data: {
                    username: username,
                },
                dataType: "json",
                success: function(data) {
                    firstname = data[0] + " " + data[1];
                    $('.wlcm-nm').text(data[0] + " " + data[1]);
                    $('#firstname').val(data[0]);
                    $('#lastname').val(data[1]);
                    $('#emailaddress').val(data[2]);
                    $('#mobilenumber').val(data[3]);
                    $('#dateofbirth').val(data[4]);
                    $('#dateofmonth').val(data[5]);
                    $('#birthyear').val(data[6]);
                    $('#language').val(data[7]);
                }
            });
        }


        $('.changepassword').on("click", function(e) {
            e.preventDefault();

            if ($("#confirmpassword").val() == "" || $("#newpassword").val() == "" || $("#currentpassword").val() == "") {
                $('.passworderror').text("Please Enter All Fields");
                $('.passworderror').show();
                setTimeout(function() {
                    $(".passworderror").hide();
                }, 5000);
            } else {
                $("#iframeloading").show();
                currentpassword = $("#currentpassword").val();
                newpassword = $("#newpassword").val();
                newconfirmpassword = $("#confirmpassword").val();
                firstname = $("#firstname").val();
                lastname = $("#lastname").val();
                modifiedby = firstname + " " + lastname;
                $.ajax({
                    type: "POST",
                    url: "http://localhost/helper/?controller=Helperland&function=UpdatePassword",
                    data: {
                        'username': username,
                        'currentpassword': currentpassword,
                        'newpassword': newpassword,
                        'newconfirmpassword': newconfirmpassword,
                        'modifiedby': modifiedby,
                    },
                    success: function(data) {
                        $("#iframeloading").hide();
                        if (data == 1) {
                            $("#newpassword").val("");
                            $("#newpassword").removeClass('valid-input');
                            $("#currentpassword").val("");
                            $("#confirmpassword").val("");
                            $("#confirmpassword").removeClass('valid-input');

                            Swal.fire({
                                title: 'Your Password Has Been Updated Successfully',
                                text: '',
                                icon: 'success',
                                confirmButtonText: 'Done'
                            });
                        }
                        if (data == 0) {
                            $('.passworderror').text("Current Password is Invalid");
                            $('.passworderror').show();
                            setTimeout(function() {
                                $(".passworderror").hide();
                            }, 5000);
                        }
                        if (data == 2) {
                            $('.passworderror').text("Password Not Updated");
                            $('.passworderror').show();
                            setTimeout(function() {
                                $(".passworderror").hide();
                            }, 5000);
                        }
                    }
                });

            }


        });


        $('.addonenewaddress').on("click", function(e) {
            e.preventDefault();
            var street = $.trim($("#street").val());
            var houseno = $.trim($("#houseno").val());
            var pincode = $.trim($("#pincode").val());
            var location = $.trim($("#location").val());
            var mobilenum = $.trim($("#mobilenum").val());
            <?php if (isset($_SESSION['username'])) { ?>

                username = "<?php echo $_SESSION['username']; ?>";
            <?php } ?>
            $("#iframeloading").show();

            $.ajax({
                type: 'POST',
                url: "http://localhost/helper/?controller=Helperland&function=InsertAddress",
                data: {
                    "addresssave": 1,
                    "street": street,
                    "houseno": houseno,
                    "pincode": pincode,
                    "location": location,
                    "mobilenum": mobilenum,
                    "username": username,
                },

                success: function(data) {
                    if (data == 1) {
                        $("#iframeloading").hide();
                        Swal.fire({
                            title: 'Address has been Added Successfully',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'Done'
                        });

                        // GetAddress();
                    } else {
                        $("#iframeloading").hide();
                        $('.addnewerror').show();
                        $('.addnewerror').text("Please Enter All Fields");
                        setTimeout(function() {
                            $(".addnewerror").hide();
                        }, 5000);
                        Swal.fire({
                            title: 'Address has been not Added',
                            text: 'Please Try Again',
                            icon: 'error',
                            confirmButtonText: 'Done'
                        });
                    }
                    $('#addresstable').DataTable().ajax.reload();
                }
            });
        })

        AddressTable();

        function AddressTable() {
            $('#iframeloading').show();
            table = $('#addresstable').DataTable({
                "dom": '<"top">rt<"bottom"flpi><"clear">',
                // "bPaginate": false,
                "processing": true,

                "bFilter": false,
                "bLengthChange": false,
                "bPaginate": {

                },
                'pageLength': 5,
                "ordering": false,
                "pagingType": "full_numbers",

                "language": {
                    "emptyTable": "No data available in table",
                    "info": "_START_  of _TOTAL_ ",
                    "infoEmpty": " 0 of 0 entries",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>',
                        "sFirst": '<i class="fa fa-angle-double-left"></i>',
                        "sLast": '<i class="fa fa-angle-double-right"></i>',
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '

                    },

                },
                "ajax": {
                    'type': 'POST',
                    'url': 'http://localhost/helper/?controller=Helperland&function=Getaddresstable',
                    'data': {
                        'username': "<?php echo $_SESSION['username'] ?>",
                    },


                    // 'datasrc': 'data',
                    // contentType: 'application/json',
                    // "dataType": "json",
                },
                'columns': [{
                        "data": 'radiobutton'
                    }, {

                        "data": 'addressoutput'
                    }, {

                        "data": 'editordelete'
                    },

                ],


            }).ajax.reload();
            $('#iframeloading').hide();
            table.processing(true);

        }


    });


   
</script>