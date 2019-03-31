<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">View Library Member</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#" class="active">Dashboard</a></li>
                            <li><a href="#">View Library Member</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                         <?php
                       if ($memberList->member_type == "student") {
                        $this->load->view('adminlogin/librarian/_student');
                      } else {
                        $this->load->view('adminlogin/librarian/_teacher');
                      }
                ?>  
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                          
                         <!--// show each teacher class wise subjects-->
                               <div class="panel">
                                 
                                   
                                   <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-bookmark"></i> Library Issue Book</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form id="form1" action="<?php echo site_url('webadmin/member/issue/' . $memberList->lib_member_id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">

                        <div class="box-body">                            
                            <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                            <?php //echo $this->customlib->getCSRF(); ?>

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
                                                //$count++;
                                            }
                                            ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('book_id'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Book Return Date</label>
                                <input id="dateto" type="date" name="return_date"  type="text" class="form-control date"  value="<?php echo set_value('return_date'); ?>" />
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer ">
                            <button type="submit" class="btn btn-info">save</button>
                        </div>
                    </form>
                </div>
                               </div>
                                   <hr/>
                                 
                         <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"></div>
                                      
                             <?php //echo $this->customlib->getCSRF(); ?>
                             <input id="member_id" name="member_id"  type="hidden" class="form-control date"  value="<?php echo $memberList->lib_member_id; ?>" />
                                      
                                      <table id="example23" class="display " style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr style="line-height: 1.42857143;font-weight:400;">
                                                  <th>Book Title</th>
                                                  <th>Book No</th>
                                                  <th>Issue Date</th>
                                                  <th>Return Date</th>
                                                  <th>Action</th>
                                                  
                                              </tr>
                                          </thead>
                                          <tbody>
                                    <?php
                                    if (empty($issued_books)) {
                                        ?>

                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($issued_books as $book) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <?php echo $book['book_title']; echo $book['id']; ?> 
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $book['book_no'] ?>
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $book['issue_date'] ?></td>
                                                <td class="mailbox-name">
                                                    <?php echo $book['return_date'] ?></td>
                                                 <td class="mailbox-date pull-right">
                                                    <?php if ($book['is_returned'] == 0) {
            ?>

                                                         <a href="#" class="btn btn-default btn-xs"  data-record-id="<?php echo $book['id'] ?>" data-record-member_id="<?php echo $memberList->lib_member_id; ?>" data-record-title="<?php echo $book['book_title'] ?>" data-toggle="modal" data-target="#confirm-return">
                                                            <i class="fa fa-mail-reply"></i>
                                                        </a>
                                                     <div class="modal fade" id="confirm-return" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">confirm_return</h4>
                </div>
                  <form action="<?php echo site_url('webadmin/member/bookreturn') ?>" method="POST" id="return_book">
                <div class="modal-body issue_retrun_modal-body">

                    <input type="hidden" name="id" id="return_model_id" value="<?php echo $book['id'] ?>">
                    <input type="hidden" name="member_id" id="return_model_member_id" value="<?php echo $memberList->lib_member_id; ?>">
                  <div class="form-group">
                        <label for="">return_date</label>
                          <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                     <input type="date" class="form-control date" id="input-date" name="date" placeholder="Date" value="">
                                </div>

                        <div id="error" class="text text-danger"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                    <button type="submit" class="btn btn-success">save</button>
                </div>
            </form>
            </div>
        </div>
    </div> 
                                                        <?php
}
        ?>
                                                </td>
                                            </tr>
                                            <?php
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
                    </div>
                </div>
         
                
          
            </div>
          
    <script type="text/javascript">
    $(document).ready(function () {
         $('#confirm-return').modal({
         backdrop: 'static',
         keyboard: false,
         show: false
     });


    });


     $(document).on('change', '#book_id', function (e) {

        var book_id = $(this).val();
        // $('#div_avail').hide();
        availableQuantity(book_id);

    });

    function availableQuantity(book_id) {


    $('.ava_quantity').html(0);
        if (book_id != "") {

            $.ajax({
                type: "POST",
                url: base_url + "webadmin/book/getAvailQuantity",
                data: {'book_id': book_id},
                dataType: "json",
                beforeSend: function () {
                  $('.qty_error').show();
                  $('.ava_quantity').empty().html('Loading...');
                },
                success: function (data) {
                    $('.ava_quantity').html(data.qty);
                },
                complete: function () {
                }

            });
        }else{
              $('.qty_error').hide();
        }
    }


        $('#confirm-return').on('show.bs.modal', function(e) {

            var data = $(e.relatedTarget).data();
            $('#return_model_member_id').val(data.recordMember_id);
            $('#return_model_id').val(data.recordId);
        });


//        $("form#return_book").submit(function(e) {
////
//         var form = $(this);
//        // alert(form);
//         var url = form.attr('action');
//         alert(url);
//        //console.log(form);
//         var $this = $(this);
//          var btn = $this.find("button[type=submit]");
//         $.ajax({
//             type: "POST",
//             url: url,
//             data: form.serialize(),
//             dataType: 'JSON',
//             beforeSend: function() {
//
//                 btn.button('loading');
//             },
//             success: function(response, textStatus, xhr) {
//
//                   if (response.status == 'fail') {
//                     $.each(response.error, function(key, value) {
//                         $('#input-' + key).parents('.form-group').find('#error').html(value);
//                     });
//                 }
//                      if (response.status == 'success') {
//                          alert(response.message);
//                       // successMsg(response.message);
//                       location.reload();
//                 }
//
//
//             },
//             error: function(xhr, status, error) {
//               btn.button('reset');
//
//             },
//             complete: function() {
//                 btn.button('reset');
//             },
//         });
//         e.preventDefault();
//     });



</script>    </div>