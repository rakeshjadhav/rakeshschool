<style>
    table.dataTable thead th {
    padding: 8px 0px !important;
    }
    table.dataTable tbody td {
    padding: 5px 5px !important;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Teachers List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Teachers</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                          
                          <div class="col-md-12 col-sm-12">
                              <div class="">

                           <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Teacher List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive mailbox-messages">
						<div class="download_label"><?php echo $this->lang->line('members'); ?></div>
                            <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                <thead>
                                    <tr>
                                        <th>Member ID</th>
                                        <th>Library Card No</th>
                                        <th>Admission No</th>
                                        <th>Name</th>
                                        <th>Member Type</th>
                                        <th>Phone</th>
                                        <th class="text text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($memberList)) {
                                        $count = 1;
                                        foreach ($memberList as $member) {

                                            if ($member['member_type'] == "student") {
                                                $name = $member['firstname'] . " " . $member['lastname'];
                                                $phone = $member['guardian_phone'];
                                            } else {
                                                $email = $member['teacher_email'];
                                                $name = $member['teacher_name'];
                                                $sex = $member['teacher_sex'];
                                                $phone = $member['teacher_phone'];
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $member['lib_member_id']; ?>

                                                </td>
                                                <td>
                                                    <?php echo $member['library_card_no']; ?>

                                                </td>
                                                <td>
                                                    <?php echo $member['admission_no']; ?>

                                                </td>
                                                <td>
                                                    <?php echo $name; ?>

                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line($member['member_type']); ?>

                                                </td>
                                                <td>
                                                    <?php echo $phone; ?>

                                                </td>

                                                <td class="text text-right">
                                                    <a href="<?php echo base_url(); ?>librarian/member/issue/<?php echo $member['lib_member_id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('issue_return'); ?>">
                                                        <i class="fa fa-sign-out"></i>
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
<script type="text/javascript">
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#dob,#admission_date').datepicker({
            format: date_format,
            autoclose: true
        });
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>

                
    
   
