 <script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<style>
    .comment-body:hover {
    background: #fff !important;
    }
    .comment-center .user-img img {
    /*width: 100%;*/
     height:100px !important;
     width:100px !important;
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-user fa-fw"></i> || Exam Schedule
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Exam Schedule</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-tags"></i> ||  Exam Schedule
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                    <div class="">
                        <div class="">
                            
                            <!--<div class="comment-center">-->
                              <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                            <thead>
                                <tr>
                                    <th style="width: 30px">#</th>
                                    <th>exam</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead> 
                            <tbody>    
                                <?php if (empty($examSchedule)) {
                                    ?>
                                    <tr >
                                        <td colspan="3" class="alert text-danger text-center">No record found</td>
                                    </tr>

                                    <?php
                                } else {
                                    $count = 1;
                                    foreach ($examSchedule as $exam) {
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?>.</td>
                                            <td><?php echo $exam['name']; ?></td>
                                            <td class="pull-right">
                                                <a  class="btn btn-primary btn-xs schedule_modal" data-toggle="tooltip" title="" data-examname="<?php echo $exam['name']; ?>" data-examid="<?php echo $exam['exam_id']; ?>" data-original-title="view_detail" data-sectionid='<?php echo $section_id ?>' data-classid='<?php echo $class_id ?>' data-classname="<?php echo $exam['class_name'] ?>"  data-sectionname="<?php echo $exam['section_name'] ?>">
                                                    <i class="fa fa-eye"></i> view
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
                                
                            <!--</div>-->
                        </div>
                    </div>
                    
                </div>
                                          
                                 </div> <!-- end panel -->
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


                
    
   
