

<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!--<link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">-->

<link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Create Timetable
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Create Timetable</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="row" >
                          <div class="col-md-12 col-sm-12">
                              <div class="">
                                  <div class="panel " style="border-top:3px solid #f05837;">
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-calendar"></i> ||  Create Timetable
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php //echo $this->customlib->getCSRF(); ?>

                                          <form class="assign_teacher_form" action="<?php echo site_url('webadmin/timetable/create') ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="col-md-4">
                                                 <div class="form-group">
                                                    <label>Class Name</label>
                                                      <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-university"></i></div>
                                                        <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                                            <option value="">Select</option>
                                                            <?php
                                                            foreach ($classlist as $class) {
                                                                ?>
                                                                <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected"; ?>><?php echo $class['class'] ?></option>
                                                                <?php
                                                                $count++;
                                                            }
                                                            ?>
                                                        </select>
                                                 </div>
                                              <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div>
                                           </div>
                                              <div class="col-md-4">
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
                                              <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Subject Name</label>
                                                 <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                                <select  id="subject_id" name="subject_id" class="form-control" >
                                                         <option value="">Select</option>
                                                </select>
                                                 </div>
                                                 <span class="text-danger"><?php echo form_error('subject_id'); ?></span>
                                            </div>
                                           </div>
                                        <input type="submit" id="search_filter" name="search" class="pull-right btn btn-xs btn-success waves-effect waves-light m-r-10" value="Search" style="font-style: normal; " >
                                       </form>
                                      </div>
                                  </div>
                                 </div>
                               </div>
                             </div>
                              </div>
                          </div>
                          
                          </div>
                            
                           <?php
                             if (!empty($timetableSchedule)) {
                           ?> 
                        <div class="row" id="" >
                          <div class="col-md-12 col-sm-12">
                              <div class="">
                                  <div class="panel "  >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-calendar"></i> ||  Class Timetable
                                     </div>
                                      <div class="panel-body">
                                          <?php
                                           if (!empty($timetableSchedule)) {
                                         ?>
                                       <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <form role="form" id=""  class="addmarks-form" action="<?php echo site_url('webadmin/timetable/create') ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <?php echo $this->customlib->getCSRF(); ?>
                                              
                                              
                                        <?php echo $this->customlib->getCSRF(); ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Day</th>
                                                    <th>Start Time</th>
                                                    <th>End Time </th>
                                                    <th>Room No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($timetableSchedule)) {
                                                    foreach ($timetableSchedule as $key => $value) {
                                                        ?>
                                                    <input type="hidden" value="<?php echo $key; ?>" name="i[]"></input>
                                                    <input type="hidden" value="<?php echo $value->post_id; ?>" name="edit_<?php echo $key; ?>"></input>
                                                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                                    <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                                                    <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
                                                    <tr>
                                                        <th>
                                                            <?php echo $key; ?>
                                                        </th>
                                                        <th>
                                                            <div class="bootstrap-timepicker">
                                                                <div class="form-group">
                                                                    <div class="input-group clockpicker" id="datetimepicker3">
                                                                        <input type="text" name="stime_<?php echo $key; ?>" class="form-control" id="stime_" value="<?php echo $value->starting_time; ?>">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="bootstrap-timepicker">
                                                                <div class="form-group">
                                                                    <div class="input-group clockpicker">
                                                                        <input type="text" name="etime_<?php echo $key; ?>" class="form-control timepicker" id="datetimepicker3" value="<?php echo $value->ending_time; ?>">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-clock-o"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="form-group">
                                                                <input type="text" name="room_<?php echo $key; ?>" class="form-control"  id="room_" value="<?php echo $value->room_no; ?>" placeholder="Enter Room No">
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right" name="save_exam" value="save_exam">Save</button>
                                </form>
                                <?php
                            } else {
                                ?>
                                <?php
                            }
                            ?>
                                      </div>
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
        } else {
            
        }
        ?>
                    </div>
                
                    
                
                
                
                </div>
</div>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
    </script>
<script type="text/javascript">
    $(document).ready(function () {
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
        $(document).on('change', '#section_id', function (e) {
            $('#subject_id').html("");
            var section_id = $(this).val();
            var class_id = $('#class_id').val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "POST",
                url: base_url + "webadmin/teacher/getSubjctByClassandSection",
                data: {'class_id': class_id, 'section_id': section_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.name + " (" + obj.type + ")" + "</option>";
                    });

                    $('#subject_id').append(div_data);
                }
            });
        });
    });
</script>


      
<script>
    $(function () {

// $('#datetimepicker3').datetimepicker({
//                    format: 'LT'
//                });
//    });

    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        var subject_id = '<?php echo set_value('subject_id') ?>';
        getSectionByClass(class_id, section_id);
        getSubjectByClassandSection(class_id, section_id, subject_id);
    });

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

    function getSubjectByClassandSection(class_id, section_id, subject_id) {
//        console.log("rrrr");
        if (class_id != "" && section_id != "" && subject_id != "") {
            $('#subject_id').html("");
            var class_id = $('#class_id').val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "POST",
                url: base_url + "webadmin/teacher/getSubjctByClassandSection",
                data: {'class_id': class_id, 'section_id': section_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (subject_id == obj.id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.id + " " + sel + ">" + obj.name + " (" + obj.type + ")" + "</option>";
                    });

                    $('#subject_id').append(div_data);
                }
            });
        }
    }
</script>

                
    
   
