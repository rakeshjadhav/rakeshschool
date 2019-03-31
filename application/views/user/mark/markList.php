 <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<style>
    .comment-body:hover {
    background: #fff !important;
    }
    .comment-center .user-img img {
    /*width: 100%;*/
     height:100px !important;
     width:100px !important;
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-user fa-fw"></i> || Report Card
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Report Card</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-tags"></i> ||  Report Card
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                    <div class="col-md-12  ">
                        <div class="">
                            
                            <div class="comment-center">
                                <?php
                                if (empty($examSchedule)) {
                                    ?>
                                <div class="alert alert-danger">
                                        No Exam Found.
                                    </div>
                                
                                <?php
                                } else {
                                    $counter = 1;
                                    foreach ($examSchedule as $key => $value) {
                                        ?>
                                <div id="<?php echo 'print_view' . $counter ?>">
                                           <!--  <button type='button' class="btn btn-default btn-sm pull-right no-print" onclick="printDiv('<?php echo "#print_view" . $counter ?>');"><i class="fa fa-print"></i></button> -->
                                            <h4 class="pagetitleh"><?php echo $value['exam_name']; ?></h4>
                                            <?php
                                            if (empty($value['exam_result'])) {
                                                ?>
                                                <div class="alert alert-info"><?php echo $this->lang->line('no_result_prepare'); ?></div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="table-responsive around10">  
												<div class="download_label">Report Card</div>
                                                    <table class="table table-hover table-striped print_table  tmb0">
                                                        <thead>
                                                            <tr>
                                                                <td>student <?php echo $student['firstname'] . " " . $student['lastname'] ?></td>
                                                                <td><?php echo $this->lang->line('class'); ?>: <?php echo $student['class_id'] . "(" . $student['section'] . ")"; ?> </td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>  
                                                <div class="table-responsive borgray around10">  
                                                    <table id="" class="table table-striped table-bordered table-hover tmb0 example">
                                                        <thead>
                                                            <tr>
                                                                <th>Subject</th>
                                                                <th>full_marks </th>
                                                                <th>passing_marks</th>
                                                                <th>obtain_marks</th>
                                                                <th class="text text-right">result</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $obtain_marks = 0;
                                                            $total_marks = 0;
                                                            $result = "Pass";
                                                            $exam_results_array = $value['exam_result'];
                                                            $s = 0;
                                                            foreach ($exam_results_array as $result_k => $result_v) {
                                                                $total_marks = $total_marks + $result_v['full_marks'];
                                                                ?>
                                                                <tr>
                                                                    <td>  <?php
                                                                        echo $result_v['exam_name'] . " (" . substr($result_v['exam_type'], 0, 2) . ".) ";
                                                                        ?></td>
                                                                    <td><?php echo $result_v['full_marks']; ?></td>
                                                                    <td><?php echo $result_v['passing_marks']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($result_v['attendence'] == "pre") {
                                                                            echo $get_marks_student = $result_v['get_marks'];
                                                                            $passing_marks_student = $result_v['passing_marks'];
                                                                            if ($result == "Pass") {
                                                                                if ($get_marks_student < $passing_marks_student) {
                                                                                    $result = "Fail";
                                                                                }
                                                                            }
                                                                            $obtain_marks = $obtain_marks + $result_v['get_marks'];
                                                                        } else {
                                                                            $result = "Fail";
                                                                            echo ($result_v['attendence']);
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td class="text text-center">
                                                                        <?php
                                                                        if ($result_v['attendence'] == "pre") {
                                                                            $passing_marks_student = $result_v['passing_marks'];

                                                                            if ($get_marks_student < $passing_marks_student) {
                                                                                echo "<span class='label pull-right bg-red'>" . fail . "</span>";
                                                                            } else {
                                                                                echo "<span class='label pull-right bg-green'>" .pass . "</span>";
                                                                            }
                                                                        } else {
                                                                            echo "<span class='label pull-right bg-red'>" . fail . "</span>";
                                                                            $s++;
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                if ($s == count($exam_results_array)) {
                                                                    $obtain_marks = 0;
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <?php
                                                    $foo = "";
                                                    ?>    
                                                    <div class="col-md-12 option_grade">
                                                        <div class="description-header">Grand_total
                                                            <span class="description-text"><?php echo $obtain_marks . "/" . $total_marks; ?></span>
                                                        </div>
                                                        <div class="description-header">percentage
                                                            <span class="description-text"><?php
                                                                $foo = ($obtain_marks * 100) / $total_marks;
                                                                echo number_format((float) $foo, 2, '.', '');
                                                                ?>
                                                            </span>
                                                        </div>
                                                        <div class="description-header">Result
                                                            <span class="description-text">
                                                                <?php
                                                                if ($result == "Pass") {
                                                                    ?>
                                                                    <b><?php echo $result; ?></b>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <b><?php echo $result; ?></b>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </span>
                                                        </div>
                                                        <div class="description-header">
                                                            <span class="description-text"><?php
                                                                if (!empty($gradeList)) {
                                                                    foreach ($gradeList as $key => $value) {
                                                                        if ($foo >= $value['mark_from'] && $foo <= $value['mark_upto']) {
                                                                            ?>
                                                                            <?php echo ('grade') . ": " . $value['name']; ?>
                                                                            <?php
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                                ?></span>
                                                        </div>

                                                    </div>  

                                                    <div class="col-md-12">
                                                        <div class="bgtgray">
                                                            <div class="col-sm-3 pull no-print">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">Result
                                                                        <span class="description-text">
                                                                            <?php
                                                                            if ($result == "Pass") {
                                                                                ?>
                                                                                <span class='label bg-green'><?php echo $this->lang->line(strtolower($result)); ?></span>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <span class='label bg-red'><?php echo $this->lang->line(strtolower($result)); ?></span>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </span>
                                                                    </h5>
                                                                </div>                                                  
                                                            </div>
                                                            <div class="col-sm-3 no-print">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">Grand_total
                                                                        <span class="description-text"><?php echo $obtain_marks . "/" . $total_marks; ?></span>
                                                                    </h5>
                                                                </div>                                                   
                                                            </div> 
                                                            <div class="col-sm-3 no-print">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">percentage
                                                                        <span class="description-text"><?php
                                                                            $foo = ($obtain_marks * 100) / $total_marks;
                                                                            echo number_format((float) $foo, 2, '.', '') . '%';
                                                                            ?>
                                                                        </span>
                                                                    </h5>
                                                                </div>                                                   
                                                            </div>                                             

                                                            <div class="col-sm-3 no-print">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">
                                                                        <span class="description-text"><?php
                                                                            if (!empty($gradeList)) {

                                                                                foreach ($gradeList as $key => $value) {
                                                                                    if ($foo >= $value['mark_from'] && $foo <= $value['mark_upto']) {
                                                                                        ?>
                                                                                        <?php echo ('grade') . ": " . $value['name']; ?>
                                                                                        <?php
                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?></span>
                                                                    </h5>
                                                                </div>                                                   
                                                            </div> 
                                                        </div></div>                                             
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                        <?php
                                        $counter++;
                                    }
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                                          
                                 </div> <!-- end panel -->
                               </div>
                             </div>
                              </div>
                          </div>
                          
                          </div>
                </div> 
                   
                        </div>
                    </div>
                </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('table.displayw').DataTable();
    });

   $(document).ready(function () {
    $.extend( $.fn.dataTable.defaults, {
    searching: false,
    ordering:  false,
    paging: false,
    bSort: false,
    info: false
   });
    });
</script>
<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function printDiv(elem) {
        Popup(jQuery(elem).html());
    }

    function Popup(data)
    {

        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');


        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);


        return true;
    }
</script>
                
    
   
