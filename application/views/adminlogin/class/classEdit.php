<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Classes List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Classes</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                             <?php if ($this->rbac->hasPrivilege('class', 'can_add') || $this->rbac->hasPrivilege('class', 'can_edit')) {?> 
                          <div class="col-md-4 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-university"></i> ||  Update Class
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
                                            <?php echo $this->customlib->getCSRF(); ?>

                                          <form action="<?php echo site_url('webadmin/classes/edit/' . $id) ?>" method="post">
                                              <input type="hidden" name="id" value="<?php echo set_value('id', $vehroute[0]->id); ?>" >
                                              <input type="hidden" name="pre_class_id" value="<?php echo $vehroute[0]->id; ?>" >
                                              
                                                  <?php
                                                     foreach ($vehroute[0]->vehicles as $v_key => $v_value) {
                                                    ?>
                                                    <input type="hidden" name="prev_sections[]" value="<?php echo $v_value->id; ?>">
                                                 <?php }  ?>
                                                    
                                              <div class="form-group">
                                                  <label for="">Class Name</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-university"></i></div>
                                                       <input type="text" autofocus="" class="form-control" id="class" name="class" value="<?php echo set_value('class', $vehroute[0]->route_id); ?>"> 
                                                    </div>
                                                  <span class="text-danger"><?php echo form_error('class'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                 <label for="">Division</label>
                                             <?php
                                                 foreach ($vehiclelist as $vehicle) {
                                               ?>
                                                 <div class="" style="">
                                                    <label>
                                                        <input  type="checkbox" name="division[]" value="<?php echo $vehicle['id'] ?>" <?php echo set_checkbox('division[]', $vehicle['id'], check_in_array($vehicle['id'], $vehroute[0]->vehicles)); ?> ><?php echo $vehicle['division'] ?>
                                                    </label>
                                              </div>
                                          <?php
                                      }
                                      ?>
                                          <span class="text-danger"><?php echo form_error('division[]'); ?></span>
                                      </div>
                                        <input type="submit" name="" id=""class="btn btn-xs btn-success waves-effect waves-light m-r-10" value="Update Class" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
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
                          <div class="col-md-<?php if ($this->rbac->hasPrivilege('class', 'can_add') || $this->rbac->hasPrivilege('class', 'can_edit')) {
                                echo "8";
                            } else {
                                echo "12";
                            }
                            ?>  ">
                              <div class="">

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Classes List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                       <table id="example23" class="display nowrap" >
                                          <thead>
                                              <tr>
                                                  <th>Class</th>
                                                  <th>Division</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              foreach ($vehroutelist as $vehroute) { ?>
                                              <tr>
                                                  <td> <?php echo $vehroute->class; ?></td>
                                                  <td>
                                                      <?php
                                                $vehicles = $vehroute->vehicles;
//                                                var_dump($vehicles);exit;
                                                if (!empty($vehicles)) {
                                                    foreach ($vehicles as $key => $value) {
                                                        echo "<div>" . $value->division . "</div>";
                                                    }
                                                }
                                                ?>
                                                  </td>
                                                  <td>
                                                      <div class="row ">
                                                          <div class="col-lg-3 ">
                                                              <?php if ($this->rbac->hasPrivilege('class', 'can_edit')) {
                                                                ?>  
                                                              <a href="<?php echo base_url(); ?>webadmin/classes/edit/<?php echo $vehroute->id; ?>" class="btn btn-xs btn-primary" title="Edit" data-toggle="tooltip" >
                                                                  <i class="fa fa-pencil"></i>
                                                              </a>
                                                              <?php } if ($this->rbac->hasPrivilege('class', 'can_delete')) { ?> 
                                                           <a href="<?php echo base_url(); ?>admin/classes/delete/<?php echo $vehroute->id; ?>" class="btn btn-xs btn-danger" title="delete" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to delete this item?');">
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
                                         // $count++;
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

  <?php

function check_in_array($find, $array) {

    foreach ($array as $element) {
        if ($find == $element->id) {
            return TRUE;
        }
    }
    return FALSE;
}
?>              
    
   
