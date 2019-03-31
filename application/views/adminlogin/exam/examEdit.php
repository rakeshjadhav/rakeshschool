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
                               <i class="fa fa-home fa-fw"></i> || Add Exam
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Add Exam</li>
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
                                    <i class="fa fa-retweet"></i> ||  Add Exam Create
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php //echo $this->customlib->getCSRF(); ?>
                                    <form action="<?php echo site_url("webadmin/exam/edit/" . $id) ?>" method="post">
                                        <div class="form-group">
                                            <label for="">name</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                 <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name', $exam['name']); ?>" />
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                        </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">description</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-retweet"></i></div>
                                                 <textarea class="form-control" id="note" name="note" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('note'); ?><?php echo set_value('note', $exam['note']) ?></textarea>
                                    <span class="text-danger"><?php echo form_error('note'); ?></span>
                                        </div>
                                        </div>
                                        <input type="submit" name="" id=""class="btn btn-xs btn-success waves-effect waves-light m-r-10" value="Update" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
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
                                <i class="fa fa-retweet fa-fw"></i> || Exam List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                                 <table id="example23" class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th class="text-right">action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($examlist)) {
                                        ?>

                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($examlist as $exam) {
                                            ?>

                                            <tr>

                                                <td class="">
                                                    <a href="#" data-toggle="popover" class="detail_popover" ><?php echo $exam['name'] ?></a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($exam['note'] == "") {
                                                            ?>
                                                            <p class="text text-danger">no_description</p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $exam['note']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('exam', 'can_edit')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/exam/edit/<?php echo $exam['id'] ?>" class="btn btn-info btn-xs"  data-toggle="tooltip" title="edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('exam', 'can_delete')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>webadmin/exam/delete/<?php echo $exam['id'] ?>"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="delete" onclick="return confirm('are you sure you want to delete this item ??');">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <a href="<?php echo base_url(); ?>webadmin/exam/examclasses/<?php echo $exam['id'] ?>"class="btn btn-info btn-xs">
                                                      view status
                                                    </a>
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

                
    
   
