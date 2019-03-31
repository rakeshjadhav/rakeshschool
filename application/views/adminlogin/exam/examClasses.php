<style>
    .a.dt-button{
        background-color: #666ee8 !important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                               <i class="fa fa-home fa-fw"></i> ||  Exam
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                             <li class="active"> Exam</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                       
                  <div class="row">
                    <?php if ($this->rbac->hasPrivilege('marks_grade', 'can_add')) { ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="">
                            <div class="panel " >
                                <div class="panel-heading" style="text-transform: uppercase;border-bottom: 1px solid #eee;"> 
                                    <i class="fa fa-retweet"></i> ||  <?php echo $exam['name'] . ' ' .('exam_status'); ?>
                               </div>
                                  <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                     <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                     <?php //echo $this->customlib->getCSRF(); ?>
                                    <div class="table-responsive mailbox-messages">
                            <?php
                            if (!empty($classsectionList)) {
                                ?>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>class Division</th>
                                            <th class="text text-center">exam_scheduled</th>
                                            <th class="text text-right">marks_register_prepared</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach ($classsectionList as $clssection) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <strong><?php echo $clssection['class'] . "(" . $clssection['division'] . ")" ?></strong>
                                                </td>
                                                <td  class="text text-center">
                                                    <span class="label label-success">yes</span><br/>
                                                    <a href="#"  class="schedule_modal" data-toggle="tooltip" title="view_schedule"  data-examid="<?php echo $clssection['exam_id']; ?>" data-original-title="<?php echo $this->lang->line('view_detail'); ?>" data-sectionid="<?php echo $clssection['section_id'] ?>" data-classid="<?php echo $clssection['class_id'] ?>" data-classname="<?php echo $clssection['class'] ?>"  data-sectionname="<?php echo $clssection['division'] ?>">
                                                        <i class="fa fa-calendar-times-o"></i>  view_schedule
                                                    </a><br>
                                                </td>
                                                <td  class="text pull-right">
                                                    <?php
                                                    if ($clssection['result_prepare'] == "yes") {
                                                        ?>
                                                        <span class="label label-success">yes</span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span class="label label-danger">no</span>
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
                                </table><!-- /.table -->
                                <?php
                            } else {
                                ?>
                                <div class="">
                                    <div class="alert alert-info">exam_not_allotted</div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                                </div>
                            </div>
                           </div>
                       </div>
                    </div>
                </div>
                    </div>
                       <?php } ?>
                     
                    </div>
                </div> 
                   
                        </div>
                    </div>
                </div>
</div>
<script type="text/javascript">
    $(document).on('click', '.schedule_modal', function () {
        $('.modal-title').html("");
        var examname = '<?php echo $exam['name'] ?>';
        var exam_id = $(this).data('examid');
        var section_id = $(this).data('sectionid');
        var class_id = $(this).data('classid');
        var classname = $(this).data('classname');
        var sectionname = $(this).data('sectionname');
        $('.modal-title').html("exam" + examname);
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            type: "post",
            url: base_url + "webadmin/examschedule/getexamscheduledetail",
            data: {'exam_id': exam_id, 'section_id': section_id, 'class_id': class_id},
            dataType: "json",
            success: function (response) {
                var data = "";
                data += '<div class="table-responsive">';
                data += "<p class='lead titlefix pt0'>Class: " + classname + "(" + sectionname + ")</p>";
                data += '<table class="table table-hover sss">';
                data += '<thead>';
                data += '<tr>';
                data += "<th>Subject</th>";
                data += "<th>Date</th>";
                data += "<th class='text text-center'>Start Time</th>";
                data += "<th class='text text-center'>End Time</th>";
                data += "<th class='text text-center'>Room</th>";
                data += "<th class='text text-center'>Full Marks</th>";
                data += "<th class='text text-center'>Passing Marks</th>";
                data += '</tr>';
                data += '</thead>';
                data += '<tbody>';
                $.each(response, function (i, obj)
                {
                    data += '<tr>';
                    data += '<td class="">' + obj.name + ' (' + obj.type.substring(2, 0) + '.)</td>';
                    data += '<td class="">' + obj.date_of_exam + '</td> ';
                    data += '<td style="width:200px;" class="text text-center">' + obj.start_to + '</td> ';
                    data += '<td style="width:200px;" class="text text-center">' + obj.end_from + '</td> ';
                    data += '<td class="text text-center">' + obj.room_no + '</td> ';
                    data += '<td class="text text-center">' + obj.full_marks + '</td>';
                    data += '<td class="text text-center">' + obj.passing_marks + '</td>';
                    data += '</tr>';
                });
                data += '</tbody>';
                data += '</table>';
                data += '</div>  ';
                $('.modal-body').html(data);
                //===========

                var dtable = $('.sss').DataTable();
                $('div.dataTables_filter input').attr('placeholder', 'Search...');
                new $.fn.dataTable.Buttons(dtable, {

                    buttons: [

                        {
                            extend: 'copyHtml5',
                            text: '<i class="fa fa-files-o"></i>',
                            titleAttr: 'Copy',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },

                        {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel-o"></i>',
                            titleAttr: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },

                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-text-o"></i>',
                            titleAttr: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },

                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf-o"></i>',
                            titleAttr: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },

                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i>',
                            titleAttr: 'Print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },

                        {
                            //extend: 'colvis',
                           // text: '<i class="fa fa-columns"></i>',
                          //  titleAttr: 'Columns',
                          //  postfixButtons: ['colvisRestore']
                        },
                    ]
                });

                dtable.buttons(0, null).container().prependTo(
                        dtable.table().container()
                        );

//===========
                $("#scheduleModal").modal('show');
            }
        });
    });

</script>

<div id="scheduleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>
                
                
                