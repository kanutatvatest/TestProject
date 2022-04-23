<?php
	include('config.php');
	if(!isset($_SESSION['id']))  
	{
	    echo "<script>window.location.href='index.php';</script>";
	} 
?>
<?php
    if(count($_POST["selected_id"]) > 0 ) {
    $all= implode(',',$_POST['selected_id']);
    $food_tym_arr=array();
    $food_tym_array=explode(',',$all);
    $food_tym_arr=$food_tym_array;
    for($i=0; $i<count($food_tym_arr); $i++)
    {
        $a=$food_tym_arr[$i];
        $query=mysqli_query($con,"DELETE FROM tbl_add_event WHERE id='$a'");
    
        if($query)
        {
            //$drt=mysqli_query($con,"delete from Common_data_tbl where data_id='$a'");
            echo "<meta http-equiv='refresh' content='0'>";
            $_SESSION['success'] = 'Event Deleted successfully.';
        }
        else
        {
            $_SESSION['error'] = 'Select checkbox to delete Event.';
        }
    }
    $perr="Selected Event  has been deleted.!!";
    echo "<script type='text/javascript'>alert(\"$perr\");</script>";
    echo '<script>window.location="view_event.php";</script>';
    }
?>