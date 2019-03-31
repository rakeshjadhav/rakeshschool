 <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Category List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Create Category</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                    
                    <div class="col-md-12 col-sm-12">
                        <div class="">

                     <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Category List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                              	<div class="download_label"><?php  //$title ?></div>
                                    <?php if (empty($notificationlist)) {
                                ?>
                                <div class="alert alert-info">no_record_found</div>
                                <?php
                            } else {
                                foreach ($notificationlist as $key => $notification) {
                                    ?>
                                <div class="panel box box-primary " >
                                        <div class="alert alert-defoult box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" class="notification_msg text-aqua" data-msgid="<?php echo $notification['id']; ?>" data-parent="#accordion" href="#collapse<?php echo $notification['id']; ?>" aria-expanded="false" class="collapsed">
                                                    <?php echo $notification['title']; ?>&nbsp;
                                                    <?php
                                                    if ($notification['notification_id'] == "read") {
                                                        ?>
                                                        <img src="<?php echo base_url() ?>assets/backend/images/read_one.png">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url() ?>assets/backend/images/unread_two.png">
                                                        <?php
                                                    }
                                                    ?>
                                                </a>
                                            </h4>
                                            <div class="pull-right">
                                                <i class="fa fa-calendar"></i> Date : <?php echo $notification['date'] ?>
                                            </div>
                                        </div>
                                        <div id="collapse<?php echo $notification['id']; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php echo $notification['message']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            </div>
                           </div>
                        </div>
                     </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div> 
                   
                        </div>
                    </div>
                </div>
</div>

                
    
   
