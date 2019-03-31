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
                               <i class="fa fa-home fa-fw"></i> || Add Designation
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Add Designation</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                      <?php if (($this->rbac->hasPrivilege('designation', 'can_add')) || ($this->rbac->hasPrivilege('designation', 'can_edit'))) { ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="">
                            <div class="panel " style="border-top:2px solid #ff6347" >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-tags"></i> ||  Add Designation
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php //echo $this->customlib->getCSRF(); ?>
                                    <form action="<?php echo site_url('webadmin/designation/designation') ?>" method="post">
                                        <div class="form-group">
                                            <label for=""> Name</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                <input autofocus="" id="type"  name="type" placeholder="" type="text" class="form-control"  value="<?php if (isset($result)) { echo $result["designation"];} ?>" /> </div>
                                                <span class="text-danger"><?php echo form_error('type'); ?></span>
                                                
                                                <input autofocus="" id="type"  name="designationid" placeholder="" type="hidden" class="form-control"  value="<?php if (isset($result)) {echo $result["id"];}?>" />
                                        </div>
                                        <input type="submit" name="" id=""class="btn btn-xs btn-success waves-effect waves-light m-r-10" value="Add" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
                                        <input type="submit" name="" id="" class="btn btn-xs btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                   
                                      </form>
                                                                       
                                </div>
                            </div>
                                </div></div></div>
                        </div>
                    </div>
                      <?php } ?>
                    <div class="col-md-8 col-sm-12 <?php
if (($this->rbac->hasPrivilege('designation', 'can_add')) || ($this->rbac->hasPrivilege('designation', 'can_edit'))) {
    echo "8";
} else {
    echo "12";
}
?>">
                        <div class="">

                     <div class="col-sm-12">
                         <div class="panel" style="border-top:2px solid #ff6347">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;">
                                <i class="fa fa-tags fa-fw"></i> || Designation List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                              	<div class="download_label"></div>
                                 <table id="example23" class="display nowrap" >
                                    <thead>
                                        <tr>
                                            <th hidden="">#</th>
                                            <th>Designation Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($designation as $value) {
                                        $status = "";
                                        if ($value["is_active"] == "yes") {
                                            $status = "Active";
                                        } else {
                                            $status = "Inactive";
                                        }
                                        ?>
                                        <tr>
                                            <td hidden=""><?php $value['id'] ?></td>
                                            <td class=""> <?php echo $value['designation'] ?></td>
                                            <td class="mailbox-date pull-right no-print">
                                        <?php if ($this->rbac->hasPrivilege('designation', 'can_edit')) { ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/designation/designationedit/<?php echo $value['id'] ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                        <?php } if ($this->rbac->hasPrivilege('designation', 'can_delete')) { ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/designation/designationdelete/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are You sure you want to delete item ?');">
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

                
    
   
