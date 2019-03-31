<?php
//$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> ||Student Fees Collection
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Search Student  Fees Collection</li>
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
                                          <i class="fa fa-file-excel-o"></i> || Search Student
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>
                                       <div class="col-sm-6 col-xs-6">
                                          <form class="assign_teacher_form" action="<?php echo site_url('webadmin/studentfee/search') ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label>Class</label>
                                                      <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-university"></i></div>
                                                       <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                                    <option value="">Select</option>
                                                    <?php
                                                    foreach ($classlist as $class) {
                                                        ?>
                                                        <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div>
                                           </div>
                                              </div>
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Division</label>
                                                 <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                <select  id="section_id" name="section_id" class="form-control"  >
                                                        <option value="">Select</option>
                                                </select>
                                                 </div>
                                              <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            </div>
                                           </div>
                                              
                                           <!--</div>-->
                                        <button type="submit"  name="search" value="search_filter" class="btn btn-primary pull-right btn-sm checkbox-toggle"> <i class="fa fa-search"></i> Search</button>
                                       </form>
                                       </div>
                                          <div class="col-sm-6 col-md-6">
                                              <form role="form" action="<?php echo site_url('webadmin/student/search') ?>" method="post" class="">
                                                <?php echo $this->customlib->getCSRF(); ?>
                                              <!--<div class="col-md-6">-->
                                            <div class="form-group">
                                                <label>Search By Keyword</label>
                                                 <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                <input type="text" name="search_text" class="form-control"   placeholder="search_by_name,_roll_no,_enroll_no,_national_identification_no,_local_identification_no_etc..">
                                                 </div>
                                              <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            <!--</div>-->
                                           </div>
                                              <button type="submit" name="search" value="search_full" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> Search</button>
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
                           <?php
                if (isset($resultlist)) {
                    ?>
                    <div class="white-box box-info">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"><i class="fa fa-users"></i> Students Lists
                                </i> <?php echo form_error('student'); ?></h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="box-body table-responsive">

                            
                            <table id="example23" class="table table-striped table-bordered table-hover example">
                                <thead>

                                    <tr>
                                        <th>Class</th>
                                        <th>Division</th>
                                        <th>Admission_no</th>
                                        <th>Student Name</th>
                                        <th>Father_name</th>
                                        <th>Date_of_birth</th>
                                        <th>Phone</th>
                                        <th class="text-right">Action</th>

                                    </tr>
                                </thead>            
                                <tbody>    
                                    <?php
                                    $count = 1;
                                    foreach ($resultlist as $student) {
                                        ?>
                                        <tr>
                                            <td><?php echo $student['class']; ?></td>
                                            <td><?php echo $student['division']; ?></td>
                                            <td><?php echo $student['admission_no']; ?></td>
                                            <td><?php echo $student['firstname'] . " " . $student['lastname']; ?></td>
                                            <td><?php echo $student['father_name']; ?></td>
                                            <td><?php
                                                if (!empty($student['dob'])) {
                                                    echo $student['dob'];
                                                }
                                                ?></td>
                                            <td><?php echo $student['guardian_phone']; ?></td>
                                            <td class="">
                                                    <?php //if ($this->rbac->hasPrivilege('collect_fees', 'can_add')) { ?>
                                                    <a  href="<?php echo base_url(); ?>webadmin/studentfee/addfee/<?php echo $student['id'] ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="" data-original-title="">
                                                     Collect_fees
                                                    </a>
        <?php } ?>
                                            </td>

                                        </tr>
                                        <?php
                                   // }
                                    $count++;
                                    ?>
                                </tbody></table>
                        </div>
                    </div>
                    <?php
                }
                ?>
                             </div> 
                        </div>
                    </div>
                </div>

<script type="text/javascript">
                function getSectionByClass(class_id, section_id) {
                    if (class_id != "" && section_id != "") {
                        $('#section_id').html("");
                        var base_url = '<?php echo base_url() ?>';
                        var div_data = '<option value="">Select </option>';
                        $.ajax({
                            type: "GET",
                            url: base_url + "webadmin/sections/getByClass",
                            data: {'class_id': class_id},
                            dataType: "json",
                            success: function (data) {
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
                    var class_id = $('#class_id').val();
                    var section_id = '<?php echo set_value('section_id') ?>';
                    getSectionByClass(class_id, section_id);
                    $(document).on('change', '#class_id', function (e) {
                        $('#section_id').html("");
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
                                $('#section_id').append(div_data);
                            }
                        });
                    });
                });
            </script>