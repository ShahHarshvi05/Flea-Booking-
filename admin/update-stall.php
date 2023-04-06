<?php include('constants.php'); ?>
<?php 
if(isset($_POST['update']))
{
    $s_id=$_POST['s_id'];
    $owner_name=$_POST['owner_name'];
    $email_id=$_POST['email_id'];
    $mobile_no=$_POST['mobile_no'];
    $city=$_POST['city'];
    $brand_name=$_POST['brand_name'];
    $product_category=$_POST['product_category'];
   
   
    $sql= "UPDATE stall_booking SET 
        owner_name='$owner_name',
        email_id='$email_id',
        mobile_no='$mobile_no',
        city='$city',
        brand_name='$brand_name',
        product_category='$product_category'
       
        WHERE s_id = '$s_id'
    ";
    
    
    $res= mysqli_query($conn, $sql);
    
    
    if($res==true)
    {
       
        $_SESSION['update'] = "<div class='success'>stall Updated Successfully</div>";
        header('location: manage-stall2.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Failed to Update stall</div>";
        header('location: manage-stall2.php');
    }
    
}
?>








































