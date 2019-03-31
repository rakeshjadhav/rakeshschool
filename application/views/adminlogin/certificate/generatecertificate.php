
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Certificate
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Certificate</li>
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
                                          <i class="fa fa-file-excel-o"></i> || Search Certificate
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
                                          <form class="assign_teacher_form" action="<?php echo site_url('webadmin/generatecertificate/search') ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="row">
                                              <div class="col-md-4">
                                                 <div class="form-group">
                                                    <label>Class</label>
                                                      <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-university"></i></div>
                                                       <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                                    <option value="">Select</option>
                                                    <?php
                                                    foreach ($classlist as $class) {
                                                        ?>
                                                        <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div>
                                           </div>
                                              </div>
                                           <div class="col-md-4">
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
                                              <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>certificate</label><small class="req"> *</small>
                                        <select name="certificate_id" class="form-control" >
                                            <option value="">select</option>
                                            <?php
                                            if (isset($certificateList)) {
                                                foreach ($certificateList as $list) {
                                                    ?>
                                                    <option value="<?php echo $list->id ?>" <?php if (set_value('certificate_id') == $list->id) echo "selected=selected" ?>><?php echo $list->certificate_name ?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('certificate_id'); ?></span>
                                    </div>   
                                </div>
                                              </div>
                                              <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> search</button>
                                    </div>
                                </div>
                                           <!--</div>-->
                                        <!--<button type="submit"  name="search" value="search_filter" class="btn btn-primary pull-right btn-sm checkbox-toggle"> <i class="fa fa-search"></i> Search</button>-->
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
                    <form method="post" action="<?php echo base_url('webadmin/generatecertificate/generatemultiple') ?>">
                        <div  class="white-box  box-info" id="duefee">
                            <div class="box-header ptbnull">
                                <h3 class="box-title titlefix"><i class="fa fa-users"></i> student list</h3>
                                <button  class="btn btn-info btn-sm printSelected pull-right" type="button" name="generate" title="generate multiple certificate">generate</button>
                            </div>
                            <div class="box-body table-responsive">
                                <div class="download_label"><?php //echo $title; ?></div>
                                <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                    <table id="example23" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select_all" /></th>
                                                <th>admission_no</th>
                                                <th>student_name</th>
                                                <th>class</th>
                                                <th>father_name</th>
                                                <th>date_of_birth</th>
                                                <th>gender</th>
                                                <th>category</th>
                                                <th class="">mobile_no</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($resultlist)) {
                                                ?>
                                                                        <!-- <tr>
                                                                            <td colspan="12" class="text-danger text-center"><?php //echo $this->lang->line('no_record_found'); ?></td>
                                                                        </tr> -->
                                                <?php
                                            } else {
                                                $count = 1;
                                                foreach ($resultlist as $student) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><input type="checkbox" class="checkbox center-block"  name="check" data-student_id="<?php echo $student['id'] ?>" value="<?php echo $student['id'] ?>">
                                                            <input type="hidden" name="class_id" value="<?php echo $student['class_id'] ?>">
                                                            <input type="hidden" name="certificate_id" value="<?php echo $certificateResult[0]->id ?>" id="certificate_id">
                                                        </td>
                                                        <td><?php echo $student['admission_no']; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>student/view/<?php echo $student['id']; ?>"><?php echo $student['firstname'] . " " . $student['lastname']; ?>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $student['class'] . "(" . $student['division'] . ")" ?></td>
                                                        <td><?php echo $student['father_name']; ?></td>
                                                        <td><?php echo $student['dob']; ?></td>
                                                        <td><?php echo $student['gender']; ?></td>
                                                        <td><?php echo $student['category']; ?></td>
                                                        <td><?php echo $student['mobileno']; ?></td>
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
                        </div>
                    </form>
                    <?php
                }
                ?>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#select_all').on('click', function () {
            if (this.checked) {
                $('.checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.printSelected', function () {
            var array_to_print = [];
            var classId = $("#class_id").val();
            alert(classId);
            var certificateId = $("#certificate_id").val();
            alert(certificateId);
            $.each($("input[name='check']:checked"), function () {
                var studentId = $(this).data('student_id');
                alert(studentId);
                item = {}
                item ["student_id"] = studentId;
                array_to_print.push(item);
            });
            if (array_to_print.length == 0) {
                alert("no record selected");
            } else {
                $.ajax({
                    url: '<?php echo site_url("webadmin/generatecertificate/generatemultiple") ?>',
                    type: 'post',
                    dataType: "html",
                    data: {'data': JSON.stringify(array_to_print), 'class_id': classId, 'certificate_id': certificateId, },
                    success: function (response) {
                       // alert(response)
                        Popup(response);

                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">

    var base_url = '<?php echo base_url() ?>';
    function Popup(data)
    {

        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";

        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
//Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
// frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/idcard.css">');

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