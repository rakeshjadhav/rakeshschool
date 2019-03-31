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
                               <i class="fa fa-home fa-fw"></i> || Subject List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Subject</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                             <?php
            if ($this->rbac->hasPrivilege('subject', 'can_add') || $this->rbac->hasPrivilege('subject', 'can_edit')) {
                ?>
                          <div class="col-md-4 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-file"></i> || Update Subject
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>

                                          <form action="<?php echo site_url("webadmin/subject/edit/" . $id) ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                                              <div class="form-group">
                                                  <label for="">Subject Name</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                                       <input autofocus="" id="category" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name', $subject['name']); ?>"/> 
                                                    </div>
                                                 <span class="text-danger"><?php echo form_error('name'); ?></span>
                                              </div>
                                               <div class="form-group">
                                               <label class="radio-inline">
                                                     <input type="radio" value="Theory" name="type"  <?php if (set_value('type', $subject['type']) == "Theory") echo "checked"; ?> checked> Theory
                                                </label>
                                                <label class="radio-inline">
                                                     <input type="radio" name="type" <?php if (set_value('type', $subject['type']) == "Practical") echo "checked"; ?> value="Practical"> Practical
                                               </label>
                                               </div>
                                              <div class="form-group">
                                                  <label for="">Subject Code</label>
                                                    <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-code"></i></div>
                                                       <input id="phone" name="code" placeholder="" type="text" class="form-control"  value="<?php echo set_value('code', $subject['code']); ?>"  /> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('code'); ?></span>
                                              </div>
                                              
                                              
                                        <input type="submit" name="" id=""class="btn btn-xs btn-success waves-effect waves-light m-r-10" value="Save" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
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
                                if ($this->rbac->hasPrivilege('subject', 'can_add') || $this->rbac->hasPrivilege('subject', 'can_edit')) {
                                    echo "8";
                                } else {
                                    echo "12";
                                }
                                ?>"> 
                              <div class="">

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Subject List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr style="line-height: 1.42857143;font-weight:400;">
                                                  <th>Subject Name</th>
                                                  <th>Subject Code</th>
                                                  <th>Subject Type</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                                $count = 1;
                                                foreach ($subjectlist as $subject) {
                                                    ?>
                                              <tr>
                                                  <td> <?php echo $subject['name'] ?></td>
                                                  <td><?php echo $subject['code'] ?></td>
                                                  <td><?php echo $subject['type'] ?></td>
                                                  <td>
                                                      <div class="row ">
                                                          <div class="col-lg-3 ">
                                                              <?php if ($this->rbac->hasPrivilege('subject', 'can_edit')) { ?>
                                                              <a href="<?php echo base_url(); ?>webadmin/subject/edit/<?php echo $subject['id'] ?>" class="btn btn-xs btn-primary" title="View" data-toggle="tooltip" >
                                                                  <i class="fa fa-pencil"></i>
                                                              </a>
                                                              <?php } if ($this->rbac->hasPrivilege('subject', 'can_delete')) { ?>
                                                              <a href="<?php echo base_url(); ?>webadmin/subject/delete/<?php echo $subject['id'] ?>" class="btn btn-xs btn-danger" title="delete" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to delete this item?');">
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

                
    
   
