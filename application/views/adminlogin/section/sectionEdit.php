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
                               <i class="fa fa-home fa-fw"></i> || Class Divisions List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Division</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                      <?php
            if ($this->rbac->hasPrivilege('division', 'can_add') || $this->rbac->hasPrivilege('division', 'can_edit')) {
                ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="">
                            <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-retweet"></i> ||  Add Division
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="<?php echo site_url("webadmin/sections/edit/". $id) ?>" method="post">
                                         <?php if ($this->session->flashdata('msg')) { ?>
                                         <?php echo $this->session->flashdata('msg') ?>
                                         <?php } ?>   
                                         <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="form-group">
                                            <label for="">Division Name</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                <input type="text" class="form-control" id="division" name="division" value="<?php echo set_value('division', $division['division']); ?>" />
                                               <span class="text-danger"><?php echo form_error('division'); ?></span>
                                              </div>
                                        </div>
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Update Division" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
                                        <input type="submit" name="" id="" class="btn btn-sm btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                   
                                      </form>
                                                                       
                                </div>
                            </div>
                                </div></div></div>
                        </div>
                    </div>
                        <?php } ?>
                    <div class="col-md-<?php if ($this->rbac->hasPrivilege('section', 'can_add') || $this->rbac->hasPrivilege('section', 'can_edit')) {
                        echo "8";
                                } else {
                                    echo "12";
                                }
                                ?>">
                        <div class="">

                     <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Division List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                                <div class="dt-title"><?php echo $title;?></div>
                                 <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Categories Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                    $count = 1;
                                    foreach ($divisionlist as $division) {
                                        ?>
                                        <tr>
                                            <td><?php echo $division['division'] ?></td>
                                            <td>
                                                <div class="col-lg-3 pull-right">
                                                         <?php if ($this->rbac->hasPrivilege('division', 'can_edit')) { ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/sections/edit/<?php echo $division['id'] ?>" class="btn btn-xs btn-primary" title="Edit" data-toggle="tooltip" >
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                         <?php } if ($this->rbac->hasPrivilege('designation', 'can_delete')) { ?>
                                                     <a href="<?php echo base_url(); ?>webadmin/sections/delete/<?php echo $division['id'] ?>" class="btn btn-xs btn-danger" title="delete" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to delete this item?');">
                                                         <i class="fa fa-remove"></i>
                                                     </a>
                                                         <?php } ?>
                                                    </div>
				</div>	
                                            </td>
                                            
                                        </tr>
                                        	<?php
                                    }
                                    $count++;
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

                
    
   
