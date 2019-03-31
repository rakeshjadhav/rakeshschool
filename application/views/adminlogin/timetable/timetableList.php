<style>
    .text-green {
    color: #00a65a !important;
    }
    .text-red{
        color:#E13300 !important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Class Timetable
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
                        <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <div class="">
                                  <div class="panel " style="border-top:3px solid #f05837;">
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-calendar"></i> ||  Create Timetable
                                          <div class="pull-right">
                                              <?php if ($this->rbac->hasPrivilege('class_timetable', 'can_add')) { ?>
                                          <a href="<?php echo base_url(); ?>webadmin/timetable/create" class="btn btn-primary btn-sm" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="Add Timetable" >
                                            <i class="fa fa-plus fa-fw"></i>Add </a>
                                            <?php } ?>
                                          </div>
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>

                                          <form class="assign_teacher_form" action="<?php echo site_url('webadmin/timetable/index') ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="col-md-6">
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
                                              <div class="col-md-6">
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
                                        <input type="submit" id="search_filter" name="search" class=" pull-right btn btn-xs btn-success waves-effect waves-light m-r-10" value="Search" style="font-style: normal; " >
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
                                 if (isset($result_array)) {
                                   ?> 
                        <div class="row" id="timetable" >
                          <div class="col-md-12 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-tags"></i> ||  Assign Subject wise timetable 
                                     </div>
                                      
                                      <div class="panel-body">
<!--                                          <div class="row print" >
                                            <div class="col-md-12">
                                                <div class="col-md-offset-4 col-md-4">
                                                    <center><b>Class</b> <span class="cls"></span></center> 
                                                </div>
                                            </div>
                                        </div>-->
                                  <?php
                            if (!empty($result_array)) {
                                ?>
                                <div class="table-responsive">
                                   <!--<div class="download_label"><?php echo $this->lang->line('class_timetable'); ?></div>-->
                                    <table id="example23" class="display nowrap" style="margin:0 auto;padding:0;font-size:10px;" >
                                        <thead>
                                            <tr>
                                                <th>
                                                    <?php echo $this->lang->line('subject'); ?>
                                                </th>
                                                <?php foreach ($getDaysnameList as $key => $value) {
                                                    ?>
                                                    <th class="text text-center">
                                                        <?php echo $value; ?>
                                                    </th>
                                                <?php }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result_array as $key => $timetable) {
                                                ?>
                                                <tr>
                                                    <th><?php echo $key; ?></th>
                                                    <?php
                                                    foreach ($timetable as $key => $value) {
                                                        $status = $value->status;
                                                        if ($status == "Yes") {
                                                            ?>
                                                            <td class="text text-center">
                                                                <div class="attachment-block clearfix">
                                                                    <?php
                                                                    if ($value->start_time != "" && $value->end_time != "") {
                                                                        ?>
                                                                        <strong class="text-green"><?php echo $value->start_time; ?></strong>
                                                                        <b class="text text-center">-</b>
                                                                        <strong class="text-green"><?php echo $value->end_time; ?></strong><br/>
                                                                        <strong class="text-red">Room No: <?php echo $value->room_no; ?></strong>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <b class="text text-center">Not <br/>Scheduled</b><br/>
                                                                        <strong class="text-green"></strong>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td class="text text-center">
                                                                <div class="attachment-block clearfix">
                                                                    <strong class="text-red"><?php echo $value->start_time; ?></strong>
                                                                </div>
                                                            </td>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="alert alert-info">No Record Found</div>
                                <?php
                            }
                            ?>
                                 </div>
                               </div>
                             </div>
                              </div>
                          </div>
                          
                            
                            <?php
                            } else {
                                ?>
                                <!--<div class="alert alert-info"><?php // echo $this->lang->line('no_record_found'); ?></div>-->
                                <?php
                            }
                            ?>
                            
                          </div>
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
//            alert(base_url);
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
//                    alert(data);
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
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, division_id);
        $(document).on('change', '#feecategory_id', function (e) {
            $('#feetype_id').html("");
            var feecategory_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">Select</option>';
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

<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function printDiv(elem) {
        var cls = $("#class_id option:selected").text();
        var sec = $("#section_id option:selected").text();
        $('.cls').html(cls + '(' + sec + ')');
        Popup(jQuery(elem).html());
    }

    function Popup(data)
    {

        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/dist/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');


        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);


        return true;
    }
</script>

                
    
   
