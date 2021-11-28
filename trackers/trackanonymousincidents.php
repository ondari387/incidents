<?php
//session_start();
//error_reporting(0);

include('../inc/config.php');

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">k
    <link rel="stylesheet" href="../admin/css/theme.css">
    <title>Track Incidents</title>
    <style>
        nav {
            box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .4);
        }

        nav .navbar-nav a:hover {
            background: #e5e5e5;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="../index.php">IRS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="trackers/trackanonymousincidents.php" style="font-size:14px;">Track Incident</a>
                </div>
            </div> -->
        </div>
    </nav>


    <div class="container text-center" style="margin-top:60px;">
        <h1 class="font-size:60px;">Track Anonymous Incidents</h1>
        <!-- <p class="col-md-8 m-auto">To track an incident you reported please enter the incident code your were provided with.</p> -->

    </div>


    <div class="container" style="margin-top:30px;">

        <h4 class="text-center">Anonymous</h4>
        <form class="col-md-4 m-auto" method="post">
            <div class=" form-group">
                <!-- <label>Enter Incident Code <span class="text-danger">*</span></label> -->
                <input type="text" name="trackincidents" placeholder="Enter Incident Code" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Track Incidents</button>

        </form>


        <div class="container mt-5">
            <div class="content">

                <div class="module">
                    <div class="module-head">
                        <h4>Track Incidents</h4>
                    </div>
                    <div class="module-body table">
                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display">
                            <thead>
                                <tr>
                                    <th>Incident No</th>
                                    <th>Reporter Name</th>
                                    <th>Reporting Date</th>
                                    <th>Status</th>

                                    <th>Action</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                //$st = 'in process';
                                if (isset($_POST['submit'])) {
                                    $trackincidents = $_POST['trackincidents'];


                                    $query = mysqli_query($bd, "select * from anonymous where incident_no='$trackincidents'");

                                    while ($row = mysqli_fetch_array($query)) {
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($row['incident_no']); ?></td>
                                            <td>Anonymous</td>
                                            <td><?php echo htmlentities($row['created_at']); ?></td>

                                            <td><button type="button" class="btn btn-success"><?php echo htmlentities($row['status']); ?></button></td>

                                            <td> <a href="viewanonymous.php?cid=<?php echo htmlentities($row['incident_no']); ?>"> View Details</a>
                                            </td>
                                        </tr>

                                        <?php
                                        if (mysqli_num_rows($query) == 0) {
                                            echo '<b>No records found</p>';
                                        } ?>

                                <?php }
                                } ?>
                        </table>
                    </div>
                </div>



            </div>
            <!--/.content-->
        </div>

    </div>

    <!--/.container-->
    <!-- <div class="container my-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary mr-3">Anonymous</button>
        <button type="submit" class="btn btn-primary">Not Anonymous</button>
    </div> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <hr class="container text-center mt-4">
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; IRS </b> All rights reserved.
            <a href="../index.php" class="float-right">Back to home</a>
        </div>
    </div>


    <script src=""></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>