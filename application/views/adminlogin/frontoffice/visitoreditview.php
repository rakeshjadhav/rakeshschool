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
                
                <div class="white-box">
                    
                    <div class="row">
            <?php if ($this->rbac->hasPrivilege('visitor_book', 'can_add')) { ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit visitor</h3>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo site_url('webadmin/visitors/edit/' . $visitor_data['id']) ?>"   method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                            <div class="box-body">
                                <?php echo $this->session->flashdata('msg') ?>
                                <div class="form-group">
                                    <label for="">purpose</label><small class="req"> *</small>

                                    <select name="purpose" class="form-control"> 
                                        <option value="">select</option>    
                                        <?php foreach ($Purpose as $key => $value) { ?>
                                            <option value="<?php echo($value['visitors_purpose']); ?>"<?php if (set_value('purpose',$visitor_data['purpose']) == $value['visitors_purpose']) { ?>selected=""<?php } ?>><?php echo($value['visitors_purpose']); ?></option>
                                        <?php } ?>

                                    </select>
                                    <span class="text-danger"><?php echo form_error('purpose'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">name</label> <small class="req"> *</small> 
                                    <input type="text" class="form-control" value="<?php echo set_value('name', $visitor_data['name']); ?>" name="name">
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">phone</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('contact', $visitor_data['contact']); ?>" name="contact">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">icard</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('id_proof', $visitor_data['id_proof']); ?>" name="id_proof">
                                </div>

                                <div class="form-group">
                                    <label for="email">number_of_person</label> 
                                    <input type="text" class="form-control" value="<?php echo set_value('pepples', $visitor_data['no_of_pepple']); ?>" name="pepples">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="pwd">date</label>
                                        <input type="date" id="date" class="form-control" value="<?php echo set_value('date',$visitor_data['date']); ?>"  name="date" >
                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">in_time</label>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="time" class="form-control timepicker" id="stime_" value="<?php echo set_value('time', $visitor_data['in_time']); ?>">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('time'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">out_time</label>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="out_time" class="form-control timepicker" id="stime_" value="<?php echo set_value('out_time', $visitor_data['out_time']); ?>">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('out_time'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="">note</label>
                                    <textarea class="form-control" id="description" name="note" name="note" rows="3"><?php echo set_value('note', $visitor_data['note']); ?></textarea>
                                    <span class="text-danger">
                                </div>

                                <div class="form-group">
                                    <label for="">attach_document</label>
                                    <div><input class="filestyle form-control" type='file' name='file'/>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('file'); ?></span></div>
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
            if ($this->rbac->hasPrivilege('visitor_book', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="panel box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">visitor list</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="panel-body">
                       
                        <div class="table-responsive mailbox-messages">
                            <table id="example23" class="table table-hover table-striped table-bordered example">
                                <thead>
                                    <tr>
                                        <th>purpose</th>
                                        <th>name</th>
                                        <th>phone</th>
                                        <th>date</th>
                                        <th>in_time</th>
                                        <th>out_time</th>
                                        <th class="text-right">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($visitor_list)) {
                                        ?>

                                        <?php
                                    } else {
                                        foreach ($visitor_list as $key => $value) {
                                            // print_r($value);
                                            ?>
                                            <tr>
                                                <td class="mailbox-name"><?php echo $value['purpose']; ?></td>
                                                <td class="mailbox-name"><?php echo $value['name']; ?></td>
                                                <td class="mailbox-name"><?php echo $value['contact']; ?> </td>
                                                <td class="mailbox-name"> <?php echo $value['date']; ?></td>
                                                <td class="mailbox-name"> <?php echo $value['in_time']; ?></td>
                                                <td class="mailbox-name"> <?php echo $value['out_time']; ?></td>
                                                <td class="mailbox-date pull-right" >
                                                    <a  onclick="getRecord(<?php echo $value['id']; ?>)" class="btn btn-primary btn-xs" data-target="#visitordetails" data-toggle="modal" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing" data-original-title="View"><i class="fa fa-reorder"></i></a> 
        <?php if ($value['image'] !== "") { ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/visitors/download/<?php echo $value['image']; ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="" data-original-title="download">
                                                            <i class="fa fa-download"></i>
                                                        </a>  <?php } ?> 
        <?php if ($this->rbac->hasPrivilege('visitor_book', 'can_edit')) { ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/visitors/edit/<?php echo $value['id']; ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="" data-original-title="edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php }
                                                    ?>

        <?php if ($this->rbac->hasPrivilege('visitor_book', 'can_delete')) { ?>
                                                        <?php if ($value['image'] !== "") { ?><a href="<?php echo base_url(); ?>admin/visitors/imagedelete/<?php echo $value['id']; ?>/<?php echo $value['image']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="<?php echo $this->lang->line('delete'); ?>">
                                                                <i class="fa fa-remove"></i>
                                                            </a>
            <?php } else { ?>
                                                            <a href="<?php echo base_url(); ?>admin/visitors/delete/<?php echo $value['id']; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');" data-original-title="Delete">
                                                                <i class="fa fa-remove"></i>
                                                            </a>
            <?php }
        }
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
            </div><!--/.col (left) col-8 end-->
            <!-- right column -->

        </div>
                </div>
                <div id="visitordetails" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">details</h4>
            </div>
            <div class="modal-body" id="getdetails">


            </div>
        </div>
    </div>
</div>
                
                <script type="text/javascript">


                                                $(function () {

                                                    $(".timepicker").timepicker({
                                                        // showInputs: false,
                                                        // defaultTime: false,
                                                        // explicitMode: false,
                                                        // minuteStep: 1
                                                    });
                                                });


                                                function getRecord(id) {
                                                    //alert(id);
                                                    $.ajax({
                                                        url: '<?php echo base_url(); ?>webadmin/visitors/details/' + id,
                                                        success: function (result) {
                                                            //alert(result);
                                                            $('#getdetails').html(result);
                                                        }


                                                    });

                                                }

</script>