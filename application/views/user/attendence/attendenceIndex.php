<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">-->
<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>-->
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
                        <h4 class="page-title">
                               <i class="fa fa-user fa-fw"></i> || Attendance
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Attendance</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        <div id="my-calendar"></div>
                    </div>
                </div>
            </div>
        </div>
                </div>
</div>

                
   <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>





    <!--<link rel="stylesheet" type="text/css" href="https://www.zabuto.com/assets/css/style.css">-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/calender/zabuto_calendar.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/calender/zabuto_calendar.min.css">

   
<script >
    $(document).ready(function () {
    var  base_url = '<?php echo base_url() ?>';
    $("#my-calendar").zabuto_calendar({
    legend: [
    {type: "block", label: "absent", classname: 'grade-1'},
    {type: "block", label: "present", classname: 'grade-4'},
    {type: "block", label: "late", classname: 'grade-3'},
    {type: "block", label: "late_with_excuse", classname: 'grade-2'},
    {type: "block", label: "holiday", classname: 'grade-5'},
    ],
    ajax: {
    url: base_url+"user/attendence/getAttendence?grade=1",
    }
    });
    });
</script>
