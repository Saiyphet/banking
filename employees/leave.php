<?php
    session_start();
    error_reporting(0);
    include('../includes/dbconn.php');
    if(strlen($_SESSION['emplogin'])==0)
        {   
    header('location:../index.php');
    }   else    {
        if(isset($_POST['apply']))
        {

        $empid=$_SESSION['eid'];
        $leavetype=$_POST['leavetype'];
        $fromdate=$_POST['fromdate'];  
        $timestart=$_POST['timestart'] ;
        $endtime=$_POST['endtime'];
        $class=$_POST['class'];
        $classroom=$_POST['classroom'];
        $description=$_POST['description'];  
        $status=0;
        $isread=0;
        
        

        $sql="INSERT INTO tblleaves(LeaveType,FromDate,timestart,endtime,class,classroom,Description,Status,IsRead,empid) VALUES(:leavetype,:fromdate,:timestart,:endtime,:class,:classroom,:description,:status,:isread,:empid)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
        $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
        $query->bindParam(':timestart',$timestart,PDO::PARAM_STR);
        $query->bindParam(':endtime',$endtime,PDO::PARAM_STR);
        $query->bindParam(':class',$class,PDO::PARAM_STR);
        $query->bindParam(':classroom',$classroom,PDO::PARAM_STR);
        $query->bindParam(':description',$description,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':isread',$isread,PDO::PARAM_STR);
        $query->bindParam(':empid',$empid,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        if($lastInsertId)
        {
             $msg="Your leave application has been applied, Thank You.";
        }   else    {
            $error="Sorry, couldnot process this time. Please try again later.";
        }
    }
    ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title >  ສະຖາບັນການທະນາຄານ</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/BI.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="leave.php"><img src="../assets/images/BI.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">

                        <li class="#">
                                <a href="leave.php" aria-expanded="true"><i class="ti-user"></i><span>ປ້ອນຂໍ້ມູນຄູອາຈານ
                                    </span></a>
                            </li>

                            <li class="active">
                                <a href="leave-history.php" aria-expanded="true"><i class="ti-agenda"></i><span>ຕາຕະລາງຂໍ້ມູນ
                                    </span></a>
                            </li>
                            

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">ເວັບຕິດຕາມຂຶ້ນຫ້ອງສອນ</h4>
                            <ul class="breadcrumbs pull-left">
                                
                                <li><span>ຟອມສຳລັບປ້ອນຂໍ້ມູນ</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                            
                            <?php include '../includes/employee-profile-section.php';
                            
                            ?>

                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                            <?php if($error){?><div class="alert alert-danger alert-dismissible fade show"><strong>Info: </strong><?php echo htmlentities($error); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            
                             </div><?php } 
                                 else if($msg){?><div class="alert alert-success alert-dismissible fade show"><strong>Info: </strong><?php echo htmlentities($msg); ?> 
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                 </div><?php }?>
                                <div class="card">
                                <form name="addemp" method="POST">

                                <div class="card-body">
                                        <h4 class="header-title">ກາລຸນາປ້ອນຂໍ້ມູນ</h4>
                                        <!-- <p class="text-muted font-14 mb-4">Please fill up the form below.</p> -->
                                                                  
                                        <div class="form-group">
                                            <label class="col-form-label">ສາຂາ</label>
                                            <select class="custom-select" name="leavetype" autocomplete="off"  id="">
                                                <option value="">ກາລູນາເລືອກສາຂາ</option>
                                                

                                                <?php $sql = "SELECT LeaveType from tblleavetype";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0) {
                                                        foreach($results as $result)
                                                {   ?> 
                                                <option value="<?php echo htmlentities($result->LeaveType);?>"><?php echo htmlentities($result->LeaveType);?></option>
                                                <?php }
                                            }
                                           
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">Starting Date</label>
                                            <input class="form-control" type="date" value="2020-03-05" data-inputmask="'alias': 'date'" required id="example-date-input" name="fromdate">
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">End Date</label>
                                            <input class="form-control" type="date" value="2020-03-05" data-inputmask="'alias': 'date'" required id="example-date-input" name="todate">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="example-time-input" class="col-form-label">ເວລາເລີ່ມສອນ</label>
                                            <input class="form-control" type="time" ng-value="" id="example-time-input" name="timestart">
                                            <?php
                                            
                                           
                                           
                                            ?>
                                         
                                           
                                           

                                        </div>
                                        <div class="form-group">
                                            <label for="example-time-input" class="col-form-label">ຈົບເວລາສອນ</label>
                                            <input class="form-control" type="time" value="" id="example-time-input" name="endtime">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">ເບີຫ້ອງທີ່ໃຊ້ສອນ</label>
                                            <textarea class="form-control" name="description" type="text" name="description" length="400" id="example-text-input" rows="1"></textarea>
                                        </div> -->
                                        <div class="form-group">
                                            <label  class="col-form-label">ເບີຫ້ອງທີ່ໃຊ້ສອນ</label> 
                                            <select class="custom-select " name="classroom" >
                                               
                                                <option value=""></option>
                                                <?php $sql = "SELECT classroom from classroom";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0) {
                                                        foreach($results as $result)
                                                {   ?> 
                                                <option value="<?php echo htmlentities($result->classroom);?>"><?php echo htmlentities($result->classroom);?></option>
                                                <?php }
                                            } 
                                            // if(isset($_POST['classroom'])){
                                            //     foreach($_POST['classroom'] as $selected){
                                            //         echo $selected;
                                            //     }
                                            // }
                                            ?>
                                                </select>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-form-label">ສາຂາ</label>
                                            <select class="custom-select" name="leavetype" autocomplete="off"  id="">
                                                <option value="">ກາລູນາເລືອກສາຂາ</option>
                                                

                                                <?php $sql = "SELECT LeaveType from tblleavetype";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0) {
                                                        foreach($results as $result)
                                                {   ?> 
                                                <option value="<?php echo htmlentities($result->LeaveType);?>"><?php echo htmlentities($result->LeaveType);?></option>
                                                <?php }
                                            }
                                           
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                             <label for="example-text-input" class="col-form-label">ຫ້ອງສອນນັກສຶກສາ</label> 
                                            <select class="custom-select js-example-basic-multiple " name="class" multiple="multiple"  >
                                                
                                            <option value=""></option>
                                            <?php $sql = "SELECT class from class";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0) {
                                                        foreach($results as $result)
                                                {   ?> 
                                                <option value="<?php echo htmlentities($result->class);?>"><?php echo htmlentities($result->class);?></option>
                                                <?php }
                                            } 
                                            // if(isset($_POST['classroom'])){
                                            //     foreach($_POST['classroom'] as $selected){
                                            //         echo $selected;
                                            //     }
                                            // }
                                            ?>
                                                </select>
                                                
                 
                                        </div> 
                                        
                                        <div class="form-group">
                                            
                                            <label for="example-text-input" class="col-form-label">ເນື້ອໃນການສອນ</label>
                                            <textarea class="form-control" name="description" type="text" name="description" length="400" id="example-text-input" rows="5" ></textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">ອຈສອນ</label>
                                            <textarea class="form-control" name="description" type="text" name="description" length="400" id="example-text-input" rows="1"></textarea>
                                        </div> -->

                                        <button class="btn btn-primary" name="apply" id="apply" type="submit">SUBMIT</button>
                                        
                                    </div>
                                </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include '../includes/footer.php' ?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        
        
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
  <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  </script>
</body>

</html>

<?php } ?> 