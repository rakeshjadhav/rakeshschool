<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Tabs</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Ui Elements</a></li>
                            <li class="active">Tabs</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Default Tab</h3>
                            <p class="text-muted m-b-40">Use default tab with class <code>nav-tabs</code></p>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span>
                                        <span class="hidden-xs"> Change Password</span></a></li>
                                <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Profile</span></a></li>
                                <li role="presentation" class=""><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Messages</span></a></li>
                                <li role="presentation" class=""><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Settings</span></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="col-md-12">
                                       <!--//chnage password-->
                                       <form action="<?php echo site_url('librarian/librarian/changepass') ?>"  id="passwordform" name="passwordform" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
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
                                    <label for="" class="col-sm-3 control-label">current_password*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                            <input type="password" class="form-control" id="" name="current_pass" id="current_pass" value="<?php echo set_value('current_password'); ?>" placeholder="Username"> </div>
                                    </div>
                                </div>
                               <div class="form-group <?php
                                if (form_error('new_pass')) {
                                    echo 'has-error';
                                }
                                ?>">
                                    <label for="" class="col-sm-3 control-label">new_password*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                            <input type="password" class="form-control" id="new_pass" name="new_pass"  value="<?php echo set_value('new_password'); ?>"> </div>
                                    </div>
                                </div>
                                <div class="form-group <?php
                                if (form_error('confirm_pass')) {
                                    echo 'has-error';
                                }
                                ?>">
                                    <label for="" class="col-sm-3 control-label">confirm_password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-world"></i></div>
                                            <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" value="<?php echo set_value('confirm_password'); ?>"> </div>
                                    </div>
                                </div>
                                  <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Sign in</button>
                                    </div>
                                </div>
                                
                                
                                
                            </form>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="col-md-6">
                                        
                                    <!--// ty-->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">
                                    <!--//tyy-->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <!--//tyyy-->
                                </div>
                            </div>
                        </div>
                    </div>
            
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
        </div>