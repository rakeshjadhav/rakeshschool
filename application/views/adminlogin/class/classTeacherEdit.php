<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Assign Class Teacher List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Assign Class Teacher</li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                            <?php  if ($this->rbac->hasPrivilege('assign_teacher', 'can_add')) {
                                 ?>
                          <div class="col-md-4 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-tags"></i> ||  Assign Class Teacher
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                          <?php } ?>
                                          <?php
                                              if (isset($error_message)) {
                                                 echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                               }
                                              ?>
                                          <?php echo $this->customlib->getCSRF(); ?>

                                          <form action="<?php echo base_url() ?>webadmin/teacher/update_class_teacher" method="post">
                                              <div class="form-group">
                                               <label for="">Class Name</label><small class="req"> *</small>
                                                 <select class="form-control" name="class"  id="class_id" readonly>
                                             <?php   foreach ($classlist as $class_key => $class_value) {
                                                if ($class_id == $class_value["id"]) {
                                               ?>
                                             <option <?php  if ($class_id == $class_value["id"]) {
                                                echo "selected=selected";
                                              } ?> value="<?php echo $class_value["id"] ?>"><?php echo $class_value["class"] ?></option>
                                                <?php
                                            } }
                                            ?>
                                        </select>

                                          <span class="text-danger"><?php echo form_error('class'); ?></span>
                                        </div>
                                           
                                              <div class="form-group">
                                                <label for="">Division</label><small class="req"> *</small>
                                                <select class="form-control" id="section_id" name="section_id" readonly>
                                               <option value="">select</option> 
                                                   </select>
                                                <span class="text-danger"><?php echo form_error('section'); ?></span>
                                            </div>
                                              
                                              <div class="form-group">
                                               <label for="">class_teacher</label><small class="req"> *</small>
                                                <?php foreach ($result as $result_key => $result_value) {?>
                                                <input autofocus="" id="class" name="classteacherid[]" placeholder="" type="hidden" class="form-control"  value="<?php echo $result_value["id"]; ?>" />
                                                    <?php } ?> 
                                                    <?php foreach ($assignteacherlist as $teacher) {
                                                        ?>
                                                        <input autofocus=""  name="ctid[]" placeholder="" type="hidden" class="form-control"  value="<?php echo $teacher["ctid"]; ?>" />
                                                    <?php } ?>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($teacherlist as $tvalue) {
                                                        $check = "";
                                                        ?>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="teachers[]" value="<?php echo $tvalue['id'] ?>" <?php echo $check; ?> <?php echo set_checkbox('teachers[]', $tvalue['id'], check_in_array($tvalue['id'], $result)); ?> ><?php echo $tvalue['name'] ?>
                                            </label>
                                        </div>

                                        <?php
                                        $i++;
                                    }
                                    ?>
                                        <span class="text-danger"><?php echo form_error('teachers[]'); ?></span>
                                          </div>
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Add Class" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
                                        <input type="submit" name="" id="" class="btn btn-sm btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                       </form>
                                      </div>
                                  </div>
                                 </div>
                               </div>
                             </div>
                              </div>
                          </div>
                            <?php } ?>
                          <div class="col-md-<?php
                           if ($this->rbac->hasPrivilege('assign_teacher', 'can_add')) {
                           echo "8";} else { echo "12";}?>">
                              <div class="">

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-tags fa-fw"></i> || Assign Class Teacher
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"></div>
                                       <table id="example23" class="display nowrap" >
                                          <thead>
                                              <tr>
                                                  <th>Classes</th>
                                                  <th>Division</th>
                                                  <th>Class Teacher</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                    <?php
                                    $i = 0;

                                    foreach ($assignteacherlist as $teacher) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name">
                                                <?php echo $teacher["class"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $teacher["division"]; ?>
                                            </td>
                                            <td>
                                                <?php foreach ($tlist[$i] as $key => $tsvalue) {
                                                    ?>

                                                    <?php echo $tsvalue["name"] . "<br/>"; ?>
                                                    <input type="hidden"  name="teacherid[]" value="<?php echo $tsvalue["id"] ?>" >
                                                <?php } ?>
                                            </td>
                                            <td class="mailbox-date pull-right">
                                                <?php
                                                if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_edit')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/teacher/classteacheredit/<?php echo $teacher["class_id"]; ?>/<?php echo $teacher["division_id"]; ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_delete')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/teacher/classteacherdelete/<?php echo $teacher["class_id"]; ?>/<?php echo $teacher["division_id"]; ?>" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
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
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '';
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
                            div_data += "<option value=" + obj.division_id + " " + sel + ">" + obj.division + "</option>";
                        }
                        
                    });

                    $('#section_id').append(div_data);
                }
            });
        }
    }

    getSectionByClass('<?php echo $class_id ?>', '<?php echo $division_id ?>');
    var division_id = "<?php echo $division_id ?>";
 

</script>

<?php

function check_in_array($find, $array) {

    foreach ($array as $element) {
        if ($find == $element["id"]) {
            return TRUE;
        }
    }
    return FALSE;
}
?>
                
    
   
