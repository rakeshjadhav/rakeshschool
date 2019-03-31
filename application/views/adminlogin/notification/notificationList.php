<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Notice Board
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Notice Board</li>
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
                                          <i class="fa fa-search"></i> || notice_board
                                          <a href="<?php echo base_url() ?>webadmin/notification/add" class="btn btn-primary btn-sm pull-right">
                                              <i class="fa fa-plus"></i> post new message</a>
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  
                                          <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                       
                                          <div class="box-group" id="accordion">                          
                            <?php if (empty($notificationlist)) {
                                ?>
                                <div class="alert alert-info">no_record_found</div>
                                <?php
                            } else {
                                foreach ($notificationlist as $key => $notification) {
                                    $role_name = $notification["role_name"];
                                    ?>
                                    <div class="panel box box-primary">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $notification['id']; ?>" aria-expanded="false" class="collapsed">
                                                    <?php echo $notification['title']; ?>
                                                </a>
                                            </h4>
                                            <div class="pull-right">
                                                <?php 
                                                if (($this->rbac->hasPrivilege('notice_board', 'can_edit')) || ($notification["created_id"] == $user_id)) { ?>
                                                    <a href="<?php echo base_url() ?>webadmin/notification/edit/<?php echo $notification['id'] ?>" class="" data-toggle="tooltip" title="edit" data-original-title="add">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    &nbsp; <?php } if (($this->rbac->hasPrivilege('notice_board', 'can_delete')) || ($notification["created_id"] == $user_id)) { ?>  
                                                    <a href="<?php echo base_url() ?>webadmin/notification/delete/<?php echo $notification['id'] ?>" class="" data-toggle="tooltip" title="delete" data-original-title="add">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                <?php }  ?>
                                            </div>
                                        </div>
                                        <div id="collapse<?php echo $notification['id']; ?>" class="card panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <?php echo $notification['message']; ?>
                                                    </div><!-- /.col -->
                                                    <div class="col-md-3 pull-right">
                                                        <div class="box box-solid">
                                                            <div class="box-body no-padding">
                                                                <ul class="nav nav-pills nav-stacked">
                                                                    <li>
                                                                        <i class="fa fa-calendar-check-o"></i>
                                                                        Publish Date: <?php echo $notification['publish_date']; ?>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-calendar"></i> 
                                                                        Notice Date: <?php echo $notification['date']; ?>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-user"></i>
                                                                        Created By : <span data-toggle="tooltip" class="detail_popover" data-original-title="" title="">
                                                                            <a href="#" style="display: contents;">
                                                                                <?php echo $notification["created_by"]; ?>
                                                                            </a>
                                                                        </span>
                                                                        <div class="fee_detail_popover" style="display: none">
                                                                            <?php echo $notification["createdby_name"]; ?>
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                                <h4 class="text text-primary">message to</h4>
                                                                <ul class="nav nav-pills nav-stacked">
                                                                    <?php foreach ($role_name as $key => $role_value) { ?>
                                                                        <li>
                                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                                            <?php echo $role_value['name']; ?>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if($notification['visible_student'] == "Yes"){ ?>
                                                                <li><i class="fa fa-user" aria-hidden="true"></i> Student</li>
                                                            <?php } ?>
                                                            <?php if($notification['visible_parent'] == "Yes"){ ?>
                                                                <li>
                                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                                    parent
                                                                </li>
                                                            <?php } ?>
                                                                <!--li>
                                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                                    teacher : <?php echo $notification['visible_teacher']; ?>
                                                                </li-->
                                                                    <?php
                                                                    ?> 
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
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