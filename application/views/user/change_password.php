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
                               <i class="fa fa-home fa-fw"></i> || Subject List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Subject</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                          
                    

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Subject List
                                  </div>
                                 <form action="<?php echo site_url('user/user/changepass') ?>"  id="passwordform" name="passwordform" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>                       
                                <?php
                                if (isset($error_message)) {
                                    echo $error_message;
                                }
                                ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group <?php
                                if (form_error('current_pass')) {
                                    echo 'has-error';
                                }
                                ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">current_password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  name="current_pass" required="required" class="form-control col-md-7 col-xs-12" type="password"  value="<?php echo set_value('current_password'); ?>">

                                    </div>
                                </div>
                                <div class="form-group <?php
                                if (form_error('new_pass')) {
                                    echo 'has-error';
                                }
                                ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">new_password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input   required="required" class="form-control col-md-7 col-xs-12" name="new_pass" placeholder="" type="password"  value="<?php echo set_value('new_password'); ?>">

                                    </div>
                                </div>
                                <div class="form-group <?php
                                if (form_error('confirm_pass')) {
                                    echo 'has-error';
                                }
                                ?>">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">confirm_password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="confirm_pass" name="confirm_pass" placeholder="" type="password"  value="<?php echo set_value('confirm_password'); ?>" class="form-control col-md-7 col-xs-12" >

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

                
    
   
