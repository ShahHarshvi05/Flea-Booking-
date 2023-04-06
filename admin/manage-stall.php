<?php 

include('constants.php');

?>

<html>
    <head>
        <title>stall Details</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style1.css" />
        <link href="css/styles.css" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    
    <body>
    <div class="main-container">
            <div class="wrapper">
                <h1>manage stall</h1>
                <br><br>
       <?php
       if(isset($_SESSION['add']))
       {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
       }
       if(isset($_SESSION['delete']))
       {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
       }
       if(isset($_SESSION['update']))
       {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
       }
       ?>
       <br/><br/><br/>
       <table class="tbl-full">
        <tr>
            <th>sn</th>
            <th>sid</th>
            <th>ownername</th>
            <th>emailid</th>
            <th>mobile</th>
            <th>city</th>
            <th>brand_name</th>
            <th>product_category</th>
            <th>action</th>
    </tr>
    <?php
    $sql = "SELECT * FROM stall_booking";
    $res = mysqli_query($conn,$sql);
    if($res==TRUE)
    {
        $count = mysqli_num_rows($res);
        $sn=1;
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
            $s_id=$rows['s_id'];
            $owner_name=$rows['owner_name'];
            $email_id=$rows['email_id'];
            $mobile_no=$rows['mobile_no'];
            $city=$rows['city'];
            $brand_name=$rows['brand_name'];
            $product_category=$rows['product_category'];
            ?>
            <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $s_id;?></td>
                <td><?php echo $owner_name;?></td>
                <td><?php echo  $email_id;?></td>
                <td><?php echo $mobile_no;?></td>
                <td><?php echo $city;?></td>
                <td><?php echo $brand_name;?></td>
                <td><?php echo$product_category;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>update-stall.php?s_id=<?php echo $s_id;?>" class="btn-secondary">update</a>
                    <a href="<?php echo SITEURL;?>delete-stall.php?s_id=<?php echo $s_id;?>" class="btn-danger">delete</a>
                </td>
        </tr>
        <?php

        }
    }
else{

}
}
?>
</table>
</div>
</div>
</body>
</html>