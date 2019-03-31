      <?php
            $div_col = 12;
            $div_rol = 12;
            $bar_chart = false;
            $line_chart = false;
            if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
                $div_col = 9;
                $div_rol = 12;
            }

            $widget_col = array();
            if ($this->rbac->hasPrivilege('Monthly fees_collection_widget', 'can_view')) {
                $widget_col[0] = 1;
                $div_rol = 3;
            }

            if ($this->rbac->hasPrivilege('monthly_expense_widget', 'can_view')) {
                $widget_col[1] = 2;
                $div_rol = 3;
            }

            if ($this->rbac->hasPrivilege('student_count_widget', 'can_view')) {
                $widget_col[2] = 3;
                $div_rol = 3;
            }
            $div = sizeof($widget_col);
            if (!empty($widget_col)) {
                $widget = 12 / $div;
            } else {

                $widget = 12; 
            }
            ?>   
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="">Dashboard</a></li>
                            <li class="active">Active</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-12">


                <?php
                foreach ($notifications as $notice_key => $notice_value) {
                    ?>

                    <div class="dashalert alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="alertclose close close_notice" data-dismiss="alert" aria-label="Close" data-noticeid="<?php echo $notice_value->id; ?>"><span aria-hidden="true">&times;</span></button>

                        <a href="<?php echo site_url('admin/notification') ?>"><?php echo $notice_value->title; ?></a>
                    </div>

                    <?php
                }
                ?>

            </div>
                <div class="row">
                    
                    <div class="col-md-12 col-lg-3">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="m-b-0 font-medium"><?php echo $month_collection; ?></h2>
                                    <h5 class="text-muted m-t-0">fees_collection_widget</h5></div>
                                <div class="col-sm-6">
                                    <div id="" class="pull-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="m-b-0 font-medium"><?php echo $month_expense; ?></h2>
                                    <h5 class="text-muted m-t-0">monthly_expenses</h5></div>
                                <div class="col-sm-6">
                                    <div id="" style="height: 70px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="m-b-0 font-medium"><?php echo $total_students; ?></h2>
                                    <h5 class="text-muted m-t-0">student</h5></div>
                                <div class="col-sm-6">
                                    <div id="" style="height: 70px" class="pull-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="m-b-0 font-medium">356</h2>
                                    <h5 class="text-muted m-t-0">student</h5></div>
                                <div class="col-sm-6">
                                    <div id="" style="height: 70px" class="pull-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  <div class="col-md-12 col-sm-12">  

                        <?php
                        //if (($this->moduleL->hasActive('fees_collection')) && ($this->moduleL->hasActive('expense'))) {
                            if ($this->rbac->hasPrivilege('fees_collection_and_expense_monthly_chart', 'can_view')) {
                                $bar_chart = true;
                                //$div_rol = 3;
                                $userdata = $this->customlib->getUserData();

// $role_id = $userdata["role_id"];
// if (($role_id == 1) || ($role_id == 3)) {
                                ?>             
                                <div class="white-box box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Fees Collection & Expenses For <?php echo date('F') . " " . date('Y'); ?></h3>
<!--                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>-->
                                    </div>
                                    <div class="box-body">
                                        <div class="">
                                            <canvas id="barChart" style="height:250px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php
                            if ($this->rbac->hasPrivilege('fees_collection_and_expense_yearly_chart', 'can_view')) {
                                $div_rol = 3;
                                $line_chart = true;
                                ?>
                                <div class="white-box box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">fees collection & expenses for session<?php echo $this->setting_model->getCurrentSessionName(); ?></h3>
<!--                                        <div class="box-tools pull-right">
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>-->
                                    </div>
                                    <div class="box-body">
                                        <div class="">
                                            <canvas id="lineChart" style="height:250px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                       // } // }  
                        ?>
                        <?php
                        if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) {
                            $div_rol = 3;
                            ?>
                            <div class="box box-primary">
                                <div class="box-body">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->
<?php } ?>               
                    </div>
                
                <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/Chart.js/chartjs.init.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/Chart.js/Chart.min.js"></script>

                 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/calendar/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/moment/moment.js"></script>
    <script src='<?php echo base_url() ?>assets/backend/plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
    <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/calendar/dist/jquery.fullcalendar.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/plugins/bower_components/calendar/dist/cal-init.js"></script>
   <script type="text/javascript">
    $(function () {
        var areaChartOptions = {
            showScale: true,
            scaleShowGridLines: false,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve: true,
            bezierCurveTension: 0.3,
            pointDot: false,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,

            maintainAspectRatio: true,
            responsive: true
        };
        var bar_chart = "<?php echo $bar_chart ?>";
        var line_chart = "<?php echo $line_chart ?>";
        if (line_chart) {


            var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas);
            var lineChartOptions = areaChartOptions;
            lineChartOptions.datasetFill = false;
            var yearly_collection_array = <?php echo json_encode($yearly_collection) ?>;
            var yearly_expense_array = <?php echo json_encode($yearly_expense) ?>;
            var total_month = <?php echo json_encode($total_month) ?>;
            var areaChartData_expense_Income = {
                labels: total_month,
                datasets: [
                    {
                        label: "Expense",
                        fillColor: "rgba(215, 44, 44, 0.7)",
                        strokeColor: "rgba(215, 44, 44, 0.7)",
                        pointColor: "rgba(233, 30, 99, 0.9)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: yearly_expense_array
                    },
                    {
                        label: "Collection",
                        fillColor: "rgba(102, 170, 24, 0.6)",
                        strokeColor: "rgba(102, 170, 24, 0.6)",
                        pointColor: "rgba(102, 170, 24, 0.9)",
                        pointStrokeColor: "rgba(102, 170, 24, 0.6)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: yearly_collection_array
                    }
                ]
            };


            lineChart.Line(areaChartData_expense_Income, lineChartOptions);
        }

        var current_month_days = <?php echo json_encode($current_month_days) ?>;
        var days_collection = <?php echo json_encode($days_collection) ?>;
        var days_expense = <?php echo json_encode($days_expense) ?>;

        var areaChartData_classAttendence = {
            labels: current_month_days,
            datasets: [
                {
                    label: "Electronics",
                    fillColor: "rgba(102, 170, 24, 0.6)",
                    strokeColor: "rgba(102, 170, 24, 0.6)",
                    pointColor: "rgba(102, 170, 24, 0.6)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: days_collection
                },
                {
                    label: "Digital Goods",
                    fillColor: "rgba(233, 30, 99, 0.9)",
                    strokeColor: "rgba(233, 30, 99, 0.9)",
                    pointColor: "rgba(233, 30, 99, 0.9)",
                    pointStrokeColor: "rgba(233, 30, 99, 0.9)",
                    pointHighlightFill: "rgba(233, 30, 99, 0.9)",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: days_expense
                }
            ]
        };
        if (bar_chart) {
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var barChart = new Chart(barChartCanvas);

            var barChartData = areaChartData_classAttendence;
            barChartData.datasets[1].fillColor = "rgba(233, 30, 99, 0.9)";
            barChartData.datasets[1].strokeColor = "rgba(233, 30, 99, 0.9)";
            barChartData.datasets[1].pointColor = "rgba(233, 30, 99, 0.9)";
            var barChartOptions = {
                scaleBeginAtZero: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: true,
                barShowStroke: true,
                barStrokeWidth: 2,
                barValueSpacing: 5,
                barDatasetSpacing: 1,

                responsive: true,
                maintainAspectRatio: true
            };

            barChartOptions.datasetFill = false;
            barChart.Bar(barChartData, barChartOptions);
        }
    });


    $(document).ready(function () {

        $(document).on('click', '.close_notice', function () {
            var data = $(this).data();


            $.ajax({
                type: "POST",
                url: base_url + "admin/notification/read",
                data: {'notice': data.noticeid},
                dataType: "json",
                success: function (data) {
                    if (data.status == "fail") {

                        errorMsg(data.msg);
                    } else {
                        successMsg(data.msg);
                    }

                }
            });


        });
    });
</script>

             
          
                