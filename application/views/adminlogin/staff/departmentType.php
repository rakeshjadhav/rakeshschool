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
                               <i class="fa fa-home fa-fw"></i> || Add Department
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Add Department</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                      <?php if (($this->rbac->hasPrivilege('department', 'can_add')) || ($this->rbac->hasPrivilege('department', 'can_edit'))) { ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="">
                            <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-tags"></i> ||  Add Department
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php //echo $this->customlib->getCSRF(); ?>
                                    <form action="<?php echo site_url('webadmin/department/department') ?>" method="post">
                                        <div class="form-group">
                                            <label for=""> Name</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                <input autofocus="" id="type"  name="type" placeholder="" type="text" class="form-control"  value="<?php if (isset($result)) { echo $result["department_name"];} ?>" /> </div>
                                                <span class="text-danger"><?php echo form_error('type'); ?></span>
                                                
                                                <input autofocus="" id="type"  name="departmenttypeid" placeholder="" type="hidden" class="form-control"  value="<?php if (isset($result)) {echo $result["id"];}?>" />
                                        </div>
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Add" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
                                        <input type="submit" name="" id="" class="btn btn-sm btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                   
                                      </form>
                                                                       
                                </div>
                            </div>
                                </div></div></div>
                        </div>
                    </div>
                      <?php } ?>
                    <div class="col-md-8 col-sm-12 <?php
if (($this->rbac->hasPrivilege('department', 'can_add')) || ($this->rbac->hasPrivilege('department', 'can_edit'))) {
    echo "8";
} else {
    echo "12";
}
?>">
                        <div class="">

                     <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;">
                                <i class="fa fa-tags fa-fw"></i> || Department List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                              	<div class="download_label"></div>
                                 <table id="example23" class="display nowrap" >
                                    <thead>
                                        <tr>
                                            <th>department Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($departmenttype as $value) {
                                        $status = "";

                                        if ($value["is_active"] == "yes") {

                                            $status = "Active";
                                        } else {
                                            $status = "Inactive";
                                        }
                                        ?>
                                        <tr>

                                            <td class=""> <?php echo $value['department_name'] ?></td>
                                           
                                            <td class="mailbox-date pull-right no-print">
                                            <?php if ($this->rbac->hasPrivilege('department', 'can_edit')) {
                                            ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/department/departmentedit/<?php echo $value['id'] ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                        <?php } if ($this->rbac->hasPrivilege('department', 'can_delete')) {
                                            ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/department/departmentdelete/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('Are you sure you wont delete item');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                        <?php } ?>
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

                
    
   
