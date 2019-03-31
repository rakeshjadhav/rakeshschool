<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || cast Category List
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Create cast Category</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="">
                            <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-tags"></i> ||  Create Category
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php echo $this->customlib->getCSRF(); ?>
                                    <form action="<?php echo site_url('webadmin/category/create') ?>" method="post">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                              <div class="input-group">
                                                 <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                <input type="text" class="form-control" autofocus="" id="category" name="category"  value="<?php echo set_value('category'); ?>" placeholder="Enter Division Name" > </div>
                                                 <span class="text-danger"><?php echo form_error('category'); ?></span>
                                        </div>
                                        <input type="submit" name="" id=""class="btn btn-sm btn-success waves-effect waves-light m-r-10" value="Add Category" style="font-style: normal; " data-toggle="modal" data-target=".bs-example-modal-sm" >
                                        <input type="submit" name="" id="" class="btn btn-sm btn-inverse waves-effect waves-light m-r-10" style="font-style: normal;text-transform: uppercase;text-transform: capitalize;" value="Cancle">
                                   
                                      </form>
                                                                       
                                </div>
                            </div>
                                </div></div></div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="">

                     <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> <i class="fa fa-tags fa-fw"></i> || Category List
                            </div>
                           <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="table-responsive">
                              	<div class="download_label"><?php  $title ?></div>
                                 <table id="example23" class="display nowrap" >
                                    <thead>
                                        <tr>
                                            <th>Category  Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                         $count = 1;
                                         foreach ($categorylist as $category) {
                                        ?>
                                        <tr>
                                            <td><?php echo $category['category'] ?></td>
                                            <td>
                                                <div class="row ">
                                                    <div class="col-lg-3 ">
                                                        <a href="<?php echo base_url(); ?>webadmin/category/edit/<?php echo $category['id'] ?>" class="btn btn-xs btn-primary" title="Edit" data-toggle="tooltip" ><i class="fa fa-edit"></i></a>
                                                     <a href="<?php echo base_url(); ?>webadmin/category/delete/<?php echo $category['id'] ?>" class="btn btn-xs btn-danger" title="delete" data-toggle="tooltip"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                    </div>
				</div>	
                                            </td>
                                            
                                        </tr>
                                        	<?php
                                    }
                                    $count++;
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

                
    
   
