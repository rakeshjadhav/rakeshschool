<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
                            
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-user"></i></span>
                                        <span class="hidden-xs"> Profile</span></a></li>
                                <li role="presentation" class="">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-user"></i></span> 
                                        <span class="hidden-xs">Fee</span></a></li>
                                <li role="presentation" class="">
                                    <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-email"></i></span>
                                        <span class="hidden-xs">Exam</span></a></li>
                                <li role="presentation" class="">
                                    <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-settings"></i></span>
                                        <span class="hidden-xs">Documents</span></a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);margin-top: -15px">
                                                 <div class="panel panel-default">
                                                    <div class="panel-body" style="padding:0 15px">
                                                        <table class="table table-striped " >
                                                         <tr>
                                                             <td style="width:30%;" >Admission Date</td>
                                                              <td> <?php echo $student['admission_date']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Date Of Birth</td>
                                                              <td> <?php $student['dob']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Category</td>
                                                              <td> <?php
                                                    foreach ($category_list as $value) {
                                                        if ($student['category_id'] == $value['id']) {
                                                            echo $value['category'];
                                                        }
                                                    }
                                                    ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Mobile No</td>
                                                              <td> <?php echo $student['mobileno']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Cast</td>
                                                              <td> <?php echo $student['cast']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Religion</td>
                                                              <td> <?php echo $student['religion']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Email</td>
                                                              <td> <?php echo $student['email']; ?></td>
                                                         </tr>
                                                     </table>
                                                    </div>
                                                </div>    
                                    </div>
                                    <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23); margin-top: 16px">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Address</div>
                                                       <div class="panel-body" style="padding:0 15px">
                                                      <table class="table table-striped " >
                                                         <tr>
                                                             <td style="width:30%;">Current Address</td>
                                                              <td> <?php echo $student['current_address']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td style="width:30%;">Permanent Address</td>
                                                              <td><?php echo $student['permanent_address']; ?></td>
                                                         </tr>
                                                     </table> 
                                                        </div>
                                                   </div>  
                                    </div>
                                     <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23); margin-top: 16px">
                                                     <div class="panel panel-default">
                                                    <div class="panel-heading">Parent / Guardian Details</div>
                                                       <div class="panel-body" style="padding:0 15px">
                                                           <table class="table table-striped " >
                                                         <tr>
                                                             <td style="width:30%;">Father Name</td>
                                                              <td> <?php echo $student['father_name']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Father Phone</td>
                                                              <td><?php echo $student['father_phone']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Father Occupation</td>
                                                              <td><?php echo $student['father_occupation']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Mother Name</td>
                                                              <td><?php echo $student['mother_name']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Mother Phone</td>
                                                              <td><?php echo $student['mother_phone']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Mother Occupation</td>
                                                              <td><?php echo $student['mother_occupation']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Guardian Name</td>
                                                              <td><?php echo $student['guardian_name']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Guardian Email</td>
                                                              <td><?php echo $student['guardian_email']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Guardian Relation</td>
                                                              <td><?php echo $student['guardian_relation']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Guardian Phone</td>
                                                              <td><?php echo $student['guardian_phone']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Guardian Occupation</td>
                                                              <td><?php echo $student['guardian_occupation']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Guardian Address</td>
                                                              <td><?php echo $student['guardian_address']; ?></td>
                                                         </tr>
                                                     </table> 
                                                        </div>
                                                  </div>  
                                            </div>
                                     
                                     <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23); margin-top: 16px">
                                                     <div class="panel panel-default">
                                                    <div class="panel-heading">Miscellaneous Details</div>
                                                       <div class="panel-body" style="padding:0 15px">
                                                           <table class="table table-striped " >
                                                         <tr>
                                                             <td style="width:30%;">Previous School Details</td>
                                                              <td> <?php echo $student['previous_school']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>National Identification Number</td>
                                                              <td><?php echo $student['adhar_no']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Local Identification Number</td>
                                                              <td><?php echo $student['samagra_id']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Bank Account Number</td>
                                                              <td><?php echo $student['bank_account_no']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>Bank Name</td>
                                                              <td><?php echo $student['bank_name']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td>IFSC Code</td>
                                                              <td><?php echo $student['ifsc_code']; ?></td>
                                                         </tr>
                                                     </table> 
                                                        </div>
                                                </div>  
                                               </div>
                                        </div>
                                
                                <div role="tabpanel" class="tab-pane" id="profile">
                                  <!--//fee tab strat--> 
                                  <?php
                                    if (empty($student_due_fee) && empty($student_discount_fee)) {
                                   ?>
                                <div class="alert alert-danger">
                                    No Record Found
                                </div>
                                <?php
                            } else {
                                ?>
                                  <div class="table-responsive">    
                                    <table id="example" class="table table-hover table-striped">

                                        <thead>
                                            <tr>
                                                <th>Fees Group</th>
                                                <th>Fees Code</th>
                                                <th class="text text-left">Due Date</th>
                                                <th class="text text-center">Status</th>
                                                <th class="text text-right">Amount<span><?php echo "(" . "Rs" . ")"; ?></span></th>
                                                <th class="text text-center">Payment Id</th>
                                                <th class="text text-left">Mode</th>
                                                <th class="text text-left">Date</th>


                                                <th class="text text-right" >Discount <span><?php echo "(" . "Rs" . ")"; ?></span></th>
                                                <th class="text text-right">Fine <span><?php echo "(" . "Rs" . ")"; ?></span></th>
                                                <th class="text text-right">Paid <span><?php echo "(" . "Rs" . ")"; ?></span></th>
                                                <th class="text text-right">Balance</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_amount = 0;
                                            $total_deposite_amount = 0;
                                            $total_fine_amount = 0;
                                            $total_discount_amount = 0;
                                            $total_balance_amount = 0;
                                            $alot_fee_discount = 0;

                                            foreach ($student_due_fee as $key => $fee) {

                                                foreach ($fee->fees as $fee_key => $fee_value) {
                                                    $fee_paid = 0;
                                                    $fee_discount = 0;
                                                    $fee_fine = 0;
                                                    $alot_fee_discount = 0;


                                                    if (!empty($fee_value->amount_detail)) {
                                                        $fee_deposits = json_decode(($fee_value->amount_detail));

                                                        foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                                            $fee_paid = $fee_paid + $fee_deposits_value->amount;
                                                            $fee_discount = $fee_discount + $fee_deposits_value->amount_discount;
                                                            $fee_fine = $fee_fine + $fee_deposits_value->amount_fine;
                                                        }
                                                    }
                                                    $total_amount = $total_amount + $fee_value->amount;
                                                    $total_discount_amount = $total_discount_amount + $fee_discount;
                                                    $total_deposite_amount = $total_deposite_amount + $fee_paid;
                                                    $total_fine_amount = $total_fine_amount + $fee_fine;
                                                    $feetype_balance = $fee_value->amount - ($fee_paid + $fee_discount);
                                                    $total_balance_amount = $total_balance_amount + $feetype_balance;
                                                    ?>
                                                    <?php
                                                    if ($feetype_balance > 0 && strtotime($fee_value->due_date) < strtotime(date('Y-m-d'))) {
                                                        ?>
                                                        <tr class="danger font12">
                                                            <?php
                                                        } else {
                                                            ?>
                                                        <tr class="dark-gray">
                                                            <?php
                                                        }
                                                        ?>


                                                        <td><?php
                                                            echo $fee_value->name;
                                                            ?></td>
                                                        <td><?php echo $fee_value->code; ?></td>
                                                        <td class="text text-left">

                                                            <?php
                                                            if ($fee_value->due_date == "0000-00-00") {
                                                                
                                                            } else {

                                                                echo $fee_value->due_date;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text text-left">
                                                            <?php
                                                            if ($feetype_balance == 0) {
                                                                ?><span class="label label-success">paid</span><?php
                                                            } else if (!empty($fee_value->amount_detail)) {
                                                                ?><span class="label label-warning">partial</span><?php
                                                            } else {
                                                                ?><span class="label label-danger">unpaid</span><?php
                                                                }
                                                                ?>

                                                        </td>
                                                        <td class="text text-right"><?php echo $fee_value->amount; ?></td>

                                                        <td class="text text-left"></td>
                                                        <td class="text text-left"></td>
                                                        <td class="text text-left"></td>


                                                        <td class="text text-right"><?php
                                                            echo (number_format($fee_discount, 2, '.', ''));
                                                            ?></td>
                                                        <td class="text text-right"><?php
                                                            echo (number_format($fee_fine, 2, '.', ''));
                                                            ?></td>
                                                        <td class="text text-right"><?php
                                                            echo (number_format($fee_paid, 2, '.', ''));
                                                            ?></td>
                                                        <td class="text text-right"><?php
                                                            $display_none = "ss-none";
                                                            if ($feetype_balance > 0) {
                                                                $display_none = "";


                                                                echo (number_format($feetype_balance, 2, '.', ''));
                                                            }
                                                            ?>

                                                        </td>

                                                    </tr>

                                                    <?php
                                                    if (!empty($fee_value->amount_detail)) {

                                                        $fee_deposits = json_decode(($fee_value->amount_detail));

                                                        foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                                            ?>
                                                            <tr class="white-td">
                                                                <td class="text-left"></td>
                                                                <td class="text-left"></td>
                                                                <td class="text-left"></td>
                                                                <td class="text-left"></td>
                                                                <td class="text-right"><img src="<?php echo base_url(); ?>backend/images/table-arrow.png" alt="" /></td>
                                                                <td class="text text-left">


                                                                    <a href="#" data-toggle="popover" class="detail_popover" >
                                                                       <?php echo $fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?></a>
                                                                    <div class="fee_detail_popover" style="display: none">
                                                                        <?php
                                                                        if ($fee_deposits_value->description == "") {
                                                                            ?>
                                                                            <p class="text text-danger">No Description</p>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <p class="text text-info"><?php echo $fee_deposits_value->description; ?></p>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>


                                                                </td>
                                                                <td class="text text-left"><?php echo $fee_deposits_value->payment_mode; ?></td>
                                                                <td class="text text-center">

                                                                    <?php $fee_deposits_value->date; ?>
                                                                </td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount_discount, 2, '.', '')); ?></td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount_fine, 2, '.', '')); ?></td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount, 2, '.', '')); ?></td>


                                                                <td></td>



                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if (!empty($student_discount_fee)) {

                                                foreach ($student_discount_fee as $discount_key => $discount_value) {
                                                    ?>
                                                    <tr class="dark-light">
                                                        <td align="left"> Discount </td>
                                                        <td align="left">
                                                            <?php echo $discount_value['code']; ?>
                                                        </td>
                                                        <td align="left"></td>
                                                        <td align="left" class="text text-left">
                                                            <?php
                                                            if ($discount_value['status'] == "applied") {
                                                                ?>
                                                                <a href="#" data-toggle="popover" class="detail_popover" >

                                                                    <?php echo "Discount Of". " " . "Rs" . $discount_value['amount'] . " " . $this->lang->line($discount_value['status']) . " : " . $discount_value['payment_id']; ?>

                                                                </a>
                                                                <div class="fee_detail_popover" style="display: none">
                                                                    <?php
                                                                    if ($discount_value['student_fees_discount_description'] == "") {
                                                                        ?>
                                                                        <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <p class="text text-danger"><?php echo $discount_value['student_fees_discount_description'] ?></p>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </div>
                                                                <?php
                                                            } else {
                                                                echo '<p class="text text-danger">' . $this->lang->line('discount_of') . " " . "Rs" . $discount_value['amount'] . " " . $this->lang->line($discount_value['status']);
                                                            }
                                                            ?>

                                                        </td>
                                                        <td></td>
                                                        <td class="text text-left"></td>
                                                        <td class="text text-left"></td>
                                                        <td class="text text-left"></td>
                                                        <td  class="text text-right">
                                                            <?php
                                                            $alot_fee_discount = $alot_fee_discount;
                                                            ?>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <tr class="box box-solid total-bg">
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td class="text text-right" >Grand Total</td>
                                                <td class="text text-right"><?php
                                                    echo ("Rs " . number_format($total_amount, 2, '.', ''));
                                                    ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>


                                                <td class="text text-right"><?php
                                                    echo ("Rs " . number_format($total_discount_amount + $alot_fee_discount, 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo ("Rs " . number_format($total_fine_amount, 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo ("Rs " . number_format($total_deposite_amount, 2, '.', ''));
                                                    ?></td>

                                                <td class="text text-right"><?php
                                                    echo ("Rs " . number_format($total_balance_amount - $alot_fee_discount, 2, '.', ''));
                                                    ?></td> 

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>    
                                <?php
                            }
                            ?>

                        <!-- rakesh -- </div>-->  
                                  <!--//end fee-->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">
                                    <div class=""> 
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
                                                <table class="table table-striped table-bordered table-hover example">
                                                    <thead>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>Full Marks</th>
                                                            <th>Passing Marks</th>
                                                            <th>Obtain Marks'</th>
                                                            <th class="text text-right">Result</th>
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
                                                                        $obtain_marks = (int) $obtain_marks + (int) $result_v['get_marks'];
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
                                                                            echo "<span class='label pull-right bg-red'>" . $this->lang->line('fail') . "</span>";
                                                                        } else {
                                                                            echo "<span class='label pull-right bg-green'>Pass</span>";
                                                                        }
                                                                    } else {
                                                                        echo "<span class='label pull-right bg-red'>" . $this->lang->line('fail') . "</span>";
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
                                                        <tr class="hide">
                                                            <td><?php echo $this->lang->line('exam').": ".$value['exam_name']; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($result == "Pass") {
                                                                    ?>
                                                                    <b class='text text-success'><?php echo $this->lang->line('result') .": ". $result; ?></b>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <b class='text text-danger'><?php echo $this->lang->line('result') .": ". $result; ?></b>
                                                                    <?php
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                echo $this->lang->line('grand_total') . ": " . $obtain_marks . "/" . $total_marks;
                                                                ;
                                                                ?></td>
                                                            <td><?php
                                                                $foo = ($obtain_marks * 100) / $total_marks;
                                                                echo $this->lang->line('percentage') .": ". number_format((float) $foo, 2, '.', '');
                                                                ?></td>
                                                            <td><?php
                                                                if (!empty($gradeList)) {
                                                                    foreach ($gradeList as $key => $value) {
                                                                        if ($foo >= $value['mark_from'] && $foo <= $value['mark_upto']) {
                                                                            ?>
                                                                            <?php echo $this->lang->line('grade') . " : " . $value['name']; ?>
                                                                            <?php
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                                ?></td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-12" style="margin-bottom: 10px">
                                                    <div class="bgtgray">
                                                        <?php
                                                        $foo = "";
                                                        ?>    

                                                        <div class="col-sm-3 col-xs-6">
                                                            <div class="description-block">
                                                                <h5 class="description-header"><?php echo $this->lang->line('result'); ?>:
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
                                                        <div class="col-sm-3 col-xs-6">
                                                            <div class="description-block">
                                                                <h5 class="description-header"><?php echo $this->lang->line('grand_total'); ?>:
                                                                    <span class="description-text"><?php echo $obtain_marks . "/" . $total_marks; ?></span>

                                                                </h5>
                                                            </div>                                               
                                                        </div> 
                                                        <div class="col-sm-3 col-xs-6">
                                                            <div class="description-block">
                                                                <h5 class="description-header"><?php echo $this->lang->line('percentage'); ?>:
                                                                    <span class="description-text"><?php
                                                                        $foo = ($obtain_marks * 100) / $total_marks;
                                                                        echo number_format((float) $foo, 2, '.', '');
                                                                        ?>
                                                                    </span>
                                                                </h5>
                                                            </div>                                           
                                                        </div>                                          

                                                        <div class="col-sm-3 col-xs-6">
                                                            <div class="description-block">
                                                                <h5 class="description-header">
                                                                    <span class="description-text"><?php
                                                                        if (!empty($gradeList)) {
                                                                            foreach ($gradeList as $key => $value) {
                                                                                if ($foo >= $value['mark_from'] && $foo <= $value['mark_upto']) {
                                                                                    ?>
                                                                                    <?php echo $this->lang->line('grade') . ": " . $value['name']; ?>
                                                                                    <?php
                                                                                    break;
                                                                                }
                                                                            }
                                                                        }
                                                                        ?></span>
                                                                </h5>
                                                            </div>                                               
                                                        </div>                                         
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                           
                            <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="timeline-header no-border">
                                        <h3 class="box-title m-b-0">Documents
                                            <span class="pull-right">
<!--                                                class="btn btn-xs btn-primary pull-right "-->
                                                <button type="button" class="btn btn-xs btn-primary pull-right myTransportFeeBtn" data-toggle="modal" data-target="#myTransportFeesModal"  data-student-session-id="<?php echo $student['student_session_id'] ?>" > 
                                        <i class="fa fa-upload"></i> Upload Documents</button></span>
                                        </h3>
                                       <p class="text-muted m-b-30"></p>
                                      
                                <!-- <h2 class="page-header"><?php //echo $this->lang->line('documents');       ?> <?php //echo $this->lang->line('list');       ?></h2> -->
                                <div class="table-responsive" style="clear: both;">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>File Name</th>
                                                <!--<th></th>-->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                                                             
                                            <tbody>
                                                <?php
                                                if (empty($student_doc)) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="5" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    foreach ($student_doc as $value) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $value['title']; ?></td>
                                                            <td><?php echo $value['doc']; ?></td>
                                                            <td class="mailbox-date pull-right">
                                                                <a href="<?php echo base_url(); ?>webadmin/student/download/<?php echo $value['student_id'] . "/" . $value['doc']; ?>"class="btn btn-info btn-xs"  data-toggle="tooltip" title="Download">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                                <a href="<?php echo base_url(); ?>webadmin/student/doc_delete/<?php echo $value['id'] . "/" . $value['student_id']; ?>"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                    <i class="fa fa-remove"></i>
                                                                </a>
                                                            </td>
                                                            <!--<td></td>-->
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                    </table>
                                </div>  
                            </div>
                            <!--</table>-->
                        </div> 
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
                
          
            </div>
           
        </div>


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
                             
                            <div id='upload_documents_hide_show'>                                                    
                                <input type="hidden" name="student_id" value="<?php echo $student_doc_id; ?>" id="student_id">
                             
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

 
<script type="text/javascript">
    $(document).ready(function () {
        $.extend($.fn.dataTable.defaults, {
            searching: false,
            ordering: false,
            paging: false,
            bSort: false,
            info: false
        });
    });

    $(document).on('click', '.schedule_modal', function () {
        $('.modal-title_logindetail').html("");
        $('.modal-title_logindetail').html("login Details");
        var base_url = '<?php echo base_url() ?>';
        var student_id = '<?php echo $student["id"] ?>';
        var student_first_name = '<?php echo $student["firstname"] ?>';
        var student_last_name = '<?php echo $student["lastname"] ?>';
        $.ajax({
            type: "post",
            url: base_url + "webadmin/student/getlogindetail",
            data: {'student_id': student_id},
            dataType: "json",
            success: function (response) {
                var data = "";
                data += '<div class="col-md-12">';
                data += '<div class="table-responsive">';
                data += '<p class="lead text text-center">' + student_first_name + ' ' + student_last_name + '</p>';
                data += '<table class="table table-hover">';
                data += '<thead>';
                data += '<tr>';
                data += '<th>' + "User Type" + '</th>';
                data += '<th class="text text-center">' + "Username" + '</th>';
                data += '<th class="text text-center">' + "Password" + '</th>';
                data += '</tr>';
                data += '</thead>';
                data += '<tbody>';
                $.each(response, function (i, obj)
                {
                    data += '<tr>';
                    data += '<td><b>' + firstToUpperCase(obj.role) + '</b></td>';
                    data += '<td class="text text-center">' + obj.username + '</td> ';
                    data += '<td class="text text-center">' + obj.password + '</td> ';
                    data += '</tr>';
                });
                data += '</tbody>';
                data += '</table>';
                data += '<b class="lead text text-danger" style="font-size:14px;"> ' + "Login Url" + ': ' + base_url + 'site/userlogin</b>';
                data += '</div>  ';
                data += '</div>  ';
                $('.modal-body_logindetail').html(data);
                $("#scheduleModal").modal('show');
            }
        });
    });

    function firstToUpperCase(str) {
        return str.substr(0, 1).toUpperCase() + str.substr(1);
    }
</script>
