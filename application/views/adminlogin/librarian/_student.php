
<div class="white-box box-primary">
    <div class="box-body box-profile ">
        <div class="text-center">
            <img class="profile-user-img  img-circle" style="border:4PX solid #ff6347" width="150" height="150" src="<?php echo base_url() . $memberList->image ?>" alt="User profile picture">
            <h3 class="profile-username text-center" style="color:#ff6347"><?php echo $memberList->firstname . " " . $memberList->lastname ?></h3>
        </div>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Member Id</b> <a class="pull-right text-aqua"><?php echo $memberList->lib_member_id ?></a>
            </li>
            <li class="list-group-item">
                <b>Library Card No</b> <a class="pull-right text-aqua"><?php echo $memberList->library_card_no ?></a>
            </li>
            <li class="list-group-item">
                <b>Admission No</b> <a class="pull-right text-aqua"><?php echo $memberList->admission_no ?></a>
            </li>

            <li class="list-group-item">
                <b>Gender</b> <a class="pull-right text-aqua"><?php echo $memberList->gender ?></a>
            </li>

            <li class="list-group-item">
                <b>Member Type</b> <a class="pull-right text-aqua"><?php echo $this->lang->line($memberList->member_type); ?></a>
            </li>
            <li class="list-group-item">
                <b>Mobile No</b> <a class="pull-right text-aqua"><?php echo $memberList->mobileno ?></a>
            </li>

        </ul>
    </div>
</div>
