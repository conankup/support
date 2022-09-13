<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="blank.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="far fa-hand-peace"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ระบบงานส่วนส่งเสริมและบริการ</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php if($_SESSION["ses_privilage"] == 5){  //หัวหน้าส่วน?> 
    <li class="nav-item">
        <a class="nav-link" href="dashboardManager.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
<?php }elseif($_SESSION["ses_privilage"] == 4 or $_SESSION["ses_privilage"] == 1){ //ส่วนส่งเสริม?>
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
<?php }elseif($_SESSION["ses_privilage"] == 2){ //ผู้ใช้ทั่วไป?>
    <li class="nav-item">
        <a class="nav-link" href="dashboardUsers.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
<?php } ?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    เบิกของที่ระลึก
</div>

<!-- Nav Item - ของที่มีให้เบิก -->
<?php if($_SESSION["ses_privilage"] == 1){?>
<li class="nav-item">
    <a class="nav-link" href="souvenir.php">
        <i class="fas fa-fw fa-list fa-2x"></i>
        <span>จัดการข้อมูลของที่เบิกได้</span></a>
</li>
<?php } ?>
<li class="nav-item">
    <a class="nav-link" href="take-Souvenir.php">
        <i class="fas fa-fw fa-list fa-2x"></i>
        <span>เบิกของที่ระลึก</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="record-takeSouvenir.php">
        <i class="far fa-list-alt fa-2x"></i>
        <span>ประวัติรายการเบิก</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    ขอรับบริการ
</div>

<!-- Nav Item - Service -->
<li class="nav-item">
    <a class="nav-link" href="service.php">
        <i class="fas fa-fw fa-heart fa-2x"></i>
        <span>ขอรับบริการ</span></a>
</li>

<!-- Nav Item - Record Service -->
<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-list"></i>
        <span>ประวัติขอใช้บริการ</span></a>
</li>

<?php if($_SESSION["ses_privilage"] == 1){?>
<!-- Heading -->
<div class="sidebar-heading">
    ManageUsers
</div>

<!-- Nav Item - Leader -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leader"
        aria-expanded="true" aria-controls="leader">
        <i class="fas fa-user-shield"></i>
        <span>ข้อมูลหัวหน้าส่วน</span>
    </a>
    <div id="leader" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">subMenu1</h6> -->
            <a class="collapse-item" href="leader.php">จัดการข้อมูลหัวหน้าส่วน</a>
            <a class="collapse-item" href="signature.php">จัดการข้อมูลรายเซ็นดิจิตอล</a>
        </div>
    </div>
</li>
<?php } ?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->