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
                    <div class="row">
                      <div class="col-md-12">
                         <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php
                        foreach ($childs as $each_child_key => $each_child_value) {
                            $act = "";
                            if ($each_child_key == 0) {
                                $act = "active";
                            }
                            ?>
                            <li class="<?php echo $act; ?>"><a href="#tab_1-<?php echo $each_child_value['student_session_id']; ?>" data-toggle="tab"><?php echo $each_child_value['firstname'] . " " . $each_child_value['lastname']; ?></a></li>
                            <?php
                        }
                        ?>


                    </ul>
                    <div class="tab-content">
                        <?php
                        foreach ($childs as $each_child_key => $each_child_value) {
                            $student_route = $each_child_value['vehroute_id'];
                            $act = "";
                            if ($each_child_key == 0) {
                                $act = "active";
                            }
                            ?>

                            <div class="tab-pane <?php echo $act; ?>" id="tab_1-<?php echo $each_child_value['student_session_id']; ?>">
                                <div class="table-responsive mailbox-messages">
								<div class="download_label">route_title</div>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>route_title</th>

                                                <th class="">vehicle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($listroute)) {
                                                ?>
                                                <tr>
                                                    <td colspan="12" class="text-danger text-center">no_record_found</td>
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
                                                                <span class="text text-danger">No Vehicle Allotted To this route</span>
                                                                <?php
                                                            } else {
                                                                echo "<ul class='nav nav-list'>";
                                                                foreach ($data['vehicles'] as $vec_key => $vec_value) {
                                                                    ?>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-bus"></i>&nbsp;&nbsp;

                                                                <?php
                                                                echo
                                                                $vec_value->vehicle_no;
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
                            <?php
                        }
                        ?>

                    </div>
                    <!-- /.tab-content -->
                </div>
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

<div id="busDetailModal"  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    var base_url = '<?php echo base_url() ?>';
    $(document).on('click', '#bus_allot', function () {
        $('.modal-title').html("");
        $('.modal-body').html("");
        var vehrouteid = $(this).data('vehrouteid');

        $('.modal-title').html("Vehicle Detail");
        $.ajax({
            type: "POST",
            url: base_url + "parent/route/getbusdetail",
            data: {'vehrouteid': vehrouteid},
            dataType: "json",
            success: function (response) {

                var data = "";
                data += '<div class="row">';
                data += '<div class="col-md-12">';
                data += '<div class="lead text text-center"><b>Route: ' + response.route_title + '</b></div>';
                data += '<table class="table table-striped table-hover">';
                data += '<tbody>';
                data += '<tr>';
                data += '<td>Vehicle no:</td>';
                data += '<td>' + response.vehicle_no + '</td>';
                data += '</tr>';
                data += '<tr>';
                data += '<td>Vehicle model:</td>';
                data += '<td>' + response.vehicle_model + '</td>';
                data += '</tr>';
                data += '<tr>';
                data += '<td>Made</td>';
                data += '<td>' + response.manufacture_year + '</td>';
                data += '</tr>';
                data += '<tr>';
                data += '<td>Driver Name</td>';
                data += '<td>' + response.driver_name + '</td>';
                data += '</tr>';
                data += '<tr>';
                data += '<td>Driver Licence</td>';
                data += '<td>' + response.driver_licence + '</td>';
                data += '</tr>';
                data += '<tr>';
                data += '<td>Driver Contact</td>';
                data += '<td>' + response.driver_contact + '</td>';
                data += '</tr>';
                data += '</tbody>';
                data += '</table>';
                data += '</div>';
                data += '</div>';

                $('.modal-body').html(data);
                $("#busDetailModal").modal('show');
            }
        });
    });
</script>

 
