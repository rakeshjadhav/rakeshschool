<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || visitors purpose view
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Add visitors purpose view</li>
                        </ol>
                    </div>
                </div>
                
                <div class="white-box">
                   <div class="row">
            <div class="col-md-2">
                <div class="vtabs customvtab">
                    <ul class="nav tabs-vertical ">
                        <li class="tab active">
                            <a href="<?php echo site_url('webadmin/visitorspurpose') ?>" class="active">
                            purpose
                            </a>
                        </li>
                        <li class="tab">
                            <a href="<?php echo site_url('webadmin/complainttype') ?>">
                                complain_type
                            </a>
                        </li>
                        <li class="tab">
                            <a href="<?php echo site_url('webadmin/source') ?>">
                                source
                            </a>
                        </li>
                        <li class="tab">
                            <a href="<?php echo site_url('webadmin/reference') ?>" >
                                reference
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--./col-md-3-->
            <?php if ($this->rbac->hasPrivilege('setup_font_office', 'can_add') || $this->rbac->hasPrivilege('setup_font_office', 'can_edit')) { ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">edit complain type</h3>
                        </div><!-- /.box-header -->

                        <form id="form1" action="<?php echo site_url('webadmin/complainttype/editcomplainttype/' . $complaint_type_data['id']) ?>" method="post"    >
                            <div class="box-body">                        
                                <?php echo $this->session->flashdata('msg') ?>
                                <div class="form-group">
                                    <label for="pwd">complain type</label><small class="req"> *</small>
                                    <input class="form-control" id="description" name="complaint_type"  value="<?php echo set_value('complaint_type', $complaint_type_data['complaint_type']); ?>"/>
                                    <span class="text-danger"><?php echo form_error('complaint_type'); ?></span>
                                </div>  
                                <?php // print_r($complaint_data); ?>
                                <div class="form-group">
                                    <label for="pwd">description</label>
                                    <textarea class="form-control" id="description" name="description"rows="3"><?php echo set_value('description', $complaint_type_data['description']); ?></textarea>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">save</button>
                            </div>
                        </form>
                    </div>
                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('setup_font_office', 'can_add') || $this->rbac->hasPrivilege('setup_font_office', 'can_edit')) {
                echo "6";
            } else {
                echo "10";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">complain type list</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"></div>
                        <div class="table-responsive mailbox-messages">
                            <table id="example23" class="table table-hover table-striped table-bordered example">
                                <thead>
                                    <tr>                                    
                                        <th>complain type</th>
                                        <th class="text-right">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($complaint_type_list)) {
                                        ?>
                                        <?php
                                    } else {
                                        foreach ($complaint_type_list as $key => $value) {
                                            ?>
                                            <tr>

                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $value['complaint_type'] ?></a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($value['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger">no_description</p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $value['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div></td>


                                                <td class="mailbox-date pull-right">
        <?php if ($this->rbac->hasPrivilege('setup_font_office', 'can_edit')) { ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/complainttype/editcomplainttype/<?php echo $value['id']; ?>"  class="btn btn-primary btn-xs" data-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
        <?php } if ($this->rbac->hasPrivilege('setup_font_office', 'can_delete')) { ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/complainttype/delete/<?php echo $value['id']; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="" onclick="return confirm('Are you sure want to delete this intm ???');" data-original-title="Delete">
                                                            <i class="fa fa-remove"></i>
                                                        </a>

        <?php } ?>
                                                </td>


                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>