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
                               <i class="fa fa-home fa-fw"></i> || Teachers List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Teachers</li>
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
                                          <i class="fa fa-tags"></i> ||  Update Teacher
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>

                                          <form id="form1" action="<?php echo site_url('webadmin/staff/edit/' . $staff["id"]) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">
                                  
                            <div class="tshadow mb25 bozero">    

                                <h4 class="pagetitleh2">basic_information</h4>


                                <div class="around10">
                                                                 <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">staff_id</label><small class="req"> *</small>
                                                <input autofocus="" id="employee_id" name="employee_id" placeholder="" value="<?php echo $staff["employee_id"] ?>" type="text" class="form-control"  value="" />
                                                <span class="text-danger"><?php echo form_error('employee_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="">role</label><small class="req"> *</small>
                                                <select  id="role" name="role" class="form-control" >
                                                    <option value=""   >select</option>
                                                    <?php
                                                    foreach ($getStaffRole as $key => $role) {
                                                        ?>
                                                        <option value="<?php echo $role["id"] ?>" <?php
                                                        if ($staff["user_type"] == $role["type"]) {
                                                            echo "selected";
                                                        }
                                                        ?>><?php echo $role["type"] ?></option>
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
                                                        <option value="<?php echo $value["id"] ?>" <?php
                                                                if ($staff["designation"] == $value["id"]) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $value["designation"] ?></option>
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
                                                    <option value="select"><?php echo $this->lang->line('select') ?></option>
                                                            <?php foreach ($department as $key => $value) {
                                                                ?>
                                                        <option value="<?php echo $value["id"] ?>" <?php
                                                            if ($staff["department"] == $value["id"]) {
                                                                echo "selected";
                                                            }
                                                            ?>><?php echo $value["department_name"] ?></option>
<?php }
?>
                                                </select> 
                                                <span class="text-danger"><?php echo form_error('department'); ?></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">first_name</label><small class="req"> *</small>
                                                <input id="firstname" name="name" placeholder="" type="text" class="form-control"  value="<?php echo $staff["name"] ?>" />
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">last_name</label>
                                                <input id="surname" name="surname" placeholder="" type="text" class="form-control"  value="<?php echo $staff["surname"] ?>" />
                                                <span class="text-danger"><?php echo form_error('surname'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">father_name</label>
                                                <input id="father_name" name="father_name" placeholder="" type="text" class="form-control"  value="<?php echo $staff["father_name"] ?>" />
                                                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">mother_name</label>
                                                <input id="mother_name" name="mother_name" placeholder="" type="text" class="form-control"  value="<?php echo $staff["mother_name"] ?>" />
                                                <span class="text-danger"><?php echo form_error('mother_name'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">email</label><small class="req"> *</small>
                                                <input id="email" name="email" placeholder="" type="text" class="form-control"  value="<?php echo $staff["email"] ?>" />
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="">select</option>
                                                    <?php
                                                    foreach ($genderList as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php if ($staff['gender'] == $key) echo "selected"; ?>><?php echo $value; ?></option>
    <?php
}
?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">date_of_birth</label><small class="req"> *</small>
                                                <input id="dob" name="dob" placeholder="" type="text" class="form-control"  value="<?php
                                                       if (!empty($staff["date_of_leaving"])) {
                                                           echo $staff["dob"];
                                                       }
?>" />
                                                <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">date_of_joining</label>
                                                <input id="date_of_joining" name="date_of_joining" placeholder="" type="text" class="form-control"  value="<?php
                                                       if ($staff["date_of_joining"] != '0000-00-00') {
                                                           echo $staff["date_of_joining"];
                                                       }
?>"  />
                                                <span class="text-danger"><?php echo form_error('date_of_joining'); ?></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">phone</label>
                                                <input id="mobileno" name="contactno" placeholder="" type="text" class="form-control"  value="<?php echo $staff["contact_no"] ?>" />
                                                <input id="editid" name="editid" placeholder="" type="hidden" class="form-control"  value="<?php echo $staff["id"]; ?>" />

                                                <span class="text-danger"><?php echo form_error('contactno'); ?></span>
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">emergency_contact_number</label>
                                                <input id="mobileno" name="emergency_no" placeholder="" type="text" class="form-control"  value="<?php echo $staff["emergency_contact_no"] ?>" />
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
                                                        <option <?php
    if ($staff["marital_status"] == $mavalue) {
        echo "selected";
    }
    ?> value="<?php echo $mavalue; ?>"><?php echo $mavalue; ?></option>
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
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">current address</label>
                                                <div><textarea name="address" class="form-control"><?php echo $staff["local_address"] ?></textarea>
                                                </div>
                                                <span class="text-danger"></span></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">permanent_address</label>
                                                <div><textarea name="permanent_address" class="form-control"><?php echo $staff["permanent_address"] ?></textarea>
                                                </div>
                                                <span class="text-danger"></span></div>
                                        </div>                          

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="">qualification</label>
                                                <textarea id="qualification" name="qualification" placeholder=""  class="form-control" ><?php echo $staff["qualification"] ?></textarea>
                                                <span class="text-danger"><?php echo form_error('qualification'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="">work_experience</label>
                                                <textarea id="permanent_address" name="work_exp" placeholder="" class="form-control"><?php echo $staff["work_exp"] ?></textarea>
                                                <span class="text-danger"><?php echo form_error('work_exp'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">note</label>
                                                <div><textarea name="note" class="form-control"><?php echo $staff["note"] ?></textarea>
                                                </div>
                                                <span class="text-danger"></span></div>
                                        </div>                          


                                    </div>

                                </div>
                            </div>

                            <div class="box-group collapsed-box">                      
                                <div class="panel box box-success collapsed-box">
                                    <div class="box-header with-border">
                                        <a data-widget="collapse" data-original-title="Collapse" aria-expanded="false" class="collapsed btn boxplus">
                                            <i class="fa fa-fw fa-plus"></i>add_more_details
                                        </a>
                                    </div>
                                    <div class="box-body">


                                        <div class="tshadow mb25 bozero">    
                                            <h4 class="pagetitleh2">payroll
                                            </h4>

                                            <div class="row around10">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">epf_no</label>
                                                        <input id="epf_no" name="epf_no" placeholder="" type="text" class="form-control"  value="<?php echo $staff["epf_no"] ?>"  />
                                                        <span class="text-danger"><?php echo form_error('epf_no'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">contract_type</label>
                                                        <select class="form-control" name="contract_type">
                                                            <option value="">select</option>

<?php foreach ($contract_type as $key => $value) { ?>
                                                                <option value="<?php echo $key ?>" <?php
    if ($staff["contract_type"] == $key) {
        echo "selected";
    }
    ?>><?php echo $value ?></option>

<?php } ?>     



                                                        </select>
                                                        <span class="text-danger"><?php echo form_error('contract_type'); ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">basic_salary</label>
                                                        <input type="text" value="<?php echo $staff["basic_salary"] ?>" class="form-control" name="basic_salary" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">work_shift</label>
                                                        <input id="shift" name="shift" placeholder="" type="text" class="form-control"  value="<?php echo $staff["shift"] ?>" />

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <label for="">work_location</label>
                                                        <input id="location" name="location" placeholder="" type="text" class="form-control"  value="<?php echo $staff["location"] ?>" />

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">date_of_leaving</label>
                                                        <input id="date_of_leaving" name="date_of_leaving" placeholder="" type="text" class="form-control"  value="<?php
                                                if ($staff["date_of_leaving"] != '0000-00-00') {
                                                    echo $staff["date_of_leaving"];
                                                }
                                                ?>" />
                                                        <span class="text-danger"><?php echo form_error('date_of_leaving'); ?></span>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="tshadow mb25 bozero">    
                                            <h4 class="pagetitleh2">leaves
                                            </h4>

                                            <div class="row around10" >
<?php
$j = 0;
foreach ($leavetypeList as $key => $leave) {
    # code...
    ?>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=""><?php echo $leave["type"]; ?></label>


                                                            <input id="ifsc_code" name="alloted_leave[]" placeholder="Number of leaves" type="text" class="form-control"  value="<?php
                                                        if (array_key_exists($j, $staffLeaveDetails)) {
                                                            echo $staffLeaveDetails[$j]["alloted_leave"];
                                                        }
    ?>" />

                                                            <input  name="leave_type[]" placeholder="" type="hidden" readonly class="form-control"  value="<?php echo $leave["type"] ?>" />

                                                            <input  name="altid[]" placeholder="" type="hidden" readonly class="form-control"  value="<?php
                                                if (array_key_exists($j, $staffLeaveDetails)) {
                                                    echo $staffLeaveDetails[$j]["altid"];
                                                }
                                                ?>" />

                                                            <input  name="leave_type_id[]" placeholder="" type="hidden" class="form-control"  value="<?php echo $leave["id"]; ?>" />
                                                            <span class="text-danger"><?php echo form_error('ifsc_code'); ?></span>
                                                        </div>
                                                    </div>


    <?php
    $j++;
}
?>

                                            </div>
                                        </div>
                                        <div class="tshadow mb25 bozero">    
                                            <h4 class="pagetitleh2">bank_account_details
                                            </h4>
                                            <div class="row around10">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">account_title</label>
                                                        <input id="account_title" name="account_title" placeholder="" type="text" class="form-control"  value="<?php echo $staff["account_title"] ?>" />
                                                        <span class="text-danger"><?php echo form_error('bank_account_no'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">bank_account_no</label>
                                                        <input id="bank_account_no" name="bank_account_no" placeholder="" type="text" class="form-control"  value="<?php echo $staff["bank_account_no"] ?>" />
                                                        <span class="text-danger"><?php echo form_error('bank_account_no'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">bank_name</label>
                                                        <input id="bank_name" name="bank_name" placeholder="" type="text" class="form-control"  value="<?php echo $staff["bank_name"] ?>" />
                                                        <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">ifsc_code</label>
                                                        <input id="ifsc_code" name="ifsc_code" placeholder="" type="text" class="form-control"  value="<?php echo $staff["ifsc_code"] ?>" />
                                                        <span class="text-danger"><?php echo form_error('ifsc_code'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">bank_branch_name</label>
                                                        <input id="bank_branch" name="bank_branch" placeholder="" type="text" class="form-control"  value="<?php echo $staff["bank_branch"] ?>" />
                                                        <span class="text-danger"><?php echo form_error('bank_branch'); ?></span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div> 
                                          
                                        <div id='upload_documents_hide_show'>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="tshadow bozero">
                                                        <h4 class="pagetitleh2">upload_documents</h4>

                                                        <div class="row around10">   
                                                            <div class="col-md-6">
                                                                <table class="table">
                                                                    <tbody><tr>
                                                                            <th style="width: 10px">#</th>
                                                                            <th>title</th>
                                                                            <th>documents</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>1.</td>
                                                                            <td>resume</td>
                                                                            <td>
                                                                                <input class="filestyle form-control" type='file' name='first_doc' id="doc1" >
                                                                                <input class=" form-control" type='hidden' name='resume' value="<?php echo $staff["resume"] ?>" >
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>3.</td>
                                                                            <td>resignation_letter</td>
                                                                            <td>
                                                                                <input class="filestyle form-control" type='file' name='third_doc' id="doc3" >
                                                                                <input class=" form-control" type='hidden' name='resignation_letter' value="<?php echo $staff["resignation_letter"] ?>" >
                                                                            </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <table class="table">
                                                                    <tbody><tr>
                                                                            <th style="width: 10px">#</th>
                                                                            <th>title</th>
                                                                            <th>documents</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2.</td>
                                                                            <td>joining_letter</td>
                                                                            <td>
                                                                                <input class="filestyle form-control" type='file' name='second_doc' id="doc2" >
                                                                                <input class=" form-control" type='hidden' name='joining_letter' value="<?php echo $staff["joining_letter"] ?>" >
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>4.</td>
                                                                            <td>other_documents<input type="hidden" name='fourth_title' value="<?php echo $staff["other_document_file"] ?>" class="form-control" placeholder="Other Documents"></td>
                                                                            <td>
                                                                                <input class="filestyle form-control" type='file' name='fourth_doc'  id="doc4" >
                                                                                <input class=" form-control" type='hidden' name='other_document_file' value="<?php echo $staff["other_document_file"] ?>" >
                                                                            </td>
                                                                        </tr>

                                                                    </tbody></table>
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
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">save</button>
                        </div>
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
                    </div>
                </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
      //  var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#dob,#admission_date').datepicker({
           // format: date_format,
            autoclose: true
        });
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>

                
    
   
