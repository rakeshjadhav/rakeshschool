<style>
    table.dataTable thead th {
    padding: 8px 0px !important;
    }
    table.dataTable tbody td {
    padding: 5px 5px !important;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || study material List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">study material List</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || study material List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                           <thead>
                                                <tr>
                                                    <th>Content Title</th>
                                                    <th>Type</th>
                                                    <th>Date </th>
                                                    <th>Available For </th>
                                                    <th class="text-right no-print">Action</th>
                                                </tr>
                                            </thead>
                                          <tbody>
                                            <?php
                                                $count = 1;
                                                foreach ($list as $data) {
                                                    ?>
                                              <tr>
                                                  <td> <a href="#" data-toggle="popover" class="detail_popover"><?php echo $data['title'] ?></a>
                                                        <div class="fee_detail_popover" style="display: none">
                                                            <?php
                                                            if ($data['note'] == "") {
                                                                ?>
                                                                <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <p class="text text-info"><?php echo $data['note']; ?></p>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div> 
                                                  </td>
                                                  <td><?php echo $data['type'] ?></td>
                                                  <td><?php echo $data['date'] ?></td>
                                                  <td><?php
                                                if ($data['is_public'] == "Yes") {
                                                    echo "ALL Classes";
                                                } else {
                                                    echo $data['class'];
                                                }
                                                ?></td>
                                                  <td>
                                                      <div class="row ">
                                                          <div class="col-lg-3">
                                                               <a href="<?php echo base_url(); ?>webadmin/content/download/<?php echo $data['file'] ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="download">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>webadmin/content/delete/<?php echo $data['id'] ?>"class="btn btn-primary btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                                          </div>
                                                          </div>
                                                   </td>

                                              </tr>
                                                      <?php
                                          }
                                         // $count++;
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
<script type="text/javascript">
    $(document).ready(function () {
      //  var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#upload_date').datepicker({
            //   format: "dd-mm-yyyy"
          //  format: date_format,
            autoclose: true
        });

        $("#btnreset").click(function () {

            $("#form1")[0].reset();
        });

    });

    $(document).ready(function () {
        $("#chk").click(function () {
            if ($(this).is(":checked")) {
                $("#class_id").prop("disabled", true);
            } else {
                $("#class_id").prop("disabled", false);
            }
        });

        if ($("#chk").is(":checked")) {
            $("#class_id").prop("disabled", true);
        } else {
            $("#class_id").prop("disabled", false);
        }

    });

</script>

<script>
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });

    });
</script>
                
    
   
