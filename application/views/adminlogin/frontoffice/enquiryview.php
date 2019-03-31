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
                    
                    
                    <div class="row">
            <div class="col-md-12">

                <div class="white-box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> select_criteria</h3>
                    </div>
                    <div class="col-md-12">
                        <?php echo $this->session->flashdata('msg') ?>
                    </div>
                    <form role="form" action="<?php echo site_url('webadmin/enquiry') ?>" method="post" class="">
                        <div class="box-body row">

                          

                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>enquiry date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" autocomplete="off" name="enquiry_date" class="form-control pull-right" id="enquiry_date">
                                    </div>
                                                      <!-- <input type="text" class="form-control" autocomplete="off"  name="enquiry_date" id="enquiry_date">
                                    -->  <span class="text-danger"><?php echo form_error('enquiry_date'); ?></span>
                                </div>
                            </div> 

                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">  
                                    <label>source</label>
                                    <select  id="source" name="source" class="form-control" >
                                        <option value="">select</option>

                                        <?php foreach ($sourcelist as $key => $value) { ?>
                                            <option <?php
                                            if ($value["source"] == $source_select) {
                                                echo "selected";
                                            }
                                            ?> value="<?php echo $value["source"] ?>"><?php echo $value["source"] ?></option>
<?php } ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('source'); ?></span>
                                </div>  
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">  
                                    <label>status</label>
                                    <select  id="status" name="status" class="form-control" >
                                        <option value="">select</option>
                                        <option value="all" <?php
                                                if ($status == "all") {
                                                    echo "selected";
                                                }
                                                ?>>all</option>
                                            <?php foreach ($enquiry_status as $enkey => $envalue) {
                                                ?>
                                            <option <?php
                                                if ($enkey == $status) {
                                                    echo "selected";
                                                }
                                                ?> value="<?php echo $enkey ?>"><?php echo $envalue ?></option>

<?php } ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('status'); ?></span>
                                </div>  
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>

                    </form>
                </div>
            </div> 
            <div class="">

                <div class="white-box  box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title titlefix"> Admission_enquiry</h3>
                        <div class="box-tools pull-right">
<?php if ($this->rbac->hasPrivilege('admission_enquiry', 'can_add')) { ?>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> add</button> 
<?php } ?>      
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                       
                        <div class="table-responsive mailbox-messages">
                            <table id="example23" class="table table-hover table-striped table-bordered" id="enquirytable">
                                <thead>
                                    <tr>

                                        <th>name</th>
                                        <th>phone</th>
                                        <th>source</th>
                                        <th>enquiry date</th>
                                        <th>last_follow_up_date</th>
                                        <th>next_follow_up_date</th>
                                        <th>status</th>
                                        <th class="text-right">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($enquiry_list)) {
                                        ?>
                                        <?php
                                    } else {
                                        foreach ($enquiry_list as $key => $value) {
                                            $current_date = date("Y-m-d");
                                            $next_date = $value["next_date"];
                                            if (empty($next_date)) {

                                                $next_date = $value["follow_up_date"];
                                            }

                                            if ($next_date < $current_date) {
                                                $class = "class='danger'";
                                            } else {
                                                $class = "";
                                            }
                                            ?>
                                            <tr <?php echo $class ?>>

                                                <td class="mailbox-name"><?php echo $value['name']; ?></td>
                                                <td class="mailbox-name"><?php echo $value['contact']; ?> </td>
                                                <td class="mailbox-name"><?php echo $value['source']; ?></td>

                                                <td class="mailbox-name"> <?php
                                            if (!empty($value["date"])) {
                                                echo $value['date'];
                                            }
                                            ?></td>

                                                <td class="mailbox-name"> <?php
                                                    if (!empty($value["followupdate"])) {
                                                        echo $value['followupdate'];
                                                    }
                                                    ?></td>
                                                <td class="mailbox-name"> <?php
                                                    if (!empty($next_date)) {
                                                        echo $next_date;
                                                    }
                                                    ?></td>

                                                <td> <?php echo $enquiry_status[$value["status"]] ?></td>              
                                                <td class="mailbox-date text-right">
        <?php if ($this->rbac->hasPrivilege('follow_up_admission_enquiry', 'can_view')) { ?>
                                                        <a class="btn btn-default btn-xs" onclick="follow_up('<?php echo $value['id']; ?>','<?php echo $value['status']; ?>');" title="" data-target="#follow_up" data-toggle="modal"  data-original-title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-phone"></i>
                                                        </a>
                                                    <?php }
                                                    ?>
        <?php if ($this->rbac->hasPrivilege('admission_enquiry', 'can_edit')) { ?>
                                                        <a  onclick="getRecord('<?php echo $value['id']; ?>','<?php echo $value['status']; ?>')" class="btn btn-default btn-xs" data-target="#myModaledit" data-toggle="modal" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing" data-original-title="View"><i class="fa fa-pencil"></i>
                                                        </a> 
                                            <?php }
                                            ?>
                                            <?php if ($this->rbac->hasPrivilege('admission_enquiry', 'can_delete')) { ?>
                                                        <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="delete_enquiry('<?php echo $value["id"] ?>')" data-original-title="<?php echo $this->lang->line('delete'); ?>">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
        <?php }
        ?>

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
            </div>
        </div>
                </div>