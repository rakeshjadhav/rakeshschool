
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Search Student
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Search Student</li>
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
                                          <i class="fa fa-search"></i> || Search Student
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
                                          <form class="assign_teacher_form" action="<?php echo site_url('webadmin/student/search') ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label>Class Name</label>
                                                      <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-university"></i></div>
                                                        <select  id="class_id" name="class_id" class="form-control" >
                                                         <option value="">Select</option>
                                                            <?php
                                                            $count = 1;
                                                            foreach ($classlist as $class) {
                                                                ?>
                                                                <option value="<?php echo $class['id'] ?>"><?php echo $class['class'] ?></option>
                                                                <?php
                                                                $count++;}
                                                            ?>
                                                       </select>
                                                 </div>
                                              <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div>
                                           </div>
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Division Name</label>
                                                 <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
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
                                                       <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                <input type="text" name="search_text" class="form-control"   placeholder="search by name,roll no,enroll no,national identification no,local identification no etc..">
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
                      <div class="white-box">
                         <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span>
                                        <span class="hidden-xs"><i class="fa fa-list fa-fw"></i> Search Students List</span></a></li>
                                
                            </ul>
                            
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    
                               <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                <table id="myTable" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Admission No</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Father Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Gender</th>
                                            <th>Category</th>
                                            <th>Mobile No</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($resultlist)) {
                                            ?>
                                            <?php
                                        } else {
                                            $count = 1;
                                            foreach ($resultlist as $student) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $student['admission_no']; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['id']; ?>"><?php echo $student['firstname'] . " " . $student['lastname']; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $student['class'] . "(" . $student['division'] . ")" ?></td>
                                                    <td><?php echo $student['father_name']; ?></td>
                                                    <td><?php echo $student['dob']; ?></td>
                                                    <td><?php echo $student['gender']; ?></td>
                                                    <td><?php echo $student['category']; ?></td>
                                                    <td><?php echo $student['mobileno']; ?></td>

                                                    <td class="" style="">
                                                        <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['id'] ?>" class="btn btn-xs  btn-info "  data-toggle="tooltip" title="Show" >
                                                            <i class="fa fa-reorder "></i>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>webadmin/student/edit/<?php echo $student['id'] ?>" class="btn btn-xs btn-primary "  data-toggle="tooltip" title="Edit">
                                                            <i class="fa fa-pencil "></i>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>webadmin/studentfee/addfee/<?php echo $student['id'] ?>" class=" btn-xs btn-danger" data-toggle="tooltip" title="" data-original-title="Add Fees">
                                                              <i class="fa fa-rupee "></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                                <!--</div>-->
                                
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                

                            </div>
                            
                        <?php
                              }
                              ?>
                          <!--//end forech-->
                          </div>
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