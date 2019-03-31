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
                             <li class="active">Add Fees Master</li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
            <div class="col-md-12">
                <div class="white-box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> select_criteria</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="<?php echo site_url('webadmin/feediscount/assign/' . $id) ?>" method="post" class="form-horizontal">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="form-group">
                                <div class="col-sm-3">
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
                                <div class="col-sm-3">
                                    <label>section</label>
                                    <select  id="section_id" name="section_id" class="form-control" >
                                        <option value="">select</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                </div>
                                <div class="col-sm-2">
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
                                <div class="col-sm-2">
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
                                <div class="col-sm-2">
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
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> search</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <form method="post" action="<?php echo site_url('webadmin/feediscount/studentdiscount') ?>" id="assign_form">


                    <?php
                    if (isset($resultlist)) {
                        ?>
                        <div class="white-box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-users"></i> assign_fees_discount
                                    </i> <?php echo form_error('student'); ?></h3>
                                <div class="box-tools pull-right">
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <div class="row">
                                    <div class="col-md-12">


                                        <div class="col-md-4">

                                            <div class="table-responsive">
                                                <h4>
                                                    fees_discount
                                                </h4>
                                                <table class="table">
                                                    <tbody>

                                                        <tr class="mailbox-name">
                                                    <input type="hidden" name="feediscount_id"value="<?php echo $feediscountList['id']; ?>">
                                                    <td>
                                                        <?php echo $feediscountList['code']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo  $feediscountList['amount']; ?>
                                                    </td>
                                                    </td>
                                                    </tr>
                                                    </tbody></table>

                                            </div>
                                        </div>
                                        <div class="col-md-8">


                                            <div class=" table-responsive">

                                                <table id="example23" class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th><input type="checkbox" id="select_all"/> all</th>

                                                            <th>admission_no</th>
                                                            <th>student_name</th>
                                                            <th>class</th>
                                                            <th>father_name</th>
                                                            <th>category</th>
                                                            <th>gender</th>



                                                        </tr>
                                                        <?php
                                                        if (empty($resultlist)) {
                                                            ?>
                                                            <tr>
                                                                <td colspan="6" class="text-danger text-center">no_record_found</td>
                                                            </tr>
                                                            <?php
                                                        } else {
                                                            $count = 1;
                                                            foreach ($resultlist as $student) {
                                                                ?>
                                                            <input type="hidden" name="student_list[]" value="<?php echo $student['student_session_id'] ?>">
                                                            <tr>

                                                                <td> 
                                                                    <?php
                                                                    if ($student['student_fees_discount_id'] != 0) {
                                                                        $sel = "checked='checked'";
                                                                    } else {
                                                                        $sel = "";
                                                                    }
                                                                    ?>
                                                                    <input class="checkbox" type="checkbox" name="student_session_id[]"  value="<?php echo $student['student_session_id']; ?>" <?php echo $sel; ?>/>
                                                                </td>

                                                                <td><?php echo $student['admission_no']; ?></td>
                                                                <td><?php echo $student['firstname'] . " " . $student['lastname']; ?></td>
                                                                <td><?php echo $student['class'] . "(" . $student['section'] . ")" ?></td>
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
                                            <button type="submit" class="allot-fees pull-right btn btn-primary btn-sm " id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait..">Save
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



<div class="modal" id="confirmModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure to assign fees discount?</p>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn btn-danger btn secondary">No</a>
                <a href="#" id="delete-btn" class="btn btn-confirm confirm">Yes</a>

            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).on('submit', '#assign_form', function (e) {
        e.preventDefault();
        $('#confirmModal').modal({backdrop: 'static', keyboard: false});
    });

    $(document).on('click', '#delete-btn', function (e) {

        //===================
        var $this = $('.allot-fees');
        var confirm_modal = $('#confirmModal');
        $.ajax({
            type: "POST",
            dataType: 'Json',
            url: $("#assign_form").attr('action'),
            data: $("#assign_form").serialize(),
            beforeSend: function () {

                confirm_modal.addClass('modal_loading');
            },
            success: function (data)
            {
                if (data.status == "fail") {
                    var message = "";
                    $.each(data.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(data.message);
                }

                confirm_modal.modal('hide');
            },
            error: function (xhr) { // if error occured
                confirm_modal.removeClass('modal_loading');
            },
            complete: function () {
                confirm_modal.removeClass('modal_loading');
            },
        });
        //====================

    });

</script>