<?php 
        
    include('constants.php');
  
    
    if(isset($_GET['s_id']))
    {
        
        $s_id = $_GET['s_id'];
     
        $sql = "DELETE FROM stall_booking WHERE s_id = $s_id " ;
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>stall Deleted Successfully </div>";
            header('location: manage-stall2.php');
        }
        else
        {
            $_SESSION['delete_fail'] = "<div class='error'>Failed to Delete stall.</div>";
            header('location: manage-stall2.php');
        }
    }
  
    
    
    
?>