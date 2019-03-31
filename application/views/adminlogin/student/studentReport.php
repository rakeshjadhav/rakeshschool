
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
                <div class="panel box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> select_criteria</h3>
                    </div>

                    <form role="form" action="<?php echo site_url('webadmin/student/studentreport') ?>" method="post" class="">
                        <div class="box-body row">

                           

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>class</label>
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
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">  
                                    <label>section</label>
                                    <select  id="section_id" name="section_id" class="form-control" >
                                        <option value="">select</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                </div>  
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <div class="form-group"> 
                                    <label>category</label>
                                    <select  id="category_id" name="category_id" class="form-control" >
                                        <option value="">select</option>
                                        <?php
                                        foreach ($categorylist as $category) {
                                            ?>
                                            <option value="<?php echo $category['id'] ?>" <?php if (set_value('category_id') == $category['id']) echo "selected=selected"; ?>><?php echo $category['category'] ?></option>
                                            <?php
                                            $count++;
                                        }
                                        ?>
                                    </select>
                                </div>  
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <div class="form-group">
                                    <label>gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">select</option>
                                        <?php
                                        foreach ($genderList as $key => $value) {
                                            ?>
                                            <option value="<?php echo $key; ?>" <?php if (set_value('gender') == $key) echo "selected"; ?>><?php echo $key; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>  
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <div class="form-group"> 
                                    <label>rte</label>
                                    <select  id="rte" name="rte" class="form-control" >
                                        <option value="">select</option>
                                        <?php
                                        foreach ($RTEstatusList as $k => $rte) {
                                            ?>
                                            <option value="<?php echo $k; ?>" <?php if (set_value('rte') == $k) echo "selected"; ?>><?php echo $rte; ?></option>

                                            <?php
                                            $count++;
                                        }
                                        ?>
                                    </select>
                                </div>  
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> 
                                        search</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
            <?php
            if (isset($resultlist)) {
                ?>
                <div class="white-box box-info" style="padding:5px;">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><i class="fa fa-users"></i> 
                            <?php echo form_error('student'); ?> 
                                student  report</h3>
                    </div>
                    <div class="box-body table-responsive">
					
                        <table id="example23" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>section</th>
                                    <th>admission_no</th>
                                    <th>student_name</th>
                                    <th>father_name</th>
                                    <th>date_of_birth</th>
                                    <th>gender</th>
                                    <th>category</th>
                                    <th>mobile_no</th>
                                    <th>national_identification_no</th>
                                    <th>local_identification_no</th>
                                    <th>rte</th>
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
                                            <td><?php echo $student['division']; ?></td>
                                            <td><?php echo $student['admission_no']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['id']; ?>"><?php echo $student['firstname'] . " " . $student['lastname']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $student['father_name']; ?></td>
                                            <td><?php echo $student['dob']; ?></td>
                                            <td><?php echo $student['gender']; ?></td>
                                            <td><?php echo $student['category']; ?></td>
                                            <td><?php echo $student['mobileno']; ?></td>
                                            <td><?php echo $student['samagra_id']; ?></td>
                                            <td><?php echo $student['adhar_no']; ?></td>
                                            <td><?php echo $student['rte']; ?></td>
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