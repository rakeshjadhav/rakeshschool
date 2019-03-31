
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Search Student
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Search Student</li>
                        </ol>
                    </div>
                </div>
                <div class="">
                    
<div class="row">
            <div class="col-md-12">
                <div class="white-box panel box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search fa-fw"></i> search fees payment</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="<?php echo site_url('webadmin/studentfee/searchpayment') ?>" method="post" class="form-inline">
                                   
                                    <div class="form-group">
                                        <div class="col-sm-">
                                            <label>payment_id</label><small class="req"> *</small>
                                            <input autofocus="" id="paymentid" name="paymentid" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('paymentid'); ?>"/>
                                            <span class="text-danger"><?php echo form_error('paymentid'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle mmius15"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($feeList)) {
                    ?>
                    <div class="white-box box-info">
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"><i class="fa fa-money"></i> payment_id_detail</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="box-body table-responsive">


                            <table id="example23" class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>payment_id</th>
                                        <th>date</th>
                                        <th>name</th>
                                        <th>class</th>
                                        <th>fees_group</th>
                                        <th>fee_type</th>
                                        <th>mode</th>
                                        <th class="text text-right">amount</th>
                                        <th class="text text-right">discount</th>
                                        <th class="text text-right">fine</th>
                                        <th class="text text-right">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $amount = 0;
                                    $discount = 0;
                                    $fine = 0;
                                    $total = 0;
                                    $grd_total = 0;
                                    if (empty($feeList)) {
                                        ?>
                                        <?php
                                    } else {
                                        $count = 1;

                                        $a = json_decode($feeList->amount_detail);

                                        $record = $a->{$sub_invoice_id};
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $feeList->id . "/" . $sub_invoice_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $record->date; ?>
                                            </td> 
                                            <td>
                                                <?php echo $feeList->firstname . " " . $feeList->lastname; ?>
                                            </td> 
                                            <td>
                                                <?php echo $feeList->class . " (" . $feeList->section . ")"; ?>
                                            </td> 
                                            <td>
                                                <?php echo $feeList->name; ?>
                                            </td>
                                            <td>
                                                <?php echo $feeList->code; ?>
                                            </td>
                                            <td>
                                                <?php echo $record->payment_mode; ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php
                                                $amount = number_format($record->amount, 2, '.', '');
                                                echo  $amount;
                                                ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php
                                                $amount_discount = number_format($record->amount_discount, 2, '.', '');
                                                echo  $amount_discount;
                                                ?>
                                            </td>
                                            <td class="text text-right">
                                                <?php
                                                $amount_fine = number_format($record->amount_fine, 2, '.', '');
                                                echo  $amount_fine;
                                                ?>
                                            </td>
                                            <td class="text text-right">
                                                <a href="<?php echo base_url() ?>webadmin/studentfee/addfee/<?php echo $feeList->student_id ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" title="view" data-original-title="view">
                                                    <i class="fa fa-list-alt"></i> view
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <?php
                }
                ?>
            </div>
        </div> 
                    
                </div>