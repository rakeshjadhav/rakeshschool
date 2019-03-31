<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Add Subject wise Chapter
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Add Subject Wise Chapter</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                    <?php if ($this->rbac->hasPrivilege('marks_grade', 'can_add')) { ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="">
                            <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-retweet"></i> ||  Add Subject Wise Chapter
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php //echo $this->customlib->getCSRF(); ?>
                                    <form action="<?php echo site_url('webadmin/exam/subjectwisechapter') ?>" method="post">
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
                                        <div class="form-group">
                                            <label for="">Chapter Name</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                 <input  class="form-control" id="chapter_name" name="chapter_name" placeholder="" rows="3" placeholder="Enter Chapter" value="<?php echo set_value('note'); ?>">
                                    <span class="text-danger"><?php echo form_error('chapter_name'); ?></span>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">description</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                 <textarea class="form-control" id="desc" name="desc" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('desc'); ?></textarea>
                                    <span class="text-danger"><?php echo form_error('desc'); ?></span>
                                        </div>
                                        </div>
                                        <input type="submit" name="" id=""class="btn btn-xs btn-success waves-effect waves-light m-r-10" value="Add" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
                                        <input type="submit" name="" id="" class="btn btn-xs btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                      </form>
                                </div>
                            </div>
                           </div>
                       </div>
                    </div>
                </div>
                    </div>
                       <?php } ?>
                     <div class="col-md-<?php if ($this->rbac->hasPrivilege('marks_grade', 'can_add')) {
                             echo "8";
                              } else {
                               echo "12";}?>">
                        <div class="">

                     <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                <i class="fa fa-retweet fa-fw"></i> || SUBJECT WISE CHAPTER List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                                 <table id="example23" class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>Chapter name</th>
                                        <th>desc </th>
                                        <th>Subject </th>
                                        <th>Class /Division </th>
                                        <th class="text-right">action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($chapterlist)) {
                                        ?>

                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($chapterlist as $chapters) {
                                            ?>

                                            <tr>

                                                <td class="">
                                                    <a href="#" class="detail_popover" ><?php echo $chapters['chapter_name']; ?></a>
                                                </td>
                                                <td><?php echo $chapters['cdesc']; ?></td>
                                                <td><?php echo $chapters['subjectname']; ?></td>
                                                <td><?php echo $chapters['class'].'('.$chapters['division'];echo ")"; ?></td>
                                                <td class="">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('exam', 'can_edit')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/exam/chapteredit/<?php echo $chapters['id'] ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('exam', 'can_delete')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/exam/delete/<?php echo $chapters['id'] ?>"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('are you sure you want to delete this item ??');">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/exam/add_question<?php echo $chapters['id'] ?>"class="btn btn-info btn-xs" data-toggle="tooltip" title="Add Question">
                                                        <i class="fa fa-question-circle"></i>
                                                    </a>
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

                
    
   
