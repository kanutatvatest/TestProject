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
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
          th,td{
              color:black;
          }
      </style>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    className: 'exportExcel',
                    filename: 'Test_Excel',
                    exportOptions: { modifier: { page: 'all'} }
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    className: 'exportExcel',
                    filename: 'Test_Csv',
                    exportOptions: { modifier: { page: 'all'} }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'exportExcel',
                    filename: 'Test_Pdf',
                    exportOptions: { modifier: { page: 'all'} }
                }]
            });
 
        });
    </script>
     <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to delete task?");
        if(result){
            return true;
        }else{
            return false;
        }
    }
    $(document).ready(function(){
        $('#check_all').on('click',function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });
        
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
            }else{
                $('#check_all').prop('checked',false);
            }
        });
    });
</script>
   </head>
   <body class="inner_page invoice_page">
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
                              <h2>List Event</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- invoice section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><i class="fa fa-calendar" aria-hidden="true"></i>List Event</h2>
                                 </div>
                              </div>
                              <div class="col-md-12">
                             <div class="card-body">
                            <div class="table-responsive">
                                  <a href="add_event.php"><button type="button" class="btn btn-info" style="float:right;">ADD Event</button></a>
                      <form action="delete_event.php" method="post" onsubmit="return deleteConfirm();"/><br>
                    <input type="submit" class="btn btn-danger" name="btn_delete" value="Delete All" style="cursor: pointer;position: relative;top:-21px;float:right;" />&nbsp;&nbsp;                                                            
                                <table class="table table-bordered  table-striped" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="check_all" id="check_all" value="<?php echo $data['id'];?>"> All</th>  
                                            <th>Id</th>
                                            <th>Event Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Recurrance Time</th>
                                            <th>Recurrance Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
					
                                        $select=mysqli_query($con,"SELECT * FROM `tbl_add_event` order by id asc");
                                        $counter=1;
                                        while($data=mysqli_fetch_assoc($select))
                                        {
                                        ?>
                                        <tr>
                                          <td><input type="checkbox" name="selected_id[]" class="checkbox" value="<?php echo $data['id'];?>"/></td>    
                                            <td><?php echo $counter++;?></td>
                                            <td><?php echo $data['event_title'];?></td>
                                            <td><?php echo $data['event_start_date'];?></td>
                                            <td><?php echo $data['event_end_date'];?></td>
                                            <td><?php echo $data['recurrance_time'];?></td>
                                            <td><?php echo $data['recurrance_duration'];?></td>
                                            
                                            <td>
                                              <a href="edit_event.php?id=<?php echo $data['id'];?>" class = "btn btn-primary" style="width:100px;">Edit</a>
                                              <br><br>
                        					  <a href="view_event.php?did=<?php echo $data['id'];?>" class = "btn btn-danger" style="width:100px;">Delete</a>
                    						</td>
                                                       
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                  </div>
                  
                  <?php
                  if($_GET['did'])
                  {
                      $dd=$_GET['did'];
                      $qu6=mysqli_query($con,"delete from tbl_add_event where id='$dd'");
                      if($qu6)
                      {
                          $perr="Event Delted successfully.!!";
                          echo "<script type='text/javascript'>alert(\"$perr\");</script>";
                          echo'<script>window.location="view_event.php";</script>';
                      }
                      else
                      {
                          $perr="Unable to delete event!";
                          echo "<script type='text/javascript'>alert(\"$perr\");</script>";
                      }
                  }
                  
                  ?>
   
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
         <!-- The Modal -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Modal Heading</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     Modal body..
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end model popup -->
      </div>
      <!-- jQuery -->
<!--      <script src="js/jquery.min.js"></script>
-->      <script src="js/popper.min.js"></script>
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
      <!-- fancy box js -->
     <!-- <script src="js/jquery-3.3.1.min.js"></script>-->
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>