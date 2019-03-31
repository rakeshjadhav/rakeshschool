<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">View Teacher</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">View Teacher</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                         <?php
                if ($memberList->member_type == "student") {
                    $this->load->view('librarian/member/_student');
                } else {
                    $this->load->view('librarian/member/_teacher');
                }
                ?>  
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                          
                         <!--// show each teacher class wise subjects-->
                               <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-tags fa-fw"></i> || Teacher List 
                                      <a href="" data-toggle="modal" data-target="#scheduleModal" id="schedule_modal" class=" model_img img-responsive pull-right" ><i class="fa fa-key fa-2x "></i> Login Details</a>
                                  </div>
                                   
                                   <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $this->lang->line('issue_book'); ?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form id="form1" action="<?php echo site_url('librarian/member/issue/' . $memberList->lib_member_id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">

                        <div class="box-body">                            
                            <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                            <?php echo $this->customlib->getCSRF(); ?>

                            <input id="member_id" name="member_id"  type="hidden" class="form-control date"  value="<?php echo $memberList->lib_member_id; ?>" />

                            <div class="form-group">
                                <label for="">Books</label>
                                <select autofocus="" id="book_id" name="book_id" class="form-control" >
                                    <option value="">Select</option>
                                    <?php
                                    foreach ($bookList as $book) {
                                        ?>
                                        <option value="<?php echo $book['id'] ?>"<?php
                                        if (set_value('book_id') == $book['id']) {
                                            echo "selected =selected";
                                        }
                                        ?>><?php echo $book['book_title'] ?></option>
                                                <?php
                                                $count++;
                                            }
                                            ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('book_id'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>return_date</label>
                                <input id="dateto" name="return_date"  type="text" class="form-control date"  value="<?php echo set_value('return_date', date($this->customlib->getSchoolDateFormat())); ?>" />
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info">save</button>
                        </div>
                    </form>
                </div> 
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr style="line-height: 1.42857143;font-weight:400;">
                                                  <th>book_title</th>
                                                  <th>book_no</th>
                                                  <th>issue_date</th>
                                                  <th>return_date</th>
                                                  <th>action</th>
                                                  
                                              </tr>
                                          </thead>
                                          <tbody>

                                    <?php
                                    $count = 1;
                                    foreach ($issued_books as $book) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name">
                                                <?php echo $book['book_title'] ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php echo $book['book_no'] ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($book['issue_date'])) ?></td>
                                            <td class="mailbox-name">
                                                <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($book['return_date'])) ?></td>
                                            <td class="mailbox-date pull-right">
                                                <?php if ($book['is_returned'] == 0) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>librarian/member/bookreturn/<?php echo $book['id'] . "/" . $memberList->lib_member_id; ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="Return" onclick="return confirm('Are you sure you want to return this book?')">
                                                        <i class="fa fa-mail-reply"></i>
                                                    </a>
                                                    <?php
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                        <?php
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


<script type="text/javascript">
    $(document).on('click', ' .schedule_modal', function () {
//        alert('ok');
        $('.modal-title').html("");
        $('.modal-title').html("login_details");
        var base_url = '<?php echo base_url() ?>';
        var teacher_id = '<?php echo $teacher["id"] ?>';
        var teacher_name = '<?php echo $teacher["name"] ?>';
        //alert(base_url);
        //alert(teacher_id);
        /alert(teacher_name);
        $.ajax({
            type: "post",
            url: base_url + "webadmin/teacher/getlogindetail",
            data: {'teacher_id': teacher_id},
            dataType: "json",
            success: function (response) {
                var data = "";
                data += '<div class="table-responsive">';
                data += '<p class="lead text text-center">' + teacher_name + '</p>';
                data += '<table class="table table-hover">';
                data += '<thead>';
                data += '<tr>';
                data += '<th>' + "<?php echo $this->lang->line('user_type'); ?>" + '</th>';
                data += '<th class="text text-center">' + "<?php echo $this->lang->line('username'); ?>" + '</th>';
                data += '<th class="text text-center">' + "<?php echo $this->lang->line('password'); ?>" + '</th>';
                data += '</tr>';
                data += '</thead>';
                data += '<tbody>';
                $.each(response, function (i, obj)
                {
                    console.log(obj);
                    data += '<tr>';
                    data += '<td><b>' + firstToUpperCase(obj.role) + '</b></td>';
                    data += '<td class="text text-center">' + obj.username + '</td> ';
                    data += '<td class="text text-center">' + obj.password + '</td> ';
                    data += '</tr>';
                });
                data += '</tbody>';
                data += '</table>';
                data += '<b class="lead text text-danger" style="font-size:14px;"> ' + "<?php echo $this->lang->line('login_url'); ?>" + ': ' + base_url + 'site/userlogin</b>';
                data += '</div>  ';
                $('.modal-body').html(data);
                $("#scheduleModal").modal('show');
            }
        });
    });

    function firstToUpperCase(str) {
        return str.substr(0, 1).toUpperCase() + str.substr(1);
    }
</script>
<div id="scheduleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" ></h4> </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>