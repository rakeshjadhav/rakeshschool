<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Exam Create Grade List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Exam Create Grade</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                    <?php if ($this->rbac->hasPrivilege('marks_grade', 'can_add')) { ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="">
                            <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-retweet"></i> ||  Add Exam Create Grade
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php //echo $this->customlib->getCSRF(); ?>
                                    <form action="<?php echo site_url('webadmin/grade/create') ?>" method="post">
                                        <div class="form-group">
                                            <label for="">grade_name</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                 <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                                 <span class="text-danger"><?php echo form_error('name'); ?></span>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">mark_from</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                 <input id="mark_from" name="mark_from" placeholder="" type="text" class="form-control"  value="<?php echo set_value('mark_from'); ?>" />
                                              <span class="text-danger"><?php echo form_error('mark_from'); ?></span>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">mark_upto</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                  <input id="mark_upto" name="mark_upto" placeholder="" type="text" class="form-control"  value="<?php echo set_value('mark_upto'); ?>" />
                                              <span class="text-danger"><?php echo form_error('mark_upto'); ?></span>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">description</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                 <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder=""><?php echo set_value('description'); ?></textarea>
                                               <span class="text-danger"><?php echo form_error('description'); ?></span>
                                        </div>
                                        </div>
                                        <input type="submit" name="" id=""class="btn btn-xs btn-success waves-effect waves-light m-r-10" value="Add" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
                                        <input type="submit" name="" id="" class="btn btn-xs btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                      </form>
                                </div>
                            </div>
                           </div>
                       </div>
                    </div>
                </div>
                    </div>
                       <?php } ?>
                     <div class="col-md-<?php if ($this->rbac->hasPrivilege('marks_grade', 'can_add')) {
                             echo "8";
                              } else {
                               echo "12";}?>">
                        <div class="">

                     <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                <i class="fa fa-retweet fa-fw"></i> || Division List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                                 <table id="example23" class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>grade_name</th>
                                        <th>percent_from</th>
                                        <th>percent_upto</th>
                                        <th class="text-right">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($listgrade)) {
                                        ?>

                                        <?php
                                    } else {
                                        foreach ($listgrade as $grade) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover" ><?php echo $grade['name'] ?></a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($grade['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger">no_description</p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $grade['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class=""> <?php echo $grade['mark_from'] ?></td>
                                                <td class=""> <?php echo $grade['mark_upto'] ?></td>
                                                <td class=""> 
                                                   <div class="">
                                                    <div class="">
                                                         <?php
                                                    if ($this->rbac->hasPrivilege('marks_grade', 'can_edit')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/grade/edit/<?php echo $grade['id'] ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('marks_grade', 'can_delete')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/grade/delete/<?php echo $grade['id'] ?>"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('Are You Sure you wont to delete this intem ?');">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    <?php } ?>
                                                    </div>
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                            <?php
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
                    </div>
                        </div>
                    </div>
                </div> 
                   
                        </div>
                    </div>
                </div>
</div>

                
    
   
