<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-database fa-fw"></i> || Academic Years List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Academic Years</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                    <?php if ($this->rbac->hasPrivilege('session_setting', 'can_add')) { ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="">
                            <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-database fa-fw"></i> ||  Add Academic Year
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php //echo $this->customlib->getCSRF(); ?>
                                    <form action="<?php echo site_url('webadmin/sessions/create') ?>" method="post">
                                        <div class="form-group">
                                         <label for="">session</label><small class="req"> *</small>
                                         <input autofocus="" id="session" name="session" placeholder="" type="text" class="form-control"  value="<?php echo set_value('session'); ?>" />
                                          <span class="text-danger"><?php echo form_error('session'); ?></span>
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
                  <div class="col-md-<?php if ($this->rbac->hasPrivilege('session_setting', 'can_add')) {
                             echo "8";
                              } else {
                               echo "12";}?>">
                   <div class="">
                     <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                <i class="fa fa-database fa-fw"></i> || Academic Years List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                                 <table id="example23" class="display nowrap" >
                                    <thead>
                                        <tr>
                                            <th>Academic Years Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($sessionlist as $session) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"><?php echo $session['session'] ?></td>
                                            <td class="mailbox-name"><?php
                                                if ($session['active'] != 0) {
                                                    ?>
                                                    <span class="label label-success label-rouded">Active</span>
                                                    <?php
                                                } else {   
                                                }
                                                ?></td>
                                            <td class="mailbox-date pull-right">
                                                <?php if ($this->rbac->hasPrivilege('session_setting', 'can_edit')) { ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/sessions/edit/<?php echo $session['id'] ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                <?php } if ($this->rbac->hasPrivilege('session_setting', 'can_delete')) { ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/sessions/delete/<?php echo $session['id'] ?>"class="btn btn-danger btn-xs <?php
                                                    if ($session['active'] != 0) {
                                                        echo'disabled';
                                                    }
                                                    ?>"  data-toggle="tooltip" title="delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
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

                
    
   
