<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> || Search Student
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active">Search Student</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="">
                        <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <div class="">
                                  <div class="panel " >
                                      <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                          <i class="fa fa-file-excel-o"></i> || Search Student
                                     </div>
                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                      <div class="panel-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <?php if ($this->session->flashdata('msg')) { ?>
                                          <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>        
                                            <?php echo $this->customlib->getCSRF(); ?>
                                       <div class="col-sm-12 col-xs-12">
                                         <form role="form" action="<?php echo site_url('librarian/student/search') ?>" method="post" class=""> 
                                    <?php echo $this->customlib->getCSRF(); ?>
                                              <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label>Class</label>
                                                      <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-university"></i></div>
                                                        <select  id="class_id" name="class_id" class="form-control" >
                                                         <option value="">Select</option>
                                                            <?php
                                                            $count = 1;
                                                            foreach ($classlist as $class) {
                                                                ?>
                                                                <option value="<?php echo $class['id'] ?>"><?php echo $class['class'] ?></option>
                                                                <?php
                                                                $count++;}
                                                            ?>
                                                       </select>
                                                 </div>
                                              <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                            </div>
                                           </div>
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Division</label>
                                                 <div class="input-group">
                                                       <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                                <select  id="section_id" name="section_id" class="form-control"  >
                                                        <option value="">Select</option>
                                                </select>
                                                 </div>
                                              <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            </div>
                                           </div>
                                              
                                           <!--</div>-->
                                        <button type="submit"  name="search" value="search_filter" class="btn btn-primary pull-right btn-sm checkbox-toggle"> <i class="fa fa-search"></i> Search</button>
                                       </form>
                                       </div>

                                      </div>
                                  </div>
                                 </div>
                                            
                                            
                                            
                                            
                               </div>
                             </div>
                              </div>
                          </div>
                          
                          </div>
                            
                             <?php
                if (isset($resultlist)) {
                    ?>
                            <div class="white-box">
                         <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span>
                                        <span class="hidden-xs"> List</span></a></li>
                                <li role="presentation" class="">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-user"></i></span>
                                        <span class="hidden-xs">Details View</span></a>
                                </li>
                                
                            </ul>
                            
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    
                                    <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                <table id="myTable" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Member Id </th>
                                            <th>Library Card No</th>
                                            <th>Admission No</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Father Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Gender</th>
                                            <th>Mobile No</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($resultlist)) {
                                            ?>
                                            <tr>
                                                <td colspan="12" class="text-danger text-center">No Record Found</td>
                                            </tr>
                                            <?php
                                        } else {
                                            $count = 1;
                                            foreach ($resultlist as $student) {
                                                $clsactive = "a";
                                                $member_id = "";
                                                $library_card_no = "";
                                                if ($student['libarary_member_id'] != 0) {
                                                    $clsactive = "success";
                                                    $member_id = $student['libarary_member_id'];
                                                    $library_card_no = $student['library_card_no'];
                                                }
                                                ?>
                                                <tr class="<?php echo $clsactive; ?>">
                                                    <td><?php echo $member_id; ?></td>
                                                    <td><?php echo $library_card_no; ?></td>
                                                    <td><?php echo $student['admission_no']; ?></td>
                                                    <td>
                                                        <?php echo $student['firstname'] . " " . $student['lastname']; ?>

                                                    </td>
                                                    <td><?php echo $student['class'] . "(" . $student['division'] . ")" ?></td>
                                                    <td><?php echo $student['father_name']; ?></td>
                                                    <td><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['dob'])); ?></td>
                                                    <td><?php echo $student['gender']; ?></td>

                                                    <td><?php echo $student['mobileno']; ?></td>

                                                    <td class="text text-right">
                                                        <?php
                                                        if ($student['libarary_member_id'] == 0) {
                                                            ?>

                                                            <button  data-stdid="<?php echo $student['id'] ?>" class="btn btn-default btn-xs add-student"  data-toggle="tooltip" title="Add" >
                                                                <i class="fa fa-plus"></i>
                                                            </button>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button type="button" class="btn btn-default btn-xs surrender-student" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait.." data-memberid="<?php echo $member_id; ?>" data-toggle="tooltip" title="Surrender Membership"><i class="fa fa-mail-reply"></i></button>

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
                                
                   <div class="box-footer">
                            <div class="mailbox-controls">
                            </div>
                        </div>
                            </div>
                            
                        <?php
                              }
                              ?>
                          <!--//end forech-->
                          </div>
                             </div> 
                        </div>
                    </div>
                </div>

<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" id="lineModalLabel">Add_member</h4>
            </div>
            <div class="modal-body">

                <input type="hidden" name="click_member_id" value="0" id="click_member_id">
                <!-- content goes here -->
                <form action="<?php echo site_url('librarian/student/add') ?>" id="add_member" method="post">
                    <input type="hidden" name="member_id" value="0" id="member_id">
                    <div class="form-group">
                        <label for="">Library Card NO</label>
                        <input type="name" class="form-control" name="library_card_no" id="library_card_no" >
                        <span class="text-danger" id="library_card_no_error"></span>
                    </div>
                    <button type="submit" class="btn btn-default btn-sm add-member" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait..">Add</button>
                </form>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#squarespaceModal").modal({
            show: false,
            backdrop: 'static'
        });

    });

    var base_url = '<?php echo base_url() ?>';
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "GET",
                url: base_url + "librarian/sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.division_id + " " + sel + ">" + obj.division + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }
    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, section_id);
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value="">Select</option>';
            $.ajax({
                type: "GET",
                url: base_url + "librarian/sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.division_id + ">" + obj.division + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });
    });

    $(".surrender-student").click(function () {
        if (confirm('Are you sure you want to surrender membership?')) {
            var memberid = $(this).data('memberid');
            var $this = $('.surrender-student');
           // $this.button('loading');
           
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('librarian/member/surrender') ?>',
                data: {'member_id': memberid},
                dataType: 'JSON',
                success: function (response)
                {

                    if (response.status == "success") {
                        successMsg(response.message);
                        $this.button('reset');
                        window.setTimeout('location.reload()', 3000);
                    }
                }
            });
        }

    });


    $(".add-student").click(function () {
        var student = $(this).data('stdid');
        $('#click_member_id').val(student);
        $('#member_id').val(student);
        $('#squarespaceModal').modal('show');
    });

    $("#add_member").submit(function (e) {
        var student = $('#click_member_id').val();
        var $this = $('.add-member');
        $this.button('loading');
        //alert(student);
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $("#add_member").serialize(),    // serializes the form's elements. 
            dataType: 'JSON',
            success: function (response){
                    alert(response);
                if (response.status == "success") {
                    
                    $('#squarespaceModal').modal('hide');
                    $('#add_member')[0].reset();
                    
                    successMsg(response.message);
                    
                    $this.button('reset');
                    $('*[data-stdid="' + student + '"]').closest('tr').find('td:first').text(response.inserted_id);
                    $('*[data-stdid="' + student + '"]').closest('tr').find('td:nth-child(2)').text(response.library_card_no);
                    $('*[data-stdid="' + student + '"]').closest("tr").addClass("success");
                    $('*[data-stdid="' + student + '"]').closest("td").empty();
                } else if (response.status == "fail") {
                    $.each(response.error, function (index, value) {
                        var errorDiv = '#' + index + '_error';
                        $(errorDiv).empty().append(value);
                    });
                    $this.button('reset');
                }
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>
