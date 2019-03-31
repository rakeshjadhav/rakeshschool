
<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() . $memberList->image ?>" alt="User profile picture">
        <h3 class="profile-username text-center"><?php echo $memberList->firstname . " " . $memberList->lastname ?></h3>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>member_id</b> <a class="pull-right text-aqua"><?php echo $memberList->lib_member_id ?></a>
            </li>
            <li class="list-group-item">
                <b>library_card_no</b> <a class="pull-right text-aqua"><?php echo $memberList->library_card_no ?></a>
            </li>
            <li class="list-group-item">
                <b>Admission_no</b> <a class="pull-right text-aqua"><?php echo $memberList->admission_no ?></a>
            </li>

            <li class="list-group-item">
                <b>Gender</b> <a class="pull-right text-aqua"><?php echo $memberList->gender ?></a>
            </li>

            <li class="list-group-item">
                <b>Member_type</b> <a class="pull-right text-aqua"><?php echo $this->lang->line($memberList->member_type); ?></a>
            </li>
            <li class="list-group-item">
                <b>Mobile_no</b> <a class="pull-right text-aqua"><?php echo $memberList->mobileno ?></a>
            </li>

        </ul>
    </div>
</div>
