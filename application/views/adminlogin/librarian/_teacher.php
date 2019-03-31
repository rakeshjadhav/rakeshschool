

<div class="white-box  box-primary">
    <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() . $memberList->image ?>" alt="User profile picture">
        <h3 class="profile-username text-center"><?php echo $memberList->name ?></h3>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>member_id</b> <a class="pull-right text-aqua"><?php echo $memberList->lib_member_id ?></a>
            </li>
            <li class="list-group-item">
                <b>library_card_no</b> <a class="pull-right text-aqua"><?php echo $memberList->library_card_no ?></a>
            </li>
            <li class="list-group-item">
                <b>email</b> <a class="pull-right text-aqua"><?php echo $memberList->email ?></a>
            </li>
            <li class="list-group-item">
                <b>member_type</b> <a class="pull-right text-aqua"><?php echo ($memberList->member_type); ?></a>
            </li>
            <li class="list-group-item">
                <b>gender</b> <a class="pull-right text-aqua"><?php echo $memberList->sex ?></a>
            </li>
            <li class="list-group-item">
                <b>phone</b> <a class="pull-right text-aqua"><?php echo $memberList->phone ?></a>
            </li>

        </ul>
    </div>
</div>
