<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || approve_leave_request
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">approve_leave_request</li>
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
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;">
                                <i class="fa fa-tags fa-fw"></i> || approve_leave_request
                                 <?php if ($this->rbac->hasPrivilege('approve_leave_request', 'can_add')) {?>
                                    <small class="pull-right">
                                        <a href="#addleave" onclick="addLeave()" role="button" class="btn btn-primary btn-sm checkbox-toggle pull-right edit_setting" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">add leave request</a></small>
                               <?php } ?>
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                              	<div class="download_label"></div>
                                 <table id="example23" class="table table-striped table-bordered table-hover example">
                                        <thead>

                                        <th>staff</th>
                                        <th>leave_type</th>
                                        <th>leave date</th>
                                        <th>days</th>
                                        <th>apply date</th>
                                        <th>status</th>
                                        <th class="no-print">action</th>

                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($leave_request as $key => $value) {
                                                ?>
                                                <tr>   

                                                    <td><span data-toggle="popover" class="detail_popover" data-original-title="" title=""><?php echo $value['name'] . " " . $value['surname']; ?></span>
                                                        <div class="fee_detail_popover" style="display: none">staff_id: <?php echo $value['employee_id']; ?></div></td>
                                                    <td><?php echo $value["type"] ?></td>
                                                    <td><?php echo $value["leave_from"] ?> - <?php echo $value["leave_to"] ?></td>

                                                    <td><?php echo $value["leave_days"]; ?></td>
                                                    <td><?php echo $value["date"]; ?></td>
                                                    <?php
                                                    if ($value["status"] == "approve") {
                                                        $label = "class='label label-success'";
                                                    } else if ($value["status"] == "pending") {
                                                        $label = "class='label label-warning'";
                                                    } else if ($value["status"] == "disapprove") {
                                                        $label = "class='label label-danger'";
                                                    }
                                                    ?>
                                                    <td><span data-toggle="popover" class="detail_popover" data-original-title="" title="">
                                                            <small <?php echo $label ?>><?php echo $status[$value["status"]]; ?></small></span>

                                                        <div class="fee_detail_popover" style="display: none">
                                                            <?php echo"submitted_by"  ?>: <?php echo $value['applied_by']; ?></div></td>
                                                    <td class="no-print">
                                                        <a href="#leavedetails" onclick="getRecord('<?php echo $value["id"] ?>')" role="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="view" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><i class="fa fa-reorder"></i></a>

                                                        <?php if ($value["applied_by"] == $this->customlib->getAdminSessionUserName()) { ?>
                                                            <?php
                                                            if ($this->rbac->hasPrivilege('approve_leave_request', 'can_edit')) {
                                                                ?> 
                                                                <a href="#addleave" onclick="editRecord('<?php echo $value["id"] ?>')" role="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="edit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><i class="fa fa-pencil"></i></a>
                                                            <?php } ?>
                                                            <?php if (!empty($value['document_file'])) { ?>
                                                                <a href="<?php echo base_url(); ?>webadmin/staff/download/<?php echo $value['staff_id'] . "/" . $value['document_file']; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="download">
                                                                    <i class="fa fa-download"></i>
                                                                </a>  
                                                            <?php } ?>                               
                                                        <?php } ?>
                                                    </td>

                                                </tr>
                                                <?php
                                                $i++;
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


<div id="addleave" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">add details</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form" id="addleave_form" method="post" enctype="multipart/form-data" action="">

                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label>
                                role</label><small class="req"> *</small>
                            <select name="role" class="form-control" onchange="getEmployeeName(this.value)">
                                <option value="" selected><?php echo $this->lang->line('select') ?></option>
                                <?php foreach ($staffrole as $rolekey => $rolevalue) {
                                    ?>
                                    <option value="<?php echo $rolevalue["type"] ?>"><?php echo $rolevalue["type"] ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('role'); ?></span>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label>name</label><small class="req"> *</small>
                            <select name="empname" id="empname" value=""onchange="   getLeaveTypeDDL(this.value)"  class="form-control">
                                <option value="" selected><?php echo $this->lang->line('select') ?></option>
                            </select> 
                            <span class="text-danger"><?php echo form_error('empname'); ?></span>
                        </div>
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label>apply date</label>
                            <input type="text" id="applieddate" name="applieddate" value="<?php echo date("Y-m-d") ?>" class="form-control">

                        </div>

                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6 ">
                            <label>
                               leave_type</label> 
                            <div id="leavetypeddl">
                                <select name="leave_type" id="leave_type" class="form-control" >
                                    <option value="">select</option>
                                    <?php foreach ($leavetype as $leave_key => $leave_value) {
                                        ?>
                                        <option value="<?php echo $leave_value["id"] ?>"><?php echo $leave_value["type"] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <span class="text-danger"><?php echo form_error('leave_type'); ?></span>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>leave Start date:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date"  name="leavedates" class="form-control pull-right" id="reservation">
                            </div>

                            <!-- /.input group -->
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>leave End date:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date"  name="leavedates1" class="form-control pull-right" id="reservation">
                            </div>

                            <!-- /.input group -->
                        </div>


                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label>reason</label><br/>
                            <textarea name="reason" id="reason" style="resize: none;" rows="4" class="form-control"></textarea>
                            <input type="hidden" name="leaverequestid" id="leaverequestid">
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6" id="reason">
                            <label>note</label>

                            <textarea class="form-control" style="resize: none;" rows="4" id="remark" name="remark" placeholder=""></textarea>
                            <span class="text-danger"><?php echo form_error('remark'); ?></span>

                        </div>
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label>attach_document</label>
                            <input type="file" id="file" name="userfile" class="filestyle form-control">
                            <input type="hidden" id="filename" name="filename" > 
                        </div>

                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <label>status</label>
                            <br/>
                            <label class="radio-inline">

                                <input type="radio" value="<?php echo "pending" ?>" name="addstatus" checked><?php echo $status["pending"] ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" value="<?php echo "approve" ?>"  name="addstatus" ><?php echo $status["approve"] ?></label>
                            <label class="radio-inline">

                                <input type="radio" value="<?php echo "disapprove" ?>"  name="addstatus"><?php echo $status["disapprove"] ?></label>


                            <span class="text-danger"><?php echo form_error('addstatus'); ?></span>
                        </div>


                        <div class="clearfix"></div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="submit" class="btn btn-primary submit_addLeave pull-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">save</button>
                            <input type="reset"  name="resetbutton" id="resetbutton" style="display:none">
                            <button type="button" style="display: none;" id="clearform" onclick="clearForm(this.form)" class="btn btn-primary submit_addLeave pull-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">clear</button>

                        </div>




                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /*--dropify--*/
    $(document).ready(function () {
        // Basic
      //  $('.filestyle').dropify();
    });
    /*--end dropify--*/
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            title: '',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });

       // var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';

       // $('#applieddate,#leavefrom,#leaveto').datepicker({
            //format: date_format,
        //    autoclose: true
        //});
       // $('#reservation').daterangepicker();
    });

    function addLeave() {
        $('input:radio[name=addstatus]').attr('checked', false);
        $('input[type=text]').val('');
        $('textarea[name="reason"]').text('');
        $('textarea[name="remark"]').text('');
        $("#resetbutton").click();
        $("#clearform").click();
        $('input:radio[name=addstatus]')[0].checked = true;

        //var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';

       // $('#applieddate').datepicker({
            //format: date_format,
           // autoclose: true
        //});
       // $('#reservation').daterangepicker();
        var date = '<?php echo date("Y-m-d") ?>';
        $('input[type=text][name=applieddate]').val((date));

        $('#addleave').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
    }


    function getRecord(id) {
        $('input:radio[name=status]').attr('checked', false);
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'webadmin/leaverequest/leaveRecord',
            type: 'POST',
            data: {id: id},
            dataType: "json",
            success: function (result) {

                $('input[name="leave_request_id"]').val(result.id);
                $('#employee_id').html(result.employee_id);
                $('#name').html(result.name);
                $('#leave_from').html((result.leave_from));
                $('#leave_to').html((result.leave_to));
                $('#leave_type').html(result.type);
                $('#days').html(result.leave_days + ' Days');
                $('#remark').html(result.employee_remark);
                $('#applied_date').html((result.date));
                $('#appliedby').html(result.applied_by);
                $("#detailremark").text(result.admin_remark);
                if (result.status == 'approve') {

                    $('input:radio[name=status]')[1].checked = true;

                } else if (result.status == 'pending') {
                    $('input:radio[name=status]')[0].checked = true;

                } else if (result.status == 'disapprove') {
                    $('input:radio[name=status]')[2].checked = true;

                }


            }
        });

        $('#leavedetails').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
    }
    ;



    $(document).on('click', '.submit_schsetting', function (e) {
        var $this = $(this);
        $this.button('loading');
        $.ajax({
            url: '<?php echo site_url("webadmin/leaverequest/leaveStatus") ?>',
            type: 'post',
            data: $('#leavedetails_form').serialize(),
            dataType: 'json',
            success: function (data) {

                if (data.status == "fail") {

                    var message = "";
                    $.each(data.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);
                } else {

                    successMsg(data.message);
                    window.location.reload(true);
                }

                $this.button('reset');
            }
        });
    });

    function checkStatus(status) {


        if (status == 'approve') {

            $("#reason").hide();
        } else if (status == 'pending') {

            $("#reason").hide();
        } else if (status == 'disapprove') {

            $("#reason").show();
        }

    }


    $(document).ready(function (e) {
        $("#addleave_form").on('submit', (function (e) {

            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url("webadmin/leaverequest/addLeave") ?>",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data){
                    alert(data);
                    if (data.status == "fail") {

                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                       // successMsg(data.message);
                        window.location.reload(true);
                    }
                }
            });
        }));


    });


    function getEmployeeName(role) {
    alert(role);
        var ne = "";
        var base_url = '<?php echo base_url() ?>';
        $("#empname").html('<option value=><?php echo ('select') ?></option>');
        var div_data = "";
        $.ajax({
            type: "POST",
            url: base_url + "webadmin/staff/getEmployeeByRole",
            data: {'role': role},
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj)
                {


                    div_data += "<option value='" + obj.id + "' >" + obj.name + " " + obj.surname + " " + "(" + obj.employee_id + ")</option>";
                });

                $('#empname').append(div_data);
            }
        });
    }

    function setEmployeeName(role, id = '') {
        var ne = "";
        var base_url = '<?php echo base_url() ?>';
        $("#empname").html("<option value=><?php echo ('select') ?></option>");
        var div_data = "";
        $.ajax({
            type: "POST",
            url: base_url + "webadmin/staff/getEmployeeByRole",
            data: {'role': role},
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj)
                {
                    if (obj.employee_id == id) {
                        ne = 'selected';
                    } else {
                        ne = "";
                    }

                    div_data += "<option value='" + obj.id + "' " + ne + " >" + obj.name + " " + obj.surname + " " + "(" + obj.employee_id + ")</option>";
                });

                $('#empname').append(div_data);

            }
        });

    }

    function getLeaveTypeDDL(id, lid = '') {
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'webadmin/leaverequest/countLeave/' + id,
            type: 'POST',
            data: {lid: lid},
            //dataType: "json",
            success: function (result) {

                $("#leavetypeddl").html(result);
            }

        });
    }
    function editRecord(id) {

        var leave_from = '05/01/2018';
        var leave_to = '05/10/2018';
        $("#resetbutton").click();
        $('textarea[name="reason"]').text('');

        $('textarea[name="remark"]').text('');
        $('input:radio[name=addstatus]').attr('checked', false);

        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'webadmin/leaverequest/leaveRecord',
            type: 'POST',
            data: {id: id},
            dataType: "json",
            success: function (result) {


                leave_from = result.leavefrom;
                leave_to = result.leaveto;


                setEmployeeName(result.user_type, result.employee_id);
                getLeaveTypeDDL(result.staff_id, result.lid);
                $('select[name="role"] option[value="' + result.user_type + '"]').attr("selected", "selected");
                $('input[name="applieddate"]').val((result.date));
                $('input[name="leavefrom"]').val((result.leave_from));
                $('input[name="filename"]').val(result.document_file);
                $('input[name="leavedates"]').val(result.leavefrom + '-' + result.leaveto);

                $('input[name="leaverequestid"]').val(id);
                $('textarea[name="reason"]').text(result.employee_remark);
                $('textarea[name="remark"]').text(result.admin_remark);

                if (result.status == 'approve') {

                    $('input:radio[name=addstatus]')[1].checked = true;

                } else if (result.status == 'pending') {
                    $('input:radio[name=addstatus]')[0].checked = true;

                } else if (result.status == 'disapprove') {
                    $('input:radio[name=addstatus]')[2].checked = true;

                }

                $('#reservation').daterangepicker({
                    startDate: leave_from,
                    endDate: leave_to
                });
            }
        });
       // var date_format = '<?php //echo $result = strtr($this->customlib->getSchoolDateFormat(), ['m' => 'mm', 'd' => 'dd', 'Y' => 'yyyy',]) ?>';

       // $('#applieddate').datepicker({
           // format: date_format,
           // autoclose: true
       // });


        $('#addleave').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
    }
    ;

    function clearForm(oForm) {

        var elements = oForm.elements;



        for (i = 0; i < elements.length; i++) {

            field_type = elements[i].type.toLowerCase();

            switch (field_type) {

                case "text":
                case "password":

                case "hidden":

                    elements[i].value = "";
                    break;

                case "select-one":
                case "select-multi":
                    elements[i].selectedIndex = "";
                    break;

                default:
                    break;
            }
        }
    }

</script>