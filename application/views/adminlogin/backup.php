<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Database Backup
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Database Backup</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
        <div class="row">
            <div class="col-md-<?php  if($this->rbac->hasPrivilege('restore','can_view')){ echo "8";} else{ echo "12";} ?>">
                <div class="white-box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-database"></i> Backup History
                        <div class="box-tools pull-right">
                            <form id="form1" action="<?php echo site_url('webadmin/admin/backup') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" role="form">
                               
                                <?php  if($this->rbac->hasPrivilege('backup','can_add')){ ?>
                                <button class="btn btn-primary btn-sm btn-info" type="submit" name="backup" value="backup"><i class="fa fa-plus-square-o"></i> Create Backup</button>
                            <?php } ?>
                            </form>
                        </div>
                            </h3>
                    </div>
                    <div class="panel-body">


                        <?php if ($this->session->flashdata('msg')) { ?>
                            <?php echo $this->session->flashdata('msg') ?>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive mailbox-messages">
                                    <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                        <thead>
                                            <tr>
                                                <th>Backup Files</th>
                                                <th class="">
                                                    Action
                                                </th>
                                                <th class="">
                                                    Action
                                                </th>
                                                <th class="">
                                                    Action
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($dbfileList as $data) {
                                                ?>
                                                <tr>
                                                    <td width="80%" class=""><a href="#">
                                                     <?php echo $data; ?></a>
                                                    </td>
                                                    <td class="">
                                                        <a href="<?php echo site_url('webadmin/admin/downloadbackup/' . $data) ?>" class="btn btn-success btn-xs" ><i class="fa fa-download"></i> download</a>
                                                    </td>
                                                     <?php  if($this->rbac->hasPrivilege('restore','can_view')){ ?>
                                                    <td class="">
                                                       
                                                        <form class="formrestore" action="<?php echo site_url('webadmin/admin/backup') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" role="form">
                                                            <?php echo $this->customlib->getCSRF(); ?>
                                                            <input type="hidden" name="filename" value="<?php echo $data; ?>">
                                                            <button class="btn btn-primary btn-xs btn-warning" type="submit" name="backup" value="restore"><i class="fa fa-plus-square-o"></i> restore </button>
                                                        </form>
                                                        </td>
                                                        <?php }  ?>
                                                    <td class="">
                                                        <form class="formdelete" method="post" role="form" name="employeeform" id="employeeform" accept-charset="utf-8"  action="<?php echo site_url('webadmin/admin/dropbackup/' . $data); ?>" >
                                                        <?php echo $this->customlib->getCSRF(); ?>
                                                        <?php  if($this->rbac->hasPrivilege('backup','can_delete')){ ?>
                                                        <button class="btn btn-primary btn-xs btn-danger" type="submit" name="backup" value="restore"><i class="fa fa-trash"></i>  delete</button>
                                                    <?php } ?>
                                                        </form></td>
                                                    
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                           
                        </div>
                    </div></div></div>
                    <?php  if($this->rbac->hasPrivilege('restore','can_view')){ ?>
            <div class="col-md-4 col-sm-4">
                <div class="white-box panel box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload From Local Directory</h3>
                    </div>
                    <form role="form" action="<?php echo site_url('webadmin/admin/backup') ?>" method="post" enctype="multipart/form-data">
                        <?php echo $this->customlib->getCSRF(); ?>
                        <div class="panel-body">
                                <input class="filestyle form-control" data-height="30"  type="file" name="file" id="exampleInputFile" >
                            <span class="text-danger"><?php echo form_error('file'); ?></span>
                        </div> 
                        <div class="panel-footer">
                            <button class="btn btn-primary btn-sm pull-right" type="submit" name="backup" value="upload"><i class="fa fa-upload"></i> upload</button>
                        </div>
                    </form>
                </div>
                <div class="white-box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cron Secret key</h3>
                    <div class="box-tools pull-right">   
                        <a class="btn btn-primary btn-sm btn-info" data-toggle="tooltip" title="cron_secret_key" href="<?php echo base_url()."webadmin/admin/addCronsecretkey/".$settinglist[0]['id'] ?>"><?php if(!empty($settinglist[0]['cron_secret_key'])){ echo ('regenerate'); }else{ echo ('generate'); } ?></a>
                     </div>   
                        
                    </div>
                      <div class="box-body cronkeyheight">
                            <div style="display:none" id="cronkey">
                            <p class="hideeyep"><?php echo($settinglist[0]['cron_secret_key']); ?></p>
                        </div>
                        <a class="hideeye" data-toggle="tooltip" title="cron_secret_key" id="showbtn" onclick="showkey()" href="#"><i class="fa fa-eye"></i></a>
                        
                          </div>
                    
                </div><!--./box box-warning-->
            </div><!--./col-md-4-->
            <!-- <div class="col-md-4"></div> -->
        <?php } ?>

        </div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $('#form1').submit(function () {
        var c = confirm("Are you sure want to make current backup?");
        return c;
    });
    $('.formdelete').submit(function () {
        var c = confirm("Are you sure want to delete backup?");
        return c;
    });
    $('.formrestore').submit(function () {
        var c = confirm("Are you sure want to restore backup?");
        return c;
    });

     function showkey(){

    $("#cronkey").show();
    $("#showbtn").html("<i class='fa fa-eye-slash'></i>");
    $("#showbtn").attr("onclick","hidekey()");
    
   }

    function hidekey(){
        
    $("#cronkey").hide();
    $("#showbtn").html("<i class='fa fa-eye'></i>");
    $("#showbtn").attr("onclick","showkey()");
    
   }
</script>