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
                    <div class="col-sm-12">
                              <div class="panel">
                                  <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Teacher List
                                  </div>
                                 <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="table-responsive">
                                      <div class="download_label"><?php  $title ?></div>
                                      <table id="example23" class="display nowrap" style="line-height: 1.42857143;font-weight:400;padding:0" >
                                          <thead>
                                              <tr style="line-height: 1.42857143;font-weight:400;">
                                                  <th>Book title</th>
                                                  <th>Book No</th>
                                                  <th>Isbn No</th>
                                                  <th>Subject</th>
                                                  <th>Rack_no</th>
                                                  <th>Publish</th>
                                                  <th>Author</th>
                                                  <th>Qty</th>
                                                  <th>Per Unit Cost</th>
                                                   <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $count = 1;
                                              foreach ($listbook as $listbook) {
                                              ?>
                                              <tr>
                                                  <td><?php echo $listbook['book_title']; ?></td>
                                                  <td><?php echo $listbook['book_no']; ?></td>
                                                  <td><?php echo $listbook['isbn_no']; ?></td>
                                                  <td><?php echo $listbook['subject']; ?></td>
                                                  <td><?php echo $listbook['rack_no']; ?></td>
                                                  <td><?php echo $listbook['publish']; ?></td>
                                                  <td><?php echo $listbook['author']; ?></td>
                                                  <td><?php echo $listbook['qty']; ?></td>
                                                  <td><?php echo $listbook['perunitcost']; ?></td>
                                                   
                                                  <td>
                                                      <div class="row">
                                                          <div class="col-lg-3">
                                                            <a href="<?php echo base_url(); ?>admin/librarian/view/<?php echo $listbook['id']; ?>" class="btn btn-sm btn-primary" title="View" data-toggle="tooltip" ><i class="fa fa-eye"></i></a>
                                                            <a href="<?php echo base_url(); ?>admin/teacher/edit/<?php echo $listbook['id']; ?>" class="btn btn-sm btn-info" title="edit" data-toggle="tooltip" ><i class="fa fa-pencil-square"></i></a>
                                                            <a href="<?php echo base_url(); ?>admin/teacher/delete/<?php echo $listbook['id']; ?>" class="btn btn-sm btn-danger" title="delete" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                                                          </div>
                                                       </div>
                                                  <!--</div>-->	
                                                  </td>

                                              </tr>
                                                      <?php
                                          }
                                         // $count++;
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


                
    
   
