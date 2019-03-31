<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
                  
                    <div class="white-box row">
                        <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> Employee
                            <?php //if ($this->rbac->hasPrivilege('staff', 'can_add')) { ?>
                <small class="pull-right">
                    <a href="<?php echo base_url(); ?>webadmin/staff/create" class="btn btn-primary btn-sm"   >
                        <i class="fa fa-plus"></i> add
                    </a>
                </small>
            <?php //} ?>
                        </h3>
                    </div>
                    <div class="box-body">
                        
                        <?php if ($this->session->flashdata('msg')) { ?> 
                          <?php echo $this->session->flashdata('msg') ?>
                          <?php } ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('webadmin/staff') ?>" method="post" class="">
                                        <?php //echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group"> 
                                                <label>Role</label><small class="req"> *</small>
                                                <select name="role" class="form-control">
                                                    <option value="">select</option>
                                                    <?php foreach ($role as $key => $role_value) {
                                                        ?>
                                                        <option <?php
                                                        if ($role_id == $role_value["type"]) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?php echo $role_value['type'] ?>"><?php echo $role_value['type'] ?></option>
                                                   <?php }?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                                            </div>  
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> search</button>
                                            </div>
                                        </div>
                                </div>  
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('webadmin/staff') ?>" method="post" class="">
                                     <?php //echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>search_by_keyword</label>
                                                <input type="text" name="search_text" class="form-control"   placeholder="Search_by_staff">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <?php
                if (isset($resultlist)) {
                    ?>
                        <div class="table-responsive manage-table" style="background-color:#fff;">
                                            <table id="example23" class="table">
                                                <thead>
                                                    <tr>
                                                        <!--<th>1</th>-->
                                                        <th>1</th>
                                                        <th>Emp Id</th>
                                                        <th style="width: 150px;">Name</th>
                                                        <th>Role</th>
                                                        <th>Department</th>
                                                        <th>Designation</th>
                                                        <th>Mobile No</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                        if (empty($resultlist)) {
                                            ?>
                                            <tr>
                                                <td colspan="12" class="text-danger text-center">no_record_found</td>
                                            </tr>
                                        <?php
                                        } else {
                                            $count = 1;
                                            foreach ($resultlist as $staff) {
                                                ?>
                                                    <tr class="advance-table-row">
                                                        <!--<td style="width: 10px;"></td>-->
                                                        <td style="width: 40px;">
                                                            <div class="checkbox checkbox-circle checkbox-info">
                                                                <input id="checkbox7" checked="" type="checkbox">
                                                                <label for="checkbox7"> </label>
                                                            </div>
                                                        </td>
                                                         <td style=""><?php echo $staff['employee_id']; ?></td>
                                                        <td>
                                                        <a <?php //if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) { ?> href="<?php echo base_url(); ?>webadmin/staff/profile/<?php echo $staff['id']; ?>"
                                                  <?php //} ?>><?php echo $staff['name'] . " " . $staff['surname']; ?>
                                                        </a>
                                                    </td>

                                                    <td><?php echo $staff['user_type']; ?></td>
                                                    <td><?php echo $staff['department']; ?></td>
                                                    <td><?php echo $staff['designation']; ?></td>
                                                    <td><?php echo $staff['contact_no']; ?></td>

                                                    <td class="pull-right">
            <?php //if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) { ?>
                                                            <a href="<?php echo base_url(); ?>webadmin/staff/profile/<?php echo $staff['id'] ?>" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="show" >
                                                                <i class="fa fa-reorder"></i>
                                                            </a>
            <?php //} if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) {

                  $a = 0 ;
          $sessionData = $this->session->userdata('admin');
            $userdata = $this->customlib->getUserData();
        
         $staff["user_type"];
          if($staff["user_type"] == "Super Admin"){
                if($userdata["email"] == $staff["email"]){
                    $a = 1;    
                }
            }else{
                $a = 1 ;
            }
            if($a == 1){
             ?>
                                                            <a href="<?php echo base_url(); ?>webadmin/staff/edit/<?php echo $staff['id'] ?>" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="edit">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                <?php } } ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                        </div>
                        <?php //} ?>
                                 </div>
                
                