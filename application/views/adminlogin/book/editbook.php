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
                               <i class="fa fa-file-pdf-o fa-fw"></i> || Update Library Book 
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Update Library Book </li>
                        </ol>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-md-12" >
                        <div class="panel" style="border-top:3px solid #ff6347;border-radius: 8px;">
                            <div class="panel-heading"> <i class="fa fa-file-pdf-o fa-fw"></i>Update Library Book </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                     <form id="form1" action="<?php echo site_url('webadmin/book/edit/' . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                                        <?php if ($this->session->flashdata('msg')) { ?>
                                        <?php echo $this->session->flashdata('msg') ?>
                                        <?php } ?>
                                        <?php
                                            if (isset($error_message)) {
                                            echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                       }else{echo"";};?>      
                            <?php echo $this->customlib->getCSRF(); ?> 
                                         <input  type="hidden" name="id" value="<?php echo set_value('id', $editbook['id']); ?>" >
                                         <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Book Name</label>
                                                        <input type="text" autofocus="" id="book_title" name="book_title" class="form-control" placeholder="" value="<?php echo set_value('book_title', $editbook['book_title']); ?>"> 
                                                    </div>
                                                     <span class="text-danger"><?php echo form_error('book_title'); ?></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Book No</label>
                                                        <input type="text" id="book_no" name="book_no" class="form-control" placeholder="" value="<?php echo set_value('book_no', $editbook['book_no']); ?>"> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('book_no'); ?></span>
                                                </div>
                                              </div>
                                         
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">ISBN Number</label>
                                                        <input type="text" id="isbn_no" name="isbn_no" class="form-control" placeholder="" value="<?php echo set_value('isbn_no', $editbook['isbn_no']); ?>"> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('isbn_no'); ?></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Publisher</label>
                                                        <input type="text" id="publish" name="publish" class="form-control" placeholder="" value="<?php echo set_value('publish', $editbook['publish']); ?>"> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('publish'); ?></span>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Author</label>
                                                        <input type="text" id="author" name="author" class="form-control" placeholder="" value="<?php echo set_value('author', $editbook['author']); ?>"> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('author'); ?></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Subject</label>
                                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="" value="<?php echo set_value('subject', $editbook['subject']); ?>"> 
                                                    </div>
                                                      <span class="text-danger"><?php echo form_error('subject'); ?></span>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Rack Number</label>
                                                        <input type="text" id="rack_no" name="rack_no" class="form-control" placeholder="" value="<?php echo set_value('rack_no', $editbook['rack_no']); ?>"> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('rack_no'); ?></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Qty</label>
                                                        <input type="text" id="qty" name="qty" class="form-control" placeholder="" value="<?php echo set_value('qty', $editbook['qty']); ?>"> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('qty'); ?></span>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Book Price</label>
                                                        <input type="text" id="perunitcost" name="perunitcost" class="form-control" placeholder="" value="<?php echo set_value('perunitcost', $editbook['perunitcost']); ?>"> 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('perunitcost'); ?></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Post Date</label>
                                                        <input type="date" id="postdate" name="postdate" class="form-control" placeholder="" value="<?php echo set_value('postdate', date( ($editbook['postdate']))); ?>" > 
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('postdate'); ?></span>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <textarea type="text" id="description" name="description" rows="4" class="form-control" placeholder="" ><?php echo set_value('description', $editbook['description']); ?></textarea>
                                                    </div>
                                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                               </div>
                                           </div>
                                           
                                        </div>
                                        <div class="form-actions pull-right">
                                            <button type="submit" class="btn btn-success">  Save</button>
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    
                                </div>
                                     </form>
                            </div>
                        </div>
                    </div>
                </div>