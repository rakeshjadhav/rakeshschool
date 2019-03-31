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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('search_transaction'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="<?php echo site_url('admin/transaction/searchtransaction') ?>" method="post" class="form-horizontal">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label><?php echo $this->lang->line('date_from'); ?></label>
                                            <input autofocus="" id="datefrom" name="date_from" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date_from', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly"/>
                                            <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label><?php echo $this->lang->line('date_to'); ?></label>
                                            <input id="dateto" name="date_to" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date_to', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly"/>
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
                    </div>
                </div>
                <?php if (isset($expenseList) && isset($feeList) && isset($incomeList)) {
                    ?>
                    <div class="box bozero">
                        <h3 class="titless pull-left"><i class="fa fa-money"></i> <?php echo $exp_title; ?></h3>
                        <div class="nav-tabs-custom">    
                            <ul class="nav nav-tabs pull-right">
                                <?php
                                if ($this->module_lib->hasActive('expense')) {
                                    ?>
                                    <li><a href="#tab_parent" data-toggle="tab"><?php echo $this->lang->line('expense_details'); ?></a></li>
                                <?php } ?>
                                <?php
                                if ($this->module_lib->hasActive('income')) {
                                    ?>                      
                                    <li><a href="#tab_income" data-toggle="tab"><?php echo $this->lang->line('income_details'); ?></a></li>
                                <?php } ?>   
                                <?php
                                if ($this->module_lib->hasActive('fees_collection')) {
                                    ?>                     
                                    <li class="active"><a href="#tab_students" data-toggle="tab"><?php echo $this->lang->line('fees_collection_details'); ?></a></li>
                                <?php } ?>                  
                            </ul>
                            <div class="box-body table-responsive">     
                                <div class="tab-content">
                                    <div class="tab-pane active table-responsive" id="tab_students">
                                        <div class="download_label"><?php echo $exp_title; ?></div>
                                        <table class="table table-striped table-bordered table-hover example table-fixed-header">
                                            <thead class="header">
                                                <tr>
                                                    <th><?php echo $this->lang->line('payment_id'); ?></th>
                                                    <th><?php echo $this->lang->line('date'); ?></th>
                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                    <th><?php echo $this->lang->line('class'); ?></th>
                                                    <th><?php echo $this->lang->line('fee_type'); ?></th>
                                                    <th><?php echo $this->lang->line('mode'); ?></th>

                                                    <th class="text text-right"><?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                    <th class="text text-right"><?php echo $this->lang->line('discount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                    <th class="text text-right"><?php echo $this->lang->line('fine'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                    <th class="text text-right"><?php echo $this->lang->line('total'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
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
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="9" class="text-danger text-center"><?php echo $this->lang->line('no_transaction_found'); ?></td>
                                                    </tr>
                                                </tfoot>
                                                <?php
                                            } else {
                                                $count = 1;

                                                foreach ($feeList as $key => $value) {


                                                    $amount = $amount + $value['amount'];
                                                    $discount = $discount + $value['amount_discount'];
                                                    $fine = $fine + $value['amount_fine'];
                                                    $total = ($amount + $fine) - $discount;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['id'] . "/" . $value['inv_no']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['date'])); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['firstname'] . " " . $value['lastname']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['class'] . " (" . $value['section'] . ")"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['type']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['payment_mode']; ?>
                                                        </td>
                                                        <td class="text text-right">
                                                            <?php echo number_format($value['amount'], 2, '.', ''); ?>
                                                        </td>
                                                        <td class="text text-right">
                                                            <?php echo number_format($value['amount_discount'], 2, '.', ''); ?>
                                                        </td>
                                                        <td class="text text-right">
                                                            <?php echo (number_format($value['amount_fine'], 2, '.', '')); ?>
                                                        </td>
                                                        <td class="text text-right">
                                                            <?php
                                                            $t = ($value['amount'] + $value['amount_fine']) - $value['amount_discount'];
                                                            echo (number_format($t, 2, '.', ''))
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }
                                            }
                                            ?>
                                            <tr class="box box-solid total-bg">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right"><?php echo $this->lang->line('grand_total'); ?> </td>
                                                <td class="text text-right"><?php echo ($currency_symbol . number_format($amount, 2, '.', '')); ?></td>
                                                <td class="text text-right"><?php echo ($currency_symbol . number_format($discount, 2, '.', '')); ?></td>
                                                <td class="text text-right"><?php echo ($currency_symbol . number_format($fine, 2, '.', '')); ?></td>
                                                <td class="text text-right"><?php echo ($currency_symbol . number_format($total, 2, '.', '')); ?></td></tr>
                                            </tbody>
                                        </table>
                                    </div>    
                                      <!--   <h4 class="text text-left"><b><?php //echo $this->lang->line('expense_detail');     ?></b></h4><hr/> -->
                                    <div class="tab-pane table-responsive" id="tab_parent">  
                                        <table class="table table-striped table-bordered table-hover example">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('expense_id'); ?></th>
                                                    <th><?php echo $this->lang->line('date'); ?></th>
                                                    <th><?php echo $this->lang->line('expense_head'); ?></th>
                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                    <th><?php echo $this->lang->line('invoice_no'); ?></th>
                                                    <th class="text text-right"><?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                $grand_total = 0;
                                                if (empty($expenseList)) {
                                                    ?>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5" class="text-danger text-center"><?php echo $this->lang->line('no_transaction_found'); ?></td>
                                                    </tr>
                                                </tfoot>
                                                <?php
                                            } else {
                                                foreach ($expenseList as $key => $value) {
                                                    $grand_total = $grand_total + $value['amount'];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['id']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['date'])); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['exp_category']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['invoice_no']; ?>
                                                        </td>
                                                        <td class="text text-right">
                                                            <?php echo ($value['amount']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }
                                            }
                                            ?>
                                            <tr class="box box-solid total-bg">
                                                <td align="left"></td>
                                                <td align="left"></td>
                                                <td align="left"></td>
                                                <td align="left"></td>
                                                <td class="text-right"><?php echo $this->lang->line('grand_total'); ?></td>
                                                <td class="text text-right">
                                                    <?php echo ($currency_symbol . number_format($grand_total, 2, '.', '')); ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane table-responsive" id="tab_income">  
                                        <table class="table table-striped table-bordered table-hover example">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('income_id'); ?></th>
                                                    <th><?php echo $this->lang->line('date'); ?></th>
                                                    <th><?php echo $this->lang->line('income_head'); ?></th>
                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                    <th><?php echo $this->lang->line('invoice_no'); ?></th>
                                                    <th class="text text-right"><?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                $grand_total = 0;
                                                if (empty($incomeList)) {
                                                    ?>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5" class="text-danger text-center"><?php echo $this->lang->line('no_transaction_found'); ?></td>
                                                    </tr>
                                                </tfoot>
                                                <?php
                                            } else {
                                                foreach ($incomeList as $key => $values) {
                                                    $grand_total = $grand_total + $values['amount'];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $values['id']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($values['date'])); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $values['income_category']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $values['name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $values['invoice_no']; ?>
                                                        </td>
                                                        <td class="text text-right">
                                                            <?php echo ($values['amount']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }
                                            }
                                            ?>
                                            <tr class="box box-solid total-bg">
                                                <td align="left"></td>
                                                <td align="left"></td>
                                                <td align="left"></td>
                                                <td align="left"></td>
                                                <td class="text-right"><?php echo $this->lang->line('grand_total'); ?></td>
                                                <td class="text text-right">
                                                    <?php echo ($currency_symbol . number_format($grand_total, 2, '.', '')); ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <div class="mailbox-controls"> 
                                    <div class="pull-right">
                                    </div>
                                </div>
                            </div>
                        </div></div><!--./tabs--> 
                    <?php
                }
                ?>
            </div>  
        </div>
                    
                </div>