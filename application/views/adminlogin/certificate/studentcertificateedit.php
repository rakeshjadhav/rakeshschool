<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || certificate List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">certificate</li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                            <?php
                            // if ($this->rbac->hasPrivilege('student_certificate', 'can_add')) {
                            ?>
                          <div class="col-md-5 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-tags"></i> ||  Add certificate
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                          <?php } ?>
                                          <?php
                                              if (isset($error_message)) {
                                                 echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                               }
                                              ?>
                                          <?php // echo $this->customlib->getCSRF(); ?>

                                          <form id="form1" enctype="multipart/form-data" action="<?php echo site_url('webadmin/certificate/edit/' . $editcertificate[0]->id) ?>"  id="certificateform" name="certificateform" method="post" accept-charset="utf-8">
                            <input type="hidden" name="id" value="<?php echo set_value('id', $editcertificate[0]->id); ?>" >
                                              <div class="box-body">
                                                       
                                <div class="form-group">
                                    <label>certificate name</label><small class="req"> *</small>
                                    <input autofocus="" id="certificate_name" name="certificate_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('certificate_name', $editcertificate[0]->certificate_name); ?>" />
                                    <span class="text-danger"><?php echo form_error('certificate_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>header_left_text</label>
                                    <input autofocus="" id="left_header" name="left_header" placeholder="" type="text" class="form-control"  value="<?php echo set_value('left_header', $editcertificate[0]->left_header); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>header_center_text</label>
                                    <input autofocus="" id="center_header" name="center_header" placeholder="" type="text" class="form-control"  value="<?php echo set_value('center_header', $editcertificate[0]->center_header); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>header_right_text</label>
                                    <input autofocus="" id="right_header" name="right_header" placeholder="" type="text" class="form-control"  value="<?php echo set_value('right_header', $editcertificate[0]->right_header); ?>" />
                                </div>

                                <div class="form-group">
                                    <label>body_text</label><small class="req"> *</small>
                                    <textarea class="form-control" id="certificate_text" name="certificate_text" placeholder="" rows="3" placeholder=""><?php echo set_value('certificate_name', $editcertificate[0]->certificate_text); ?></textarea>
                                    <span class="text-primary">[name] [dob] [present_address] [guardian] [created_at] [admission_no] [roll_no] [class] [section] [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone]</span>
                                    <span class="text-danger"><?php echo form_error('certificate_text'); ?></span>
                                </div>


                                <div class="form-group">
                                    <label>footer_left_text</label>
                                    <input autofocus="" id="left_footer" name="left_footer" placeholder="" type="text" class="form-control"  value="<?php echo set_value('left_footer', $editcertificate[0]->left_footer); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>footer_center_text</label>
                                    <input autofocus="" id="center_footer" name="center_footer" placeholder="" type="text" class="form-control"  value="<?php echo set_value('center_footer', $editcertificate[0]->center_footer); ?>" />
                                </div>
                                <div class="form-group">
                                    <label>footer_right_text</label>
                                    <input autofocus="" id="right_footer" name="right_footer" placeholder="" type="text" class="form-control"  value="<?php echo set_value('right_footer', $editcertificate[0]->right_footer); ?>" />
                                </div>
                                <div class="mediarow">    
                                    <div class="row">
                                        <div class="img_div_modal"><label>certificate design</label></div>
                                        <div class="col-md-6 col-sm-6 img_div_modal">
                                            <div class="form-group">
                                                <input id="header_height" name="header_height" placeholder="<?php echo $this->lang->line('header'); ?> <?php echo $this->lang->line('height'); ?>" type="number" class="form-control" min="0" value="<?php echo set_value('header_height', $editcertificate[0]->header_height); ?>" />
                                            </div>
                                        </div><!--./col-md-6-->   
                                        <div class="col-md-6 col-sm-6 img_div_modal"> 
                                            <div class="form-group">
                                                <input id="footer_height" name="footer_height" placeholder="<?php echo $this->lang->line('footer'); ?> <?php echo $this->lang->line('height'); ?>" type="number" class="form-control" min="0" value="<?php echo set_value('footer_height', $editcertificate[0]->footer_height); ?>" />
                                            </div>
                                        </div><!--./col-md-6-->
                                        <div class="col-md-6 col-sm-6 img_div_modal">
                                            <div class="form-group">
                                                <input id="content_height" name="content_height" placeholder="<?php echo $this->lang->line('body'); ?> <?php echo $this->lang->line('height'); ?>" type="number" class="form-control" min="0" value="<?php echo set_value('content_height', $editcertificate[0]->content_height); ?>" />
                                            </div>
                                        </div><!--./col-md-6-->



                                        <div class="col-md-6 col-sm-6 img_div_modal"> 
                                            <div class="form-group">
                                                <input id="content_width" name="content_width" placeholder="<?php echo $this->lang->line('body'); ?> <?php echo $this->lang->line('width'); ?>" type="number" class="form-control" min="0" value="<?php echo set_value('content_width', $editcertificate[0]->content_width); ?>" />
                                            </div>
                                        </div><!--./col-md-6-->
                                        <div class="col-md-6 col-sm-6 img_div_modal minh45">
                                            <div class="form-group switch-inline">
                                                <label>student photo</label>
                                                <div class="material-switch switchcheck">
                                                    <input id="enable_student_img" name="is_active_student_img" type="checkbox" class="chk" value="1" onclick="valueChanged()" <?php echo set_checkbox('is_active_student_img', '1', (set_value('is_active_student_img', $editcertificate[0]->enable_student_image) == 1) ? TRUE : FALSE); ?>>
                                                    <label for="enable_student_img" class="label-success"></label>
                                                </div>
                                            </div>
                                        </div><!--./col-md-6-->
                                        <div class="col-md-6 col-sm-6 img_div_modal">
                                            <div class="form-group" id="enableImageDiv" hidden>
                                                <input id="image_height" name="image_height" placeholder="<?php echo $this->lang->line('photo'); ?> <?php echo $this->lang->line('height'); ?>" type="text" value="<?php echo set_value('image_height', $editcertificate[0]->enable_image_height); ?>" class="form-control" min="0" />
                                            </div>
                                        </div>

                                    </div><!--./row-->  
                                </div><!--./mediarow-->



                                <div class="form-group">
                                    <label>background_image</label>
                                    <input id="documents" placeholder="" type="file" class="filestyle form-control" data-height="40"  name="background_image">
                                </div>
                                <?php
                                if ($editcertificate[0]->enable_student_image == 1) {
                                    $hidden = 'hidden';
                                } else {
                                    $hidden = "";
                                }
                                ?>

                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">save</button>
                            </div>
                        </form>
                                      </div>
                                  </div>
                                 </div>
                               </div>
                             </div>
                              </div>
                          </div>
                         <?php //} ?>
            <div class="col-md-7<?php
            //if ($this->rbac->hasPrivilege('student_certificate', 'can_add')) {
               // echo "8";
           // } else {
              //  echo "12";
           // }
            ?>">
                              <div class="">

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || list Student certificate
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"></div>
                                       <table id="example23" class="display nowrap" >
                                          <thead>
                                              <tr>
                                                  <th>certificate name </th>
                                                  <th>background_image</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                    <?php if (empty($certificateList)) {
                                        ?>

                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($certificateList as $certificate) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover" ><?php echo $certificate->certificate_name; ?></a>
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php //if ($certificate->background_image != '' && !is_null($certificate->background_image)) { ?>
                                                        <img src="<?php echo base_url('uploads/certificate/') ?><?php echo $certificate->background_image ?>" width="40">
                                                    <?php //} else { ?>
                                                        <!--<i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>-->
                                                    <?php // } ?>
                                                </td>
                                                <td class="mailbox-date pull-right no-print">
                                                    <a id="<?php echo $certificate->id ?>" class="btn btn-info btn-xs view_data" title="<?php echo $this->lang->line('view'); ?>">
                                                        <i class="fa fa-reorder"></i>
                                                    </a>
                                                    <?php //if ($this->rbac->hasPrivilege('student_certificate', 'can_edit')) { ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/certificate/edit/<?php echo $certificate->id ?>" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php
                                                  //  }
                                                   // if ($this->rbac->hasPrivilege('student_certificate', 'can_delete')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/certificate/delete/<?php echo $certificate->id ?>" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    <?php //} ?>
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
                </div> 
                   
                        </div>
                    </div>
                </div>
</div>
<div class="modal fade" id="myModal" role="dialog" style="width: 100%;" >
    <div class="modal-dialog modal-lg" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('certificate'); ?></h4>
            </div>
            <div class="modal-body" id="certificate_detail">

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function printDiv(elem) {
        Popup(jQuery(elem).html());
    }

    function Popup(data)
    {

        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');


        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);


        return true;
    }
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
<script type="text/javascript">
    $(document).ready(function () {
        $('.view_data').click(function () {
            var certificateid = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url('webadmin/certificate/view') ?>",
                method: "post",
                data: {certificateid: certificateid},
                success: function (data) {
                    $('#certificate_detail').html(data);
                    $('#myModal').modal("show");
                }
            });
        });
    });
</script>
<script type="text/javascript">
    function valueChanged()
    {
        if ($('#enable_student_img').is(":checked"))
            $("#enableImageDiv").show();
        // alert("Hii")
        else
            $("#enableImageDiv").hide();
        //alert("Bye")
    }
</script>

                
    
   
