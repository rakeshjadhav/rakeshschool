
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
                                       <div class="col-sm-12 col-xs-12">
                                         <form id='form1' action="<?php echo site_url('webadmin/stdtransfer/index') ?>"  method="post" accept-charset="utf-8">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                              <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label>Class</label>
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
                                           <button type="submit" class="btn btn-primary pull-right">Search</button>
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
                <input type="hidden" class="class_post" value="<?php echo $class_post; ?>" >
                <input type="hidden" class="section_post" value="<?php echo $section_post; ?>" >
                         <div class="white-box">
                            <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-list"></i> Promote Students In Next Session</h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                            
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    
                                <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                <form action="#"  method="post" accept-charset="utf-8" class="promote_form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Promote In Session </label>
                                        <select  id="session_id" name="session_id" class="form-control" >
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($sessionlist as $session) {
                                                ?>
                                                <option value="<?php echo $session['id'] ?>" ><?php echo $session['session'] ?></option>
                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger" id="session_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select  id="class_promote_id" name="class_promote_id" class="form-control" >
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>" ><?php echo $class['class'] ?></option>
                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger" id="class_promote_id_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Section</label>
                                        <select  id="section_promote_id" name="section_promote_id" class="form-control" >
                                            <option value="">Select</option>
                                        </select>
                                        <span class="text-danger" id="section_promote_id_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">    
                                  <table id="example23" class="display nowrap" >
                                    <tbody>
                                        <tr>
                                            <th>Admission No</th>
                                            <th>Student Name</th>
                                            <th>Father Name</th>
                                            <th>Sate Of Birth</th>
                                            <th class="">Current Result</th>
                                            <th class="">Next Session Status</th>
                                        </tr>
                                        <?php if (empty($resultlist)) {
                                            ?>
                                            <tr>
                                                <td colspan="12" class="text-danger text-center">
                                                    No Record Found
                                                </td>
                                            </tr>
                                            <?php
                                        } else {
                                            $count = 1;
                                            foreach ($resultlist as $student) {
                                                ?>
                                            <input type="hidden" value="<?php echo $student['id']; ?>">
                                            <input type="hidden" name="student_list[]" value="<?php echo $student['id']; ?>">
                                            <tr>
                                                <td><?php echo $student['admission_no']; ?></td>
                                                <td><?php echo $student['firstname'] . " " . $student['lastname']; ?></td>
                                                <td><?php echo $student['father_name']; ?></td>
                                                <td><?php echo $student['dob']; ?></td>
                                                <td>
                                                    <div class="radio-inline">
                                                        <label>
                                                            <input type="radio" name="result_<?php echo $student['id']; ?>" checked="checked" value="pass">
                                                            Pass
                                                        </label>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <label>
                                                            <input type="radio"  name="result_<?php echo $student['id']; ?>" value="fail">
                                                            Fail
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio-inline">
                                                        <label>
                                                            <input type="radio" name="next_working_<?php echo $student['id']; ?>" checked="checked" value="countinue">
                                                           Continue
                                                        </label>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <label>
                                                            <input type="radio" name="next_working_<?php echo $student['id']; ?>" value="leave">
                                                          Leave
                                                        </label>
                                                    </div>
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
                         </form> 
                       <div class="box-footer clearfix" >
                        <?php
                        if (!empty($resultlist)) {
                            ?>

                            <a class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#pramoteStudentModal">Promote</a>
                            <?php
                        }
                        ?>
                    </div>
                </div> 
                <?php
            } else {
                
            }
            ?>
                    </div>
                    <!--</form>-->
                            </div>
                                </div>
                                
                   <div class="box-footer">
                            <div class="mailbox-controls">
                            </div>
                        </div>
                            </div>
                            
                      
                          <!--//end forech-->
                          </div>
                             </div> 
                        </div>
                    </div>
                </div>

<div class="modal" id="pramoteStudentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Promote Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure! You want to promote students?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pramote_student">Save</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
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
            var div_data = '<option value="">select</option>';
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
        $(document).on('change', '#feecategory_id', function (e) {
            $('#feetype_id').html("");
            var feecategory_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">select</option>';
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/feemaster/getByFeecategory",
                data: {'feecategory_id': feecategory_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.type + "</option>";
                    });
                    $('#feetype_id').append(div_data);
                }
            });
        });
    });

    $(document).on('change', '#class_promote_id', function (e) {
        $('#section_promote_id').html("");
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
                $('#section_promote_id').append(div_data);
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#pramoteStudentModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        })

        $('#pramoteStudentModal').on('click', '.pramote_student', function (e) {
            var $modalDiv = $(e.delegateTarget);
            var datastring = $(".promote_form").serialize();
            var class_promote = $(".class_promote_id").val();
            var section_promote = $(".section_promote_id").val();
            var class_post = $(".class_post").val();
            var section_post = $(".section_post").val();
            $.ajax({
                type: "POST",

                url: '<?php echo site_url("webadmin/stdtransfer/promote") ?>',
                data: datastring + '&class_post=' + class_post + '&section_post=' + section_post,
                beforeSend: function () {

                    $modalDiv.addClass('modal_loading');
                },
                success: function (data) {
                    $('.sessionmodal_body').html(data);
                    var data = (JSON.parse(data));
                    if (data.status == "fail") {
                        $.each(data.msg, function (index, value) {
                            var errorDiv = '#' + index + '_error';

                            $(errorDiv).addClass('required');
                            $(errorDiv).empty().append(value);
                        });

                    } else {
                        successMsg("Students are successfully promoted");
                        location.reload(true);

                    }
                    $('#pramoteStudentModal').modal('hide');
                },
                error: function (xhr) { // if error occured
                    $modalDiv.removeClass('modal_loading');
                },
                complete: function () {
                    $modalDiv.removeClass('modal_loading');
                },
            });

        });

    });
</script>

