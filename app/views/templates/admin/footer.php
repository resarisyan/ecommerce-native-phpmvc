<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>

<script src="<?= BASEURL; ?>/admin-lte/plugins/jquery/jquery.min.js"></script>
<script src="<?= BASEURL; ?>/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/admin-lte/plugins/toastr/toastr.min.js"></script>
<script src="<?= BASEURL; ?>/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= BASEURL; ?>/admin-lte/dist/js/adminlte.js"></script>
<script src="<?= BASEURL; ?>/js/alert.js"></script>
<?php Flasher::flash() ?>


<?php
$kelola = ['kelola produk', 'kelola kategori', 'kelola pelanggan', 'kelola pemesanan', 'kelola kontak', 'kelola artikel'];
$dashboard = ['dashboard admin', 'dashboard pelanggan'];
$artikel = ['tambah artikel', 'ubah artikel'];

if (in_array(strtolower($data['judul']), $kelola)) { ?>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/jszip/jszip.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="<?= BASEURL; ?>/js/script.js"></script>
    <script>
        $(function() {
            $("#mytable").DataTable({
                "pageLength": 10,
                "autoWidth": true,
                "lengthChange": false,
                "ordering": false,
                "processing": true,
                "searching": true,
                "deferRender": true,
            }).buttons().container().appendTo('#mytable_wrapper .col-md-6:eq(0)');
        });
    </script>


    <?php $js = (explode(" ", strtolower($data['judul']))); ?>
    <script src="<?= BASEURL; ?>/js/modal/<?= $js[1]; ?>.js"></script>
<?php } else if (in_array(strtolower($data['judul']), $dashboard)) { ?>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/sparklines/sparkline.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/moment/moment.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?= BASEURL; ?>/admin-lte/dist/js/pages/dashboard.js"></script>
<?php } else if (in_array(strtolower($data['judul']), $artikel)) { ?>
    <script src="<?= BASEURL; ?>/admin-lte/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
<?php } ?>

</body>

</html>