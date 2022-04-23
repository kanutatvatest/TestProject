<?php 
include('config.php');
if(isset($_POST['Sign_In']) && !empty($_POST['Sign_In']))
{
       $email=$_POST['email']; $pass=$_POST['password'];
       $sql=mysqli_query($con,"SELECT * FROM `tbl_admin` WHERE email='$email' AND password='$pass'");
       $row=mysqli_fetch_assoc($sql);
       $uemail=$row['email'];
       $password=$row['password']; 
       $_SESSION['id']=$row['id'];
       if($email==$uemail && $pass==$password)
          {
             $_SESSION['start'] = time();
             $_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ;
               echo'<script>window.location="dashboard.php";</script>';
          }
        else
          {
             $perr="Invalid Login";
             echo "<script type='text/javascript'>alert(\"$perr\");</script>";
          }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Party Admin</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
          .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 21px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
      </style>
   </head>
   <body  style="background-color:blue;">
            <!-- right content -->
                  <div class="container">
                     <br><br><br><br><br><br>
                     <div class="row">
                         
                     <div class="col-md-3">
                     </div>    
                      <div class="col-md-6">
                      <div class="text-center">
                                       <h1 class="h4 text-gray-900 mb-4"><img src="images/logo/logo.png" style="width:134px;height:120px;"></h1>
                                  </div>
                                    <form enctype="multipart-form/data" method="post">
                                    <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter email"  autocomplete="off" >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Enter Password" autocomplete="off">
                                        </div>
                                       
                                        <input type="submit" name="Sign_In" class="btn btn-light btn-user btn-block" value="Login" >
                                    </form>
                        
                     </div>
                     <div class="col-md-3">
                     </div>
                     </div>
                  </div>
               <!-- end dashboard inner -->
           
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>