<?php
include('partials/menu.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
   </head>
<body>
		          <div class="content">
           
				            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Stall Details</h2>                       
                    </div>
                    <table>
                    <tr>
            
            <th>sid</th>
            <th>ownername</th>
            <th>emailid</th>
            <th>mobile</th>
            <th>city</th>
            <th>brand_name</th>
            <th>product_category</th>
            <th>action</th>
    </tr>
                    
                </div>

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
                <td><?php echo $s_id;?></td>
                <td><?php echo $owner_name;?></td>
                <td><?php echo  $email_id;?></td>
                <td><?php echo $mobile_no;?></td>
                <td><?php echo $city;?></td>
                <td><?php echo $brand_name;?></td>
                <td><?php echo$product_category;?></td>
                <td>
                <button type="button" class="btn btn-success editbutton">Update </button>
                <button type="button" class="btn btn-primary addbutton">Other Necessity </button>
                    <a href="delete-stall.php?s_id=<?php echo $s_id;?>" class="btn btn-danger">Delete</a>
                </td>
        </tr>
        <?php

        }
    }
else{

}
}
?>
 </div>
				</table>
				 </div>
        </div>
<!--update admin 33333333333333333333333333333333333333333333333-->

<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="updatemodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Stall Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="update-stall.php" method="POST">
      <div class="modal-body">
      
      <input type="hidden" name="s_id" id="s_id">

      <div class="form-group"> 
        <label> Full Name </label>
        <input type="text" name="owner_name" id="owner_name"class="form-control" placeholder="Enter First name">
     </div>

        <div class="form-group">
            <label>Email </label>
            <input type="text" name="email_id" id="email_id"class="form-control" placeholder="Enter User Name">
        </div>
        <div class="form-group">
            <label>Phone Number </label>
            <input type="text" name="mobile_no" id="mobile_no"class="form-control" placeholder="Enter User Name">
        </div>

        <div class="form-group">
            <label>Origin City </label>
            <input type="text" name="city" id="city"class="form-control" placeholder="Enter User Name">
        </div>

        <div class="form-group">
            <label>Brand Name </label>
            <input type="text" name="brand_name" id="brand_name"class="form-control" placeholder="Enter User Name">
        </div>

        <div class="form-group">
            <label>Product category </label>
            <input type="text" name="product_category" id="product_category"class="form-control" placeholder="Enter User Name">
        </div>

        <!--<div class="form-group">
            <label>Instagram Link </label>
            <input type="text" name="i_link" id="i_link"class="form-control" placeholder="Enter User Name">
        </div>-->




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" name="update" class="btn btn-primary">Update </button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--#####################################################################3-->
<!-- Modal -->
<div class="modal fade" id="addother" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Other Necessity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="add-other2.php" method="POST">
      <div class="modal-body">
      
      <div class="form-group"> 
        <label> Brand Name </label>
        <select name="brand" class="form-control">
						<?php 
                                
                                $sql = "SELECT * FROM stall_booking ";
                                
                                //Executing qUery
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we donot have categories
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $s_id = $row['s_id'];
                                        $brand_name = $row['brand_name'];

                                        ?>

                                        <option value="<?php echo $s_id; ?>"><?php echo $brand_name; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No brand Found</option>
                                    <?php
                                }
                            

                                //2. Display on Drpopdown
                            ?>
						  </select>

     </div>


      <div class="form-group"> 
        <label> No of chair </label>
        <input type="text" name="n_chair" class="form-control" placeholder="Enter First name">
     </div>
        <div class="form-group"> 
            <label> plug point </label>
            <input type="text" name="n_point" class="form-control" placeholder="Enter Password">
        </div>


        <div class="form-group">
            <label> No Of table </label>
            <input type="text" name="n_table" class="form-control" placeholder="Enter User Name">
        </div>
        <div class="form-group"> 
        <label> Other </label>
        <input type="text" name="other" class="form-control" placeholder="Enter First name">
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" name="add" class="btn btn-primary">Save other neccesity</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
        $(document).ready(function () {

            $('.editbutton').on('click', function () {

                $('#updatemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#s_id').val(data[0]);
                $('#owner_name').val(data[1]);
                $('#email_id').val(data[2]);
                $('#mobile_no').val(data[3]);
                $('#city').val(data[4]);
                $('#brand_name').val(data[5]);
                $('#product_category').val(data[6]);
                //$('#i_link').val(data[8]);
               
            });
        });
</script>
<script>
        $(document).ready(function () {

            $('.addbutton').on('click', function () {

                $('#addother').modal('show');            
            });
        });
</script>



   </body>
</html>
