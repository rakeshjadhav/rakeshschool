<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<style type="text/css">
    .material-switch > input[type="checkbox"] {
        display: none;   
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative; 
        width: 40px;  
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-users fa-fw"></i> || Users List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Users</li>
                        </ol>
                    </div>
                </div>
<!--                <div class="row">
                    <div class="col-md-12">
                        <div class="">-->
                        <div class="row">
                    <?php //if ($this->rbac->hasPrivilege('division', 'can_add')) { ?>
                    <div class="">
                        <div class="">
                            <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-retweet"></i> ||  Users
                                     <ul class="nav nav-tabs pull-right">
                                        <li><a href="#tab_staff" data-toggle="tab">Employee</a></li>
                                        <li><a href="#tab_parent" data-toggle="tab">parent</a></li>                        
                                        <li class="active"><a href="#tab_students" data-toggle="tab">student</a></li>
                                          
                                           </ul>
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    
                                    
                                    
                  <div class="row white-box">                   
                    <div class="col-md-12">
                    <div class="tab-content">

                        <div class="tab-pane active table-responsive" id="tab_students">
                            <table  id="example23" cclass="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Admission No</th>
                                        <th>Student Name</th>
                                        <th>Username</th>
                                        <th>Class</th>
                                        <th>Father Name</th>
                                        <th>Mobile No</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($studentList)) {
                                        $count = 1;
                                        foreach ($studentList as $student) {
                                            ?>
                                            <tr>
                                                <td><?php echo $student['admission_no']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['id']; ?>"><?php echo $student['firstname'] . " " . $student['lastname']; ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $student['username']; ?></td>
                                                <td><?php echo $student['class'] . "(" . $student['division'] . ")" ?></td>
                                                <td><?php echo $student['father_name']; ?></td>
                                                <td><?php echo $student['mobileno']; ?></td>
                                                <td class="pull-right">
                                                    <div class="material-switch pull-right">

                                                        <input id="student<?php echo $student['user_tbl_id'] ?>" name="someSwitchOption001" type="checkbox" data-role="student" class="chk" data-rowid="<?php echo $student['user_tbl_id'] ?>" value="checked" <?php if ($student['user_tbl_active'] == "yes") echo "checked='checked'"; ?> />
                                                        <label for="student<?php echo $student['user_tbl_id'] ?>" class="label-success"></label>
                                                    </div>

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
                        <!-- /.tab-pane -->
                        <div class="tab-pane table-responsive" id="tab_parent">
                            <div class="download_label">users</div>
                            <table id="example23" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Guardian Name</th>
                                        <th>Guardian Phone</th>
                                        <th>Username</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($parentList)) {
                                        $count = 1;
                                        foreach ($parentList as $parent) {
                                            ?>
                                            <tr>
                                                <td><?php echo $parent->guardian_name; ?></td>
                                                <td><?php echo $parent->guardian_phone; ?></td>
                                                <td><?php echo $parent->username; ?></td>
                                                <td class="pull-right">
                                                    <div class="material-switch pull-right">

                                                        <input id="parent<?php echo $parent->id ?>" name="someSwitchOption001" type="checkbox" class="chk" data-rowid="<?php echo $parent->parent_id ?>" data-role="parent" value="checked" <?php if ($parent->is_active == "yes") echo "checked='checked'"; ?> />
                                                        <label for="parent<?php echo $parent->id ?>" class="label-success"></label>
                                                    </div>

                                                </td>
                                            </tr>    

                                            <?php
                                        }
                                    }

//                                    if (!empty($parentList)) {
//                                        $count = 1;
//                                        foreach ($parentList as $parent) {
//                                            if (!empty($parent->siblings)) {
//                                                $sibling = $parent->siblings;
//                                                
                                    ?>
<!--                                                <tr>
    <td>//<?php echo $sibling[0]['guardian_name']; ?></td>
    <td>//<?php echo $sibling[0]['guardian_phone']; ?></td>
    <td>//<?php echo $sibling[0]['guardian_address']; ?></td>
    <td class="pull-right">
        <div class="material-switch pull-right">

            <input id="parent//<?php echo $parent->id ?>" name="someSwitchOption001" type="checkbox" class="chk" data-rowid="<?php echo $parent->id ?>" value="checked" <?php if ($parent->is_active == "yes") echo "checked='checked'"; ?> />
            <label for="parent//<?php echo $parent->id ?>" class="label-success"></label>
        </div>

    </td>
</tr>-->
                                    <?php
//                                            }
//
//
//                                            $count++;
//                                        }
//                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="tab_staff">
                            
                            <table id="example123" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                <thead>
                                    <tr>

                                        <th>staff_id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>role</th>
                                        <th>designation</th>
                                        <th>department</th>
                                        <th>phone</th>
                                        <th class="text-right">action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($staffList)) {
                                        $count = 1;
                                        foreach ($staffList as $staff) {
                                            ?>
                                            <tr>

                                                <td class="mailbox-name"> <?php echo $staff['employee_id'] ?></td>
                                                <td class="mailbox-name"> <a href="<?php echo base_url(); ?>webadmin/staff/profile/<?php echo $staff['id']; ?>"><?php echo $staff['name'] ?></a></td>
                                                <td class="mailbox-name"> <?php echo $staff['email'] ?></td>
                                                <td class="mailbox-name"> <?php echo $staff['role'] ?></td>
                                                <td class="mailbox-name"> <?php echo $staff['designation'] ?></td>
                                                <td class="mailbox-name"> <?php echo $staff['department'] ?></td>

                                                <td class="mailbox-name"> <?php echo $staff['contact_no'] ?></td>
                                                <td class="pull-right">
                                                    <div class="material-switch pull-right">

                                                        <input id="staff<?php echo $staff['id'] ?>" name="someSwitchOption001" type="checkbox" class="chk" data-rowid="<?php echo $staff['id'] ?>" data-role="staff" value="checked" <?php if ($staff['is_active'] == 1) echo "checked='checked'"; ?> />
                                                        <label for="staff<?php echo $staff['id'] ?>" class="label-success"></label>
                                                    </div>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <!--</div>-->

                        <!-- /.tab-pane -->
                    </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div> 
        </div> 
<!--                </div> 
                   
                        </div>
                    </div>-->
<!--                </div>
</div>-->

                
    
   
