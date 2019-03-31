<style>
    table.dataTable thead th {
    padding: 8px 0px !important;
    }
    table.dataTable tbody td {
    padding: 5px 5px !important;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Upload Content List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Upload Content</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                            <?php
            if ($this->rbac->hasPrivilege('upload_content', 'can_add')) {
                ?>
                          <div class="col-md-4 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-tags"></i> ||  Add Upload Content
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>

                                          <form action="<?php echo site_url('webadmin/content/createcontent') ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="form-group">
                                                  <label for="">Content Title</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                       <input autofocus="" id="content_title" name="content_title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('content_title'); ?>"/> 
                                                    </div>
                                                  <span class="text-danger"><?php echo form_error('content_title'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Content Type</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                       <select  id="content_type" name="content_type" class="form-control" >
                                                        <option value="">Select</option>
                                                        <?php
                                                        foreach ($ght as $type) {
                                                            ?>
                                                            <option value="<?php echo $type; ?>" <?php if (set_value('content_type') == $type) echo "selected=selected"; ?>><?php echo $type; ?></option>
                                                            <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                    </select>
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('content_type'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label>
                                                      <input type="checkbox" value="Yes" name="visibility" id="chk" <?php if (set_value('visibility') == "Yes") echo "checked=checked"; ?>/><b>   Available For All Classes</b></label>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Class</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-calendar-check-o"></i></div>
                                                       <select  id="class_id" name="class_id" class="form-control" >
                                                        <option value="">Select</option>
                                                        <?php
                                                        foreach ($classlist as $class) {
                                                            ?>
                                                            <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                                            <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                    </select>
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                              </div>
                                               <div class="form-group">
                                                  <label for="">Upload Date</label>
                                                    <div class="">
                                                       <div class=""><i class=""></i></div>
                                                       <input type="date" id="upload_date" name="upload_date" placeholder=""  class="form-control" >
                                
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('upload_date'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Description</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                       <textarea class="form-control" id="description" name="note" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('note'); ?></textarea>
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('note'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                   <label class="">Content File(150px X 150px)</label>
                                                   <input class="filestyle form-control" type='file' name='file' id="file" size='20' />
<!--                                                     <div class="">
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                           <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                             <input type="file" name='file'> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                                    </div>-->
                                               </div>
                                              
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Save" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
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
            <div class="col-md-8<?php
            if ($this->rbac->hasPrivilege('upload_content', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                          <div class="col-md-8 col-sm-12">
                              <div class="">

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Teacher List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                           <thead>
                                                <tr>
                                                    <th>Content Title</th>
                                                    <th>Type</th>
                                                    <th>Date </th>
                                                    <th>Available For</th>
                                                    <th class="">Action </th>
                                                </tr>
                                            </thead>
                                          <tbody>
                                            <?php
                                              $count = 1;
                                              foreach ($list as $data) {
                                              ?>
                                              <tr>
                                                  <td> <a href="#" data-toggle="tooltip" class="detail_popover" title="<?php echo $data['note'] ?>"><?php echo $data['title'] ?></a>
                                                  <div class="fee_detail_popover" style="display: none">
                                                    <?php
                                                    if ($data['note'] == "") {?>
                                                        <p class="text text-danger">No Description</p>
                                                        <?php}else {?>
                                                        <p class="text text-info"><?php echo $data['note']; ?></p>
                                                        <?php } ?>
                                                </div>
                                                     </td>
                                                  <td><?php echo $data['type'] ?></td>
                                                  <td><?php echo $data['date'] ?></td>
                                                  <td><?php
                                                if ($data['is_public'] == "Yes") {
                                                    echo "ALL Classes";
                                                } else {
                                                    echo $data['class'];
                                                }
                                                ?></td>
                                                  <td>
                                                      <div class="row ">
                                                          <div class="col-lg-3">
                                                               <a href="<?php echo base_url(); ?>webadmin/content/download/<?php echo $data['file'] ?>"class="btn  btn-info btn-xs"  data-toggle="tooltip" title="download">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                              <?php
                                                if ($this->rbac->hasPrivilege('upload_content', 'can_delete')) {
                                                    ?>
                                                <a href="<?php echo base_url(); ?>webadmin/content/delete/<?php echo $data['id'] ?>"class="btn btn-primary btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                                              <?php } ?>
                                                          </div>
                                                          </div>
                                                   </td>

                                              </tr>
                                                      <?php
                                          }
                                         // $count++;
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
        //var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#upload_date').datepicker({
            //   format: "dd-mm-yyyy"
           // format: date_format,
            autoclose: true
        });

        $("#btnreset").click(function () {

            $("#form1")[0].reset();
        });

    });

    $(document).ready(function () {
        $("#chk").click(function () {
            if ($(this).is(":checked")) {
                $("#class_id").prop("disabled", true);
            } else {
                $("#class_id").prop("disabled", false);
            }
        });

        if ($("#chk").is(":checked")) {
            $("#class_id").prop("disabled", true);
        } else {
            $("#class_id").prop("disabled", false);
        }

    });

</script>

<script>
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });

    });
</script>
                
    
   
