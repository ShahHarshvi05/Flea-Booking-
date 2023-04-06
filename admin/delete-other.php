<?php 
        
    include('constants.php');
  
    
    if(isset($_GET['n_id']))
    {
        
        $n_id = $_GET['n_id'];
     
        $sql = "DELETE FROM tbl_necessity WHERE n_id = $n_id " ;
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Concert Deleted Successfully </div>";
            header('location: other2.php');
        }
        else
        {
            //Failed to Delete List
            $_SESSION['delete_fail'] = "<div class='error'>Failed to Delete List.</div>";
            header('location: other2.php');
        }
    }
  
    
    
    
?>