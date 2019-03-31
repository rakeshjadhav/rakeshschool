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
                                          <i class="fa fa-search"></i> || Search Student
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <form  class="assign_teacher_form" action="<?php echo base_url(); ?>webadmin/homework/" method="post" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>
                                       <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Class</label><small class="req"> *</small>
                                                <select autofocus="" id="searchclassid" name="class_id" onchange="getSection(this.value, 'secid')"  class="form-control" >
                                                    <option value="">select</option>
                                                    <?php
                                                    foreach ($classlist as $class) {
                                                        ?>
                                                        <option <?php
                                                        if ($class_id == $class["id"]) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?php echo $class['id'] ?>"><?php echo $class['class'] ?></option>
                                                            <?php
                                                            //$count++;
                                                        }
                                                        ?>
                                                </select>
                                                <span class="class_id_error text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div>
                                        </div>
                                           <div class="col-md-4">
                                              <div class="form-group">
                                                  <label>Division</label>
                                                  <select  id="secid" name="section_id" class="form-control" onchange="getSubject(this.value, 'searchclassid', 'subid')" >
                                                      <option value="">select</option>
                                                  </select>
                                                  <span class="section_id_error text-danger"></span>
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label>subject</label>
                                                <select  id="subid" name="subject_id" class="form-control" >
                                                    <option value="">select</option>
                                                </select>
                                                <span class="section_id_error text-danger"></span>
                                            </div>
                                        </div>
                                          <button type="submit" id="search_filter" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> search</button>                 
                                            </div>
            
                                      </div>
                                       </form>
                                  </div>
                                 </div>
                               </div>
                             </div>
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
                                          <i class="fa fa-tags"></i> ||   Homework List
                                          
                                          
                                          <?php if ($this->rbac->hasPrivilege('homework', 'can_add')) { ?>
                            <div class="box-tools pull-right">
                                <button type="button" onclick="addhomework()" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> add</button>
                            </div>
                            <?php } ?>
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 ">
                        <div class="">
                             <div class="table-responsive">
                            <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                <thead>
                                    <tr>
                                        <th>class</th>
                                        <th>Division</th>
                                        <th>subject</th>
                                        <th>homework_date</th>
                                        <th>submission_date</th>
                                        <th>evaluation_date</th>
                                        <th>created_by</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach ($homeworklist as $key => $homework) {?>
                                        <tr>
                                            <td><?php echo $homework["class"] ?></td>
                                            <td><?php echo $homework["division"] ?></td>
                                            <td><?php echo $homework["name"] ?></td>
                                            <td><?php echo $homework['homework_date']; ?></td>
                                            <td><?php echo $homework['submit_date']; ?></td>
                                            <td><?php
                                            if (!empty($homework["report"])) {
                                                echo $homework["report"][0]['date'];
                                            }?>
                                            </td>
                                            <td><?php
                                            if (!empty($homework["report"])) {
                                                echo $homework["created_by"];
                                            }?>
                                            </td>
                                            <td class="mailbox-date pull-right">
                                                <?php if ($this->rbac->hasPrivilege('homework_evaluation', 'can_view')) { ?> 
                                                    <a class="btn btn-info btn-xs" onclick="evaluation(<?php echo $homework['id']; ?>);" title="" data-target="#evaluation" data-toggle="modal"  data-original-title="Evaluation">
                                                        <i class="fa fa-reorder"></i></a> 
                                                <?php } if ($this->rbac->hasPrivilege('homework', 'can_edit')) { ?>   
                                                    <a onclick="getRecord(<?php echo $homework['id']; ?>)" class="btn btn-primary btn-xs" data-target="#myModaledit" data-toggle="modal"  data-original-title="View"><i class="fa fa-pencil"></i></a> 
                                        <?php } if ($this->rbac->hasPrivilege('homework', 'can_delete')) { ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/homework/delete/<?php echo $homework['id']; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="Delete">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
    <?php } ?>
                                            </td>
                                        </tr>
<?php } ?>

                                </tbody>      
                            </table> 
                             </div>
                        </div>
                    </div>
                    
                </div>
                                          
                                 </div> <!-- end panel -->
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
    
    
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="box-title"> add_homework</h4> 
            </div>

            <div class="modal-body pt0 pb0">
                <div class="row">
                    <form id="formadd" method="post" class="ptt10" action="<?php  echo base_url()?>webadmin/homework/create"enctype="multipart/form-data">
                    <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                        
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">class</label><small class="req"> *</small> 
                                        <select class="form-control" name="class_id" id="class_id" onchange="getSection(this.value, 'section_id')">
                                            <option value="">select</option>
                                                <?php foreach ($classlist as $key => $value) {?>
                                                     <option value="<?php echo $value["id"] ?>"><?php echo $value["class"] ?></option>
                                                <?php } ?>

                                        </select>
                                        <span id="name_add_error" class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">Division</label><small class="req"> *</small>
                                        <select class="form-control" name="section_id" id="section_id" onchange="getSubject(this.value, 'class_id', 'subject_id')">
                                            <option value="">select</option>

                                        </select>
                                        <span id="name_add_error" class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">subject</label><small class="req"> *</small>
                                        <select class="form-control" name="subject_id" id="subject_id">
                                            <option value="">select</option>
                                        </select>
                                        <span id="name_add_error" class="text-danger"><?php echo form_error('subject_id'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">homework_date</label>
                                        <input type="date" id="homework_date" name="homework_date" class="form-control" value="<?php echo set_value('date'); ?>" >
                                        <span id="date_add_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">submission_date</label>
                                        <input type="date" id="submit_date" name="submit_date"class="form-control" value="<?php echo set_value('follow_up_date');?>" >
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">attach_document</label>
                                        <input type="file" id="file" name="userfile" class="form-control filestyle">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email">description</label><small class="req"> *</small>
                                        <textarea name="description" id="compose-textarea" class="form-control" ><?php echo set_value('address'); ?></textarea>
                                    </div> 
                                </div>
                            </div><!--./row--> 
                            <div class="box-footer">
                            <div class="pull-right paddA10">
                                <input type="submit" class="btn btn-info pull-right" value="save" />
                            </div>
                         </div>
                    </div><!--./col-md-12--> 
                    </form>
                </div><!--./row--> 
         
            </div>
            
            <!--</form>-->
        </div>
    </div>    
</div>
    
    <div class="modal fade" id="evaluation" tabindex="-1" role="dialog" aria-labelledby="evaluation" style="padding-left: 0 !important">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="box-title">Evaluate_homework</h4>
            </div>
            <div class="modal-body pt0 pb0" id="evaluation_details">
            </div>
        </div>
    </div>
</div>
    
    
  <div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="box-title"> edit_homework</h4> 
            </div>

            <div class="modal-body pt0 pb0">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                        <form id="formedit" method="post" class="ptt10" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">
                                            class</label><small class="req"> *</small>
                                        <select class="form-control" name="class_id" id="classid" onchange="getSection(this.value, 'sectionid')">
                                            <option value="">select</option>
                                            <?php foreach ($classlist as $key => $value) {?>
                                                <option value="<?php echo $value["id"] ?>"><?php echo $value["class"] ?></option>
                                        <?php } ?>

                                        </select>
                                        <span id="name_add_error" class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">section</label><small class="req"> *</small>
                                        <select class="form-control" name="section_id" id="sectionid" onchange="getSubject(this.value, 'classid', 'subjectid')">
                                            <option value=""><?php echo $this->lang->line('select') ?></option>

                                        </select>
                                        <span id="name_add_error" class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">subject</label><small class="req"> *</small>
                                        <select class="form-control" name="subject_id" id="subjectid">
                                            <option value=""><?php echo $this->lang->line('select') ?></option>


                                        </select>
                                        <span id="name_add_error" class="text-danger"><?php echo form_error('subject_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">homework_date</label>
                                        <input type="text" id="homeworkdate" name="homework_date" class="form-control" value="" readonly="">
                                        <span id="date_add_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">submission_date</label>
                                        <input type="text" id="submitdate" name="submit_date" class="form-control" value="" readonly="">
                                        <input type="hidden" name="homeworkid" id="homeworkid">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pwd">attach_document</label>
                                        <input type="file" id="file" name="userfile" class="form-control filestyle" value="">

                                        <input type="hidden" name="document" id="document">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email">description</label><small class="req"> *</small>
                                        <textarea name="description" id="desc-textarea" class="form-control"></textarea>
                                    </div> 
                                </div>

                            </div><!--./row-->    

                    </div><!--./col-md-12-->       
<div class="box-footer">

                <div class="pull-right paddA10">

                    <input type="submit" class="btn btn-info pull-right" value="save" />
                </div>
            </div>
                </div><!--./row--> 
 
            </div>
            
        </div>
        </form>
    </div>
</div>
</div>
            <!--</div>-->
<script type="text/javascript">
    $(document).ready(function () {
        //var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#homework_date,#submit_date,#homeworkdate,#submitdate').datepicker({
           // format: date_format,
            autoclose: true
        });

        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });

    });

