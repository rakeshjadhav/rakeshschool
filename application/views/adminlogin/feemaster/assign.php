<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Fees Collection
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Assign Fees</li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
            <div class="col-md-12">
                <div class="white-box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Select Criteria</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="<?php echo site_url('webadmin/feemaster/assign/' . $id) ?>" method="post" class="form-horizontal">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label>Class</label>
                                    <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($classlist as $class) {
                                            ?>
                                            <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                            <?php
                                           // $count++;
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                </div>
                                <div class="col-sm-3">
                                    <label>Division</label>
                                    <select  id="section_id" name="division_id" class="form-control" >
                                        <option value="">Select</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                </div>
                                <div class="col-sm-2">
                                    <label>Category</label>
                                    <select  id="category_id" name="category_id" class="form-control" >
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($categorylist as $category) {
                                            ?>
                                            <option value="<?php echo $category['id'] ?>" <?php if (set_value('category_id') == $category['id']) echo "selected=selected"; ?>><?php echo $category['category'] ?></option>
                                            <?php
                                            //$count++;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select</option>
                                        <?php
                                          foreach ($genderList as $key => $value) {
                                            ?>
                                            <option style="color:#000" value="<?php echo $key; ?>" <?php if (set_value('gender') == $key) echo "selected"; ?>><?php echo $key; ?></option>
                                            <?php } ?>
                                        
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label>Rte</label>
                                    <select  id="rte" name="rte" class="form-control" >
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($RTEstatusList as $k => $rte) {
                                            ?>
                                            <option value="<?php echo $k; ?>" <?php if (set_value('rte') == $k) echo "selected"; ?>><?php echo $rte; ?></option>

                                            <?php
                                           // $count++;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                
                <form method="post" action="<?php echo site_url('webadmin/studentfee/addfeegroup') ?>" id="assign_form">
                    <?php
                    if (isset($resultlist)) {
                        ?>
                        <div class="white-box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-users"></i>Assign Fees Group
                                    </i> <?php echo form_error('student'); ?></h3>
                                <div class="box-tools pull-right">
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="table-responsive">
                                                <?php
                                                foreach ($feegroupList as $feegroup) {
                                                    ?>
                                                    <h4>
                                                        <input type="hidden" name="fee_session_groups" value="<?php echo $feegroup->id; ?>">
                                                        <a href="#" data-toggle="popover" class="detail_popover"><?php echo $feegroup->group_name; ?></a>
                                                    </h4>
                                                    <table class="table">
                                                        <tbody>
                                                            <?php
                                                            if (empty($feegroup->feetypes)) {
                                                                ?>

                                                            <td colspan="5" class="text-danger text-center">No Record Found</td>
                                                            <?php
                                                        } else {

                                                            foreach ($feegroup->feetypes as $feetype_key => $feetype_value) {
                                                                ?>
                                                                <tr class="mailbox-name">
                                                                    <td>
                                                                        <?php echo $feetype_value->code; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo " Rs ". $feetype_value->amount; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        </tr>

                                                        </tbody></table>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class=" table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th><input type="checkbox" id="select_all"/> All</th>
                                                            <th>Admission No</th>
                                                            <th>Student Name</th>
                                                            <th>Class</th>
                                                            <th>Father Name</th>
                                                            <th>Category</th>
                                                            <th>Gender</th>
                                                        </tr>
                                                        <?php
                                                        if (empty($resultlist)) {
                                                            ?>
                                                            <tr>
                                                                <td colspan="7" class="text-danger text-center">No Record Found</td>
                                                            </tr>
                                                            <?php
                                                        } else {
                                                            $count = 1;
                                                            foreach ($resultlist as $student) {
                                                                ?>
                                                                <tr>

                                                                    <td> 
                                                                        <?php
                                                                        if ($student['student_fees_master_id'] != 0) {
                                                                            $sel = "checked='checked'";
                                                                        } else {
                                                                            $sel = "";
                                                                        }
                                                                        ?>
                                                                        <input class="checkbox" type="checkbox" name="student_session_id[]"  value="<?php echo $student['student_session_id']; ?>" <?php echo $sel; ?>/>
                                                                        <input type="hidden" name="student_fees_master_id_<?php echo $student['student_session_id']; ?>" value="<?php echo $student['student_fees_master_id']; ?>">
                                                                        <input type="hidden" name="student_ids[]" value="<?php echo $student['student_session_id']; ?>">
                                                                    </td>

                                                                    <td><?php echo $student['admission_no']; ?></td>
                                                                    <td><?php echo $student['firstname'] . " " . $student['lastname']; ?></td>
                                                                    <td><?php echo $student['class'] . "(" . $student['division'] . ")" ?></td>
                                                                    <td><?php echo $student['father_name']; ?></td>
                                                                    <td><?php echo $student['category']; ?></td>
                                                                    <td><?php echo $student['gender']; ?></td>

                                                                </tr>
                                                                <?php
                                                            }
                                                            $count++;
                                                        }
                                                        ?>
                                                    </tbody></table>

                                            </div>
                                            <button type="submit" class="allot-fees btn btn-primary btn-sm pull-right" id="load" >Save
                                            </button>

                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </form>
            </div>
                    
<script type="text/javascript">

//select all checkboxes
    $("#select_all").change(function () {  //"select all" change 
        $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });

//".checkbox" change 
    $('.checkbox').change(function () {
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if (false == $(this).prop("checked")) { //if this item is unchecked
            $("#select_all").prop('checked', false); //change "select all" checked status to false
        }
        //check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $("#select_all").prop('checked', true);
        }
    });

    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
           // alert(base_url);
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                  //  alert(data);
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

    $("#assign_form").submit(function (e) {
        if (confirm('Are you sure?')) {
            var $this = $('.allot-fees');
           // alert("1");
            //$this.button('loading');
            $.ajax({
                type: "POST",
                dataType: 'Json',
                url: $("#assign_form").attr('action'),
                data: $("#assign_form").serialize(), // serializes the form's elements.
                success: function (data){
                    //alert(data);
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {

                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        //alert"1";
                        successMsg(data.message);
                        window.location.reload();
                    }

                    $this.button('reset');
                    window.location.reload();
                }
            });

        }
        e.preventDefault();
        window.location.reload();

    });


</script>