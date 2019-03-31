<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-user fa-fw"></i> || Student Update
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Student Update</li>
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
                                      
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                            <form id="form1" action="<?php echo site_url("webadmin/student/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                        
                                                     
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
                                                        <input autofocus="" type="text" class="form-control" id="admission_no" name="admission_no" placeholder="Enter Admission Number" value="<?php echo set_value('admission_no', $student['admission_no']); ?>">
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('admission_no'); ?></span>
                                                   </div>
                                                    
                                                   <div class="col-md-3">
                                                      <div class="form-group">
                                                        <label for="">Roll Number</label>
                                                        <input type="text" class="form-control" id="roll_no" name="roll_no" placeholder="Enter Roll Number" value="<?php echo set_value('roll_no', $student['roll_no']); ?>">
                                                       </div>
                                                    <span class="text-danger"><?php echo form_error('roll_no'); ?></span>
                                                    </div>
                                                      
                                                   <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Class</label>
                                                        <select  id="class_id" name="class_id" class="form-control" >
                                                      <option value="">Select</option>
                                                    <?php
                                                    foreach ($classlist as $class) {
                                                        ?>
                                                        <option value="<?php echo $class['id'] ?>" <?php
                                                        if ($student['class_id'] == $class['id']) {
                                                            echo "selected =selected";
                                                        }
                                                        ?>><?php echo $class['class'] ?></option>
                                                                <?php
                                                               // $count++;
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
                                                           <option value="">select</option>
                                                       </select>
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                                   </div>
                                                      
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">First Name</label>
                                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo set_value('firstname', $student['firstname']); ?>" placeholder="Enter First Name">
                                                    </div>
                                                    </div>
                                                      
                                                   <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Last Name</label>
                                                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo set_value('lastname', $student['lastname']); ?>" placeholder="Enter Last Name">
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
                                                        <option  value="<?php echo $key; ?>" <?php if ($student['gender'] == $key) echo "selected"; ?>><?php echo $key; ?></option>
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
                                                         <input type="date"  class="form-control" id="dob" name="dob" value="<?php echo isset($student['dob']) ? set_value('dob', date('Y-m-d', strtotime($student['dob']))) : set_value('dob'); ?>" placeholder="">
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
                                                        <option value="<?php echo $category['id'] ?>" <?php if ($student['category_id'] == $category['id']) echo "selected =selected" ?>><?php echo $category['category']; ?></option>
                                                        <?php
                                                        //$count++;
                                                    }
                                                    ?>
                                                </select>
                                                        </div>
                                                         <span class="text-danger"><?php echo form_error('category_id'); ?></span>
                                                    </div>
                                                      
                                                   <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Religion</label>
                                                        <input type="text" id="religion" name="religion" value="<?php echo set_value('religion', $student['religion']); ?>" class="form-control" id="" placeholder="Enter Religion">
                                                    </div>
                                                         <span class="text-danger"><?php echo form_error('religion'); ?></span>
                                                    </div>
                                                      
                                                     <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Cast</label>
                                                        <input type="text" class="form-control" id="cast" name="cast" placeholder="Enter Cast" value="<?php echo set_value('cast', $student['cast']); ?>">
                                                    </div>
                                                         <span class="text-danger"><?php echo form_error('cast'); ?></span>
                                                     </div>
                                                      
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Mobile Number</label>
                                                        <input type="number" class="form-control" id="mobileno" name="mobileno" placeholder="Enter Mobile Number" value="<?php echo set_value('mobileno', $student['mobileno']); ?>">
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('mobileno'); ?></span>
                                                    </div>
                                                      
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Email ID</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email', $student['email']); ?>" placeholder="Enter Email ID">
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Admission Date</label>
                                                        <input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo isset($student['admission_date']) ? set_value('admission_date', date('Y-m-d', strtotime($student['admission_date']))) : set_value('admission_date'); ?>" >
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
                                                    <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">RTE</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline p-0">
                                                                <div class="radio radio-info">
                                                                    <input class="radio-inline" type="radio" name="rte" value="Yes"  <?php echo set_value('rte', $student['rte']) == "Yes" ? "checked" : "";
                                                    ?>  >
                                                                    <label for="radio1">Yes</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input class="radio-inline" type="radio" name="rte" value="No" <?php echo set_value('rte', $student['rte']) == "No" ? "checked" : "";
                                                    ?>  >
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
                                                        <input type="text" class="form-control" id="fees_discount" name="fees_discount" placeholder="fees discount"  value="" />
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('fees_discount'); ?></span>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">-</label><br>
                                                        <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Sibling</button>
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
                                                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo set_value('father_name', $student['father_name']); ?>" placeholder="Enter Father Name">
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                                                    </div>
                                                       
                                                     <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Father Phone</label>
                                                        <input type="text" class="form-control" id="father_phone" name="father_phone" value="<?php echo set_value('father_phone', $student['father_phone']); ?>" placeholder="Enter Father Phone">
                                                    </div>
                                                      <span class="text-danger"><?php echo form_error('father_phone'); ?></span>
                                                    </div>
                                                       
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Father Occupation</label>
                                                        <input type="text" class="form-control" id="father_occupation" name="father_occupation"  value="<?php echo set_value('father_occupation', $student['father_occupation']); ?>" placeholder="Enter Father Occupation">
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('father_occupation'); ?></span>
                                                     </div>
                                                       
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Mother Name</label>
                                                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo set_value('mother_name', $student['mother_name']); ?>" placeholder="Enter Mother Name">
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('mother_name'); ?></span>
                                                    </div>
                                                       
                                                   <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Mother Phone</label>
                                                        <input type="text" class="form-control" id="mother_phone" name="mother_phone" value="<?php echo set_value('mother_phone', $student['mother_phone']); ?>" placeholder="Enter Mother Phone">
                                                    </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Mother Occupation</label>
                                                        <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" value="<?php echo set_value('mother_occupation', $student['mother_occupation']); ?>" placeholder="Enter Mother Occupation">
                                                    </div>
                                                      <span class="text-danger"><?php echo form_error('mother_occupation'); ?></span>
                                                    </div>
                                                      
                                                       
                                                       
                                                     <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">If Guardian Is </label>
                                                        <div class="col-md-9">
                                                            <div class="radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="guardian_is"  <?php if ($student['guardian_is'] == "father") echo "checked"; ?>    value="father"> Father 
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="guardian_is" <?php if ($student['guardian_is'] == "mother") echo "checked"; ?>   value="mother" > Mother
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="guardian_is" <?php if ($student['guardian_is'] == "other") echo "checked"; ?>   value="other" > Other
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
                                                        <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="<?php echo set_value('guardian_name', $student['guardian_name']); ?>" placeholder="Enter Guardian Name">
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('guardian_name'); ?></span>
                                                   </div>
                                                       
                                                   <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Relation</label>
                                                        <input type="text" class="form-control" id="guardian_relation" name="guardian_relation"  value="<?php echo set_value('guardian_relation', $student['guardian_relation']); ?>"placeholder="Enter Guardian Relation">
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('guardian_relation'); ?></span>
                                                    </div>
                                                     
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Email</label>
                                                         <input type="gmail" class="form-control" id="guardian_email" name="guardian_email" value="<?php echo set_value('guardian_email', $student['guardian_email']); ?>" placeholder="Enter Guardian Email">
                                                    </div>
                                                          <span class="text-danger"><?php echo form_error('guardian_email'); ?></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Phone</label>
                                                        <input type="text" class="form-control" id="guardian_phone" name="guardian_phone" value="<?php echo set_value('guardian_phone', $student['guardian_phone']); ?>" placeholder="Enter Guardian Phone">
                                                    </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Occupation</label>
                                                        <input type="text" class="form-control" id="guardian_occupation" name="guardian_occupation" value="<?php echo set_value('guardian_occupation', $student['guardian_occupation']); ?>" placeholder="Enter Guardian Occupation">
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('guardian_occupation'); ?></span>
                                                     </div>
                                                     
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Guardian Address</label>
                                                        <textarea type="text" class="form-control" id="guardian_address" name="guardian_address" placeholder="Enter Guardian Address" rows="2"><?php echo set_value('guardian_address', $student['guardian_address']); ?></textarea>
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
                                                       
                                                      <div class="collapse m-t-15 in" id="collapseExample">
                                             
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
                                                                       <textarea type="text" class="form-control" id="current_address" name="current_address"  placeholder=""><?php echo set_value('current_address', $student['current_address']); ?></textarea>
                                                                   </div>
                                                                    <span class="text-danger"><?php echo form_error('current_address'); ?></span>
                                                                    </div>
                                                       
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Permanent Address</label>
                                                                        <textarea type="text" class="form-control" id="permanent_address" name="permanent_address" placeholder=""><?php echo set_value('permanent_address', $student['permanent_address']); ?> </textarea>
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
                                                            <input type="text" class="form-control" id="bank_account_no" name="bank_account_no" value="<?php echo set_value('bank_account_no', $student['bank_account_no']); ?>" placeholder="Enter Bank Account Number">
                                                          </div>
                                                            <span class="text-danger"><?php echo form_error('bank_account_no'); ?></span>
                                                       </div> 
                                                       
                                                       <div class="col-md-4">
                                                         <div class="form-group">
                                                           <label for="">Bank Name</label>
                                                           <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo set_value('bank_name', $student['bank_name']); ?>" placeholder="Enter Bank Name">
                                                        </div>
                                                           <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                                                      </div> 
                                                       
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label for="">IFSC Code</label>
                                                          <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="<?php echo set_value('ifsc_code', $student['ifsc_code']); ?>" placeholder="Enter IFSC Code">
                                                        </div>
                                                        <span class="text-danger"><?php echo form_error('ifsc_code'); ?></span>
                                                   </div> 
                                                       
                                                    <div class="col-md-4">
                                                     <div class="form-group">
                                                        <label for="">National Identification Number</label>
                                                        <input type="text" class="form-control" id="adhar_no" name="adhar_no" value="<?php echo set_value('adhar_no', $student['adhar_no']); ?>" placeholder="Enter National Identification Number">
                                                    </div>
                                                      <span class="text-danger"><?php echo form_error('adhar_no'); ?></span>
                                                   </div>
                                                       
                                                   <div class="col-md-4">
                                                     <div class="form-group">
                                                        <label for="">Local Identification Number</label>
                                                        <input type="text" class="form-control" id="samagra_id" name="samagra_id" value="<?php echo set_value('samagra_id', $student['samagra_id']); ?>" placeholder="Enter Local Identification Number">
                                                    </div>
                                                       <span class="text-danger"><?php echo form_error('samagra_id'); ?></span>
                                                   </div> 
                                                       <div class="col-md-4">
                                                     <div class="form-group">
                                                        <label for="">Previous School Details</label>
                                                        <textarea  name="previous_school" class="form-control" rows="3"  placeholder="Enter Previous School Details"><?php echo set_value('previous_school', $student['previous_school']); ?></textarea>
                                                    </div>
                                                            <span class="text-danger"><?php echo form_error('previous_school'); ?></span>
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
<script type="text/javascript">
    $(document).ready(function () {
        var section_id_post = '<?php echo $student['division_id']; ?>';
        var class_id_post = '<?php echo $student['class_id']; ?>';
//        alert(section_id_post);
        populateSection(section_id_post, class_id_post);
        function populateSection(section_id_post, class_id_post) {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/sections/getByClass",
                data: {'class_id': class_id_post},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var select = "";
                        if (section_id_post == obj.division_id) {
                            var select = "selected=selected";
                        }
                        div_data += "<option value=" + obj.division_id + " " + select + ">" + obj.division + "</option>";
                    });

                    $('#section_id').append(div_data);
                }
            });
        }

        $(document).on('change', '#class_id', function(e) {
//            $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
//            alert(class_id);
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">select</option>';
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
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#dob,#admission_date').datepicker({
            format: date_format,
            autoclose: true
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

                
    
   
