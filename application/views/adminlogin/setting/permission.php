<style type="text/css">
    .material-switch > input[type="checkbox"] {
        display: none;   
    }
    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative; 
        width: 40px;  
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>
  <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><i class="mdi mdi-security-home"></i> Project Module</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Admin</a></li>
                            <li class="active">Project Modules </li>
                        </ol>
                    </div>
                </div>
                
                 <div class="row">
                    <div class="">
                        <div class="" style="border-top:3px solid #707cd2;border-radius: 7px;">
                            <!--<h3 class="box-title m-b-0"></h3>-->
                             <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                   <i data-icon="Y" class="linea-icon linea-basic fa-fw"></i> ||   Academic Modules List
                               </div>
                                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                             <div class="table-responsive" id="tab_students">
                                <table id='myTable' class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($permissionList)) {
                                            $count = 1;
                                            foreach ($permissionList as $permission) {
                                                ?>
                                                <tr>
                                                      <td><?php echo $count++; ?></td>
                                                    <td><?php echo $permission['name']; ?></td>
                                                    <td class="">
                                                        <div class="material-switch">
                                                            <input id="student<?php echo $permission['id'] ?>" name="" type="checkbox" data-role="student" class="chk" data-rowid="<?php echo $permission['id'] ?>" value="checked" <?php if ($permission['is_active'] == 1) echo "checked='checked'"; ?> />
                                                            <label for="student<?php echo $permission['id'] ?>" class="label-success"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                               // $count++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                                </div>
                        </div>
                    </div>
                 </div>
                <script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.chk', function () {
            var checked = $(this).is(':checked');
            var rowid = $(this).data('rowid');
            var role = $(this).data('role');
            if (checked) {
                if (!confirm('Are you sure you active permission?')) {
                    $(this).removeAttr('checked');
                } else {
                    var status = "1";
                    changeStatus(rowid, status, role);
                }
            } else if (!confirm('Are you sure you deactive permission?')) {
                $(this).prop("checked", true);
            } else {
                var status = "0";
                changeStatus(rowid, status, role);

            }
        });
    });

    function changeStatus(rowid, status, role) {
        var base_url = '<?php echo base_url() ?>';
        alert(base_url);
        $.ajax({
            type: "POST",
            url: base_url + "webadmin/module/changeStatus",
            data: {'id': rowid, 'status': status, 'role': role},
            dataType: "json",
            success: function (data) {
              //  alert(data);
                successMsg(data.msg);
                window.location.reload(true);
            }
        });
    }


</script>
                 