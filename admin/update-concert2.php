<?php 
include('constants.php');
if(isset($_POST['update']))
{
   $c_id=$_POST['c_id'];
    $c_date = $_POST['c_date'];
    $c_venue = $_POST['c_venue'];
	$venue_capacity = $_POST['venue_capacity'];
    $c_artist = $_POST['c_artist'];
    
   
   
    $sql= "UPDATE tbl_concert SET 
        c_date = '$c_date',
        c_venue = '$c_venue',
        c_artist = '$c_artist' ,
		venue_capacity= '$venue_capacity'
        WHERE c_id = '$c_id'
    ";
    
    
    $res= mysqli_query($conn, $sql);
    
    
    if($res==true)
    {
       
        $_SESSION['update'] = "<div class='success'>Concert Updated Successfully</div>";
        header('location: manage-concert2.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Failed to Update concert</div>";
        header('location: manage-concert2.php');
    }
    
}
?>