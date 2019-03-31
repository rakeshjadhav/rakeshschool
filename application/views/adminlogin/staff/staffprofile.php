
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
                                        <a href="javascript:void(0)">
                                            <?php
                                            $image = $staff['image'];
                                            if (!empty($image)) {

                                                $file = $staff['image'];
                                            } else {

                                                $file = "no_image.png";
                                            }
                                              ?>
                                            <img src="<?php echo base_url() . $file ?>" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $staff['name'] . " " . $staff['surname']; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <ul class="list-group list-group-full">
                                        <li class="list-group-item">
                                            <span class="badge " style="background-color: none !important;">
                                              <?php echo $staff['employee_id']; ?></span> <span class="font-bold"> Employee No</span>
                                        </li>
                                        <li class="list-group-item">
                                        <span class="badge ">
                                            <?php echo $staff['user_type']; ?></span><span class="font-bold">Roll No</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge "><?php echo $staff['designation']; ?></span><span class="font-bold">designation</span>
                                        </li>
                                        <li class="list-group-item ">
                                            <span class="badge "><?php echo $staff['department']; ?></span> <span class="font-bold">department </span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge"><?php echo $staff["date_of_joining"]; ?></span> <span class="font-bold"> date of joining</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge" style=""><?php echo $staff['date_of_leaving']; ?></span><span class="font-bold">date of leaving</span>
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
                                        <span class="hidden-xs">payroll</span></a></li>
                                <li role="presentation" class="">
                                    <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-email"></i></span>
                                        <span class="hidden-xs">leaves</span></a></li>
                                <li role="presentation" class="">
                                    <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-settings"></i></span>
                                        <span class="hidden-xs">attendance</span></a></li>
                                <li role="presentation" class="">
                                    <a href="#documents" aria-controls="documents" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-settings"></i></span>
                                        <span class="hidden-xs">documents</span></a></li>
                                <li role="presentation" class="">
                                    <a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-settings"></i></span>
                                        <span class="hidden-xs">timeline</span></a></li>
                                        <?php
                                           $a = 0 ;
                                            $sessionData = $this->session->userdata('admin');
                                            $userdata = $this->customlib->getUserData();
                                            if($staff["role_id"] == 7){
                                               $a = 0;
                                               if($userdata["email"] == $staff["email"]){
                                                   $a = 1;    
                                               }
                                           }else{
                                               $a = 1 ;
                                           } ?>
                                        <?php
                                        if ($staff["is_active"] == 1) {
                                           // if ($this->rbac->hasPrivilege('disable_staff', 'can_view')) {
                                                if($a == 1){
                                             ?> 
                                             <li class="pull-right"><a href="<?php echo base_url('webadmin/staff/disablestaff/' . $id); ?>" class="text-red" data-toggle="tooltip" title="Disable" title="disable" onclick="return confirm('Are you sure you want to Disable this Record?');"></i> <i class="fa fa-thumbs-o-down"></i></a></li>
                                            <?php// } 
                                           }
                                        } else if ($staff["is_active"] == 0) {
                                            if($a == 1){
                                            ?>
                               <li role="presentation"  class="pull-right">
                                   <a href="<?php echo base_url('webadmin/staff/delete/' . $id); ?>" class="text-red" data-toggle="tooltip" title="<?php echo "Delete"; ?>" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('Are you sure you want to Delete this Record?');"></i>
                                       <i class="fa fa-trash"></i>
                                   </a>
                               </li>  
                            <li role="presentation"  class="pull-right">
                                <a href="<?php echo base_url('webadmin/staff/enablestaff/' . $id); ?>" class="text-green" data-toggle="tooltip" title="<?php echo "Enable"; ?>" title="<?php echo $this->lang->line('enable'); ?>" onclick="return confirm('Are you sure you want to Enable this Record?');">
                                    <i class="fa fa-thumbs-o-up"></i>
                                </a>
                            </li>  
                            <?php }} ?>
                             <li class="pull-right">
                                <?php if($a == 1){ ?>
                                <a href="#" class="change_password text-green" data-toggle="tooltip" title="change_password" ></i>
                                    <i class="fa fa-key"></i>
                                </a>
                             </li>
                            <?php } ?>
                            <?php //if ($this->rbac->hasPrivilege('staff', 'can_add')) {
                                      if($a == 1){

                             ?>
                            <li class="pull-right">
                                <a href="<?php echo base_url('webadmin/staff/edit/' . $id); ?>" data-toggle="tooltip" title="Edit" title="Edit" class="text-light" >
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </li>
                            <?php } //} ?>
                           </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);margin-top: -15px">
                                                 <div class="panel panel-default">
                                                    <div class="panel-body" style="padding:0 15px">
                                        <table class="table table-hover table-striped tmb0">
                                        <tbody>  
                                            <tr>
                                                <td>phone</td>
                                                <td><?php echo $staff['contact_no']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>emergency_contact_number</td>
                                                <td><?php echo $staff['emergency_contact_no']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>email</td>
                                                <td><?php echo $staff['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>gender</td>
                                                <td><?php echo $staff['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>date_of_birth</td>
                                                <td><?php
                                                    if (!empty($staff["dob"])) {
                                                        echo $staff['dob'];
                                                    }
                                             ?></td>
                                            </tr>
                                            <tr>
                                                <td>marital_status</td>
                                                <td><?php echo $staff['marital_status']; ?></td>
                                            </tr>
                                            <tr>
                                                <td  class="col-md-4">father_name</td>
                                                <td  class="col-md-5"><?php echo $staff['father_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>mother_name</td>
                                                <td><?php echo $staff['mother_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>qualification</td>
                                                <td><?php echo $staff['qualification']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>work_experience</td>
                                                <td><?php echo $staff['work_exp']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>note</td>
                                                <td><?php echo $staff['note']; ?></td>
                                            </tr>

                                        </tbody>
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
                                                              <td> <?php echo $staff['local_address']; ?></td>
                                                         </tr>
                                                         <tr>
                                                             <td style="width:30%;">Permanent Address</td>
                                                              <td><?php echo $staff['permanent_address']; ?></td>
                                                         </tr>
                                                     </table> 
                                                        </div>
                                                   </div>  
                                    </div>
                                     <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23); margin-top: 16px">
                                                     <div class="panel panel-default">
                                                    <div class="panel-heading">bank_account_details</div>
                                                       <div class="panel-body" style="padding:0 15px">
                                                           <table class="table table-hover table-striped tmb0">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-4">account_title</td>
                                                <td class="col-md-5"><?php echo $staff['account_title']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>bank_name</td>
                                                <td><?php echo $staff['bank_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>bank_branch_name</td>
                                                <td><?php echo $staff['bank_branch']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>bank_account_no</td>
                                                <td><?php echo $staff['bank_account_no']; ?></td>
                                            </tr>

                                            <tr>
                                                <td>ifsc_code</td>
                                                <td><?php echo $staff['ifsc_code']; ?></td>
                                            </tr>   


                                        </tbody>
                                    </table>
                                                        </div>
                                                  </div>  
                                            </div>
                                     
                                     <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23); margin-top: 16px">
                                                     <div class="panel panel-default">
                                                    <div class="panel-heading">Miscellaneous Details</div>
                                                       <div class="panel-body" style="padding:0 15px">
                                                            
                                                        </div>
                                                </div>  
                                               </div>
                                        </div>
                                
                                <div role="tabpanel" class="tab-pane" id="profile">
                                      <div class="table-responsive"> 
                                      <!--//payrole tab strat--> 
                                      <!--payrole-->  
                                      <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="staffprofile">

                                        <h5>total net_salary paid</h5>
                                        <h4><?php
                                            if (!empty($salary["net_salary"])) {
                                                echo ' Rs. ' . $salary["net_salary"];
                                            } else {
                                                echo "Rs." . "0";
                                            }
                                            ?></h4> 
                                        <div class="icon mt12font40">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                </div><!--./col-md-3-->

                                <div class="col-md-3 col-sm-6">
                                    <div class="staffprofile">

                                        <h5>total gross_salary</h5>
                                        <h4><?php
                                            if (!empty($salary["basic_salary"])) {
                                                echo  " Rs " . ($salary["basic_salary"] + $salary["earnings"]);
                                            } else {
                                                echo "Rs." . "0";
                                            }
                                            ?></h4> 
                                        <div class="icon mt12font40">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                </div><!--./col-md-3-->

                                <div class="col-md-3 col-sm-6">
                                    <div class="staffprofile">

                                        <h5>total earning</h5>
                                        <h4><?php
                                            if (!empty($salary["earnings"])) {
                                                echo "Rs" . $salary["earnings"];
                                            } else {
                                                echo "Rs" . "0";
                                            }
                                            ?></h4> 
                                        <div class="icon mt12font40">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                </div><!--./col-md-3-->

                                <div class="col-md-3 col-sm-6">
                                    <div class="staffprofile">

                                        <h5>total deduction</h5>
                                        <h4><?php echo "Rs." . ($salary["deduction"] + $salary["tax"]); ?> </h4> 
                                        <div class="icon mt12font40">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                </div><!--./col-md-3-->

                            </div>
                                      <div class="download_label">payroll_details_for <?php echo $staff["name"] . " " . $staff["surname"]; ?></div>
                            <div class="table-responsive">    
                                <table class="table table-hover table-striped example">

                                    <thead>
                                        <tr>
                                            <th class="text text-left">payslip #</th> 
                                            <th class="text text-left">month- year<span></span></th>
                                            <th class="text text-left">date</th>


                                            <th class="text text-left">mode</th>



                                            <th class="text text-left">status</th>
                                            <th class="">net_salary<span><?php echo "(" . "Rs" . ")"; ?></span></th>
                                            <th class="text-right no-print">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                <?php
                                                foreach ($staff_payroll as $key => $payroll_value) {

                                                    if ($payroll_value["status"] == "paid") {
                                                        $label = "class='label label-success'";
                                                    } else if ($payroll_value["status"] == "generated") {
                                                        $label = "class='label label-warning'";
                                                    } else {
                                                        $label = "class='label label-default'";
                                                    }
                                                    ?>
                                            <tr>


                                                <td>
                                                    <a data-toggle="popover" href="#" class="detail_popover" data-original-title="" title=""><?php echo $payroll_value['id'] ?></a>
                                                    <div class="fee_detail_popover" style="display: none"><?php echo $payroll_value['remark']; ?></div>                          
                                                </td>
                                                <td><?php echo $payroll_value['month'] . " - " . $payroll_value['year']; ?></td>
                                                <td><?php echo $payroll_value['payment_date']; ?></td>

                                                <td><?php
                                                if (!empty($payroll_value['payment_mode'])) {
                                                    echo $payment_mode[$payroll_value['payment_mode']];
                                                }
                                                    ?></td>


                                                <td><span <?php echo $label ?> ><?php echo $payroll_status[$payroll_value['status']]; ?></span></td>
                                                <td ><?php echo $payroll_value['net_salary'] ?></td>
                                                <td class="text-right">
    <?php if ($payroll_value["status"] == "paid") { ?>

    <?php
                                                        if (
                             $this->rbac->hasPrivilege('staff', 'can_view')
                              ) {
                                ?>

                                                        <a href="#" onclick="getPayslip('<?php echo $payroll_value["id"]; ?>')"  role="button" class="btn btn-primary btn-xs checkbox-toggle edit_setting" data-toggle="tooltip" title="Payslip View" >view payslip</a>

                                                        <?php } ?>
    <?php } ?>
                                                </td>
                                            </tr>
<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                                     <!-- payrrole end</div>-->  
                                  </div> 
                                </div>
                                
                                <div role="tabpanel" class="tab-pane" id="messages">
                                    <div class=""> 
                                       <!--leave tab-->
                                       leaves
                                       <!--</ebd leave tab-->
                                  </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="timeline-header no-border">
                                        <h3 class="box-title m-b-0">
                                            Attendance
                                           
                                        </h3>
                                       <p class="text-muted m-b-30"></p>
                                   </div>
                            <!--</table>-->
                        </div> 
                                
                                <div role="tabpanel" class="tab-pane" id="documents">
                                    <div class="timeline-header no-border">
                                        <h3 class="box-title m-b-0">
                                           <div class="row">
                                                <?php 
                                                if ((empty($staff["resume"])) && (empty($staff["joining_letter"])) && (empty($staff["resignation_letter"])) && (empty($staff["other_document_file"]))) {
                                                  ?>
                                         <div class="col-md-12">
                                            <div class="alert alert-info">no_record_found</div>
                                        </div>
                                        <?php } else { ?>
                                         <?php if (!empty($staff["resume"])) { ?>  
                                            <div class="col-md-3 col-sm-6">
                                                <div class="staffprofile">
                                                    <h5>resume</h5>
                                                    <a href="<?php echo base_url(); ?>webadmin/staff/download/<?php echo $staff['id'] . "/" . $staff['resume']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="download">
                                                        <i class="fa fa-download"></i></a>
                                                        <?php
                                                        //if ($this->rbac->hasPrivilege('staff', 'can_edit') ) {
                                                         ?>
                                                    <a href="<?php echo base_url(); ?>admin/staff/doc_delete/<?php echo $staff['id'] . "/1/" . $staff['resume']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('are you sure want delete item');">
                                                        <i class="fa fa-remove"></i></a>
                                                        <?php // } ?>
                                                    <div class="icon">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                </div>
                                            </div><!--./col-md-3-->
                                             <?php } ?>
                                           <?php if (!empty($staff["joining_letter"])) { ?> 
                                            <div class="col-md-3 col-sm-6">
                                                <div class="staffprofile">
                                                    <h5>joining_letter</h5>
                                                    <a href="<?php echo base_url(); ?>webadmin/staff/download/<?php echo $staff['id'] . "/" . $staff['joining_letter']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="download">
                                                        <i class="fa fa-download"></i></a>
                                                        <?php
                                                       // if ($this->rbac->hasPrivilege('staff', 'can_edit')) {
                                                       ?>
                                                    <a href="<?php echo base_url(); ?>admin/staff/doc_delete/<?php echo $staff['id'] . "/2/" . $staff['joining_letter']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('are you sure you want delete item');">
                                                        <i class="fa fa-remove"></i>
                                                    </a> 
                                                    <?php //} ?>
                                                    <div class="icon">
                                                        <i class="fa fa-file-archive-o"></i>
                                                    </div>
                                                </div>
                                            </div><!--./col-md-3-->
                                         <?php } ?>
                                         <?php if (!empty($staff["resignation_letter"])) { ?> 
                                            <div class="col-md-3 col-sm-6">
                                                <div class="staffprofile">
                                                    <h5>resignation_letter</h5>
                                                    <a href="<?php echo base_url(); ?>webadmin/staff/download/<?php echo $staff['id'] . "/" . $staff['resignation_letter']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="download">
                                                        <i class="fa fa-download"></i></a>
                                                        <?php
                                                        //if ($this->rbac->hasPrivilege('staff', 'can_edit') ) {
                                                        ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/staff/doc_delete/<?php echo $staff['id'] . "/3/" . $staff['resignation_letter']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('are you sure you want delete item');">
                                                        <i class="fa fa-remove"></i></a> 
                                                        <?php } ?>
                                                    <div class="icon">
                                                        <i class="fa fa-file-archive-o"></i>
                                                    </div>
                                                </div>
                                            </div><!--./col-md-3-->
    <?php } ?>
                                    <?php if (!empty($staff["other_document_file"])) { ?> 
                                            <div class="col-md-3 col-sm-6">
                                                <div class="staffprofile">
                                                    <h5><?php echo $this->lang->line('other_documents'); ?></h5>
                                                    <a href="<?php echo base_url(); ?>webadmin/staff/download/<?php echo $staff['id'] . "/" . $staff['other_document_file']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="download">
                                                        <i class="fa fa-download"></i></a>
                                                        <?php
                                                       // if ($this->rbac->hasPrivilege('staff', 'can_edit')) {
                                                       ?>
                                                    <a href="<?php echo base_url(); ?>admin/staff/doc_delete/<?php echo $staff['id'] . "/4/" . $staff['other_document_file']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-remove"></i></a> 
                                                        <?php } ?>
                                                    <div class="icon">
                                                        <i class="fa fa-file-archive-o"></i>
                                                    </div>
                                                </div>
                                            </div><!--./col-md-3-->
                                        <?php //} ?>
                                    <?php //} ?>
                                </div>
                                           
                                        </h3>
                                       <p class="text-muted m-b-30"></p>
                                   </div>
                            <!--</table>-->
                        </div> 
                                
                                <div role="tabpanel" class="tab-pane" id="timeline">
                                    <div class="timeline-header no-border">
                                        <h3 class="box-title m-b-0">
                                            timeline
                                           
                                        </h3>
                                       <p class="text-muted m-b-30"></p>
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