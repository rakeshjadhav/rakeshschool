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
                                          <?php 
                                              if($this->rbac->hasPrivilege('import_student','can_view')){
                                           ?>
                                            <a href="<?php echo site_url('webadmin/student/import') ?>">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-upload"></i> Import Student</button>
                                            </a>
                                              <?php } ?>
                    </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                            <form id="form1" action="<?php echo site_url('webadmin/student/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                        
                                                      <input type="hidden" name="sibling_name" value="<?php echo set_value('sibling_name'); ?>" id="sibling_name_next">
                                                      <input type="hidden" name="sibling_id" value="<?php echo set_value('sibling_id'); ?>" id="sibling_id">
                                                 
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
                                                   <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Admission Number</label>
                                                        <input autofocus="" type="text" class="form-control" id="admission_no" name="admission_no" placeholder="Enter Admission Number" value="<?php echo set_value('admission_no'); ?>">
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('admission_no'); ?></span>
                                                   </div>
                                                    
                                                   <div class="col-md-3">
                                                      <div class="form-group">
                                                        <label for="">Roll Number</label>
                                                        <input type="text" class="form-control" id="roll_no" name="roll_no" placeholder="Enter Roll Number" value="<?php echo set_value('roll_no'); ?>">
                                                       </div>
                                                    <span class="text-danger"><?php echo form_error('roll_no'); ?></span>
                                                    </div>
                                                      
                                                   <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Class</label>
                                                        <select class="form-control" id="class_id" name="class_id">
                                                            <option value="">Select</option>
                                                            <?php
                                                            foreach ($classlist as $class) {
                                                                ?>
                                                                <option value="<?php echo $class['id'] ?>"<?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                                                <?php
                                                                //$count++;
                                                            }
                                                            ?>
                                                        </select>
                                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                                    </div>
                                                     </div>
                                                      
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Division</label>
                                                        <select  id="section_id" name="section_id" class="form-control" >
                                                           <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                                   </div>
                                                      
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">First Name</label>
                                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="Enter First Name">
                                                    </div>
                                                    </div>
                                                      
                                                   <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Last Name</label>
                                                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Enter Last Name">
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('lastname'); ?></span>
                                                   </div>
                                                      
                                                  <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Gender</label>
                                                        <select class="form-control" name="gender">
                                                         <option value="">Select</option>
                                                            <?php
                                                            foreach ($genderList as $key => $value) {
                                                                ?>
                                                                <option style="color:#000" value="<?php echo $key; ?>" <?php if (set_value('gender') == $key) echo "selected"; ?>><?php echo $key; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                   </select>
                                                    </div>
                                                       <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                                     </div>
                                                      
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Date Of Birth</label>
                                                         <input type="date"  class="form-control" id="dob" name="dob" value="<?php echo set_value('dob'); ?>" placeholder="">
                                                    </div>
                                                         <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                                    </div>
                                                      
                                                    <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Category</label>
                                                        <select  id="category_id" name="category_id" class="form-control" >
                                                           <option value="">Select</option>
                                                            <?php
                                                            foreach ($categorylist as $category) {
                                                                ?>
                                                                <option value="<?php echo $category['id'] ?>" <?php if (set_value('category_id') == $category['id']) echo "selected=selected"; ?>><?php echo $category['category'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        </div>
                                                         <span class="text-danger"><?php echo form_error('category_id'); ?></span>
                                                    </div>
                                                      
                                                   <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Religion</label>
                                                        <input type="text" id="religion" name="religion" alue="<?php echo set_value('religion'); ?>" class="form-control" id="" placeholder="Enter Religion">
                                                    </div>
                                                         <span class="text-danger"><?php echo form_error('religion'); ?></span>
                                                    </div>
                                                      
                                                     <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Cast</label>
                                                        <input type="text" class="form-control" id="cast" name="cast" placeholder="Enter Cast" value="<?php echo set_value('cast'); ?>">
                                                    </div>
                                                         <span class="text-danger"><?php echo form_error('cast'); ?></span>
                                                     </div>
                                                      
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Mobile Number</label>
                                                        <input type="number" class="form-control" id="mobileno" name="mobileno" placeholder="Enter Mobile Number" value="<?php echo set_value('mobileno'); ?>">
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('mobileno'); ?></span>
                                                    </div>
                                                      
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Email ID</label>
                                                        <input type="email" class="form-control" id="email" name="email" alue="<?php echo set_value('email'); ?>" placeholder="Enter Email ID">
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Admission Date</label>
                                                        <input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo isset($data->date)?date("Y-m-d",strtotime($data->date)):date("Y-m-d",  strtotime("now")); ?>" >
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('admission_date'); ?></span>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Select Image</label>
                                                        <input type="file" class="form-control" name='file' id="file" />
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('file'); ?></span>
                                                    </div>
                                                       <div class="col-md-3 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">blood_group</label>
                                                           <?php ?>
                                                            <select class="form-control" rows="3" placeholder="" name="blood_group">
                                                                <option value="">select</option>
                                                                <?php foreach ($bloodgroup as $bgkey => $bgvalue) { ?>
                                                             <option value="<?php echo $bgvalue ?>"><?php echo $bgvalue ?></option>           
                                                               <?php } ?>
                                                            </select>
                                                            <span class="text-danger"><?php echo form_error('blood_group'); ?></span>
                                                        </div>
                                                    </div>
                                                      <div class="col-md-3 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">house</label>
                                                            <select class="form-control" rows="3" placeholder="" name="house">
                                                                <option value="">select</option>
                                                                <?php foreach ($houses as $hkey => $hvalue) {?>
                                                              <option value="<?php echo $hvalue["id"] ?>"><?php echo $hvalue["house_name"] ?></option>           
                                                               <?php } ?>
                                                            </select>
                                                            <span class="text-danger"><?php echo form_error('house'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">RTE</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline p-0">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="rte" value="Yes"  <?php echo set_value('rte') == "yes" ? "checked" : ""; ?>>
                                                                    <label for="radio1">Yes</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" checked="checked" type="radio" name="rte" value="No" <?php echo set_value('rte') == "no" ? "checked" : "";  ?>>
                                                                    <label for="radio2">No </label>
                                                                </div>
                                                            </label>
                                                            
                                                        </div>
                                                        <span class="text-danger"><?php echo form_error('rte'); ?></span>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2" style="display:none;">
                                                    <div class="form-group">
                                                        <label for="">Fees Discount</label>
                                                        <input type="text" class="form-control" id="fees_discount" name="fees_discount" placeholder="fees discount"  value="<?php echo set_value('fees_discount', 0); ?>" />
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('fees_discount'); ?></span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">-</label><br>
                                                        <button type="button" class="btn btn-sm btn-primary mysiblings"><i class="fa fa-plus"></i> Add Sibling</button>
                                                    </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                 <label for="">-</label><br>
                                                    <div id='sibling_id' class="pt6">
                                                        <span id="sibling_name" class="label label-success "><?php echo set_value('sibling_name'); ?></span></div>
                                                </div>
                                                        </div>
                                                  </div>
                                             </div>
                                         </div>
                                     <!--//end studnt admission-->
                                      <!-- // family details-->
                                            <div class="" style="margin-top:20px">
                                              <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">
                                                 <div class="">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">Parent Guardian Detail</h3>
                                                       <p class="text-muted m-b-30 font-13">  </p>
                                                 
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Father Name</label>
                                                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo set_value('father_name'); ?>" placeholder="Enter Father Name">
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                                                    </div>
                                                       
                                                     <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Father Phone</label>
                                                        <input type="text" class="form-control" id="father_phone" name="father_phone" alue="<?php echo set_value('father_phone'); ?>" placeholder="Enter Father Phone">
                                                    </div>
                                                      <span class="text-danger"><?php echo form_error('father_phone'); ?></span>
                                                    </div>
                                                       
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Father Occupation</label>
                                                        <input type="text" class="form-control" id="father_occupation" name="father_occupation"  value="<?php echo set_value('father_occupation'); ?>" placeholder="Enter Father Occupation">
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('father_occupation'); ?></span>
                                                     </div>
                                                       
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Mother Name</label>
                                                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo set_value('mother_name'); ?>" placeholder="Enter Mother Name">
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('mother_name'); ?></span>
                                                    </div>
                                                       
                                                   <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Mother Phone</label>
                                                        <input type="text" class="form-control" id="mother_phone" name="mother_phone" value="<?php echo set_value('mother_phone'); ?>" placeholder="Enter Mother Phone">
                                                    </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Mother Occupation</label>
                                                        <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" value="<?php echo set_value('mother_occupation'); ?>" placeholder="Enter Mother Occupation">
                                                    </div>
                                                      <span class="text-danger"><?php echo form_error('mother_occupation'); ?></span>
                                                    </div>
                                                       
                                                     <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">If Guardian Is </label>
                                                        <div class="col-md-9">
                                                            <div class="radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="guardian_is"  <?php  echo set_value('guardian_is') == "father" ? "checked" : ""; ?>   value="father"> Father 
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="guardian_is" <?php echo set_value('guardian_is') == "mother" ? "checked" : "";  ?>   value="mother" > Mother
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="guardian_is" <?php  echo set_value('guardian_is') == "other" ? "checked" : "";  ?>   value="other" > Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                         <div class="form-group">
                                                             .....
                                                         </div>  
                                                     </div>
                                                    
                                                   <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Name</label>
                                                        <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="<?php echo set_value('guardian_name'); ?>" placeholder="Enter Guardian Name">
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('guardian_name'); ?></span>
                                                   </div>
                                                       
                                                   <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Relation</label>
                                                        <input type="text" class="form-control" id="guardian_relation" name="guardian_relation"  value="<?php echo set_value('guardian_relation'); ?>"placeholder="Enter Guardian Relation">
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('guardian_relation'); ?></span>
                                                    </div>
                                                     
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Email</label>
                                                         <input type="gmail" class="form-control" id="guardian_email" name="guardian_email" alue="<?php echo set_value('guardian_email'); ?>" placeholder="Enter Guardian Email">
                                                    </div>
                                                          <span class="text-danger"><?php echo form_error('guardian_email'); ?></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Phone</label>
                                                        <input type="text" class="form-control" id="guardian_phone" name="guardian_phone" value="<?php echo set_value('guardian_phone'); ?>" placeholder="Enter Guardian Phone">
                                                    </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Occupation</label>
                                                        <input type="text" class="form-control" id="guardian_occupation" name="guardian_occupation" value="<?php echo set_value('guardian_occupation'); ?>" placeholder="Enter Guardian Occupation">
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('guardian_occupation'); ?></span>
                                                     </div>
                                                     
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Address</label>
                                                        <textarea type="text" class="form-control" id="guardian_address" name="guardian_address" placeholder="Enter Guardian Address" rows="2"></textarea>
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('guardian_address'); ?></span>
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
                                                            <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">Student Address Details</h3>
                                                              <p class="text-muted m-b-30 font-13">  </p>
                                                 
                                                                <div class="col-md-6">
                                                                    <div class="checkbox checkbox-success" >
                                                                      <input type="checkbox" id="autofill_current_address" onclick="return auto_fill_guardian_address();"  >
                                                                      <label for="checkbox33">If Guardian Address is Current Address</label>
                                                                </div>
                                                                </div>
                                                  
                                                                    <div class="col-md-6">
                                                                      <div class="checkbox checkbox-success" >
                                                                     <input  type="checkbox" id="autofill_address"onclick="return auto_fill_address();">
                                                                       <label for="checkbox33">If Permanent Address is Current Address</label>
                                                                       </div>
                                                                     </div>
                                                              
                                                                    <div class="col-md-6">
                                                                   <div class="form-group">
                                                                       <label for="">Current Address</label>
                                                                       <textarea type="text" class="form-control" id="current_address" name="current_address"  placeholder=""><?php echo set_value('current_address'); ?></textarea>
                                                                   </div>
                                                                    <span class="text-danger"><?php echo form_error('current_address'); ?></span>
                                                                    </div>
                                                       
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Permanent Address</label>
                                                                        <textarea type="text" class="form-control" id="permanent_address" name="permanent_address" placeholder=""> </textarea>
                                                                    </div>
                                                                     <span class="text-danger"><?php echo form_error('permanent_address'); ?></span>
                                                                   </div>
                                                                </div>
                                                             </div>
                                                           </div>
                                                                
                                                                <!--//two tab-->
                                          <div class="" style="margin-top:20px">
                                              <div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">
                                                 <div class="white-box">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">
                                                         Transport Details
                                                     </h3>
                                                       <p class="text-muted m-b-30 font-13">  </p>
                                                 
                                                     <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Route List</label>
                                                        <select class="form-control" id="vehroute_id" name="vehroute_id">
                                                               <option value="">select</option>
                                                                <?php
                                                                foreach ($vehroutelist as $vehroute) {
                                                                    ?>
                                                                    <optgroup label=" <?php echo $vehroute->route_title; ?>">
                                                                        <?php
                                                                        $vehicles = $vehroute->vehicles;
                                                                        if (!empty($vehicles)) {
                                                                            foreach ($vehicles as $key => $value) {
                                                                                ?>

                                                                                <option value="<?php echo $value->vec_route_id ?>" <?php echo set_select('vehroute_id', $value->vec_route_id); ?> data-fee="<?php echo $vehroute->fare; ?>">
                                                                                    <?php echo $value->vehicle_no ?>
                                                                                </option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </optgroup>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                    </div>
                                                         <span class="text-danger"><?php echo form_error('transport_fees'); ?></span>
                                                     </div>
                                                       
                                                       <div class="col-md-6" style="display:none">
                                                    <div class="form-group">
                                                        <label for="">......</label>
                                                        <!--<textarea type="text" class="form-control" id="" placeholder=""> </textarea>-->
                                                    </div>
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
                                                           <label for="">Bank Account Number</label>
                                                            <input type="text" class="form-control" id="bank_account_no" name="bank_account_no" value="<?php echo set_value('bank_account_no'); ?>" placeholder="Enter Bank Account Number">
                                                          </div>
                                                            <span class="text-danger"><?php echo form_error('bank_account_no'); ?></span>
                                                       </div> 
                                                       
                                                       <div class="col-md-4">
                                                         <div class="form-group">
                                                           <label for="">Bank Name</label>
                                                           <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo set_value('bank_name'); ?>" placeholder="Enter Bank Name">
                                                        </div>
                                                           <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                                                      </div> 
                                                       
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label for="">IFSC Code</label>
                                                          <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="<?php echo set_value('ifsc_code'); ?>" placeholder="Enter IFSC Code">
                                                        </div>
                                                        <span class="text-danger"><?php echo form_error('ifsc_code'); ?></span>
                                                   </div> 
                                                       
                                                    <div class="col-md-4">
                                                     <div class="form-group">
                                                        <label for="">National Identification Number</label>
                                                        <input type="text" class="form-control" id="adhar_no" name="adhar_no" value="<?php echo set_value('adhar_no'); ?>" placeholder="Enter National Identification Number">
                                                    </div>
                                                      <span class="text-danger"><?php echo form_error('adhar_no'); ?></span>
                                                   </div>
                                                       
                                                   <div class="col-md-4">
                                                     <div class="form-group">
                                                        <label for="">Local Identification Number</label>
                                                        <input type="text" class="form-control" id="samagra_id" name="samagra_id" value="<?php echo set_value('samagra_id'); ?>" placeholder="Enter Local Identification Number">
                                                    </div>
                                                       <span class="text-danger"><?php echo form_error('samagra_id'); ?></span>
                                                   </div> 
                                                       <div class="col-md-4">
                                                     <div class="form-group">
                                                        <label for="">Previous School Details</label>
                                                        <textarea  name="previous_school" class="form-control" rows="3"  placeholder="Enter Previous School Details"></textarea>
                                                    </div>
                                                            <span class="text-danger"><?php echo form_error('previous_school'); ?></span>
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
                                                                                <td><input type="text" name='first_title' class="form-control" placeholder=""></td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='first_doc' id="doc1" >
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td>
                                                                                <td><input type="text" name='second_title' class="form-control" placeholder=""></td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='second_doc' id="doc1" >
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td>
                                                                                <td><input type="text" name='third_title' class="form-control" placeholder=""></td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='third_doc' id="doc1" >
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
                                                                                <td>4.</td>
                                                                                <td><input type="text" name='fourth_title' class="form-control" placeholder=""></td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='fourth_doc' id="doc1" >
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>5.</td>
                                                                                <td><input type="text" name='fifth_title' class="form-control" placeholder=""></td>
                                                                                <td>
                                                                                    <input class="filestyle form-control" type='file' name='fifth_doc' id="doc1" >
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


<div class="modal fade" id="mySiblingModal" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title text-center modal_title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="box-body">
                        <div class="sibling_msg">

                        </div>
                        <input  type="hidden" class="form-control" id="transport_student_session_id"  value="0" readonly="readonly"/>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">class</label>
                            <div class="col-sm-10">
                                <select  id="sibiling_class_id" name="sibiling_class_id" class="form-control"  >
                                    <option value="">select</option>
                                    <?php foreach ($classlist as $class) {?>
                                        <option value="<?php echo $class['id'] ?>"<?php if (set_value('sibiling_class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                        <?php
                                        //$count++;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">division</label>
                            <div class="col-sm-10">
                                <select  id="sibiling_section_id" name="sibiling_section_id" class="form-control" >
                                    <option value=""   >select</option>
                                </select>
                                <span class="text-danger" id="transport_amount_error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">student
                            </label>

                            <div class="col-sm-10">
                                <select  id="sibiling_student_id" name="sibiling_student_id" class="form-control" >
                                    <option value=""   >select</option>
                                </select>
                                <span class="text-danger" id="transport_amount_fine_error"></span>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">cancel</button>
                <button type="button" class="btn btn-primary add_sibling" id="load"><i class="fa fa-user"></i> add</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getSectionByClass(class_id, section_id) {
        //alert(class_id);
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
             //alert(base_url);
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
//                    alert(data);
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.division_id + " " + sel + ">" + obj.division + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }

    $(document).ready(function () {
        //var date_format = '<?php// echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        var class_id = $('#class_id').val();
       // alert(class_id);
        var division_id = '<?php echo set_value('division_id') ?>';
        getSectionByClass(class_id, division_id);

        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
           // alert(class_id);
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.division_id + ">" + obj.division + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });

//        $('#dob,#admission_date').datepicker({
//           // format: date_format,
//            autoclose: true
//        });

        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });

    });
    function auto_fill_guardian_address() {
        if ($("#autofill_current_address").is(':checked'))
        {
            $('#current_address').val($('#guardian_address').val());
        }
    }
    function auto_fill_address() {
        if ($("#autofill_address").is(':checked'))
        {
            $('#permanent_address').val($('#current_address').val());
        }
    }
    $('input:radio[name="guardian_is"]').change(
            function () {
                if ($(this).is(':checked')) {
                    var value = $(this).val();
                    if (value == "father") {
                        $('#guardian_name').val($('#father_name').val());
                        $('#guardian_phone').val($('#father_phone').val());
                        $('#guardian_occupation').val($('#father_occupation').val());
                        $('#guardian_relation').val("Father")
                    } else if (value == "mother") {
                        $('#guardian_name').val($('#mother_name').val());
                        $('#guardian_phone').val($('#mother_phone').val());
                        $('#guardian_occupation').val($('#mother_occupation').val());
                        $('#guardian_relation').val("Mother")
                    } else {
                        $('#guardian_name').val("");
                        $('#guardian_phone').val("");
                        $('#guardian_occupation').val("");
                        $('#guardian_relation').val("")
                    }
                }
            });


</script>

<script type="text/javascript">
    $(".mysiblings").click(function () {
        $('.sibling_msg').html("");
        $('.modal_title').html('<b>' + "Sibling" + '</b>');
        $('#mySiblingModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    });
</script>

<script type="text/javascript">

    $(document).on('change', '#sibiling_class_id', function (e) {
        $('#sibiling_section_id').html("");
        var class_id = $(this).val();
        var base_url = '<?php echo base_url() ?>';
        var div_data = '<option value="">Select</option>';
        $.ajax({
            type: "GET",
            url: base_url + "webadmin/sections/getByClass",
            data: {'class_id': class_id},
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj)
                {
                    div_data += "<option value=" + obj.division_id + ">" + obj.division + "</option>";
                });
                $('#sibiling_section_id').append(div_data);
            }
        });
    });

    $(document).on('change', '#sibiling_section_id', function (e) {
        getStudentsByClassAndSection();
    });

    function getStudentsByClassAndSection() {
        $('#sibiling_student_id').html("");
        var class_id = $('#sibiling_class_id').val();
        var division_id = $('#sibiling_section_id').val();
        var student_id = '<?php echo set_value('student_id') ?>';
        var base_url = '<?php echo base_url() ?>';
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
            type: "GET",
            url: base_url + "webadmin/student/getByClassAndSection",
            data: {'class_id': class_id, 'division_id': division_id},
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj)
                {
                    var sel = "";
                    if (division_id == obj.division_id) {
                        sel = "selected=selected";
                    }
                    div_data += "<option value=" + obj.id + ">" + obj.firstname + " " + obj.lastname + "</option>";
                });
                $('#sibiling_student_id').append(div_data);
            }
        });
    }

    $(document).on('click', '.add_sibling', function () {
        var student_id = $('#sibiling_student_id').val();
       // alert(student_id);
        var base_url = '<?php echo base_url() ?>';
        if (student_id.length > 0) {
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/student/getStudentRecordByID",
                data: {'student_id': student_id},
                dataType: "json",
                success: function (data) {
                    alert(data);
                    $('#sibling_name').text("Sibling: " + data.firstname + " " + data.lastname);
                    $('#sibling_name_next').val(data.firstname + " " + data.lastname);
                    $('#sibling_id').val(student_id);
                    $('#father_name').val(data.father_name);
                    $('#father_phone').val(data.father_phone);
                    $('#father_occupation').val(data.father_occupation);
                    $('#mother_name').val(data.mother_name);
                    $('#mother_phone').val(data.mother_phone);
                    $('#mother_occupation').val(data.mother_occupation);
                    $('#guardian_name').val(data.guardian_name);
                    $('#guardian_relation').val(data.guardian_relation);
                    $('#guardian_address').val(data.guardian_address);
                    $('#guardian_phone').val(data.guardian_phone);
                    $('#state').val(data.state);
                    $('#city').val(data.city);
                    $('#pincode').val(data.pincode);
                    $('#current_address').val(data.current_address);
                    $('#permanent_address').val(data.permanent_address);
                    $('#guardian_occupation').val(data.guardian_occupation);
                    $("input[name=guardian_is][value='" + data.guardian_is + "']").prop("checked", true);
                    $('#mySiblingModal').modal('hide');
                }
            });
        } else {
            $('.sibling_msg').html("<div class='alert alert-danger'>No Student Selected</div>");
        }

    });
</script>

                
    
   
