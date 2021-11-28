<?php
//session_start();
//error_reporting(0);
include('inc/config.php');
// if (strlen($_SESSION['login']) == 0) {
//     header('location:index.php');
// } else {

if (isset($_POST['submit'])) {
    // $uid=$_SESSION['id'];
    $incident_no = bin2hex(random_bytes(10));
    $college_name = isset($_POST['college_name']);
    $school_name = isset($_POST['school_name']);
    $department_name = isset($_POST['department_name']);
    $year = isset($_POST['year']);
    // $complaintype=$_POST['complaintype'];
    // $state=$_POST['state'];
    $subject = $_POST['subject'];
    $incident = $_POST['incident'];
    $incident_file = $_FILES["incident_file"]["name"];



    move_uploaded_file($_FILES["incident_file"]["tmp_name"], "complaintdocs/" . $_FILES["incident_file"]["name"]);
    $query = mysqli_query($bd, "insert into anonymous(incident_no, college, school, department, year, subject, incident, incident_file) values('$incident_no','$college_name','$school_name','$department_name','$year','$subject','$incident','$incident_file')");

    $sql = mysqli_query($bd, "select incident_no from anonymous  order by incident_no desc limit 1");
    while ($row = mysqli_fetch_array($sql)) {
        //$cmpn = $row['incident_no'];
        $incident_no = $row['incident_no'];
    }
    // $incident_no = $cmpn;
    echo '<script> alert("Your incident has been successfully filled and your incident_no is  "+"' . $incident_no . '")</script>';
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="./admin/css/theme.css">

    <title>IRS</title>
    <style>
        nav {
            box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .6);
        }

        nav .navbar-nav a:hover {
            background: #e5e5e5;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="index.php">IRS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#">Features</a> -->
                    <a class="nav-item nav-link" href="trackers/trackanonymousincidents.php" style="font-size:14px;">Track Incident</a>

                </div>
            </div>
        </div>
    </nav>


    <div class="row h-100 justify-content-center align-items-center">
        <div class="container text-center my-4">
            <h1 class="font-size:40px;" style="color:#0671B9">Hi, Thank you for helping.</h1>
            <p class="col-md-8 m-auto">Please be detailed. All communication is anonymous and encrypted</p>

        </div>
        <!-- <div class="container">
            <?php if ($successmsg) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Well done!</b> <?php echo htmlentities($successmsg); ?>
                </div>
            <?php } ?>

            <?php if ($errormsg) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg); ?>
                </div>
            <?php } ?>
        </div> -->

        <form class="container col-md-6 m-auto" method="post" name="complaint" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-md-6">
                    <label>College</label>
                    <div class="">
                        <select name="college_name" id="college_name" class="form-control">
                            <option value="">Select college</option>
                            <?php $sql = mysqli_query($bd, "select * from colleges ");
                            while ($rw = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo htmlentities($rw['college_name']); ?>"><?php echo htmlentities($rw['college_name']); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>School</label>
                    <div class="">
                        <select name="school_name" id="school_name" class="form-control">
                            <option value="">Select school</option>
                            <?php $sql = mysqli_query($bd, "select id, school_name from school ");
                            while ($rw = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo htmlentities($rw['school_name']); ?>"><?php echo htmlentities($rw['school_name']); ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Department</label>
                    <div class="">
                        <select name="department_name" id="department_name" class="form-control">
                            <option value="">Select department</option>
                            <?php $sql = mysqli_query($bd, "select * from departments ");
                            while ($rw = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo htmlentities($rw['department_name']); ?>"><?php echo htmlentities($rw['department_name']); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Year</label>
                    <div class="">
                        <select name="school_name" id="school_name" class="form-control">
                            <option value="">Select year</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="4">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>

                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="">Subject</label>
                <div class="">
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Provide more info <span class="text-danger">*</span></label>
                <textarea class="form-control" name="incident" placeholder="Please provide as much details as possible" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Attach Supporting Files</label>
                <input type="file" class="form-control-file" name="incident_file">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <hr class="container text-center mt-4">
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; IRS </b> All rights reserved.
            <a href="index.php" class="float-right">Back to home</a>
        </div>
    </div>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>