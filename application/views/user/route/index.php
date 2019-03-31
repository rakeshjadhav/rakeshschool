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
                               <i class="fa fa-user fa-fw"></i> || transport_routes
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">transport_routes</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-tags fa-fw"></i> || transport_routes
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr>
                                        <th>route_title</th>
                                        <th>vehicle</th>
                                    </tr>
                                          </thead>
                                          <tbody>
                                    <?php if (empty($listroute)) {
                                        ?>
                                        <tr>
                                            <td colspan="2" class="text-danger text-center">no_record_found</td>
                                        </tr>
                                        <?php
                                    } else {
                                        $count = 1;

                                        foreach ($listroute as $list_key => $data) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name"> <?php echo $data['route_title'] ?></td>

                                                <td class=""> 
                                                    <?php
                                                    if (empty($data['vehicles'])) {
                                                        ?>
                                                        <span class="text text-danger">no_vehicle_allotted_to_this_route</span>
                                                        <?php
                                                    } else {
                                                        echo "<ul class='nav nav-list'>";
                                                        foreach ($data['vehicles'] as $vec_key => $vec_value) {
                                                            ?>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-bus"></i>&nbsp;&nbsp;

                                                        <?php
                                                        echo $vec_value->vehicle_no;
                                                        if ($vec_value->vec_route_id == $student_route) {
                                                            ?>
                                                            <span class="label label-info" id="bus_allot" data-vehrouteid="<?php
                                                            echo
                                                            $vec_value->vec_route_id;
                                                            ?>"><i class="fa fa-eye"></i> Click to View</span>
                                                                  <?php
                                                              }
                                                              ?>

                                                        <br>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                            echo "</ul>";
                                        }
                                        ?>


                                        </ul>
                                        </td>
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


                
    
   
