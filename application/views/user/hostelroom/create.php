 <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<style>
    .comment-body:hover {
    background: #fff !important;
    }
    .comment-center .user-img img {
    /*width: 100%;*/
     height:100px !important;
     width:100px !important;
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-user fa-fw"></i> || hostel_rooms
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">hostel_rooms</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-tags fa-fw"></i> || hostel_rooms
                                  </div>
                                 <div class="panel-body">
                                <div class="table-responsive mailbox-messages">
                                    <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                        <thead>
                                            <tr>
                                                <th>hostel</th>
                                                <th>room_type</th>
                                                <th>room_no_name</th>
                                                <th>no_of_bed</th>
                                                 <th class="text text-right">cost_per_bed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php if (empty($hostelroomlist)) {
                                        ?>
                                        <tr>
                                            <td colspan="5" class="text-danger text-center">no_record_found</td>
                                        </tr>
                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($hostelroomlist as $hostelroom) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name"> <?php echo $hostelroom['hostel_name'] ?></td>
                                                <td class="mailbox-name"> <?php echo $hostelroom['room_type'] ?></td>
                                                <td class="mailbox-name"> <?php echo $hostelroom['room_no'] ?></td>
                                                <td class="mailbox-name"> <?php echo $hostelroom['no_of_bed'] ?></td>
                                                <td class="text text-right"> <?php echo $hostelroom['cost_per_bed'] ?></td>
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
                                
                              </div>
                           </div>
                              </div>
                    </div>
                </div>
</div>            
  
   
