
  <!--<script src="<?php echo base_url(); ?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>-->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><i class="mdi mdi-security-home"></i> Rolo /Permission</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Admin</a></li>
                            <li class="active">Role/Permission</li>
                        </ol>
                    </div>
                </div>
                 
                       <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Add User Role</h3>
                            <p class="text-muted m-b-30 font-13"> -</p>
                            <form class="form-horizontal" action="<?php echo site_url('webadmin/roles/edit/' . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                                 <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>
                                    <?php
                                    if (isset($error_message)) {
                                        echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                    }
                                    ?>  
                                <div class="form-group">
                                    <label for="exampleInputuname" class="col-sm-3 control-label">Role Name*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                           <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php
                                if (isset($name)) {
                                    echo $name;
                                }
                                ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">

                                <input autofocus="" name="id" placeholder="" type="hidden" class="form-control"  value="<?php
                                if (isset($id)) {
                                    echo $id;
                                }
                                ?>" />
                            </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Role/Permission</h3>
                            <p class="text-muted m-b-30 font-13"> - </p>
                             <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Type</th>
                                        <th class="text-right no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($listroute)) { ?>
                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($listroute as $data) {
                                            ?>
                                            <tr>
                                                <td class=""> <?php echo $data['name'] ?></td>
                                                <td class=""> 
                                                    <?php
                                                    if ($data['is_system']) {
                                                        echo "Developer";
                                                    } else {
                                                        echo "Other Usre";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="pull-right no-print">
                                                    <?php
                                                    if (!$data['is_superadmin']) {
                                                        ?>
                                                        <a href="<?php echo site_url('wadmin/roles/permission/' . $data['id']); ?>" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="Assign Permission">
                                                            <i class="fa fa-tag"></i>
                                                        </a>
                                                        <a href="<?php echo site_url('wadmin/roles/edit/' . $data['id']); ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php
                                                        if (!$data['is_system']) {
                                                            ?>
                                                            <a href="<?php echo site_url('admin/roles/delete/' . $data['id']); ?>"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                <i class="fa fa-remove"></i>
                                                            </a>

                                                            <?php
                                                        }
                                                        ?>
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