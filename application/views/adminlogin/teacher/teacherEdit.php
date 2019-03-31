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
                               <i class="fa fa-home fa-fw"></i> || Teachers List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Teachers</li>
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
                                          <i class="fa fa-tags"></i> ||  Update Teacher
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>

                                          <form action="<?php echo site_url('webadmin/teacher/edit/' . $id) ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="form-group">
                                                  <label for="">Teacher Name</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                       <input autofocus="" id="category" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name', $teacher['name']); ?>"/> 
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('name'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Email ID</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                       <input id="category" name="email" placeholder="" type="text" class="form-control"  value="<?php echo set_value('email', $teacher['email']); ?>"/> 
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('email'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Gender &nbsp;&nbsp;</label>
                                                    <select class="form-control" name="gender">
                                                       <option value="">Select</option>
                                                        <?php
                                                        foreach ($genderList as $key => $value) { ?>
                                                        <option style="color:#000" value="<?php echo $key; ?>" <?php if (set_value('gender', $teacher['sex']) == $key) echo "selected"; ?>><?php echo $key; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Bate of Birth</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-calendar-check-o"></i></div>
                                                       <input iid="dob" name="dob" placeholder="" type="date" class="form-control"  value="<?php echo set_value('dob', $teacher['dob']); ?>" /> 
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('dob'); ?></span>
                                              </div>
                                               <div class="form-group">
                                                  <label for="">Aaddress</label>
                                                    <div class="">
                                                       <div class=""><i class=""></i></div>
                                                       <textarea id="address" name="address" placeholder=""  class="form-control" ><?php echo set_value('address', $teacher['address']); ?></textarea>
                                
                                                    </div>
                                                   <span class="text-danger"><?php echo form_error('address'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Phone</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                       <input id="phone" name="phone" placeholder="" type="text" class="form-control"  value="<?php echo set_value('phone', $teacher['phone']); ?>" /> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                              </div>
                                              <div class="form-group">
                                                   <label class="">Teacher Photo(150px X 150px)</label>
                                                   <input class="form-control" type="file" name="file" id="file"  />
<!--                                                     <div class="">
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                           <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                             <input type="file" name='file'> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                                    </div>-->
                                               </div>
                                              
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Save" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
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
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Teacher List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr style="line-height: 1.42857143;font-weight:400;">
                                                  <th>Teacher Name</th>
                                                  <th>Email</th>
                                                  <th>Date of Birth</th>
                                                  <th>Phone</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $count = 1;
                                              foreach ($teacherlist as $teacher) {
                                              ?>
                                              <tr>
                                                  <td> <?php echo $teacher['name'] ?></td>
                                                  <td><?php echo $teacher['email'] ?></td>
                                                  <td><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($teacher['dob'])); ?></td>
                                                  <td><?php echo $teacher['phone'] ?></td>
                                                  <td>
                                                      <div class="row ">
                                                          <div class="col-lg-3 ">
                                                              <a href="<?php echo base_url(); ?>webadmin/teacher/view/<?php echo $teacher['id'] ?>" class="btn btn-sm btn-primary" title="View" data-toggle="tooltip" ><i class="fa fa-eye"></i></a>
                                                               <a href="<?php echo base_url(); ?>webadmin/teacher/edit/<?php echo $teacher['id'] ?>" class="btn btn-sm btn-info" title="edit" data-toggle="tooltip" ><i class="fa fa-pencil-square"></i></a>
                                                           <a href="<?php echo base_url(); ?>webadmin/teacher/delete/<?php echo $teacher['id'] ?>" class="btn btn-sm btn-danger" title="delete" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
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
<script type="text/javascript">
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#dob,#admission_date').datepicker({
            format: date_format,
            autoclose: true
        });
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>

                
    
   
