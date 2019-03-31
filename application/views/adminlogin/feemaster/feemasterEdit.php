<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Fees Collection
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Update Fees Master</li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                          <div class="col-md-4 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-tags"></i> ||  Update Fees Master <?php echo $this->setting_model->getCurrentSessionName(); ?>
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                          <?php } ?>
                                          <?php
                                              if (isset($error_message)) {
                                                 echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                               }
                                              ?>
                                          <?php // echo $this->customlib->getCSRF(); ?>

                                          <form action="<?php echo site_url("webadmin/feemaster/edit/" . $feegroup_type->id) ?>" method="post">
                                              <input type="hidden" name="id" value="<?php echo $feegroup_type->id; ?>">
                                              <div class="form-group">
                                                  <label for="">Fees Group</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                       <select autofocus="" id="fee_groups_id" name="fee_groups_id" class="form-control" >
                                                             <option value="">Select</option>
                                                                 <?php
                                                                  foreach ($feegroupList as $feegroup) {
                                                                     ?>
                                                                <option value="<?php echo $feegroup['id'] ?>"<?php
                                                                if (set_value('fee_groups_id', $feegroup_type->fee_groups_id) == $feegroup['id']) {
                                                                    echo "selected =selected";
                                                                }
                                                                ?>><?php echo $feegroup['name'] ?></option>

                                                                <?php
                                                                $count++;
                                                            }
                                                            ?>
                                                       </select>
                                                    </div>
                                                  <span class="text-danger" style="display:inline"><?php echo form_error('fee_groups_id'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Fees Type</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                       <select  id="feetype_id" name="feetype_id" class="form-control" >
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($feetypeList as $feetype) {
                                                                    ?>
                                                                    <option value="<?php echo $feetype['id'] ?>"<?php
                                                                    if (set_value('feetype_id', $feegroup_type->feetype_id) == $feetype['id']) {
                                                                        echo "selected =selected";
                                                                    }
                                                                    ?>><?php echo $feetype['type'] ?></option>

                                                                    <?php
                                                                    $count++;
                                                                }
                                                                ?>
                                                     </select>
                                                    </div>
                                                  <span class="text-danger" style="display:inline"><?php echo form_error('feetype_id'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Due Date</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                       <input id="due_date" name="due_date" placeholder="" type="date" class="form-control"  value="<?php echo set_value('due_date',($feegroup_type->due_date)); ?>" />
                                                    </div>
                                                  <span class="text-danger" style="display:inline"><?php echo form_error('due_date'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Amount </label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                       <input id="amount" name="amount" placeholder="" type="text" class="form-control"  value="<?php echo set_value('amount', $feegroup_type->amount); ?>" />
                                                    </div>
                                                  <span class="text-danger" style="display:inline"><?php echo form_error('amount'); ?></span>
                                              </div>
                                              
                                              
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Update" style="font-style: normal; ">
                                        <input type="submit" name="" id="" class="btn btn-sm btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                       </form>
                                      </div>
                                  </div>
                                 </div>
                               </div>
                             </div>
                              </div>
                          </div>
                          <div class="col-md-8 col-sm-12">
                              <div class="">

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Fee Master List :<?php echo $this->setting_model->getCurrentSessionName(); ?>
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                     
                                       <table id="example23" class="display nowrap" >
                                          <thead>
                                              <tr>
                                                  <th>Fees Group</th>
                                                   <th>Code Fee</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                    <?php
                                    foreach ($feemasterList as $feegroup) {
                                        ?>
                                        <tr>
                                            <td class="">
                                                <a href="#" data-toggle="popover" class="detail_popover"><?php echo $feegroup->group_name; ?></a>
                                            </td>
                                            <td class="">
                                                <ul class="liststyle1">
                                                    <?php
                                                      foreach ($feegroup->feetypes as $feetype_key => $feetype_value) {?>
                                                    <li style="list-style: none;"> 
                                                             
                                                            <?php echo "<i class='fa fa-rupee'></i> Rs ". $feetype_value->amount; ?> &nbsp;&nbsp;
                                                           <?php //if ($this->rbac->hasPrivilege('fees_master', 'can_edit')) { ?>
                                                                <a href="<?php echo base_url(); ?>webadmin/feemaster/edit/<?php echo $feetype_value->id ?>"   data-toggle="tooltip" title="Edit">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>&nbsp;
                                                            <?php
                                                            //} if ($this->rbac->hasPrivilege('fees_master', 'can_delete')) {
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>webadmin/feemaster/delete/<?php echo $feetype_value->id ?>" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?'');">
                                                                    <i class="fa fa-remove"></i>
                                                                </a>
                                                             <?php //} ?>
                                                        </li>

                                                        <?php
                                                   }
                                                    ?>
                                                </ul>
                                            </td>
                                            <td class=" pull-right">
                                             <?php //if ($this->rbac->hasPrivilege('fees_group_assign', 'can_view')) { ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/feemaster/assign/<?php echo $feegroup->id ?>" 
                                                       class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('assign / view'); ?>">
                                                        <i class="fa fa-tag"></i>
                                                    </a>
                                            <?php // } ?>
                                            <?php //if ($this->rbac->hasPrivilege('fees_master', 'can_delete')) { ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/feemaster/deletegrp/<?php echo $feegroup->id ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                           <?php //} ?>
                                            </td>
                                        </tr>
                                        <?php }?>
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

                
    
   
