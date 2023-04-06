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
                        <h2>Other Necessity</h2>                       
</div>


                    <table>
                        <tr>
                        <th>N_ID</th>
                            <th>S_ID</th>
                            <th>NO OF CHAIR</th>
                            <th>NO OF TABLE</th>
                            <th>PLUG POINT</th>
                            <th>Other</th>
                            <th>action</th>
                        </tr>
                    
                </div>

                <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_NECESSITY";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //CHeck whether the Query is Executed of Not
                        if($res==TRUE)
                        {
                            // Count Rows to CHeck whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn=1; //Create a Variable and Assign the value

                            //CHeck the num of rows
                            if($count>0)
                            {
                                //WE HAve data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
                                    $n_id=$rows['n_id'];
                                    $s_id=$rows['s_id'];
                                    $n_chair=$rows['no_chair'];
                                    $n_table=$rows['no_table'];
                                    $n_point=$rows['plug_point'];
                                    $other=$rows['other'];

                                    //Display the Values in our Table
                                    ?>
									<tr>
                                    <td><?php echo $n_id; ?>. </td>
									 <td><?php echo $s_id; ?>. </td>
									 <td><?php echo $n_chair; ?></td>
									 <td><?php echo $n_table; ?></td>
                                     <td><?php echo $n_point; ?></td>
                                     <td><?php echo $other; ?></td>
									 <td> <button type="button" class="btn btn-success editbutton">Update </button>
                   <a href="delete-other.php?n_id=<?php echo $n_id;?>" class="btn btn-danger">Delete </a>
									 </td>
									</tr>
				 <?php

                                }
                            }
                            else
                            {
                                //We Do not Have Data in Database
                            }
                        }

                    ?>
 </div>
				</table>
				 </div>
        </div>


<!--update other 33333333333333333333333333333333333333333333333-->

<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="updatemodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="update-other2.php" method="POST">
      <div class="modal-body">
      
      <input type="hidden" name="n_id" id="n_id">

      <div class="form-group"> 
        <label> Brand Name </label>
        <select name="brand" id="s_id" class="form-control">
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

                                        <option value="<?php echo $s_id; ?>"><?php echo $s_id;?>. <?php echo $brand_name; ?></option>

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
        <input type="text" name="n_chair" id="n_chair"class="form-control" placeholder="Enter First name">
     </div>
        <div class="form-group"> 
            <label> plug point </label>
            <input type="text" name="n_point" id="n_point"class="form-control" placeholder="Enter Password">
        </div>


        <div class="form-group">
            <label> No Of table </label>
            <input type="text" name="n_table" id="n_table"class="form-control" placeholder="Enter User Name">
        </div>
        <div class="form-group"> 
        <label> Other </label>
        <input type="text" name="other" id="other" class="form-control" placeholder="Enter First name">
     </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--#####################################################################3-->
<script>
        $(document).ready(function () {

            $('.editbutton').on('click', function () {

                $('#updatemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#n_id').val(data[0]);
                $('#s_id').val(data[1]);
                $('#n_chair').val(data[2]);
                $('#n_table').val(data[3]);
                $('#n_point').val(data[4]);
                $('#other').val(data[5]);
               
            });
        });
</script>



   </body>
</html>
