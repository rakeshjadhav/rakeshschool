
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Assign Teacher
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Assign Teacher</li>
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
                                          <i class="fa fa-user"></i> ||  Assign Teacher
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>

                                          <form class="assign_teacher_form" action="<?php echo base_url(); ?>webadmin/teacher/getSubjectTeachers" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label>Class Name</label>
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
                                                <span class="class_id_error text-danger"></span>
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
                                                <span class="section_id_error text-danger"></span>
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
                            
                            
                        <div class="row" id="box_display" style="display:none">
                          <div class="col-md-12 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-tags"></i> ||  Assign Teacher Wise Subject
                                          <!--<button type="button" class="btn btn-primary btn-sm pull-right">Add</button>-->
                                           <div class="pull-right">
                                                    <button id="btnAdd"  class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus"></i> add</button>
                                             </div>
                                     </div>
                                        <!--<div class="panel-wrapper collapse in" aria-expanded="true">-->
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <form action="<?php echo base_url() ?>webadmin/teacher/assignteacher" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <?php echo $this->customlib->getCSRF(); ?>
                                                <br/>
                                                <input type="hidden" value="0" id="post_class_id" name="class_id">
                                                <input type="hidden" value="0" id="post_section_id" name="section_id">
                                                <div class="form-horizontal" id="TextBoxContainer" role="form">
                                                </div>
                                              
                                              
                                        <input type="submit"  id=""  class=" pull-right btn btn-xs btn-success waves-effect waves-light m-r-10 save_button" style="font-style: normal; " >
                                        <!--<input type="submit" name="" id="" class="btn btn-sm btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">-->
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
                   
                        </div>
                    </div>
                
                    
                
                
                
                </div>
