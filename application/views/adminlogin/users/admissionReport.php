
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Search Student
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Search Student</li>
                        </ol>
                    </div>
                </div>
                <div class="white-box">
                    
                    
                    <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search fa-fw"></i>select_criteria</h3>
                    </div>

                    <form role="form" action="<?php echo site_url('webadmin/users/admissionreport') ?>" method="post" class="">
                        <div class="box-body row">

                         

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>class</label><small class="req"> *</small>
                                    <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                        <option value="">select</option>
                                        <?php
                                        foreach ($classlist as $class) {
                                            ?>
                                            <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?> ><?php echo $class['class'] ?></option>
                                            <?php
                                            $count++;
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                </div>
                            </div> 

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">  
                                    <label>admission_year</label>
                                    <select  id="year" name="year" class="form-control" >
                                        <option value="">select</option>
                                        <?php foreach ($admission_year as $key => $value) { ?>

                                            <option value="<?php echo $value["year"] ?>"><?php echo $value["year"] ?></option>   

                                        <?php } ?>

                                    </select>
                                    <span class="text-danger"><?php echo form_error('year'); ?></span>
                                </div>  
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> search</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>

            <div class="box box-info" style="padding:5px;">
                <div class="box-header ptbnull">
                    <h3 class="box-title titlefix"><i class="fa fa-users"></i> 
                        <?php echo form_error('student'); ?>
                        student_history
                    </h3>
                </div>
                <div class="box-body table-responsive">
                  
                    <table id="example23" class="table table-striped table-bordered table-hover example">
                        <thead>
                            <tr>
                                <th>admission_no</th>
                                <th>student_name</th>
                                <th>admission_date</th>
                                <th>class (Start - End)</th>
                                <th>session (start - end)</th>
                                <th>years</th>
                                <th>mobile_no</th>
                                <th>guardian_name</th>
                                <th>guardian_phone</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($resultlist)) {
                                ?>

                                <?php
                            } else {
                                $count = 1;
                                $i = 0;
                                foreach ($resultlist as $student) {

                                    $startsession = $sessionlist[$i]['start'];
                                    $findstartyear = explode("-", $startsession);
                                    $startyear = $findstartyear[0];

                                    $endsession = $sessionlist[$i]['end'];
                                    $findendyear = explode("-", $endsession);
                                    $endyear = $findendyear[0];
                                    ?>
                                    <tr <?php
                                    if ($student["is_active"] == "no") {
                                        echo "class='danger'";
                                    }
                                    ?>>
                                        <td><?php echo $student['admission_no']; ?></td>

                                        <td>
                                            <a href="<?php echo base_url(); ?>webadmin/student/view/<?php echo $student['sid']; ?>"><?php echo $student['firstname'] . " " . $student['lastname']; ?>
                                            </a>
                                        </td>
                                        <td><?php echo date("m/d/Y", strtotime($student["admission_date"])) ?></td>

                                        <td><?php echo $sessionlist[$i]['startclass'] . "  -  " . $sessionlist[$i]['endclass']; ?></td>
                                        <td><?php echo $sessionlist[$i]['start'] . "  -  " . $sessionlist[$i]['end']; ?></td>
                                        <td><?php echo ($endyear - $startyear) + 1; ?></td>

                                        <td><?php echo $student['mobileno']; ?></td>

                                        <td><?php echo $student['guardian_name']; ?></td>

                                        <td><?php echo $student['guardian_phone']; ?></td>


                                    </tr>
                                    <?php
                                    $i++;
                                    $count++;
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