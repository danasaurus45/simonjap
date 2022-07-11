</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('public/assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('public/assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>">
</script>
<!-- Summernote -->
<script src="<?php echo base_url('public/assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('public/assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url('public/assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/assets/js/adminlte.js') ?>"></script>
<!-- Alert -->
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>
<!-- DataTable-->
<script>
    $(function() {
        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [5, 10, 25, 50],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Form Validation -->
<script>
    $(function() {
        $('#addUser').validate({
            rules: {
                nama: {
                    required: true,
                },
                username: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
            },
            messages: {
                nama: "Kolom nama masih kosong!",
                username: "Kolom username masih kosong!",
                email: {
                    required: "Kolom email masih kosong!",
                    email: "Mohon diisi dengan alamat email yang valid!"
                },
                password: {
                    required: "Kolom password masih kosong!",
                    minlength: "Panjang password minimal 5 karakter"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
</body>

</html>