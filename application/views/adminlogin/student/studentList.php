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
                               <i class="fa fa-user fa-fw"></i> || Student Add
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Student Add</li>
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
                                          <i class="fa fa-tags"></i> ||  Student List
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                    <div class="col-md-12 col-lg-8 col-sm-12 col-lg-offset-2">
                        <div class="">
                            
                            <div class="comment-center">
                                <?php
                        $count = 1;
                        foreach ($studentlist as $student) {
                            ?>
                                <div class="comment-body">
                                    <div class="user-img">
                                        <img src="<?php echo base_url() . $student['image'] ?>" alt="user" class="" height="" width="">
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>
                                            <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['id'] ?>"> <?php echo $student['firstname'] . " " . $student['lastname'] ?></a>
                                        </h5>
                                        <span class="time bold" style="font-weight:bold"><?php echo $student['email'] ?></span> 
                                        <span class="label label-rouded label-info"><?php echo $student['class'] . " ( " . $student['division'] . " ) " ?></span>
                                        <div class="col-lg-12" style="padding:7px 7px">
                                            <div class="col-md-3 col-xs-6 font-bold">Admission No :</div>
                                            <div class="col-md-3 col-xs-6 "><?php echo $student['admission_no'] ?></div>
                                            <div class="col-md-3 col-xs-6 font-bold">Roll No : </div>
                                            <div class="col-md-3 col-xs-6"><?php echo $student['roll_no'] ?></div>
                                        </div>
                                        <div class="col-lg-12" style="padding:7px 7px">
                                            <div class="col-md-3 col-xs-6 font-bold">Birth date : </div>
                                            <div class="col-md-3 col-xs-6"><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['dob'])); ?></div>
                                            <div class="col-md-3 col-xs-6 font-bold">Phone : </div>
                                            <div class="col-md-3 col-xs-6"><?php echo $student['mobileno'] ?></div>
                                        </div>
                                        
                                        <br/>
                                        <span class="mail-desc">
                                           
                                        </span> 
                                        <span class="pull-right">
                                        <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['id'] ?>" class="btn btn btn-rounded btn-default btn-outline m-r-5">
                                            View</a>
                                            <a href="<?php echo base_url(); ?>webadmin/student/edit/<?php echo $student['id'] ?>" class="btn-rounded btn btn-default btn-outline">
                                                Edit</a>
                                        </span>
                                         </div>
                                </div>
                                
                                <?php
                            $count++;
                        }
                        ?>
                                
                            </div>
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


                
    
   
