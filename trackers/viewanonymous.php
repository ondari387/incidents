<?php
//session_start();
include('../admin/include/config.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Incident</title>

    <link type="text/css" href="../admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="../css/bootstra.min.css" rel="stylesheet">

    <link type="text/css" href="../admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../admin/css/theme.css" rel="stylesheet">
    <link type="text/css" href="../admin/images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>

</head>

<body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i>
                </a>

                <a class="brand" href="../index.php">
                    IRS
                </a>

                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">
                        <li><a class="nav-item nav-link" href="trackanonymousincidents.php" style="font-size:14px;">Track Incident</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->



    <div class="wraper">
        <div class="container">
            <div class="row">
                <h1 class="" style=" font-size:20px; text-align:center;margin-top:20px;">Track Anonymous Incidents</h1>
                <div class="spn8">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Anonymous Incidents Details</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <tbody>

                                        <?php
                                        $st = 'in process';
                                        $query = mysqli_query($bd, "select * from anonymous where anonymous.incident_no='" . $_GET['cid'] . "'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>

                                            <tr>
                                                <td><b>Incident Number</b></td>
                                                <td><?php echo htmlentities($row['incident_no']); ?></td>
                                                <td><b>Reporters Name</b></td>
                                                <td>Anonymous</td>
                                                <td><b>Reg Date</b></td>
                                                <td><?php echo htmlentities($row['created_at']); ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>College</b></td>
                                                <td><?php echo htmlentities($row['college']); ?></td>
                                                <td><b>School</b></td>
                                                <td><?php echo htmlentities($row['school']); ?></td>
                                                <td><b>Department</b></td>
                                                <td><?php echo htmlentities($row['department']); ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>File(if any) </b></td>
                                                <td colspan="5"> <?php $cfile = $row['incident_file'];
                                                                    if ($cfile == "" || $cfile == "NULL") {
                                                                        echo "File NA";
                                                                    } else { ?>
                                                        <a href="../users/complaintdocs/<?php echo htmlentities($row['incident_file']); ?>" ?> View File</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Presenting issues </b></td>
                                                <td colspan="5"><?php echo htmlentities($row['incident']); ?></td>
                                            </tr>

                                            <?php $ret = mysqli_query($bd, "select incidentremark.remark as remark,incidentremark.status as istatus,incidentremark.created_at as rdate from incidentremark join anonymous on anonymous.incident_no=incidentremark.incident_no where incidentremark.incident_no='" . $_GET['cid'] . "'");
                                            while ($rw = mysqli_fetch_array($ret)) {
                                            ?>
                                                <tr>
                                                    <td><b>Remark</b></td>
                                                    <td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>Remark Date <?php echo  htmlentities($rw['rdate']); ?></b></td>
                                                </tr>

                                                <tr>
                                                    <td><b>Status</b></td>
                                                    <td colspan="5"><?php echo  htmlentities($rw['istatus']); ?></td>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td><b>Final Status</b></td>

                                                <td colspan="5"><?php if ($row['status'] == "") {
                                                                    echo "Not Process Yet";
                                                                } else {
                                                                    echo htmlentities($row['status']);
                                                                } ?></td>

                                            </tr>

                                            <tr>
                                                <td><b>Action</b></td>

                                                <td colspan="5">
                                                    <?php if ($row['status'] == "closed") {
                                                    } else { ?>
                                                        <a href="javascript:void(0);" onClick="popUpWindow('http://localhost/incidents/admin/updateincident.php?cid=<?php echo htmlentities($row['incident_no']); ?>');" title="Update order">
                                                            <button type="button" class="btn btn-primary">Take Action</button>
                                                </td>
                                                </a><?php } ?></td>
                                            <!-- <td colspan="4">
                                                    <a href="javascript:void(0);" onClick="popUpWindow('http://localhost/Complaint Management System/admin/userprofile.php?uid=<?php echo htmlentities($row['userId']); ?>');" title="Update order">
                                                        <button type="button" class="btn btn-primary">View User Detials</button></a>
                                                </td> -->

                                            </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; IRS </b> All rights reserved.
            <a href="../index.php" class="float-right">Back to home</a>
        </div>
    </div>

    <script src="../admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="../admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../admin/scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="../admin/scripts/datatables/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatable-1').dataTable();
            $('.dataTables_paginate').addClass("btn-group datatable-pagination");
            $('.dataTables_paginate > a').wrapInner('<span />');
            $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
            $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
        });
    </script>
</body>