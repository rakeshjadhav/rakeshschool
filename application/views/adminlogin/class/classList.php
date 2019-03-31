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
                            <?php if ($this->rbac->hasPrivilege('classes', 'can_add')) { ?> 
                          <div class="col-md-4 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-university"></i> ||  Add Class
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

                                          <form action="<?php echo base_url() ?>webadmin/classes" method="post">
                                              <div class="form-group">
                                                  <label for="">Class Name</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-university"></i></div>
                                                       <input type="text" autofocus="" class="form-control" id="class" name="class" value="<?php echo set_value('class'); ?>" > 
                                                    </div>
                                                  <span class="text-danger" style="display:inline"><?php echo form_error('class'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                 <label for="">Division Name</label>
                                              <?php
                                                foreach ($divisionlist as $divisionlist) {?>
                                                 <div class="" style="">
                                                    <label class="">
                                                        <input  type="checkbox" name="division[]" value="<?php echo $divisionlist['id'] ?>" <?php echo set_checkbox('division[]', $divisionlist['id']); ?> >
                                                            <?php echo $divisionlist['division'] ?>
                                                    </label>
                                              </div>
                                          <?php
                                      }
                                      ?>
                                          <span class="text-danger"><?php echo form_error('division[]'); ?></span>
                                      </div>
                                        <input type="submit" name="" id=""class="btn btn-xs btn-success waves-effect waves-light m-r-10" value="Add Class" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
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
            <div class="col-md-<?php
                if ($this->rbac->hasPrivilege('clsses', 'can_add')) {
                echo "8";
                        } else {
                echo "12";
            }
            ?>">
                     <div class="">
                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-university fa-fw"></i> || Classes List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                       <table id="example23" class="display nowrap" >
                                          <thead>
                                              <tr>
                                                  <th>Classes</th>
                                                  <th>Division</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              foreach ($vehroutelist as $vehroute) {
                                        ?>
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
                                                          <div class="col-lg-3">
                                                              <?php if ($this->rbac->hasPrivilege('classes', 'can_edit')) { ?>
                                                              <a href="<?php echo base_url(); ?>webadmin/classes/edit/<?php echo $vehroute->id; ?>" class="btn btn-xs btn-primary" title="Edit" data-toggle="tooltip" >
                                                                  <i class="fa fa-pencil"></i>
                                                              </a>
                                                              <?php } if ($this->rbac->hasPrivilege('classes', 'can_delete')) { ?>
                                                           <a href="<?php echo base_url(); ?>webadmin/classes/delete/<?php echo $vehroute->id; ?>" class="btn btn-xs btn-danger" title="delete" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to delete this item?');">
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

                
    
   
