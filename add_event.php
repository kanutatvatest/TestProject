<?php
     include('config.php');
	if(!isset($_SESSION['id']))  
	{
	   echo "<script>window.location.href='index.php';</script>";
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
      <link rel="icon" href="images/logo/logo.png" type="image/png" />
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
       <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <style>
          label{
              color:black;
              font-weight:400;
          }
      </style>
      
          <script language="javascript">
        $(document).ready(function () {
            $("#date_picker").datepicker({
                minDate: 0
            });
        });
    </script>
      <script language="javascript">
        $(document).ready(function () {
            $("#date_picker1").datepicker({
                minDate: 0
            });
        });
    </script>
     
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
         <?php  include('sidebar.php'); ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
             <?php  include('header.php'); ?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Add Event</h2>
                           </div>
                        </div>
                     </div>
                    <div class="col-md-12"> 
                    <?php 
                    include('config.php');
                    if(isset($_POST['submit']) && !empty($_POST['submit']))
                    {
                      
                     $event_title =$_POST['event_title'];
                     $event_start_date=$_POST['event_start_date'];
                     $event_end_date=$_POST['event_end_date'];
                     $recurrance_time=$_POST['recurrance_time']; 
                     $recurrance_duration =$_POST['recurrance_duration'];
                      
                      $sql_insert=mysqli_query($con,"INSERT INTO `tbl_add_event`(`event_title`, `event_start_date`, `event_end_date`, `recurrance_time`, `recurrance_duration`)
                      VALUES ('$event_title','$event_start_date','$event_end_date','$recurrance_time','$recurrance_duration')");  
                     
                      if($sql_insert)
                      {
                           $perr="Event Add Successfully!!";
                           echo "<script type='text/javascript'>alert(\"$perr\");</script>"; 
                           echo'<script>window.location="list_event.php";</script>';
                      }
                      else
                        {
                           $perr=" Unable to Add Event!!";
                           echo "<script type='text/javascript'>alert(\"$perr\");</script>";   
                        }                        
                    }
                ?>
                    <form enctype="multipart-form/data" method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Event Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="event_title"  placeholder="Enter Event Title" required> 
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="text" class="form-control" id="date_picker"  aria-describedby="emailHelp" name="event_start_date" placeholder="Enter Event Start Date" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="text" class="form-control" id="date_picker1"  aria-describedby="emailHelp" name="event_end_date"  placeholder="Enter Event End Date" required>
                      </div>
                      
                       <div class="form-group">
                        <label for="exampleInputEmail1">Recurrance Time</label>
                       <select class="form-control"  name="recurrance_time" required>
                       <option  value="">Recurrance Time</option>
                       <option  value="every">Every</option>
                       <option  value="everyother">Every Other</option>
                       <option  value="everythird">Every Third</option>
                       <option  value="everyfourth">Every Fourth</option>
                       </select>
                      </div>
                      
                      
                       <div class="form-group">
                        <label for="exampleInputEmail1">Recurrance Duration</label>
                        <select class="form-control"  name="recurrance_duration"  required>
                        <option  value="">Recurrance Duration</option>     
                       <option  value="Day">Day</option>
                       <option  value="Week">Week</option>
                       <option  value="Month">Month</option>
                       <option  value="Year">Year</option>
                       </select>
                      </div>
                    <br>
                <div class="form-group">       
                  <input type="submit" class="form-control btn btn-primary" style="background-color:#15283c;" value="Add Event" name="submit" id="exampleInputEmail1" aria-describedby="emailHelp"  >
                    </div>
                    </form>
                    </div>
                     <!-- graph -->
                  </div>
                  <br><br><br>
                  <!-- footer -->
                 <?php include('footer.php');?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
     <!-- <script src="js/jquery.min.js"></script>-->
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
      <script src="js/chart_custom_style1.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>