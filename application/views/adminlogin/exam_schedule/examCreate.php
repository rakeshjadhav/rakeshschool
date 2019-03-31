
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Examinations 
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Examinations </li>
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
                                          <i class="fa fa-search"></i> || Examinations 
                                          
                                          <?php if ($this->rbac->hasPrivilege('exam_schedule', 'can_add')) { ?>
                                <a href="<?php echo base_url(); ?>webadmin/examschedule/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?></a>
                            <?php } ?>
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>
                                       <div class="col-sm-12 col-xs-6">
                                          <form class="assign_teacher_form" action="<?php echo site_url('webadmin/examschedule/create') ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="col-md-4">
                                                 <div class="form-group">
                                                    <label>exam_name</label>
                                                      <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-university"></i></div>
                                                        <select autofocus=""  id="exam_id" name="exam_id" class="form-control" >
                                            <option value="">select</option>
                                            <?php
                                            foreach ($examlist as $exam) {
                                                ?>
                                                <option value="<?php echo $exam['id'] ?>" <?php
                                                if ($exam_id == $exam['id']) {
                                                    echo "selected =selected";
                                                }
                                                ?>><?php echo $exam['name'] ?></option>

                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        
                                                 </div>
                                             <span class="text-danger"><?php echo form_error('exam_id'); ?></span>
                                            </div>
                                           </div>
                                           <div class="col-md-4">
                                            <div class="form-group">
                                        <label for="">class</label>

                                        <select  id="class_id" name="class_id" class="form-control" >
                                            <option value="">select</option>
                                            <?php
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>" <?php
                                                if ($class_id == $class['id']) {
                                                    echo "selected =selected";
                                                }
                                                ?>><?php echo $class['class'] ?></option>

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
                                        <label for="">Division</label>


                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value="">Select</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                                              
                                           <!--</div>-->
                                        <button type="submit"  name="search" value="search_filter" class="btn btn-primary pull-right btn-sm checkbox-toggle"> <i class="fa fa-search"></i> Search</button>
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
                if (isset($examSchedule)) {
                    ?>
                      <div class="white-box">
                         <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span>
                                        <span class="hidden-xs"> exam_schedule</span></a></li>
<!--                                <li role="presentation" class="">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-user"></i></span>
                                        <span class="hidden-xs">Details View</span></a>
                                </li>-->
                                
                            </ul>
                            
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    
                               <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                <div class="box-body">
                            <?php
                            if (!empty($examSchedule)) {
                                ?>
                                <form role="form" id="" class="addschedule-form" method="post" action="<?php echo site_url('webadmin/examschedule/create') ?>">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                    <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                                    <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th> subject</th>
                                                    <th>date</th>
                                                    <th>start_time</th>
                                                    <th>end_time</th>
                                                    <th>room</th>
                                                    <th>full_mark</th>
                                                    <th>passing_marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($examSchedule as $key => $value) {
                                                    ?>
                                                <input type="hidden" name="i[]" value="<?php echo $value['id'] ?>">
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <?php echo $value['name'] . " (" . substr($value['type'], 0, 2) . ".)" ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $exam_date = $value['date_of_exam'];
                                                        if ($exam_date != "") {
                                                            $exam_date = $exam_date;
                                                        }
                                                        ?>
                                                        <div class="form-group">

                                                            <input type="date" name="date_<?php echo $value['id'] ?>" class="form-control sandbox-container" id="date_<?php echo $value['id'] ?>" placeholder="Enter date" value="<?php echo $exam_date; ?>">
                                                        </div>
                                                    </td>
                                                    <td style="width:200px;">
                                                        <?php
                                                        $exam_time = $value['start_to'];

                                                        if ($exam_time != "") {
                                                            $exam_time = $exam_time;
                                                        } else {

                                                            $exam_time = " ";
                                                        }
                                                        ?>
                                                        <div class="bootstrap-timepicker">
                                                            <div class="form-group">

                                                                <div class="input-group">
                                                                    <input type="text" name="stime_<?php echo $value['id'] ?>" class="form-control timepicker" id="stime_<?php echo $value['id'] ?>" value="<?php echo $exam_time; ?>">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-clock-o"></i>
                                                                    </div>
                                                                </div><!-- /.input group -->
                                                            </div><!-- /.form group -->
                                                        </div>
                                                    </td>
                                                    <td style="width:200px;">
                                                        <div class="bootstrap-timepicker">
                                                            <div class="form-group">

                                                                <div class="input-group">
                                                                    <input type="text" name="etime_<?php echo $value['id'] ?>" class="form-control timepicker" id="etime_<?php echo $value['id'] ?>" value="<?php echo $value['end_from'] ?>">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-clock-o"></i>
                                                                    </div>
                                                                </div><!-- /.input group -->
                                                            </div><!-- /.form group -->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            <input type="text" name="room_<?php echo $value['id'] ?>" class="form-control"  id="room_<?php echo $value['id'] ?>" value="<?php echo $value['room_no'] ?>" placeholder="Enter Room">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            <input type="text" name="fmark_<?php echo $value['id'] ?>" class="form-control" id="fmark_<?php echo $value['id'] ?>" value="<?php echo $value['full_marks'] ?>" placeholder="Enter Full Marks">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            <input type="text" name="pmarks_<?php echo $value['id'] ?>" class="form-control" id="pmarks_<?php echo $value['id'] ?>" value="<?php echo $value['passing_marks'] ?>" placeholder="Enter Passing Marks">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary save_form pull-right" name="save_exam" value="save_exam">submit</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                <div class="alert alert-info">No Subject Assigned. Please assign subjects in this class.</div>
                                <?php
                            }
                            ?>

                        </div>
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
    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, section_id);
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">select</option>';
            var url = "<?php
        $userdata = $this->customlib->getUserData();
        if (($userdata["role_id"] == 2)) {
            echo "getClassTeacherSection";
        } else {
            echo "getByClass";
        }
        ?>";
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/sections/" + url,
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

        function getSectionByClass(class_id, section_id) {
            if (class_id != "" && section_id != "") {
                $('#section_id').html("");

                var base_url = '<?php echo base_url() ?>';
                var div_data = '<option value="">select</option>';
                var url = "<?php
        $userdata = $this->customlib->getUserData();
        if (($userdata["role_id"] == 2)) {
            echo "getClassTeacherSection";
        } else {
            echo "getByClass";
        }
        ?>";
                $.ajax({
                    type: "GET",
                    url: base_url + "webadmin/sections/" + url,
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


    $(document).on('change', '#section_id', function (e) {
        $("form#schedule-form").submit();
    });
</script>

<!--<script src="<?php echo base_url(); ?>backend/custom/jquery.validate.min.js"></script>-->

<div class="row">
    <div id="sandbox-container">
    </div>
</div>
</div>
</div>

<!--<script type="text/javascript" src="<?php echo base_url(); ?>backend/custom/bootstrap-datepicker.js"></script>-->

<script>
    $(function () {

        $(".timepicker").timepicker({
            showInputs: false,

        });
    });
</script>
<script>
    //var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
    $('.sandbox-container').datepicker({

        autoclose: true,
        // format : "dd-mm-yyyy"
       // format: date_format,
    });


    $(function () {
        $('.addschedule-form').validate({

            submitHandler: function (form) {
                form.submit();
            }
        });

        $('input[id^="date_"]').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Required"
                }
            });

        });
        $('input[id^="stime_"]').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Required"
                }
            });
        });
        $('input[id^="etime_"]').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Required"
                }
            });
        });
        $('input[id^="room_"]').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Required"
                }
            });
        });
        $('input[id^="fmark_"]').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Required"
                }
            });
        });
        $('input[id^="pmarks_"]').each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "Required"
                }
            });
        });

    });

</script>