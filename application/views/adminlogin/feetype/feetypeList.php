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
                             <li class="active">Add Fees Type</li>
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
                                          <i class="fa fa-tags"></i> ||  Add Fees Type
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

                                          <form action="<?php echo base_url() ?>webadmin/feetype" method="post">
                                              <div class="form-group">
                                                  <label for="">Name</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                       <input autofocus="" id="name" name="name" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                                    </div>
                                                  <span class="text-danger" style="display:inline"><?php echo form_error('name'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                 <label for="">Fees Code</label>
                                              <input id="code" name="code" type="text" class="form-control"  value="<?php echo set_value('code'); ?>" />
                                          <span class="text-danger"><?php echo form_error('code'); ?></span>
                                      </div>
                                              <div class="form-group">
                                                 <label for="">Description</label>
                                              <textarea class="form-control" id="description" name="description" rows="3"><?php echo set_value('description'); ?></textarea>
                                          <span class="text-danger"><?php echo form_error('description'); ?></span>
                                      </div>
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Add Fee Type" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
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
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Fees Type List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"></div>
                                       <table id="example23" class="display nowrap" >
                                          <thead>
                                              <tr>
                                                  <th>Name</th>
                                                  <th>Fee Code</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                    <?php
                                    foreach ($feetypeList as $feetype) {
                                        ?>
                                        <tr>
                                            <td class="">
                                                <a href="#" data-toggle="popover" class="detail_popover"><?php echo $feetype['type'] ?></a>

                                                <div class="fee_detail_popover" data-toggle="tooltip" title="" style="display: none">
                                                    <?php
                                                    if ($feetype['description'] == "") {
                                                        ?>
                                                    <p class="text text-danger"  title="No Description"> No Description</p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <p class="text text-info"><?php echo $feetype['description']; ?></p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td class="">
                                                <?php echo $feetype['code']; ?>
                                            </td>

                                            <td class="pull-right">
                                                <?php
                                                //if ( $this->rbac->hasPrivilege('fees_type', 'can_edit')) {
                                                  //  ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/feetype/edit/<?php echo $feetype['id'] ?>" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                <?php //} ?>
                                                <?php
                                               // if ($this->rbac->hasPrivilege('fees_type', 'can_delete')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/feetype/delete/<?php echo $feetype['id'] ?>"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('Are you sure you want to delete this item?');">
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

                
    
   
