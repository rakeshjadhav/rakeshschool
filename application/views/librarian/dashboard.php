<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">View Library</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">View Library</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> 
                                <!--<img width="100%" alt="user" src="">-->
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo base_url() . $librarian['image'] ?>" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $librarian['name'] ?></h4>
                                        <h5 class="text-white"><?php echo $librarian['email'] ?></h5> </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <ul class="list-group list-group-full">
                                        <li class="list-group-item">
                                            <span class="badge badge-danger " style="background-color: none !important;"><?php echo $librarian['sex'] ?></span>  <i class="fa fa-transgender" ></i> - Gender 
                                        </li>
                                        <li class="list-group-item">
                                        <span class="badge badge-danger "><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($librarian['dob'])); ?></span> <i class="fa fa-calendar-times-o" ></i> - Date of Birth
                                        </li>
                                        <li class="list-group-item">
                                        <span class="badge badge-danger"><?php echo $librarian['phone'] ?></span><i class="fa fa-phone" ></i> -  phone
                                        </li>
<!--                                        <li class="list-group-item ">
                                        <span class="">
                                            </span><i class="fa fa-envelope" ></i> -  Email
                                        </li>-->
                                        <li class="list-group-item ">
                                        <span class="badge badge-danger"><?php echo $librarian['email'] ?>
                                            </span> -  
                                        </li>
                                       
                                        <li class="list-group-item">
                                         <span class=""></span> <i class="fa fa-adn" ></i> Address
                                        </li>
                                        <li class="list-group-item">
                                            <span class="" style="color:#000;"><?php echo $librarian['address'] ?></span>
                                        </li>
                                        </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                          
                         <!--// show each teacher class wise subjects-->
                               
                                
                        </div>
                    </div>
                </div>
         
                
          
            </div>
           
        </div>


<script type="text/javascript">
    $(document).on('click', ' .schedule_modal', function () {
//        alert('ok');
        $('.modal-title').html("");
        $('.modal-title').html("login_details");
        var base_url = '<?php echo base_url() ?>';
        var teacher_id = '<?php echo $teacher["id"] ?>';
        var teacher_name = '<?php echo $teacher["name"] ?>';
        //alert(base_url);
        //alert(teacher_id);
        /alert(teacher_name);
        $.ajax({
            type: "post",
            url: base_url + "webadmin/teacher/getlogindetail",
            data: {'teacher_id': teacher_id},
            dataType: "json",
            success: function (response) {
                var data = "";
                data += '<div class="table-responsive">';
                data += '<p class="lead text text-center">' + teacher_name + '</p>';
                data += '<table class="table table-hover">';
                data += '<thead>';
                data += '<tr>';
                data += '<th>' + "<?php echo $this->lang->line('user_type'); ?>" + '</th>';
                data += '<th class="text text-center">' + "<?php echo $this->lang->line('username'); ?>" + '</th>';
                data += '<th class="text text-center">' + "<?php echo $this->lang->line('password'); ?>" + '</th>';
                data += '</tr>';
                data += '</thead>';
                data += '<tbody>';
                $.each(response, function (i, obj)
                {
                    console.log(obj);
                    data += '<tr>';
                    data += '<td><b>' + firstToUpperCase(obj.role) + '</b></td>';
                    data += '<td class="text text-center">' + obj.username + '</td> ';
                    data += '<td class="text text-center">' + obj.password + '</td> ';
                    data += '</tr>';
                });
                data += '</tbody>';
                data += '</table>';
                data += '<b class="lead text text-danger" style="font-size:14px;"> ' + "<?php echo $this->lang->line('login_url'); ?>" + ': ' + base_url + 'site/userlogin</b>';
                data += '</div>  ';
                $('.modal-body').html(data);
                $("#scheduleModal").modal('show');
            }
        });
    });

    function firstToUpperCase(str) {
        return str.substr(0, 1).toUpperCase() + str.substr(1);
    }
</script>
<div id="scheduleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" ></h4> </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>