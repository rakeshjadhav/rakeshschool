
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
                <div class="">
                    
                    
                     <div class="row">
            <div class="col-md-12">
                <div class="white-box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search fa-fw"></i> Select_criteria</h3>
                    </div>
                    <form action="<?php echo site_url('webadmin/transaction/studentacademicreport') ?>"  method="post" accept-charset="utf-8">
                        <div class="white-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">class</label><small class="req"> *</small>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">section</label><small class="req"> *</small>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value="">select</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>   </div>
                    </form>
                </div>
                <?php
                if (isset($student_due_fee)) {
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="white-box box-info" id="transfee">
                                <div class="box-header ptbnull">
                                    <h3 class="box-title titlefix"><i class="fa fa-users"></i> 
                                        student_fees_report</h3>
                                </div>                              
                                <div class="box-body table-responsive">
                                       
                                    <table id="example23" class="table table-striped table-bordered table-hover example">
                                        <thead>
                                            <tr>
                                                <th class="text text-left">student_name</th>
                                                <th class="text text-left">admission_no</th>
                                                <th class="text text-left">roll_no</th>
                                                <th class="text text-left">father_name</th>

                                                <th class="text text-right">total_fees <span><?php echo "Rs"; ?></span></th>
                                                <th class="text text-right">discount <span><?php echo "Rs"; ?></span></th>
                                                <th class="text text-right">fine <span><?php echo "Rs."; ?></span></th>
                                                <th class="text text-right">paid_fees <span><?php echo "Rs"; ?></span></th>

                                                <th class="text-right">Balance<span><?php echo "Rs."; ?></span></th>
                                            </tr>
                                        </thead>  
                                        <tbody>   

                                            <?php
                                            $grd_total = 0;
                                            $grd_paid = 0;
                                            $grd_discount = 0;
                                            $grd_fine = 0;
                                            if (!empty($student_due_fee)) {
                                                foreach ($student_due_fee as $key => $student) {


                                                    if ($student->totalfee != "N/A") {

                                                        $grd_total = $grd_total + $student->totalfee;
                                                    }
                                                    if ($student->deposit != "N/A") {

                                                        $grd_paid = $grd_paid + $student->deposit;
                                                    }
                                                    if ($student->discount != "N/A") {

                                                        $grd_discount = $grd_discount + $student->discount;
                                                    }
                                                    if ($student->fine != "N/A") {

                                                        $grd_fine = $fine + $student->fine;
                                                    }
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $student->name; ?>   </td>
                                                        <td><?php echo $student->admission_no; ?>   </td>
                                                        <td><?php echo $student->roll_no; ?></td>
                                                        <td><?php echo $student->father_name; ?>   </td>

                                                        <td class="text text-right">

                                                            <?php
                                                            if ($student->totalfee === "N/A") {
                                                                ?>
                                                                <span class="text text-red righttext">xxx</span>
                                                                <?php
                                                            } else {

                                                                echo (number_format($student->totalfee, 2, '.', ''));
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text text-right">

                                                            <?php
                                                            if ($student->discount === "N/A") {
                                                                echo $student->discount;
                                                                ?>

                                                                <span class="text text-red righttext">xxx</span>
                                                                <?php
                                                            } else {
                                                                echo (number_format($student->discount, 2, '.', ''));
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text text-right">

                                                            <?php
                                                            if ($student->fine === "N/A") {
                                                                ?>
                                                                <span class="text text-red righttext">xxx</span>
                                                                <?php
                                                            } else {
                                                                echo (number_format($student->fine, 2, '.', ''));
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text text-right">

                                                            <?php
                                                            if ($student->deposit === "N/A") {
                                                                ?>
                                                                <span class="text text-red righttext">xxx</span>
                                                                <?php
                                                            } else {
                                                                echo (number_format($student->deposit, 2, '.', ''));
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-right">

                                                            <?php
                                                            if ($student->balance === "N/A") {
                                                                ?>
                                                                <span class="text text-red righttext">xxx</span>
                                                                <?php
                                                            } else {
                                                                echo (number_format($student->balance, 2, '.', ''));
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="8" class="text-danger text-center">
                                                        <span class="input input-danger"><?php echo $this->lang->line('no_record_found'); ?></span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                            <?php
                                        }
                                        ?>
                                        <tr  class="box box-solid total-bg">
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td class="text text-right">
                                                <?php echo $this->lang->line('grand_total'); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo (number_format($grd_total, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo (number_format($grd_discount, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo (number_format($grd_fine, 2, '.', '') ); ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php echo (number_format($grd_paid, 2, '.', '') ); ?>
                                            </td> 

                                            <td class="text text-right">
                                                <?php echo (number_format(($grd_total - ($grd_paid + $grd_discount)), 2, '.', '')); ?>
                                            </td>
                                        </tr>

                                        </tbody> 
                                    </table>
                                </div>                            
                            </div>                       
                        </div>
                    </div>
                    <?php
                }
                ?>
       
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