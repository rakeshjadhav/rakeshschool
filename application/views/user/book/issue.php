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
                               <i class="fa fa-user fa-fw"></i> || library_book
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">library_book</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                      <i class="fa fa-tags fa-fw"></i> || Book List
                                  </div>
                                 <div class="panel-body">
                        <?php if ($isCheck == 0) {
                            ?>
                            <div class="alert alert-warning text-center">no_record_found</div>
                            <?php
                        } else {
                            if (isset($bookList)) {
                                ?>
                                <div class="table-responsive mailbox-messages">
								<div class="download_label"><?php echo $this->lang->line('library_book'); ?></div>
                                    <table class="table table-striped table-bordered table-hover example">
                                        <thead>
                                            <tr>
                                                <th>book_title</th>
                                                <th>book_no</th>
                                                <th>author</th>
                                                <th>issue_date</th>


                                                <th class="text text-right">return_date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($bookList)) {
                                                ?>
                                                <tr>
                                                    <td colspan="12" class="text-danger text-center">no_record_found</td>
                                                </tr>
                                                <?php
                                            } else {
                                                $count = 1;
                                                foreach ($bookList as $book) {
                                                    $cls = "";
                                                    if ($book['is_returned'] == 1) {
                                                        $cls = "success";
                                                    }
                                                    ?>
                                                    <tr class="<?php echo $cls; ?>">

                                                        <td class="mailbox-name"> <?php echo $book['book_title'] ?></td>
                                                        <td class="mailbox-name"> <?php echo $book['author'] ?></td>
                                                        <td class="mailbox-name"> <?php echo $book['book_no'] ?></td>
                                                        <td class="mailbox-name"> 

                                                            <?php echo $book['issue_date'] ?>
                                                        </td>
                                                        <td class="text-right">

                                                            <?php echo $book['return_date'] ?>   
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
                                <?php
                            }
                        }
                        ?>  

                    </div>
                                
                              </div>
                           </div>
                              </div>
                    </div>
                </div>
</div>


                
    
   
