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
                        <h4 class="page-title">View Teacher</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Student Information</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> 
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo base_url() . $student['image'] ?>" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $student['firstname'] . " " . $student['lastname']; ?></h4>
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
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">
                            <?php echo $this->lang->line('subject_list'); ?>
                        </h3>
                    </div>                   
                    <div class="box-body">
					<div class="download_label"><?php echo $this->lang->line('subject_list'); ?></div>
                        <table id="" class="table table-striped table-bordered table-hover example">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('teacher_name'); ?></th>
                                    <th><?php echo $this->lang->line('subject'); ?></th>
                                    <th class="text-right"><?php echo $this->lang->line('type'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($result_array)) {
                                    ?>
                                    <tr>
                                        <td colspan="12" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($result_array as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value['teacher_name'] ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td class="text-right"><?php echo $value['type'] ?></td>
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



 
