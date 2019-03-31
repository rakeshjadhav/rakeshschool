<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
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
                          
                    <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                           Exam List
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="tshadow mb25"> 
                            <?php
                            if (empty($examSchedule)) {
                                ?>
                                <div class="alert alert-danger">
                                    No Exam Found.
                                </div>
                                <?php
                            } else {
                                foreach ($examSchedule as $key => $value) {
                                    ?>
                                    <h4 class="pagetitleh"><?php echo $value['exam_name']; ?></h4>
                                    <?php
                                    if (empty($value['exam_result'])) {
                                        ?>
                                        <div class="alert alert-info">No Result Prepare</div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="table-responsive borgray around10">  
										<div class="download_label">Exam Marks Report</div>
                                            <table class="table table-striped table-hover tmb0 example">
                                                <thead>
                                                    <tr>
                                                        <th>subject</th>
                                                        <th>full_marks</th>
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
                                                                        echo "<span class='label pull-right bg-red'>fail</span>";
                                                                    } else {
                                                                        echo "<span class='label pull-right bg-green'>pass</span>";
                                                                    }
                                                                } else {
                                                                    echo "<span class='label pull-right bg-red'>fail</span>";
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
                                            <div class="col-md-12">
                                                <div class="bgtgray">
                                                    <?php
                                                    $foo = "";
                                                    ?>         
                                                    <div class="col-sm-3 pull">
                                                        <div class="description-block">
                                                            <h5 class="description-header">result:
                                                                <span class="description-text">
                                                                    <?php
                                                                    if ($result == "Pass") {
                                                                        ?>
                                                                        <b class='text text-success'><?php echo $result; ?></b>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <b class='text text-danger'><?php echo $result; ?></b>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </span>
                                                            </h5>
                                                        </div>                                          
                                                    </div>	
                                                    <div class="col-sm-3">
                                                        <div class="description-block">
                                                            <h5 class="description-header">grand_total :
                                                                <span class="description-text"><?php echo $obtain_marks . "/" . $total_marks; ?></span>
                                                            </h5>
                                                        </div>                                           
                                                    </div>  
                                                    <div class="col-sm-3">
                                                        <div class="description-block">
                                                            <h5 class="description-header">percentage:
                                                                <span class="description-text"><?php
                                                                    $foo = ($obtain_marks * 100) / $total_marks;
                                                                    echo number_format((float) $foo, 2, '.', '');
                                                                    ?>
                                                                </span>
                                                            </h5>
                                                        </div>                                          
                                                    </div>                                     

                                                    <div class="col-sm-3">
                                                        <div class="description-block">
                                                            <h5 class="description-header">
                                                                <span class="description-text"><?php
                                                                    if (!empty($gradeList)) {

                                                                        foreach ($gradeList as $key => $value) {
                                                                            if ($foo >= $value['mark_from'] && $foo <= $value['mark_upto']) {
                                                                                ?>
                                                                                <?php echo ('grade'); echo $value['name']; ?>
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
                                    <?php
                                }
                            }
                            ?>
                        </div>  
                    </div>                
                </div>
                </div>
                        </div>
                    </div>
                </div>
         
                
          
            </div>
           
        </div>

<script>
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            title: '',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>
<script type="text/javascript">
    $(".myTransportFeeBtn").click(function () {
        $("span[id$='_error']").html("");
        $('#transport_amount').val("");
        $('#transport_amount_discount').val("0");
        $('#transport_amount_fine').val("0");
        var student_session_id = $(this).data("student-session-id");
        $('.transport_fees_title').html("<b>Upload Document</b>");
        $('#transport_student_session_id').val(student_session_id);
        $('#myTransportFeesModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true

        });
    });
</script>
<div class="modal fade" id="myTransportFeesModal" role="dialog">
    <div class="modal-dialog">      
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title text-center transport_fees_title">Upload Document</h4>
            </div>
            <div class="">
                <div class="form-horizontal">
                    <div class="">
                        <input  type="hidden" class="form-control" id="transport_student_session_id"  value="0" readonly="readonly"/>
                        <form id="form1" action="<?php echo site_url('webadmin/student/create_doc') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                             <?php echo $this->customlib->getCSRF(); ?>
                            <div id='upload_documents_hide_show'>                                                    
                                <input type="hidden" name="student_id" value="<?php echo $student_doc_id; ?>" id="student_id">
                                <!--<h3 class="box-title m-b-0"> Upload Documents</h3>-->
                                
                                  <!--<div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">-->
                                                 <div class="white-box">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">
                                                         Upload New Documents
                                                     </h3>
                                                       <p class="text-muted m-b-30 font-13">  </p>
                                                 
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Title</label>
                                                       <input id="first_title" name="first_title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('first_title'); ?>" />
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('first_title'); ?></span>
                                                    </div>
                                                       
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Documents</label>
                                                        <input id="first_doc_id" name="first_doc" placeholder="" type="file"  class="filestyle form-control"  value="<?php echo set_value('first_doc'); ?>" />
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('first_doc'); ?></span>
                                                    </div>
                                                 </div>
                                  <!--</div>-->
                                                       
                                
                                
                            </div>
                            <div class="modal-footer" style="clear:both">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Upload</button>
                            </div>
                        </form>
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</div>

 
