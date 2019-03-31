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
                        <h4 class="page-title">My Children </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">My Children</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <?php
            foreach ($student_list as $key => $student) {
                ?>
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> 
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo base_url() . $student['image'] ?>" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="" style="color:#fff"><a class="text-white" href="<?php echo site_url('parent/parents/getStudent/' . $student['id']); ?>"> <?php echo $student['firstname'] . " " . $student['lastname']; ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <ul class="list-group list-group-full">
                                        <li class="list-group-item">
                                            <span class="badge " style="background-color: none !important;">
                                              <?php echo $student['admission_no']; ?></span> <span class="font-bold"> Admission No</span>
                                        </li>
                                        <li class="list-group-item">
                                        <span class="badge ">
                                            <?php echo $student['roll_no']; ?></span><span class="font-bold">Roll No</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge "><?php echo $student['class']; ?></span><span class="font-bold">Class</span>
                                        </li>
                                        <li class="list-group-item ">
                                            <span class="badge "><?php echo $student['division']; ?></span> <span class="font-bold">Division </span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge"><?php echo $student['rte']; ?></span> <span class="font-bold"> Rte</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge" style=""><?php echo $student['gender']; ?></span><span class="font-bold">Gender</span>
                                        </li>
                                        </ul>
                               </div>
                        </div>
                    </div>
                    <?php
            }
            ?>
                    
                    </div>
                </div>
         
                
          
            </div>
           
        </div>


<script type="text/javascript">
    $(".myTransportFeeBtn").click(function () {
        $("span[id$='_error']").html("");
        $('#transport_amount').val("");
        $('#transport_amount_discount').val("0");
        $('#transport_amount_fine').val("0");
        var student_session_id = $(this).data("student-session-id");
        $('.transport_fees_title').html("<b>Upload Document</b>");
        $('#transport_student_session_id').val(student_session_id);
        $('#myTransportFeesModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true

        });
    });
</script>
<div class="modal fade" id="myTransportFeesModal" role="dialog">
    <div class="modal-dialog">      
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title text-center transport_fees_title">Upload Document</h4>
            </div>
            <div class="">
                <div class="form-horizontal">
                    <div class="">
                        <input  type="hidden" class="form-control" id="transport_student_session_id"  value="0" readonly="readonly"/>
                        <form id="form1" action="<?php echo site_url('webadmin/student/create_doc') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                             <?php echo $this->customlib->getCSRF(); ?>
                            <div id='upload_documents_hide_show'>                                                    
                                <input type="hidden" name="student_id" value="<?php echo $student_doc_id; ?>" id="student_id">
                                <!--<h3 class="box-title m-b-0"> Upload Documents</h3>-->
                                
                                  <!--<div class="row" style="box-shadow: 0 0 8px rgba(0,0,0,0.19), 0 2px 2px rgba(0,0,0,0.23);">-->
                                                 <div class="white-box">
                                                     <h3 class="box-title m-b-0" style="border-left:4px solid #ff7676;padding-left:5px;">
                                                         Upload New Documents
                                                     </h3>
                                                       <p class="text-muted m-b-30 font-13">  </p>
                                                 
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Title</label>
                                                       <input id="first_title" name="first_title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('first_title'); ?>" />
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('first_title'); ?></span>
                                                    </div>
                                                       
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Documents</label>
                                                        <input id="first_doc_id" name="first_doc" placeholder="" type="file"  class="filestyle form-control"  value="<?php echo set_value('first_doc'); ?>" />
                                                    </div>
                                                        <span class="text-danger"><?php echo form_error('first_doc'); ?></span>
                                                    </div>
                                                 </div>
                                  <!--</div>-->
                                                       
                                
                                
                            </div>
                            <div class="modal-footer" style="clear:both">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Upload</button>
                            </div>
                        </form>
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</div>

 
<script type="text/javascript">
    $(document).ready(function () {
        $.extend($.fn.dataTable.defaults, {
            searching: false,
            ordering: false,
            paging: false,
            bSort: false,
            info: false
        });
    });

    $(document).on('click', '.schedule_modal', function () {
        $('.modal-title_logindetail').html("");
        $('.modal-title_logindetail').html("login Details");
        var base_url = '<?php echo base_url() ?>';
        var student_id = '<?php echo $student["id"] ?>';
        var student_first_name = '<?php echo $student["firstname"] ?>';
        var student_last_name = '<?php echo $student["lastname"] ?>';
        $.ajax({
            type: "post",
            url: base_url + "webadmin/student/getlogindetail",
            data: {'student_id': student_id},
            dataType: "json",
            success: function (response) {
                var data = "";
                data += '<div class="col-md-12">';
                data += '<div class="table-responsive">';
                data += '<p class="lead text text-center">' + student_first_name + ' ' + student_last_name + '</p>';
                data += '<table class="table table-hover">';
                data += '<thead>';
                data += '<tr>';
                data += '<th>' + "User Type" + '</th>';
                data += '<th class="text text-center">' + "Username" + '</th>';
                data += '<th class="text text-center">' + "Password" + '</th>';
                data += '</tr>';
                data += '</thead>';
                data += '<tbody>';
                $.each(response, function (i, obj)
                {
                    data += '<tr>';
                    data += '<td><b>' + firstToUpperCase(obj.role) + '</b></td>';
                    data += '<td class="text text-center">' + obj.username + '</td> ';
                    data += '<td class="text text-center">' + obj.password + '</td> ';
                    data += '</tr>';
                });
                data += '</tbody>';
                data += '</table>';
                data += '<b class="lead text text-danger" style="font-size:14px;"> ' + "Login Url" + ': ' + base_url + 'site/userlogin</b>';
                data += '</div>  ';
                data += '</div>  ';
                $('.modal-body_logindetail').html(data);
                $("#scheduleModal").modal('show');
            }
        });
    });

    function firstToUpperCase(str) {
        return str.substr(0, 1).toUpperCase() + str.substr(1);
    }
</script>
<script>
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
    });
</script>
