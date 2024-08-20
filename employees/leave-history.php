<?php

session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['emplogin']) == 0) {
    header('location:../index.php');
} else {


    ?>

    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ສະຖາບັນການທະນາຄານ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../assets/css/metisMenu.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../assets/css/slicknav.min.css">
        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
            media="all" />
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
        <!-- others css -->
        <link rel="stylesheet" href="../assets/css/typography.css">
        <link rel="stylesheet" href="../assets/css/default-css.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <link rel="stylesheet" href="../assets/css/fonts.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
        <!-- modernizr css -->
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <style>
        /* *{
            font-family: 'Noto Sans Lao', sans-serif;
         }
          a{
            font-family: 'Noto Sans Lao', sans-serif;
         }
         h4{
            font-family: 'Noto Sans Lao', sans-serif;
         }   */
    </style>

    <body>
        <form method="POST" id="">
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
                                        <a href="leave.php" aria-expanded="true"><i
                                                class="ti-user"></i><span>ປ້ອນຂໍ້ມູນຄູອາຈານ
                                            </span></a>
                                    </li>

                                    <li class="active">
                                        <a href="leave-history.php" aria-expanded="true"><i
                                                class="ti-agenda"></i><span>ຕາຕະລາງຂໍ້ມູນ
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
                                    <h4 class="page-title pull-left">ຕາຕະລາງຂໍ້ມູນຂອງທ່ານ</h4>
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
                            <!-- data table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="">ຕາຕະລາງຂໍ້ມູນ</h4>
                                        <?php if ($error) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show"><strong>Info: </strong>
                                                <?php echo htmlentities($error); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                        <?php } else if ($msg) { ?>
                                                <div class="alert alert-success alert-dismissible fade show"><strong>Info: </strong>
                                                <?php echo htmlentities($msg); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                        <?php } ?>
                                        <div class="data-tables">
                                            <table id="dataTable" class="table table-hover progress-table text-center">
                                                <!-- <thead class="bg-light text-capitalize"> -->
                                                <tr>
                                                    <th>#</th>
                                                    <th width="80">ສາຂາ</th>
                                                    <th width="100">ວັນ/ເດືອນ/ປີ</th>
                                                    <th width="70">ເວລາເລີ່ມສອນ</th>
                                                    <th width="70">ຈົບເວລາສອນ</th>
                                                    <th width="150">ເບີຫ້ອງທີ່ໃຊ້ສອນ</th>
                                                    <th width="150">ຫ້ອງສອນນັກສຶກສາ</th>
                                                    <th width="120">ເນື້ອໃນການສອນ</th>
                                                    <th width="70">ສະຖານະ</th>
                                                    <th width="70">ໝາຍເຫດ</th>
                                                    <!-- <th width="120">ໝາຍເຫດ</th> -->
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $eid=$_SESSION['eid'];
                                                    $sql = "SELECT LeaveType,FromDate,Description,PostingDate,AdminRemarkDate,AdminRemark,Status,timestart,endtime,classroom,class from tblleaves where empid=:eid order by ID desc";
                                                    $query = $dbh->prepare($sql);
                                                    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;

                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) { ?>

                                                            <tr>
                                                                <td>
                                                                    <?php echo htmlentities($cnt); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($result->LeaveType); ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo htmlentities($result->FromDate); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($result->timestart); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($result->endtime); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($result->classroom); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($result->class); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($result->Description); ?>
                                                                </td>
                                                                <td>
                                                                    <?php $stats = $result->Status;
                                                                    if ($stats == 1) {
                                                                        ?>
                                                                        <span style="color: green">ຍືນຍັນ</span>
                                                                    <?php }
                                                                    if ($stats == 2) { ?>

                                                                        <span style="color: red">ບໍ່ຮັບການຍືນຍັນ</span>
                                                                    <?php }
                                                                    if ($stats == 0) { ?>

                                                                        <span style="color: blue">ກຳລັງຍືນຍັງ</span>
                                                                    <?php } ?>

                                                                </td>
                                                                <td>
                                                                    <?php if ($result->AdminRemark == "") {
                                                                    // echo htmlentities('Pending');
                                                                } else {

                                                                    // echo htmlentities(($result->AdminRemark)." "."at"." ".$result->AdminRemarkDate);
                                                                    echo htmlentities(($result->AdminRemark));
                                                                }

                                                                ?>
                                                                </td>



                                                            </tr>

                                                            <?php $cnt++;
                                                        }
                                                    } ?>

                                                </tbody>
                                            </table>
                                            <!-- <td><a href="../get_data.php?EmpId=<?php echo htmlentities($result->EmpId);?>" target="_blank"><i class="btn btn-sm btn-primary"></i class="fa fa-file-pdf-o> Print  Details</a></td> -->
                                            <!-- <a target="_blank" href="../pdf_maker.php?eid=<?php echo htmlentities($result->$eid);?>" class="btn btn-sm btn-primary"> <i class="fa fa-file-pdf-o"></i> Print  Details</a>
                                            <a href="../export.php?eid=<?php echo $data_row['eid']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> View PDF</a> &nbsp;&nbsp;  -->
                                            <a class="btn btn-outline-primary btn-sm" href="../export.php?eid=<?php echo $data_row['eid']; ?>&ACTION=VIEW">
                                    <i class="bi bi-printer-fill"></i> ພິມໃບຢັ້ງຢືນ
                                           </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- data table end -->
                        </div>
                    </div>
                </div>
        </form>
        <!-- main content area end -->
        <!-- footer area start-->
        <!-- <?php include '../includes/footer.php' ?> -->
        <!-- footer area end-->
        </div>
        <!-- page container area end -->
        <!-- offset area start -->
        <div class="offset-area">
            <div class="offset-close"><i class="ti-close"></i></div>


        </div>
        <!-- offset area end -->
        <!-- jquery latest version -->
        <script src="../assets/js/vendor/jquery-2.2.4.min.js">


    // send AJAX request to server to retrieve data from database

        </script>
        <!-- bootstrap 4 js -->
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/jquery.slimscroll.min.js"></script>
        <script src="../assets/js/jquery.slicknav.min.js"></script>

        <!-- Start datatable js -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

        <!-- others plugins -->
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/scripts.js"></script>

    </body>

    </html>

<?php } ?>