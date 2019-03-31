<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<style>
    table.dataTable thead th {
    padding: 8px 0px !important;
    }
    table.dataTable tbody td {
    padding: 5px 5px !important;
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-user fa-fw"></i> || Student Add
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Student Add</li>
                        </ol>
                    </div>
                 </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="row" >
                          <div class="col-md-12 col-sm-12" >
                              <div class="">
                                  <div class="panel " style="border-top:4px solid #ff7676;" >
                                      <div class="pull-right box-tools" style="right: 22px;top: 8px;">
                        <a href="<?php echo site_url('webadmin/student/import') ?>">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-upload"></i> Import Student</button>
                        </a>
                    </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                            <form id="form1" action="<?php echo site_url('webadmin/staff/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                        
                                                      <!--<input type="hidden" name="sibling_name" value="<?php echo set_value('sibling_name'); ?>" id="sibling_name_next">-->
                                                      <!--<input type="hidden" name="sibling_id" value="<?php echo set_value('sibling_id'); ?>" id="sibling_id">-->
                                                 
                                           <div class="panel-body">
                                               
                                               <!--//student admission-->
                                               <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);padding-bottom: 0">
                                                 <div class="">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;"> Student Admission</h3>
                                                      <p class="text-muted m-b-30 font-13"></p>
                                                   
                                                     <?php if ($this->session->flashdata('msg')) { ?>
                                                        <?php echo $this->session->flashdata('msg') ?>
                                                        <?php } ?>  
                                                        <?php echo $this->customlib->getCSRF(); ?>
                                                   <div class="">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Employee Id</label><small class="req"> *</small>
                                                <input autofocus="" id="employee_id" name="employee_id"  placeholder="" type="text" class="form-control"  value="<?php echo set_value('employee_id') ?>" />
                                                <span class="text-danger"><?php echo form_error('employee_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="">Role</label><small class="req"> *</small>
                                                <select  id="role" name="role" class="form-control" >
                                                    <option value=""   >select</option>
                                                    <?php
                                                    foreach ($roles as $key => $role) {
                                                        ?>
                                                        <option value="<?php echo $role['id'] ?>" <?php echo set_select('role', $role['id'], set_value('role')); ?>><?php echo $role["name"] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">designation</label>
                                                <select id="designation" name="designation" placeholder="" type="text" class="form-control" >
                                                    <option value="select">select</option>
                                                    <?php foreach ($designation as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $value["id"] ?>" <?php echo set_select('designation', $value['id'], set_value('designation')); ?> ><?php echo $value["designation"] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('designation'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">department</label>
                                                <select id="department" name="department" placeholder="" type="text" class="form-control" >
                                                    <option value="select">select</option>
                                                    <?php foreach ($department as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $value["id"] ?>" <?php echo set_select('department', $value['id'], set_value('department')); ?>><?php echo $value["department_name"] ?></option>
                                                    <?php }
                                                    ?>
                                                </select> 
                                                <span class="text-danger"><?php echo form_error('department'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                                      <!--//end-->
                                        <div class="">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">First Name</label><small class="req"> *</small>
                                                <input id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name') ?>" />
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input id="surname" name="surname" placeholder="" type="text" class="form-control"  value="<?php echo set_value('surname') ?>" />
                                                <span class="text-danger"><?php echo form_error('surname'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Father Name</label>
                                                <input id="father_name"  name="father_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('father_name') ?>" />
                                                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Mother Name</label>
                                                <input id="mother_name" name="mother_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('mother_name') ?>" />
                                                <span class="text-danger"><?php echo form_error('mother_name'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                          <!--//end-->
                                          <div class="">

                                          <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Email (Login Username)</label><small class="req"> *</small>
                                                <input id="email" name="email" placeholder="" type="text" class="form-control"  value="<?php echo set_value('email') ?>" />
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Gender</label><small class="req"> *</small>
                                                <select class="form-control" name="gender">
                                                    <option value="">select</option>
                                                    <?php
                                                    foreach ($genderList as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php echo set_select('gender', $key, set_value('gender')); ?>><?php echo $key; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Date Of Birth</label><small class="req"> *</small>
                                                <input id="dob" name="dob" placeholder="" type="date" class="form-control"  value="<?php echo set_value('dob') ?>" />
                                                <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Date of joining</label>
                                                <input id="date_of_joining" name="date_of_joining" placeholder="" type="date" class="form-control"  value="<?php echo set_value('date_of_joining') ?>" />
                                                <span class="text-danger"><?php echo form_error('date_of_joining'); ?></span>
                                            </div>
                                        </div>

                                    </div>
                                             <!--//end-->
                                             <div class="">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">phone</label>
                                                <input id="mobileno" name="contactno" placeholder="" type="text" class="form-control"  value="<?php echo set_value('contactno') ?>" />
                                                <span class="text-danger"><?php echo form_error('contactno'); ?></span>
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">emergency_contact_number</label>
                                                <input id="mobileno" name="emergency_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('emergency_no') ?>" />
                                                <span class="text-danger"><?php echo form_error('emergency_no'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">marital_status</label>
                                                <select class="form-control" name="marital_status">
                                                    <option value="">select</option>
                                                    <?php foreach ($marital_status as $makey => $mavalue) {
                                                        ?>
                                                        <option value="<?php echo $mavalue ?>" <?php echo set_select('marital_status', $mavalue, set_value('marital_status')); ?>><?php echo $mavalue; ?></option>

                                                    <?php } ?>  

                                                </select>
                                                <span class="text-danger"><?php echo form_error('marital_status'); ?></span>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">photo</label>
                                                <div><input class="filestyle form-control" type='file' name='file' id="file" size='20' />
                                                </div>
                                                <span class="text-danger"><?php echo form_error('file'); ?></span></div>
                                        </div>                          
                                    </div>
                                             <!--//end-->
                                             <div class="">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">current address</label>
                                                <div><textarea name="address" class="form-control"><?php echo set_value('address'); ?></textarea>
                                                </div>
                                                <span class="text-danger"></span></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">permanent_address</label>
                                                <div><textarea name="permanent_address" class="form-control"><?php echo set_value('permanent_address'); ?></textarea>
                                                </div>
                                                <span class="text-danger"></span></div>
                                        </div>                          
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="">qualification</label>
                                                <textarea id="qualification" name="qualification" placeholder=""  class="form-control" ><?php echo set_value('qualification') ?></textarea>
                                                <span class="text-danger"><?php echo form_error('qualification'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="">work_experience</label>
                                                <textarea id="work_exp" name="work_exp" placeholder="" class="form-control"><?php echo set_value('work_exp') ?></textarea>
                                                <span class="text-danger"><?php echo form_error('work_exp'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">note</label>
                                                <div><textarea name="note" class="form-control"><?php echo set_value('note'); ?></textarea>
                                                </div>
                                                <span class="text-danger"></span></div>
                                        </div>                          

                                    </div>
                                                      
                                                      
                                                    
                                                    
                                             </div>
                                         </div>

                                            
                                      
                                            <!--//Add More Details-->  
                                           <div class="" style="margin-top:20px">
                                              <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">
                                              <div class="white-box" style="">
                                                  <a class="btn  m-r-15" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size:16px;color:#3d4097;border-left:4px solid #ff7676;padding-left: 5px;">
                                                      <i class="fa fa-plus-square"></i> Add More Details</a>
                                                       
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      <div class="collapse m-t-15" id="collapseExample">
                                                          
                                                          <div class="" style="margin-top:20px">
                                              <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">
                                                 <div class="white-box">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">
                                                        Payroll Details
                                                     </h3>
                                                       <p class="text-muted m-b-30 font-13">  </p>
                                                   
                                                       <div class="row around10">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">epf_no</label>
                                                        <input id="epf_no" name="epf_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('epf_no') ?>"  />
                                                        <span class="text-danger"><?php echo form_error('epf_no'); ?></span>
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">basic_salary</label>
                                                        <input type="text" class="form-control" name="basic_salary" value="<?php echo set_value('basic_salary') ?>" >
                                                    </div>
                                                </div>
<!--                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">contract_type</label>
                                                        <select class="form-control" name="contract_type">
                                                            <option value="">select</option>
                                                            <?php foreach ($contract_type as $key => $value) { ?>
                                                                <option value="<?php echo $key ?>" <?php echo set_select('contract_type', $key, set_value('contract_type')); ?>><?php echo $value ?></option>

                                                            <?php } ?>


                                                        </select>
                                                        <span class="text-danger"><?php echo form_error('contract_type'); ?></span>
                                                    </div>
                                                </div>-->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">work_shift</label>
                                                        <input id="shift" name="shift" placeholder="" type="text" class="form-control"  value="<?php echo set_value('shift') ?>" />
                                                        <span class="text-danger"><?php echo form_error('shift'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label for="">work_location</label>
                                                        <input id="location" name="location" placeholder="" type="text" class="form-control"  value="<?php echo set_value('location') ?>" />
                                                        <span class="text-danger"><?php echo form_error('location'); ?></span>
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                                                    
                                                       
                                                   </div>
                                                </div>
                                               </div>
                                                   
                                                          <!--//--> 
                                                          <div class="" style="margin-top:20px">
                                              <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">
                                                 <div class="white-box">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">
                                                        Payroll Details
                                                     </h3>
                                                       <p class="text-muted m-b-30 font-13">  </p>
                                                   
                                                       <div class="row around10" >
                                                <?php foreach ($leavetypeList as $key => $leave) {
                                                    # code...
                                                    ?>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=""><?php echo $leave["type"]; ?></label>

                                                            <input  name="leave_type[]" type="hidden" readonly class="form-control" value="<?php echo $leave['id'] ?>" />
                                                            <input  name="alloted_leave_<?php echo $leave['id'] ?>" placeholder="<?php echo $this->lang->line('number_of_leaves'); ?>" type="text" class="form-control" />

                                                            <span class="text-danger"><?php echo form_error('alloted_leave'); ?></span>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>                                                                                                                                                                    
                                                       
                                                   </div>
                                                </div>
                                               </div>
                                                          
                 
                                         <div class="" style="margin-top:20px">
                                              <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">
                                                 <div class="white-box">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">
                                                        Miscellaneous Details
                                                     </h3>
                                                       <p class="text-muted m-b-30 font-13">  </p>
                                                   
                                                       <div class="col-md-4">
                                                         <div class="form-group">
                                                           <label for="">Bank Account </label>
                                                            <input type="text" class="form-control" id="account_title" name="account_title" value="<?php echo set_value('account_title'); ?>" placeholder="account_title">
                                                          </div>
                                                            <span class="text-danger"><?php echo form_error('account_title'); ?></span>
                                                       </div> 
                                                       
                                                       <div class="col-md-4">
                                                         <div class="form-group">
                                                           <label for="">bank_account_no</label>
                                                           <input type="text" class="form-control" id="bank_account_no" name="bank_account_no" value="<?php echo set_value('bank_account_no'); ?>" placeholder="bank_account_no">
                                                        </div>
                                                           <span class="text-danger"><?php echo form_error('bank_account_no'); ?></span>
                                                      </div> 
                                                       
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label for="">bank_name</label>
                                                          <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo set_value('bank_name'); ?>" placeholder="bank_name">
                                                        </div>
                                                        <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                                                   </div> 
                                                       
                                                    <div class="col-md-4">
                                                     <div class="form-group">
                                                        <label for="">ifsc_code</label>
                                                        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="<?php echo set_value('ifsc_code'); ?>" placeholder="ifsc_code">
                                                    </div>
                                                      <span class="text-danger"><?php echo form_error('ifsc_code'); ?></span>
                                                   </div>
                                                       
                                                   <div class="col-md-4">
                                                     <div class="form-group">
                                                        <label for="">bank_branch_name</label>
                                                        <input type="text" class="form-control" id="bank_branch_name" name="bank_branch_name" value="<?php echo set_value('bank_branch_name'); ?>" placeholder="bank_branch_name">
                                                    </div>
                                                       <span class="text-danger"><?php echo form_error('bank_branch_name'); ?></span>
                                                   </div> 
                                                       
                                                   </div>
                                                </div>
                                               </div>
                                                                
                                             <div class="" style="margin-top:20px">
                                              <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">
                                                 <div class="white-box">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">
                                                       Upload Documents
                                                     </h3>
                                                       <p class="text-muted m-b-30 font-13">  </p>
                                                       <div class="col-md-6">
                                                           <table class="table">
                                                                        <tbody><tr>
                                                                                <th style="width: 4px">#</th>
                                                                                <th>Title</th>
                                                                                <th>Documents</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1.</td>
                                                                                <td>Resume</td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='first_doc' id="doc1" >
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td>other_documents</td>
                                                                                <td>
                                                                                   <input class="filestyle form-control" type='file' name='fourth_doc' id="doc4" >
                                                                                </td>
                                                                            </tr>
                                                                            
                                                                        </tbody></table>
                                                       </div>
                                                          <div class="col-md-6">
                                                          <table class="table">
                                                                        <tbody><tr>
                                                                                <th style="width: 10px">#</th>
                                                                                <th>Title</th>
                                                                                <th>Documents</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td>joining_letter</td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='second_doc' id="doc2" >
                                                                                </td>
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                      </table>
                                                                   </div>
                                                               </div>
                                                            </div>
                                                        </div>
                                                          
                                                                
                                                                
                                                                
                                                            </div>
                                                      
                                                </div>
                                              </div>
                                          </div>
                                 </div> 
                                             <div class="panel-footer"> 
                                                 <div class="text-center" style="padding-left:800px;">
                                                 <button type="submit" class="btn btn-info ">Save</button>
                                                 </div>
                                             </div>
                                            <!-- end panel -->
                                            </form>
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