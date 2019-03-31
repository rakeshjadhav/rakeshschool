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
                        <h4 class="page-title">Library Book</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Library Book</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
		<div class="white-box box-solid" id="tachelist">
                   <!--<div class="box box-primary" >-->
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
						<div class="download_label">Library Book</div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>book_title</th>
                                        <th>publisher</th>
                                        <th>author</th>
                                        <th>subject</th>
                                        <th>rack_no</th>
                                        <th>qty</th>
                                        <th>bookprice</th>
                                        <th class="text-right">postdate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($listbook)) {
                                        ?>
                                        <tr>
                                            <td colspan="12" class="text-danger text-center">no_record_found</td>
                                        </tr>
                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($listbook as $book) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $book['book_title'] ?></a>
                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($book['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger">No Description</p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $book['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="mailbox-name"> <?php echo $book['publish'] ?></td>
                                                <td class="mailbox-name"> <?php echo $book['author'] ?></td>
                                                <td class="mailbox-name"> <?php echo $book['subject'] ?></td>
                                                <td class="mailbox-name"> <?php echo $book['rack_no'] ?></td>
                                                <td class="mailbox-name"> <?php echo $book['qty'] ?></td>
                                                <td class="mailbox-name"> <?php echo ($currency_symbol . $book['perunitcost']); ?></td>
                                                <td class="mailbox-name text-right"> <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($book['postdate'])); ?></td>
                                            </tr>
                                            <?php
                                        }
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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

<script>
    $(document).on('click', '.notification_msg', function () {
        var base_url = '<?php echo base_url() ?>';
        var notification_id = $(this).data('msgid');
        $.ajax({
            type: "POST",
            url: base_url + "parent/notification/updatestatus",
            data: {'notification_id': notification_id},
            dataType: "json",
            success: function (data) {
            }
        });
    });
</script>


 
