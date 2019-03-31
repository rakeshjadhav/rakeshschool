
            <footer class="footer text-center"><?php echo date("m - Y ") ?> &copy;  </footer>
        </div>
    </div>
<!--    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>-->
 
    <script src="<?php echo base_url(); ?>assets/backend/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/custom.min.js"></script>
    
     <!--<script src="<?php echo base_url(); ?>assets/backend/extra/js/school-custom.js"></script>-->
     <!--<script src="<?php echo base_url(); ?>assets/backend/extra/js/sstoast.js"></script>-->
    
    
    
    <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/datatable/buttons.print.min.js"></script>
    <script type="text/javascript">
            var baseurl = "<?php echo base_url(); ?>";

        </script>
    <!-- end - This is for export functionality only -->
    <div class="row">
    <div class="modal fade" id="sessionModal" tabindex="-1" role="dialog" aria-labelledby="sessionModalLabel">
        <form action="" id="form_modal_session" class="form-horizontal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="sessionModalLabel">Session</h4>
                    </div>
                    <div class="modal-body sessionmodal_body pb0">

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary submit_session" >Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
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
     $('#sessionModal').on('show.bs.modal', function(event) {
         var $modalDiv = $(event.delegateTarget);
         $('.sessionmodal_body').html("");
         $.ajax({
             type: "POST",
             url: baseurl + "webadmin/admin/getSession",
             dataType: 'text',
             data: {},
             beforeSend: function() {
                 $modalDiv.addClass('modal_loading');
             },
             success: function(data) {
                // alert(data);
                 $('.sessionmodal_body').html(data);
             },
             error: function(xhr) { // if error occured
                 $modalDiv.removeClass('modal_loading');
             },
             complete: function() {
                 $modalDiv.removeClass('modal_loading');
             },
         });
     });
     
     $(document).on('click', '.submit_session', function() {
         var $this = $(this);
         var datastring = $("form#form_modal_session").serialize();
         $.ajax({
             type: "POST",
             url: baseurl + "webadmin/admin/updateSession",
             dataType: "json",
             data: datastring,
             beforeSend: function() {
                 $this.button('loading');
             },
             success: function(data) {
                 if (data.status == 1) {
                     $('#sessionModal').modal('hide');
                     window.location.href = baseurl + "webadmin/admin/dashboard";
                     successMsg("Session change successful");
                 }
             },
             error: function(xhr) {
                 $this.button('reset');
             },
             complete: function() {
                 $this.button('reset');
             },
         });
     });
    </script>
   
    <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</body>

</html>