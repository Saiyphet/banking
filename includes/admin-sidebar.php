<nav>
        <ul class="metismenu" id="menu">
        <li class="<?php if($page=='dashboard') {echo 'active';} ?>"><a href="dashboard.php"><i class="ti-dashboard"></i> <span>ໜ້າຫຼັກ</span></a></li>
                            
        <li class="<?php if($page=='employee') {echo 'active';} ?>"><a href="employees.php"><i class="ti-id-badge"></i> <span>ພະນັກງານ</span></a></li>
        <li class="<?php if($page=='sc') {echo 'active';} ?>"><a href="phint.php"><i class="ti-id-badge"></i> <span> ພິມ</span></a></li>
                        
        <li class="<?php if($page=='department') {echo 'active';} ?>"><a href="department.php"><i class="fa fa-th-large"></i> <span>ພະແນກ</span></a></li>

         <li class="<?php if($page=='leave') {echo 'active';} ?>"><a href="leave-section.php"><i class="fa fa-sign-out"></i> <span>ສາຂາ</span></a></li>

        <li class="<?php if($page=='manage-leave') {echo 'active';} ?>">
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>ຈັດການຄຳຮ້ອງຂໍຂຶ້ນສອນ</span></a>

            <ul class="collapse">
                <li ><a href="pending-history.php"><i class="fa fa-spinner"></i> ກຳລັງຢືນຢັນ</a></li>
                <li ><a href="approved-history.php"><i class="fa fa-check"></i> ຢືນຢັນ</a></li>
                <li ><a href="declined-history.php"><i class="fa fa-times-circle"></i> ປະຕິເສດການຢືນຢັນ  </a></li>
                <li ><a href="leave-history.php"><i class="fa fa-history"></i> ປະຫວັດລາຍງານ</a></li>
            </ul>
            
        </li>
        <li class="<?php if($page=='leave') {echo 'active';} ?>"><a href="class.php"><i class="fa fa-child" aria-hidden="true"></i><span>ຫ້ອງສອນ</span></a></li>
        <li class="<?php if($page=='leave') {echo 'active';} ?>"><a href="classroom.php"><i class="fa fa-child" ></i><span>ຫ້ອງຮຽນ</span></a></li>

        <li class="<?php if($page=='manage-admin') {echo 'active';} ?>"><a href="manage-admin.php"><i class="fa fa-lock"></i> <span>Manage Admin</span></a></li>
                            
    </ul>
</nav>