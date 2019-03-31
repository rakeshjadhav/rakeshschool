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
                               <i class="fa fa-user fa-fw"></i> || Book List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Book List</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                             <div class="panel" style="border-top:3px solid #ff6347;border-radius: 8px;">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-tags fa-fw"></i> || Book List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                     <tr>
                                        <th>Book Title</th>
                                        <th>Book No</th>
                                        <th>Isbn No</th>
                                        <th>Publisher </th>
                                        <th>Author</th>
                                        <th>Subject</th>
                                        <th>Rack No</th>
                                        <th>Qty</th>
                                        <th>Book Price</th>
                                        <th>Post Date</th>
                                        <th class="no-print text text-right">action</th>
                                    </tr>
                                          </thead>
                                          <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($listbook as $book) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name">
                                                <a href="#" data-toggle="popover" class="detail_popover"><?php echo $book['book_title'] ?></a>
                                                <div class="fee_detail_popover" style="display: none">
                                                    <?php
                                                    if ($book['description'] == "") {
                                                        ?>
                                                        <p class="text text-danger" data-toggle="tooltip" title="No Description"></p>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <p class="text text-info" data-toggle="tooltip" title="<?php echo $book['description']; ?>"></p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td class="mailbox-name"> <?php echo $book['book_no'] ?></td>
                                            <td class="mailbox-name"> <?php echo $book['isbn_no'] ?></td>
                                            <td class="mailbox-name"> <?php echo $book['publish'] ?></td>
                                            <td class="mailbox-name"> <?php echo $book['author'] ?></td>
                                            <td class="mailbox-name"><?php echo $book['subject'] ?></td>
                                            <td class="mailbox-name"><?php echo $book['rack_no'] ?></td>
                                            <td class="mailbox-name"> <?php echo $book['qty'] ?></td>
                                            <td class="mailbox-name"> <?php echo ($book['perunitcost']); ?></td>
                                            <td class="mailbox-name"> <?php echo $book['postdate']; ?></td>
                                            <td class="mailbox-date no-print text text-right">
                                                <a href="<?php echo base_url(); ?>webadmin/book/edit/<?php echo $book['id'] ?>" class="btn btn-primary btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>webadmin/book/delete/<?php echo $book['id'] ?>"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-remove"></i>
                                                </a>

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


                
    
   
