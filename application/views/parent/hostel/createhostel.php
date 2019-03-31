<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style>
     table thead th {
    padding: 8px 0px !important;
    }
    table tbody td {
    padding: 5px 5px !important;
    }
    .badge{
        background-color: #fff;
        color:#039;
    }
</style>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">transport_routes</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">transport_routes</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
		<div class="white-box box-solid" id="tachelist">
                   <!--<div class="box box-primary" >-->
                    <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>hostel_name</th  >
                                        <th>type</th>
                                        <th>address</th>
                                        <th class="text-right">intake</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($listhostel)) {
                                        ?>
                                        <tr>
                                            <td colspan="12" class="text-danger text-center">no_record_found</td>
                                        </tr>
                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($listhostel as $hostel) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name"> <?php echo $hostel['hostel_name'] ?></td>
                                                <td class="mailbox-name"> <?php echo $hostel['type'] ?></td>
                                                <td class="mailbox-name"> <?php echo $hostel['address'] ?></td>
                                                <td class="mailbox-name text-right"> <?php echo $hostel['intake'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table> 
                    <div class="box-footer">
                        <div class="mailbox-controls"> 
                        </div>
                    </div>
                </div>
            </div> 
                    
                    </div>
                </div>
            </div>
        </div>



 
