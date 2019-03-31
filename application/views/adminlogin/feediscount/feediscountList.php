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
                             <li class="active">Add Fees Master</li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
            <div class="col-md-4">
                <!-- Horizontal Form -->
                <div class="white-box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">add_fees_discount</h3>
                    </div><!-- /.box-header -->
                    <form id="form1" action="<?php echo site_url('webadmin/feediscount') ?>"  id="feediscountform" name="feediscountform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>

                            <div class="form-group">
                                <label for="">name</label>
                                <input autofocus="" id="name" name="name" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">discount_code</label>
                                <input id="code" name="code" type="text" class="form-control"  value="<?php echo set_value('code'); ?>" />
                                <span class="text-danger"><?php echo form_error('code'); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">amount</label>
                                <input id="amount" name="amount" type="text" class="form-control"  value="<?php echo set_value('amount'); ?>" />
                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"><?php echo set_value('description'); ?></textarea>
                                <span class="text-danger"></span>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                    </form>
                </div>

            </div><!--/.col (right) -->
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="white-box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">fees_discount_list</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <table id="example23" class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>

                                        <th>name</th>
                                        <th>discount_code</th>

                                        <th>amount</th>

                                        <th class="text text-right">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($feediscountList as $feediscount) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name">
                                                <?php echo $feediscount['name'] ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php echo $feediscount['code'] ?>

                                            </td>

                                            <td class="mailbox-name">
                                                <?php echo $feediscount['amount'] ?>
                                            </td>


                                            <td class="mailbox-date pull-right">
                                                <a href="<?php echo base_url(); ?>webadmin/feediscount/assign/<?php echo $feediscount['id'] ?>" 
                                                   class="btn btn-primary btn-xs" data-toggle="tooltip" title="assign / view">
                                                    <i class="fa fa-tag"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>webadmin/feediscount/edit/<?php echo $feediscount['id'] ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>webadmin/feediscount/delete/<?php echo $feediscount['id'] ?>" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
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
        <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-12">

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->