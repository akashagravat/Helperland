<!--Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/table2csv@1.1.6/src/table2csv.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.4/api/processing().js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
 
<!-- <script src="https://www.google.com/maps/embed/v1/MAP_MODE?key=AIzaSyBN1Sw4ureTW0yCCkK7-hHnZ7GV1hrBZ9U&parameters"></script> -->
<script src="./assets/js/Script.js"></script>
<?php if (isset($_SESSION['status'])) { ?>
    <script>
        $(document).ready(function() {

            Swal.fire({
                title: '<?php echo $_SESSION['status_msg']; ?>',
                text: '<?php echo $_SESSION['status_txt']; ?>',
                icon: '<?php echo $_SESSION['status']; ?>',
                confirmButtonText: 'Done'
            })

        });
    </script>
<?php
    unset($_SESSION['status_msg']);
    unset($_SESSION['status_txt']);
    unset($_SESSION['status']);
}
?>