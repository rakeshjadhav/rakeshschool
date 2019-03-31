 <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<style>
    table.dataTable thead th {
    padding: 8px 0px !important;
    }
    table.dataTable tbody td {
    padding: 5px 5px !important;
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Teachers List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Teachers</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                          
                    

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Subject List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php // $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr style="line-height: 1.42857143;font-weight:400;">
                                                  <th>Teacher Name</th>
                                                  <th>Email</th>
                                                  <th  class="text-right">phone</th>
                                                
                                              </tr>
                                          </thead>
                                          <tbody>
                                    <?php if (empty($teacherlist)) {
                                        ?>
                                        <tr>
                                            <td colspan="12" class="text-danger text-center">No Record Found</td>
                                        </tr>
                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($teacherlist as $teacher) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name"><?php echo $teacher['name'] ?></td>
                                                <td class="mailbox-name"><?php echo $teacher['email'] ?></td>
                                                <td class="mailbox-name pull-right"><?php echo $teacher['phone'] ?></td>
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
                    </div>
                </div>
</div>

                
    
   
