
            <footer class="footer text-center"> 2017 &copy;  </footer>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/backend/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/custom.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    
    <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</body>

</html>