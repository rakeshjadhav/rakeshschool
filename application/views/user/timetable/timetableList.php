 <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-user fa-fw"></i> || Class Timetable
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Class Timetable</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($result_array)) {
                    ?>
                    <div class="panel box-warning">
                        <div class="panel-body">
                            <?php
                            if (!empty($result_array)) {
                                ?>
                                <div id='' class="table-responsive">
				<div class="download_label">Class Timetable</div>
                                   <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                        <thead>
                                            <tr>
                                                <th>
                                                    subject
                                                </th>
                                                <?php foreach ($getDaysnameList as $key => $value) {
                                                    ?>
                                                    <th class="text text-center">
                                                        <?php echo $value; ?>
                                                    </th>
                                                <?php }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result_array as $key => $timetable) {
                                                ?>
                                                <tr>
                                                    <th><?php echo $key; ?></th>
                                                    <?php
                                                    foreach ($timetable as $key => $value) {
                                                        $status = $value->status;
                                                        if ($status == "Yes") {
                                                            ?>
                                                            <td class="text text-center">
                                                                <div class="attachment-block clearfix">
                                                                    <?php
                                                                    if ($value->start_time != "" && $value->end_time != "") {
                                                                        ?>
                                                                        <strong class="text-green"><?php echo $value->start_time; ?></strong>
                                                                        <b class="text text-center">-</b>
                                                                        <strong class="text-green"><?php echo $value->end_time; ?></strong><br/>
                                                                        <strong class="text-green">Room No: <?php echo $value->room_no; ?>:</strong>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <b class="text text-center">
                                                                            <b class="text text-center">Not <br/> Scheduled</b><br/>
                                                                        </b><br/>
                                                                        <strong class="text-green"></strong>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td class="text text-center">
                                                                <div class="attachment-block clearfix">
                                                                    <strong class="text-red"><?php echo $value->start_time; ?></strong><br/>
                                                                </div>
                                                            </td>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="alert alert-info">No Record Found</div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            
        }
        ?>
                    </div>
                </div>
</div>


                
    
   
