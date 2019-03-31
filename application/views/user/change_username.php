<style>
    table.dataTable thead th {
    padding: 8px 0px !important;
    }
    table.dataTable tbody td {
    padding: 5px 5px !important;
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || change_password
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">change_password</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                          
                    

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || change_password
                                  </div>
                                 <form action="<?php echo site_url('user/user/changeusername') ?>"  id="passwordform" name="passwordform" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>                       
                                <?php
                                if (isset($error_message)) {
                                    echo $error_message;
                                }
                                ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group  <?php
                                if (form_error('current_username')) {
                                    echo 'has-error';
                                }
                                ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">current_username
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  name="current_username" required="required" class="form-control col-md-7 col-xs-12" type="password"  value="<?php echo set_value('currentr_password'); ?>">

                                    </div>
                                </div>
                                <div class="form-group  <?php
                                if (form_error('new_username')) {
                                    echo 'has-error';
                                }
                                ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">new_username
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input   required="required" class="form-control col-md-7 col-xs-12" name="new_username" placeholder="" type="password"  value="<?php echo set_value('new_username'); ?>">

                                    </div>
                                </div>
                                <div class="form-group  <?php
                                if (form_error('confirm_username')) {
                                    echo 'has-error';
                                }
                                ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm_username
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="confirm_username" name="confirm_username" placeholder="" type="password"  value="<?php echo set_value('confirm_username'); ?>" class="form-control col-md-7 col-xs-12" >

                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                            <button type="submit" class="btn btn-info">save</button>
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

                
    
   
