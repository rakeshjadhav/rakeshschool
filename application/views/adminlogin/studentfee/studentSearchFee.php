<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
        .print, .print *
        {
            display: block;
        }
    }
    .print, .print *
    {
        display: none;
    }
</style>
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
                <div class="white-box panel box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> select_criteria</h3>
                    </div>
                    <form action="<?php echo site_url('webadmin/studentfee/feesearch') ?>"  method="post" accept-charset="utf-8">
                        <div class="panel-body">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">fees_group</label><small class="req"> *</small>
                                        <select autofocus="" id="feegroup_id" name="feegroup_id" class="form-control" >
                                            <option value="">select</option>
                                            <?php
                                            foreach ($feesessiongrouplist as $feecategory) {
                                                ?>
                                                <optgroup label="<?php echo $feecategory->group_name; ?>">
                                                    <?php
                                                    if (!empty($feecategory->feetypes)) {
                                                        foreach ($feecategory->feetypes as $fee_key => $fee_value) {
                                                            ?>
                                                            <option value="<?php echo $feecategory->id . "-" . $fee_value->id; ?>"><?php echo $fee_value->code; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </optgroup>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('feegroup_id'); ?></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">class</label><small class="req"> *</small>
                                        <select  id="class_id" name="class_id" class="form-control" >
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
                                <div class="col-md-4">
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
                            <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-search"></i> search</button>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($student_due_fee)) {
                    ?>
                    <div class="white-box box-info" id="duefee">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"><i class="fa fa-users"></i> student_lists</h3>
                        </div>
                        <div class="box-body table-responsive">
                            <div class="row print" >
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <b>class: </b> <span class="cls"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <b>fees_category: </b><span class="fcat"></span>
                                    </div><div class="col-md-4">
                                        <b>fees_type: </b> <span class="ftype"></span>
                                    </div>
                                </div>
                            </div>
                           
                            <table id="example23" class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>

                                        <th>admission_no</th>
                                        <th>roll_no</th>
                                        <th>student name</th>
                                        <th>date_of_birth</th>
                                        <th>due_date</th>
                                        <th class="text text-right">amount <span>Rs</span></th>
                                        <th class="text text-right">deposit <span>Rs</span></th>
                                        <th class="text text-right">discount <span>Rs</span></th>
                                        <th class="text text-right">fin <span>Rs</span></th>

                                        <th class="text text-right">balance <span>Rs</span></th>

                                        <th class="text text-right">action</th>
                                    </tr>
                                </thead>    
                                <tbody> 
                                    <?php if (empty($student_due_fee)) {
                                        ?>
                                        <tr>
                                            <td colspan="11" class="text-danger text-center">no_record_found</td>
                                        </tr>
                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($student_due_fee as $student) {
                                            ?>
                                            <tr>

                                                <td><?php echo $student['admission_no']; ?></td>
                                                <td><?php echo $student['roll_no']; ?></td>
                                                <td><?php echo $student['firstname'] . " " . $student['lastname']; ?></td>
                                                <td><?php echo $student['dob']; ?></td>
                                                <td><?php echo $student['due_date']; ?></td>

                                                <td class="text text-right"><?php
                                                    echo (number_format($student['amount'], 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo (number_format($student['amount_detail'], 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo (number_format($student['amount_discount'], 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo (number_format($student['amount_fine'], 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right"><?php
                                                    echo (number_format(($student['amount'] - ($student['amount_detail'] + $student['amount_discount'])), 2, '.', ''));
                                                    ?></td>
                                                <td class="text text-right">
                                                    <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_add')) { ?><a href="<?php echo base_url(); ?>webadmin/studentfee/addfee/<?php echo $student['id'] ?>" class="btn btn-info btn-xs">
                                                            <?php echo "add fees" ?>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            
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