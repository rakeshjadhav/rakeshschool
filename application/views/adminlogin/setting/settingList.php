<style>
    .table>tbody>tr>td{
        padding:0!important;
    }
</style>
  <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><i class="mdi mdi-settings"></i> Master Setting</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Master Setting</li>
                        </ol>
                    </div>
                </div>
                 
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-lg-4">
                        <div class="panel" style="border-top:4px solid #707cd2;border-radius: 4px;">
                            <div class="p-30">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <?php
                                            if ($settinglist[0]['image'] == "") {
                                                ?>
                                                <img src="<?php echo base_url() ?>uploads/school_content/logo/school.png" class="img-thumbnail" alt="" width="304" height="236">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo $settinglist[0]['image']?>" class="img-thumbnail" alt="<?php echo $settinglist[0]['name']; ?>" width="304" height="236">
                                                <?php
                                            }
                                            ?>
                                    </div>
                                    <div class="col-xs-8">
                                        <h2 class="m-b-0"><?php echo  $settinglist[0]['name']; ?></h2>
                                        <h4
                                        <a href="#uploadfile" role="button" class="btn btn-primary btn-sm upload_logo" data-toggle="tooltip" title="Edit_logo"><i class="fa fa-picture-o"></i> Edit Logo</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-t-10" />
                            <div class="p-20 text-center">
                                
                                <h4 class="m-t-30 font-medium"> 
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                          <?php } ?> 
                                </h4>
                                
                            </div>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-8 col-sm-12">
                        <div class="white-box bg-info m-b-0 p-b-0 mailbox-widget">
                            <!--<h2 class="text-white p-b-20"></h2>-->
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home1" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs">
                                            <i class="ti-email"></i></span>
                                        <span class="hidden-xs"> General Setting</span></a></li>
                            </ul>
                        </div>
                        <div class="white-box p-0">
                            <div class="tab-content m-t-0">
                                <div role="tabpanel" class="tab-pane fade active in" id="home1">
                                    <div class="inbox-center table-responsive">
                                        <div class="row">
                                           
                    <div class="col-md-12">
                        <div class="panel panel-info">
                           
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <div id="schsetting" class=" " role="dialog">
    <div class="">
        <div class="">
            <div class="">
                <div class="row">
                    <form role="form"  action="<?php echo site_url('schsettings/ajaxedit') ?>" method="post" >
                        <input type="hidden" name="sch_id" value="1">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="">School Name</label><small class="req"> *</small>

                            <input class="form-control" id="name" name="sch_name" placeholder="" type="text" value="<?php echo $settinglist[0]['name'] ?>" />
                            <span class="text-danger"><?php echo form_error('name'); ?></span>

                        </div>

                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="">School code</label>
                            <input id="dise_code" name="sch_dise_code" placeholder="" type="text" class="form-control" value="<?php echo $settinglist[0]['dise_code'] ?>" />
                            <span class="text-danger"><?php echo form_error('dise_code'); ?></span>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="">Address </label><small class="req"> *</small>
                            <textarea class="form-control" style="resize: none;" rows="2" id="address" name="sch_address" placeholder=""><?php echo $settinglist[0]['address'] ?></textarea>
                            <span class="text-danger"><?php echo form_error('address'); ?></span>
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="">Phone </label><small class="req"> *</small>
                            <input class="form-control" id="phone" name="sch_phone" placeholder="" type="text" value="<?php echo $settinglist[0]['phone'] ?>"/>
                            <span class="text-danger"><?php echo form_error('phone'); ?></span>
                        </div>

                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="">Email</label>
                            <small class="req"> *</small>
                            <input class="form-control" id="email" name="sch_email" placeholder="" type="text" value="<?php echo $settinglist[0]['email'] ?>"/>
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group  col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for=""> Session </label><small class="req"> *</small>
                            <select  id="session_id" name="sch_session_id" class="form-control" >
                                <option value="<?php echo $settinglist[0]['session_id'] ?>"><?php echo $settinglist[0]['session'] ?></option>
                                <?php  foreach ($sessionlist as $session) { ?>
                                    <option value="<?php echo $session['id'] ?>"><?php echo $session['session'] ?></option>
                               <?php } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('session_id'); ?></span>
                        </div>
                        
                        <div class="form-group  col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="">Session Start Month</label><small class="req"> *</small>
                            <select  id="start_month" name="sch_start_month" class="form-control"  >
                                <option value="<?php echo $settinglist[0]['start_month'] ?>"><?php echo $settinglist[0]['start_month'] ?></option>
                                <?php  foreach ($monthList as $key => $month) { ?>
                                    <option value="<?php echo $key ?>"><?php echo $month ?></option>
                                    <?php  } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('start_month'); ?></span>
                        </div>
                        
                        <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="">Teacher Testricted Mode</label>
                            <div class="clearfix"></div>
                            <label class="radio-inline">
                                <input type="radio" name="class_teacher" value="no" <?php if($settinglist[0]['class_teacher']=='no'){echo"checked";}?> >disabled
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="class_teacher" <?php if($settinglist[0]['class_teacher']=='yes'){echo"checked";}?> value="yes">enabled
                            </label>
                        </div>

                        <div class="clearfix"></div>
                         
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label for="">Language Rtl Text Mode</label>
                            <div class="clearfix"></div>
                            <label class="radio-inline">
                                <input type="radio" name="sch_is_rtl" value="disabled" <?php if($settinglist[0]['is_rtl']=='disabled'){echo"checked";}?> >disabled
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sch_is_rtl" value="enabled" <?php if($settinglist[0]['is_rtl']=='enabled'){echo"checked";}?>>enabled
                            </label>
                        </div>

                        <div class="clearfix"></div>    
                        <hr/>
                        
                        <div class="clearfix"></div>
                        <?php if ($this->rbac->hasPrivilege('general_setting', 'can_add')) { ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <button type="submit"  name="submit" class="btn btn-primary submit_schsetting pull-right"> save</button>
                        </div>
                        <?php } ?>

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
                        </div>
                    </div>
                </div>
                
<!--<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_logo'); ?></h4>
            </div>
            <div class="modal-body">
                 ==== 
                <form class="box_upload boxupload has-advanced-upload" method="post" action="<?php //echo site_url('schsettings/ajax_editlogo') ?>" enctype="multipart/form-data">
                    <input value="<?php echo $settinglist[0]['id'] ?>" type="hidden" name="id" id="id_logo"/>
                    <input type="file" name="file" id="file">
                     Drag and Drop container
                    <div class="box__input upload-area"  id="">
 <i class="fa fa-download box__icon"></i>
                         <label><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                      
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>-->
 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>             
   <script type="text/javascript">
       function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#orglogo").change(function(){
        readURL(this);
    });
</script>