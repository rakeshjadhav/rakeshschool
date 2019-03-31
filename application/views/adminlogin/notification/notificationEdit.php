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
                             <li class="active">compose_new_message</li>
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
                                          <i class="fa fa-search"></i> || compose_new_message
                                          
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                          
                                        <form id="form1" action="<?php echo base_url() ?>webadmin/notification/edit/<?php echo $id ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                    <?php
                    $prev_roles = explode(',', $notification['created_by']);
                    foreach ($prev_roles as $prev_roles_key => $prev_roles_value) {
                        ?>

                        <input type="hidden" name="prev_roles[]" value="<?php echo $prev_roles_value; ?>">
                        <?php
                    }
                    ?>
                    <div class="box box-primary">
                                            
                        <div class="box-body">

                     
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">title</label>
                                    <input autofocus="" id="title" name="title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('title', $notification['title']); ?>" />
                                    <span class="text-danger"><?php echo form_error('title'); ?></span>
                                </div>
                                <div class="form-group"><label>message</label>
                                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px"><?php echo set_value('message', $notification['message']); ?></textarea>
                                    <span class="text-danger"><?php echo form_error('message'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box-body">
                                    <?php
                                    if (isset($error_message)) {
                                        echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="">notice_date</label>
                                        <input id="date" name="date"  placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date', $notification['date']); ?>" />
                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">publish_on</label>
                                        <input id="publish_date" name="publish_date"  placeholder="" type="text" class="form-control date"  value="<?php echo set_value('publish_date',$notification['publish_date']); ?>" />
                                        <span class="text-danger"><?php echo form_error('publish_date'); ?></span>
                                    </div>
                                    <div class="form-horizontal">
                                        <label for="">message_to</label>
                                        <div class="">
                                            <label><input type="checkbox" name="visible[]" value="student" <?php echo set_checkbox('visible[]', 'student', (set_value('visible[]', $notification['visible_student']) == 'Yes') ? TRUE : FALSE); ?> /> <b>student</b> </label>
                                        </div>
                                        <div class="">                                     
                                            <label><input type="checkbox" name="visible[]"  value="parent"  <?php echo set_checkbox('visible[]', 'student', (set_value('visible[]', $notification['visible_parent']) == 'Yes') ? TRUE : FALSE); ?>  /> <b>parent</b></label>
                                        </div>
                                        <?php
                                        foreach ($roles as $role_key => $role_value) {
                                            ?>
                                            <div class="">

                                                <label>
                                                    <input type="checkbox" name="visible[]" value="<?php echo $role_value['id']; ?>" 
                                                    <?php echo set_checkbox('visible[]', $role_value['id'], (set_value('visible[]', in_array($role_value['id'], $prev_roles)) == 1) ? TRUE : FALSE); ?>
                                                           /> <b><?php echo $role_value['name']; ?></b> 
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>                         
                            <div class="box-footer" style="clear: both;">
                                <div class="pull-right">

                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-envelope-o"></i> send </button>
                                </div>
                            </div>                           
                        </div>                      
                    </div>
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