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
                
                <div class="white-box">
                    
                    
                    <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> select_criteria</h3>
                    </div>
                    <div class="box-body">
                        <?php if ($this->session->flashdata('msg')) { ?> 
                        <div class="alert alert-success"> 
                              <?php echo $this->session->flashdata('msg') ?> 
                        </div> 
                            <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('webadmin/student/disablestudentslist') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-6">
                                            <div class="form-group"> 
                                                <label>class</label><small class="req"> *</small>
                                                <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                                    <option value="">select</option>
                                                    <?php
                                                    foreach ($classlist as $class) {
                                                        ?>
                                                        <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                                        <?php
                                                        $count++;
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div>  
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>section</label>
                                                <select  id="section_id" name="section_id" class="form-control" >
                                                    <option value="">select</option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            </div>   
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> search</button>
                                            </div>
                                        </div>
                                </div>  
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('webadmin/student/disablestudentslist') ?>" method="post" class="">
                                       
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>search_by_keyword</label>
                                                <input type="text" name="search_text" class="form-control"   placeholder="search_by_student_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($resultlist)) {
                    ?>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab" aria-expanded="true">
                                    <i class="fa fa-list"></i> list  view</a></li>
                           
                        </ul>
                        <div class="tab-content">
                           
                            <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                <table id="example23" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>admission_no</th>
                                            <th>student_name</th>
                                            <th>class</th>
                                            <th>father_name</th>
                                            <th>date_of_birth</th>
                                            <th>gender</th>
                                            <th>category</th>
                                            <th>mobile_no</th>

                                            <th class="text-right">action</th>
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
                                                    <td><?php  if((!empty($student['dob'])) && ($student['dob'] != null) ){ echo $student['dob']; } ?></td>
                                                    <td><?php echo $student['gender']; ?></td>
                                                    <td><?php echo $student['category']; ?></td>
                                                    <td><?php echo $student['mobileno']; ?></td>

                                                    <td class="pull-right">
                                                        <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="show" >
                                                            <i class="fa fa-reorder"></i>
                                                        </a>
                                                        <!--a href="<?php echo base_url(); ?>student/edit/<?php echo $student['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?>studentfee/addfee/<?php echo $student['id'] ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('add_fees'); ?>">
                                                            <?php echo $currency_symbol; ?>
                                                        </a-->
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
                                                                                     
                                                            </div>                                                         
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
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