<style>
    table.dataTable thead th {
    padding: 8px 0px !important;
    }
    table.dataTable tbody td {
    padding: 5px 5px !important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Teacher  List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Teacher</li>
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
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Teacher List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr style="line-height: 1.42857143;font-weight:400;">
                                                  <th>member_id</th>
                                                  <th>library_card_no</th>
                                                  <th>teacher_name</th>
                                                  <th>email</th>
                                                  <th>date_of_birth</th>
                                                  <th>phone</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                             <?php if (empty($teacherlist)) {
                                        ?>

                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($teacherlist as $teacher) {
                                            $clsactive = "a";
                                            $member_id = "";
                                            $library_card_no = "";
                                            if ($teacher['libarary_member_id'] != 0) {
                                                $clsactive = "success";
                                                $member_id = $teacher['libarary_member_id'];
                                                $library_card_no = $teacher['library_card_no'];
                                            }
                                            ?>
                                              <tr class="<?php echo $clsactive; ?>">
                                                <td><?php echo $member_id; ?></td>
                                                <td><?php echo $library_card_no; ?></td>
                                                <td class="mailbox-name"> <?php echo $teacher['name'] ?></td>
                                                <td class="mailbox-name"> <?php echo $teacher['email'] ?></td>
                                                <td class="mailbox-name"> <?php echo $teacher['dob']; ?></td>
                                                <td class="mailbox-name"> <?php echo $teacher['phone'] ?></td>
                                                <td class="text text-right">
                                                    <?php
                                                    if ($teacher['libarary_member_id'] == 0) {
                                                        ?>
                                                        <button  data-stdid="<?php echo $teacher['id'] ?>" class="btn btn-default btn-xs add-teacher"  data-toggle="tooltip" title="Add" >
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <button type="button" class="btn btn-default btn-xs surrender-teacher" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait.." data-toggle="tooltip" data-memberid="<?php echo $member_id; ?>" title="Surrender Membership "><i class="fa fa-mail-reply"></i></button>

                                                        <?php
                                                    }
                                                    ?>
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

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="lineModalLabel">Add Member</h3>
            </div>
            <div class="modal-body">

                <input type="hidden" name="click_member_id" value="0" id="click_member_id">
                <!-- content goes here -->
                <form action="<?php echo site_url('webadmin/member/addteacher') ?>" id="add_member" method="post">
                    <input type="hidden" name="member_id" value="0" id="member_id">
                    <div class="form-group">
                        <label for="">Library Card No</label>
                        <input type="name" class="form-control" name="library_card_no" id="library_card_no" >
                        <span class="text-danger" id="library_card_no_error"></span>
                    </div>
                    <button type="submit" class="btn btn-default btn-sm add-member" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait..">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function () {

        $("#squarespaceModal").modal({
            show: false,
            backdrop: 'static'
        });

       // var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#dob,#admission_date').datepicker({
          //  format: date_format,
            autoclose: true
        });
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>

<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    $(".add-teacher").click(function () {
        var student = $(this).data('stdid');
        $('#click_member_id').val(student);

        $('#member_id').val(student);
        $('#squarespaceModal').modal('show');
    });

    $(".surrender-teacher").click(function () {
        
        if (confirm('Are you sure you want to surrender membership?')) {
            var memberid = $(this).data('memberid');
            var $this = $('.surrender-teacher');
            $this.button('loading');
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('webadmin/member/surrender') ?>',
                data: {'member_id': memberid}, // serializes the form's elements.
                dataType: 'JSON',
                success: function (response)
                {

                    if (response.status == "success") {
                        successMsg(response.message);
                        $this.button('reset');
                        window.setTimeout('location.reload()', 3000);
                    }
                }
            });
        }

    });

    $("#add_member").submit(function (e) {
        var student = $('#click_member_id').val();
        var $this = $('.add-member');
        $this.button('loading');
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $("#add_member").serialize(), // serializes the form's elements.
            dataType: 'JSON',
            success: function (response)
            {

                if (response.status == "success") {
                    $('#squarespaceModal').modal('hide');
                    $('#add_member')[0].reset();
                    successMsg(response.message);
                    $this.button('reset');
                    $('*[data-stdid="' + student + '"]').closest('tr').find('td:first').text(response.inserted_id);
                    $('*[data-stdid="' + student + '"]').closest('tr').find('td:nth-child(2)').text(response.library_card_no);
                    $('*[data-stdid="' + student + '"]').closest("tr").addClass("success");
                    $('*[data-stdid="' + student + '"]').closest("td").empty();
                } else if (response.status == "fail") {
                    $.each(response.error, function (index, value) {
                        var errorDiv = '#' + index + '_error';
                        $(errorDiv).empty().append(value);
                    });
                    $this.button('reset');
                }
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>
                
    
   