</div>
<script type="text/javascript">
    $(function () {
        $(document).on("click", "#btnAdd", function () {
            var lenght_div = $('#TextBoxContainer .app').length;
            var div = GetDynamicTextBox(lenght_div);
            $("#TextBoxContainer").append(div);
        });
        $(document).on("click", "#btnGet", function () {
            var values = "";
            $("input[name=DynamicTextBox]").each(function () {
                values += $(this).val() + "\n";
            });
        });
        $("body").on("click", ".remove", function () {
            $(this).closest("div").remove();
        });
    });
    
    function GetDynamicTextBox(value) {
        var row = "";
        row += '<div class="form-group app">';
        row += '<input type="hidden" name="i[]" value="' + value + '"/>';
        row += '<input type="hidden" name="row_id_' + value + '" value="0"/>';
        row += '<div class="col-md-12">';
        row += '<div class="form-group row">';
        row += '<label for="inputValue" class="col-md-1 control-label">Subject</label>';
        row += '<div class="col-md-4">';
        row += '<select  id="subject_id_' + value + '" name="subject_id_' + value + '" class="form-control" >';
        row += '<option value="">Select</option>';
<?php
foreach ($subjectlist as $subject) {
    ?>
            row += '<option value="<?php echo $subject['id'] ?>"><?php echo $subject['name'] . " (" . $subject['type'] . ")" ?></option>';
    <?php
   // $count++;
}
?>
        row += '</select>';
        row += '</div>';
        row += '<label for="inputKey" class="col-md-1 control-label">Teacher</label>';
        row += '<div class="col-md-4">';
        row += '<select  id="teacher_id_' + value + '" name="teacher_id_' + value + '" no="' + value + '" class="form-control" >';
        row += '<option value="">Select</option>';
<?php
foreach ($teacherlist as $teacher) {
    ?>
            row += '<option value="<?php echo $teacher['id'] ?>"><?php echo $teacher['name'] ?></option>';
    <?php
   // $count++;
}
?>
        row += '</select>';
        row += '</div>';
        row += '<div class="col-md-2"><button id="btnRemove" style="" class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash"></i></button></div>';
        row += '</div>';
        row += '</div>';
        row += '</div>';
        return row;
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#btnAdd').hide();
        $(".assign_teacher_form").submit(function (e)
        {
            $("#TextBoxContainer").html("");
            $("input[class$='_error']").html("");
            var class_id = $('#class_id').val();
            var section_id = $('#section_id').val();
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
           // alert(formURL);
            $.ajax(
                    {
                        url: formURL,
                        type: "POST",
                        data: postData,
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR)
                        {
                            if (data.st === 1) {
                                $.each(data.msg, function (key, value) {
                                    $('.' + key + "_error").html(value);
                                });
                            } else {
                                var response = data.msg;
                                if (response && response.length > 0) {
                                    for (i = 0; i < response.length; ++i) {
                                        var subject_id = response[i].subject_id;
                                        var teacher_id = response[i].teacher_id;
                                        var row_id = response[i].id;
                                        appendRow(subject_id, teacher_id, row_id);
                                    }
                                } else {
                                    appendRow(0, 0, 0);
                                }
                                $('#post_class_id').val(class_id);
                                $('#post_section_id').val(section_id);
                                $('#btnAdd').show();
                                $('#box_display').show();
                                $('.save_button').show();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                        }
                    });

            e.preventDefault();

        });

        $(document).on('change', '#class_id', function (e) {
            //alert('ok');
            $('#section_id').html("");
            resetForm();
            var class_id = $(this).val();
            //alert(class_id);
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">Select</option>';
            //alert(div_data);
            $.ajax({
                type: "GET",
                url: base_url + "webadmin/sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                   // alert(data);
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.division_id + ">" + obj.division + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });
    });

    function appendRow(subject_id, teacher_id, row_id) {
        var value = $('#TextBoxContainer .app').length;
        var row = "";
        row += '<div class="form-group app">';
        row += '<input type="hidden" name="i[]" value="' + value + '"/>';
        row += '<input type="hidden" name="row_id_' + value + '" value="' + row_id + '"/>';
        row += '<div class="col-md-12">';
        row += '<div class="form-group row">';
        row += '<label for="inputValue" class="col-md-1 control-label">Subject</label>';
        row += '<div class="col-md-4">';
        row += '<select  id="subject_id_' + value + '" name="subject_id_' + value + '" class="form-control" >';
        row += '<option value="">Select</option>';
<?php
foreach ($subjectlist as $subject) {
    ?>
            var selected = "";
            if (subject_id === '<?php echo $subject['id'] ?>') {
                selected = "selected";
            }
            row += '<option value="<?php echo $subject['id'] ?>" ' + selected + '><?php echo $subject['name'] . " (" . $subject['type'] . ")" ?></option>';

    <?php
    //$count++;
}
?>
        row += '</select>';
        row += '</div>';
        row += '<label for="inputKey" class="col-md-1 control-label">Teacher</label>';
        row += '<div class="col-md-4">';
        row += '<select  id="teacher_id_' + value + '" name="teacher_id_' + value + '" no="' + value + '" class="form-control" >';
        row += '<option value="">Select</option>';
<?php
foreach ($teacherlist as $teacher) {
    ?>
            var selected = "";
            if (teacher_id === '<?php echo $teacher['id'] ?>') {
                selected = "selected";
            }

            row += '<option value="<?php echo $teacher['id'] ?>" ' + selected + '><?php echo $teacher['name'] ?></option>';

    <?php
   // $count++;
}
?>
        row += '</select>';
        row += '</div>';
        row += '<div class="col-md-2"><button id="btnRemove" style="" class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash"></i></button></div>';
        row += '</div>';
        row += '</div>';
        row += '</div>';
        $("#TextBoxContainer").append(row);
    }

    $(document).on('change', '#section_id', function (e) {
        resetForm();
    });

    function resetForm() {
        $('#TextBoxContainer').html("");
        $('#btnAdd').hide();
        $('.save_button').hide();
    }

    $(document).on('click', '#btnRemove', function () {
        $(this).parents('.form-group').remove();
    });
</script>

                
    
   
