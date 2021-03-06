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

                    <form role="form" action="<?php echo site_url('webadmin/users/logindetailreport') ?>" method="post" class="">
                        <div class="box-body row">

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>class</label>
                                    <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                        <option value="">select</option>
                                        <?php
                                        foreach ($classlist as $class) {
                                            ?>
                                            <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?> ><?php echo $class['class'] ?></option>
                                            <?php
                                            $count++;
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                </div>
                            </div> 
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>section</label>
                                    <select autofocus="" id="section_id" name="section_id" class="form-control" >
                                        <option value="">select</option>

                                    </select>
                                    <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                </div>
                            </div> 


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i>Search</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>

            <div class="box box-info" style="padding:5px;">
                <div class="box-header ptbnull">
                    <h3 class="box-title titlefix"><i class="fa fa-users"></i> login_credential report</h3>
                </div>
                <div class="box-body table-responsive">

                    <table id="example23" class="table table-striped table-bordered table-hover example">
                        <thead>
                            <tr>
                                <th>admission_no</th>
                                <th>student_name</th>
                                <th>username</th>
                                <th>password</th>
                                <th>parent username</th>
                                <th>parent password</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($resultlist)) {
                                ?>

                                <?php
                            } else {
                                $count = 1;
                                $i = 0;
                                foreach ($resultlist as $student) {
                                    ?>
                                    <tr <?php
                                    if ($student["is_active"] == "no") {
                                        echo "class='danger'";
                                    }
                                    ?>>
                                        <td><?php echo $student['admission_no']; ?></td>

                                        <td>
                                            <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['id']; ?>"><?php echo $student['firstname'] . " " . $student['lastname']; ?>
                                            </a>
                                        </td>


                                        <td><?php
                                    if (isset($student['student_username'])) {
                                        echo $student['student_username'];
                                    }
                                    ?></td>

                                        <td><?php
                                            if (isset($student['student_password'])) {
                                                echo $student['student_password'];
                                            }
                                            ?></td>
                                        <td><?php
                                            if (isset($student['parent_username'])) {
                                                echo $student['parent_username'];
                                            }
                                            ?></td>

                                        <td><?php
                                    if (isset($student['parent_password'])) {
                                        echo $student['parent_password'];
                                    }
                                    ?></td>


                                    </tr>
        <?php
        $i++;
        $count++;
    }
}
?>
                        </tbody>
                    </table>
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
                