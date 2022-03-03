<script>
    $(document).ready(function () {

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
                            $("#currentpassword").removeClass('valid-input');

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
    });
</script>