</script>
<script>
    $(function () {

        $("#compose-textarea,#desc-textarea").wysihtml5();
    });
</script>
<script type="text/javascript">
    function getSubject(section_id, classid, htmlid) {
        $('#' + htmlid).html("");
        var class_id = $('#' + classid).val();
        var base_url = '<?php echo base_url() ?>';
        var div_data = '<option value="">select</option>';
        $.ajax({
            type: "POST",
            url: base_url + "webadmin/teacher/getSubjctByClassandSection",
            data: {'class_id': class_id, 'section_id': section_id},
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj){
                    div_data += "<option value=" + obj.subject_id + ">" + obj.name + " (" + obj.type + ")" + "</option>";
                });
                $('#' + htmlid).append(div_data);
            }
        });
    }
    ;

    function getSection(class_id, htmlid) {
        $('#' + htmlid).html("");
        // var class_id = $(this).val();
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

                $('#' + htmlid).append(div_data);
            }
        });
    }
    ;

    $(document).ready(function (e) {
        getSectionByClass("<?php echo $class_id ?>", "<?php echo $section_id ?>", 'secid');
        getSubjectByClassandSection("<?php echo $class_id ?>", "<?php echo $section_id ?>", "<?php echo $subject_id ?>", 'subid');
    });

    $(document).ready(function (e) {
        alert('hi');
        $("#formadd").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url("webadmin/homework/create") ?>",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (res)
                {
                    alert(res);
                    if (res.status == "fail") {

                        var message = "";
                        $.each(res.error, function (index, value) {

                            message += value;
                        });
                        errorMsg(message);

                    } else {

                        successMsg(res.message);

                        window.location.reload(true);
                    }
                }
            });
        }));


        $("#formedit").on('submit', (function (e) {

            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url("webadmin/homework/edit") ?>",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (res)
                {

                    if (res.status == "fail") {

                        var message = "";
                        $.each(res.error, function (index, value) {

                            message += value;
                        });
                        errorMsg(message);

                    } else {

                        successMsg(res.message);

                        window.location.reload(true);
                    }
                }
            });
        }));

    });


    function getRecord(id) {
   //var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'MM', 'Y' => 'yyyy',]) ?>';

        var random = Math.random();
        $('#classid').val(null).trigger('change');
        $.ajax({
            url: "<?php echo site_url("webadmin/homework/getRecord/") ?>" + id + "?r=" + random,
            type: "POST",
            dataType: 'json',

            success: function (res){
                  //alert(res);
                getSelectClass(res.class_id);
                getSectionByClass(res.class_id, res.section_id, 'sectionid');
                getSubjectByClassandSection(res.class_id, res.section_id, res.subject_id, 'subjectid');
                $("#homeworkdate").val((res.homework_date));
                $("#submitdate").val((res.submit_date));
                $("#desc-textarea").text(res.description);
                $('iframe').contents().find('.wysihtml5-editor').html(res.description);
                // $('select[id="classid"] option[value="' + res.class_id + '"]').attr("selected", true);
                $("#homeworkid").val(res.id);
                $("#document").val(res.document);
            }
        });

    }

    function getSelectClass(class_id) {
        $('#classid').html("");
        var base_url = '<?php echo base_url() ?>';
        var div_data = '<option value="">select</option>';
        $.ajax({
            type: "POST",
            url: base_url + "webadmin/homework/getClass",
            //data: {'class_id': class_id},
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj){

                    var sel = "";
                    if (class_id == obj.id) {
                        sel = "selected";
                    }
                    div_data += "<option value=" + obj.id + " " + sel + ">" + obj.class + "</option>";
                });
                $('#classid').append(div_data);

            }});
    }

    function getSectionByClass(class_id, section_id, htmlid) {
        if (class_id != "" && section_id != "") {
            $('#' + htmlid).html("");
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
                    $.each(data, function (i, obj){
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.division_id + " " + sel + ">" + obj.division + "</option>";
                    });
                    $('#' + htmlid).append(div_data);
                }
            });
        }
    }

    function getSubjectByClassandSection(class_id, section_id, subject_id, htmlid) {
        //console.log("rrrr");
        if (class_id != "" && section_id != "" && subject_id != "") {
            $('#' + htmlid).html("");
            //  var class_id = $('#class_id').val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">select</option>';
            $.ajax({
                type: "POST",
                url: base_url + "webadmin/teacher/getSubjctByClassandSection",
                data: {'class_id': class_id, 'section_id': section_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (subject_id == obj.subject_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.subject_id + " " + sel + ">" + obj.name + " (" + obj.type + ")" + "</option>";
                    });

                    $('#' + htmlid).append(div_data);
                }
            });
        }
    }

    function evaluation(id) {
        $('#evaluation_details').html("");
        $.ajax({
            url: '<?php echo base_url(); ?>webadmin/homework/evaluation/' + id,
            success: function (data) {
                $('#evaluation_details').html(data);
                // $.ajax({
                //     url: '<?php echo base_url(); ?>homework/getRecord/' + id,
                //     success: function (data) {
                //         $('#timeline').html(data);
                //     },
                //     error: function () {
                //         alert("Fail")
                //     }
                // });
            },
            error: function () {
                alert("Fail")
            }
        });
    }

    function addhomework() {

        $('iframe').contents().find('.wysihtml5-editor').html("");
    }
</script>           