<?php
    //include('../includes/config.php');
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME', 'hostel');
// $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

//     //$query2="SELECT * from courses where course_code='BSC12' ";
//            $res2=mysqli_query($con,"SELECT * from courses where course_code='BSC12'");
//            $row=mysqli_fetch_array($res2,MYSQLI_NUM);
//            echo"<input type='text' name='' value='$row[3]'>";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Feedback form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
    </head>
    <body >
        <div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Feedback</h2> 
                    <p> Please provide your feedback below: </p>
                    <form method="Post" action="formpage.php">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience"  id="radio_experience" value="bad" >
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average" >
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="good" >
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Comments:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>

                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <!-- <button type="submit" class="btn btn-lg btn-warning btn-block" >Post </button> -->
                                <input type="submit" value="Post" name="post" class="btn btn-lg btn-warning btn-block">
                            </div>
                        </div>
                    </form>
                    <!-- <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div> -->
                </div>
            </div>
        </div>
    </body>
</html>

    <?PHP
        if(isset($_POST['comments']))
        {

             define('DB_SERVER','localhost');
             define('DB_USER','root');
             define('DB_PASS' ,'');
             define('DB_NAME', 'hostel');
             $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

            $rating=$_POST['experience'];
            $comment=$_POST['comments'];
            $query1="insert into feedback values('".$rating."', '".$comment."') ";
            //$query="insert into feedback(fed_rating,fed_comment) values ('$rating','$comment')"; 
            if($res=mysqli_query($con,$query1))
                {
                // echo "data inserted successfully";
                 //header("location:mainlogin.php");
                 echo "<script>alert('FEED BACK SENT.');
                        window.location.href = '../index.php'
                 </script>";

                }
                else
                {
                 echo "<script>alert('something went wrong');</script>";
                }

        }

    ?>