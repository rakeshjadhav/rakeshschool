<style>
    .comment-body:hover {
    background: #fff !important;
    }
    .comment-center .user-img img {
    /*width: 100%;*/
     height:100px !important;
     width:100px !important;
</style>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-user fa-fw"></i> || email_/_sms_log
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">email_/_sms_log List</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                             <div class="panel" style="border-top:3px solid #ff6347;border-radius: 8px;">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-tags fa-fw"></i> || email_/_sms_log List
                                      <a href="<?php echo site_url('admin/mailsms/compose') ?>" class="pull-right btn btn-primary btn-sm" data-toggle="tooltip" title="" data-original-title="Add">
                                <i class="fa fa-envelope-o"></i> send email sms
                            </a>
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                     
                                      <table id="example23" class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>date</th>
                                        <th>email
                                        </th>
                                        <th>sms</th>
                                        <th>group
                                        </th>
                                        <th>individual</th>
                                        <th>class</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listMessage as $message) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name">
                                                <a href="#" data-toggle="popover" class="detail_popover"><?php echo $message['title'] ?></a>

                                                <div class="fee_detail_popover" style="display: none">
                                                    <?php
                                                    if ($message['message'] == "") {
                                                        ?>
                                                        <p class="text text-danger">no_description</p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <p class="text text-info"><?php echo $message['message']; ?></p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
                                                $date_time = strtotime($message['created_at']);
                                                $date = date('Y-m-d', $date_time);
                                                $time = date('H:i:s', $date_time);
                                                echo $date . " " . $time;
                                                ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
                                                if ($message['send_mail']) {

                                                    echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . yes . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
                                                if ($message['send_sms']) {
                                                    echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . yes . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
                                                if ($message['is_group']) {
                                                    echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . yes . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
                                                if ($message['is_individual']) {
                                                    echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . yes . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
                                                if ($message['is_class']) {
                                                    echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . yes. "</span>";
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                        <?php
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


                
    
   
