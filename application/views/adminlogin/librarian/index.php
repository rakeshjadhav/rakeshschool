<style>
    .comment-body:hover {
    background: #fff !important;
    }
    .comment-center .user-img img {
    /*width: 100%;*/
     height:100px !important;
     width:100px !important;
</style>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-users fa-fw"></i> || Library Members  List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Library Members  List</li>
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
                              <div class="panel" style="border-top:3px solid #ff6347;border-radius: 8px;">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-users fa-fw"></i> ||  Library Members  List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <table id="example23" class="display" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr style="">
                                                  <th>Member Id</th>
                                                  <th>Library Card No</th>
                                                  <th>Admission No</th>
                                                  <th>Name</th>
                                                  <th>Member Type</th>
                                                  <th>Phone</th>
                                                  <th>Action</th>
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
                                                    <?php echo $member['member_type']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $phone; ?>
                                                </td>
                                                <td class=" pull-right">
                                                    <a href="<?php echo base_url(); ?>webadmin/member/issue/<?php echo $member['lib_member_id'] ?>" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('issue_return'); ?>">
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

  
    
   
