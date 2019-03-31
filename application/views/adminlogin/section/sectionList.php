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
                    <?php if ($this->rbac->hasPrivilege('division', 'can_add')) { ?>
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
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php echo $this->customlib->getCSRF(); ?>
                                    <form action="<?php echo site_url('webadmin/sessions/create') ?>" method="post">
                                        <div class="form-group">
                                            <label for="">Division Name</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                <input type="text" class="form-control" id="division" name="division" placeholder="Enter Division Name" > </div>
                                                <span class="text-danger"><?php echo form_error('devision'); ?></span>
                                        </div>
                                        <input type="submit" name="" id=""class="btn btn-xs btn-success waves-effect waves-light m-r-10" value="Add Division" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
                                        <input type="submit" name="" id="" class="btn btn-xs btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                   
                                      </form>
                                                                       
                                </div>
                            </div>
                                </div></div></div>
                        </div>
                    </div>
                       <?php } ?>
                     <div class="col-md-<?php if ($this->rbac->hasPrivilege('division', 'can_add')) {
                             echo "8";
                              } else {
                               echo "12";}?>">
                        <div class="">

                     <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                <i class="fa fa-retweet fa-fw"></i> || Division List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                                 <table id="example23" class="display nowrap" >
                                    <thead>
                                        <tr>
                                            <th>Division Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                    $count = 1;
                                    foreach ($division as $division) {
                                        ?>
                                        <tr>
                                            <td><?php echo $division['division'] ?></td>
                                            <td class="pull-right no-print">
                                                <div class="row ">
                                                     
                                                    <div class="col-lg-3 ">
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

                
    
   
