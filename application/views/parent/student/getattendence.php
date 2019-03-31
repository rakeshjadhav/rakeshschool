
<!-- jQuery CDN -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <!-- Bootstrap CDN -->
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">-->
    <!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/calender/zabuto_calendar.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/calender/zabuto_calendar.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>-->


<style>
     table thead th {
    padding: 8px 0px !important;
    }
    table tbody td {
    padding: 5px 5px !important;
    }
    .badge{
        background-color: #fff;
        color:#039;
    }
</style>
<style>
    .grade-1 {
        background-color: #FA2601;
    }
    .grade-2 {
        background-color: #FA8A00;
    }
    .grade-3 {
        background-color: #FFEB00;
    }
    .grade-4 {
        background-color: #27AB00;
    }
    .grade-5 {
        background-color: #a7a7a7;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">View Teacher</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Student Information</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> 
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo base_url() . $student['image'] ?>" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $student['firstname'] . " " . $student['lastname']; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <ul class="list-group list-group-full">
                                        <li class="list-group-item">
                                            <span class="badge " style="background-color: none !important;">
                                               <?php echo $student['admission_no']; ?></span> <span class="font-bold"> Admission No</span>
                                        </li>
                                        <li class="list-group-item">
                                        <span class="badge ">
                                            <?php echo $student['roll_no']; ?></span><span class="font-bold">Roll No</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge "><?php echo $student['class']; ?></span><span class="font-bold">Class</span>
                                        </li>
                                        <li class="list-group-item ">
                                            <span class="badge "><?php echo $student['division']; ?></span> <span class="font-bold">Division </span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge"><?php echo $student['rte']; ?></span> <span class="font-bold"> Rte</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge" style=""><?php echo $student['gender']; ?></span><span class="font-bold">Gender</span>
                                        </li>
                                        </ul>
                               </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            
                            <!--// fee code-->
                            <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">
                           attendance
                        </h3>
                    </div>
                    <div class="box-body">
                        <div id="my-calendar"></div>
                    </div>  
                </div>
                        </div>
                    </div>
                </div>
         
                
          
            </div>
           
        </div>

<script type="text/javascript">
    $(document).ready(function () {
    var  base_url = '<?php echo base_url() ?>';
    alert(base_url);
    var student_session_id='<?php echo $student['student_session_id']; ?>';
    alert(student_session_id);
    $("#my-calendar").zabuto_calendar({
    legend: [
    {type: "block", label: "absent", classname: 'grade-1'},
    {type: "block", label: "present", classname: 'grade-4'},
    {type: "block", label: "late", classname: 'grade-3'},
    {type: "block", label: "late_with_excuse", classname: 'grade-2'},
    {type: "block", label: "holiday", classname: 'grade-5'},
    ],
    ajax: {
    url: base_url+"parent/parents/getAjaxAttendence?grade=1&student_session="+student_session_id,
    }
    });
    });
</script>
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
