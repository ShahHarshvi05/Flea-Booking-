<?php include('constants.php'); ?>
<?php 
if(isset($_POST['update']))
{
    $n_id=$_POST['n_id'];
    $brand = $_POST['brand'];
                $n_chair = $_POST['n_chair'];
                $n_point = $_POST['n_point'];
				$n_table = $_POST['n_table'];
                $other = $_POST['other'];
   
   
    $sql= "UPDATE tbl_necessity SET 
        no_chair='$n_chair', no_table='$n_table', plug_point='$n_point', other='$other' 
       
        WHERE n_id='$n_id'
    ";
    
    
    $res= mysqli_query($conn, $sql);
    
    
    if($res==true)
    {
       
        $_SESSION['update'] = "<div class='success'>stall Updated Successfully</div>";
        header('location: other2.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Failed to Update stall</div>";
        header('location: other2.php');
    }
    
}
?>








































