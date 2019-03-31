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
                             <li class="active">Update Fees Group</li>
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
                                          <i class="fa fa-tags"></i> ||  Update Fees Group
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

                                          <form action="<?php echo site_url("webadmin/feegroup/edit/" . $id) ?>" method="post">
                                              <input name="id" type="hidden" class="form-control"  value="<?php echo set_value('id', $feegroup['id']); ?>" />
                                              <div class="form-group">
                                                  <label for="">Name</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                       <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name', $feegroup['name']); ?>" />
                                                    </div>
                                                  <span class="text-danger" style="display:inline"><?php echo form_error('name'); ?></span>
                                              </div>
                                              
                                              <div class="form-group">
                                                 <label for="">Description</label>
                                              <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('description'); ?><?php echo set_value('description', $feegroup['description']) ?></textarea>
                                          <span class="text-danger"><?php echo form_error('description'); ?></span>
                                      </div>
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Update Fee Group" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
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
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Fees Group List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"></div>
                                       <table id="example23" class="display nowrap" >
                                          <thead>
                                              <tr>
                                                  <th>Name</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                    <?php
                                    foreach ($feegroupList as $feegroup) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name">
                                                <a href="#" data-toggle="popover" class="detail_popover"><?php echo $feegroup['name'] ?></a>

                                                <div class="fee_detail_popover" style="display: none">
                                                    <?php
                                                    if ($feegroup['description'] == "") {
                                                        ?>
                                                        <p class="text text-danger"> NO Description'); ?></p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <p class="text text-info"><?php echo $feegroup['description']; ?></p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>

                                            <td class="mailbox-date pull-right">
                                                <?php
                                                //if ($this->rbac->hasPrivilege('fees_group', 'can_edit')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/feegroup/edit/<?php echo $feegroup['id'] ?>" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                <?php //} ?>
                                                <?php
                                                //if ($this->rbac->hasPrivilege('fees_group', 'can_delete')) {
                                                  //  ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/feegroup/delete/<?php echo $feegroup['id'] ?>"class="btn btn-info btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                <?php //} ?>
                                            </td>
                                        </tr>
                                        <?php
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

                
    
   
