<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

             define('DB_SERVER','localhost');
             define('DB_USER','root');
             define('DB_PASS' ,'');
             define('DB_NAME', 'hostel');
             $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if(isset($_POST['submit']))
{
  $rules=$_FILES['rules']['name'];
  $size=$_FILES['rules']['size'];
  $type=$_FILES['rules']['type'];
  $temp=$_FILES['rules']['tmp_name'];
  $link=$_POST['link'];
  move_uploaded_file($temp,"file/".$rules);

  $select="truncate table files";
  $res=mysqli_query($con,$select);
  $query1="insert into files values('','".$rules."')";
  if($res=mysqli_query($con,$query1))
                {
                // echo "data inserted successfully";
                 //header("location:mainlogin.php");
                 echo "<script>alert('file updated successfully.');
                   				window.location.href = 'dashboard.php'

                                       </script>";

                }
                else
                {
                 echo "<script>alert('something went wrong');</script>";
                }

}
  $select=mysqli_query($con,"select * from files");
            $row1=mysqli_fetch_array($select);
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Files</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						</br>
						<h2 class="page-title">Files </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Update File </div>
									<div class="panel-body">
										<div class="row">
										<div class="col-md-4">
										<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
											<label>Hostel Rules File</label>
											<input type="file" name="rules" id="rules" value="rules" class="form-control">
										</br>
											<div class="col-md-offset-4">
											<input type="submit" name="submit" Value="Update" class="btn btn-primary">
											</div>
										</form>
									</div>
										<div class="col-md-4 col-md-offset-1">
											<label> Latest Hostel Rules File:</label>&nbsp;
											<?php
											if (strpos($row1[1], '.PDF') !== false || strpos($row1[1], '.docx') !== false || strpos($row1[1], '.doc') !== false || strpos($row1[1], '.txt') !== false)    {
          echo"<a href='file/$row1[1]' target='_blank' ><span class='glyphicon glyphicon-download'></span><em>Hostel rules</em></a><br>";
      }
 
											?>
										</div>
										</div>					
									</div>
									</div>
								</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>