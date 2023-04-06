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
                        <h2>Admin Profile</h2>                       
              
					<!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Admin
</button>
</div>


                    <table>
                        <tr>
                            <th>Sr No</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Option</th>
                        </tr>
                    
                </div>

                <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_admin";
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
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //Display the Values in our Table
                                    ?>
									<tr>
									 <td><?php echo $id; ?>. </td>
									 <td><?php echo $full_name; ?></td>
									 <td><?php echo $username; ?></td>
									 <td> <button type="button" class="btn btn-success editbutton">Update Admin</button>
                   <a href="delete-admin.php?id=<?php echo $id;?>" class="btn btn-danger">Delete Admin</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="add-admin2.php" method="POST">
      <div class="modal-body">
      
      <div class="form-group"> 
        <label> Full Name </label>
        <input type="text" name="full_name" class="form-control" placeholder="Enter First name">
     </div>

        <div class="form-group">
            <label> User Name </label>
            <input type="text" name="username" class="form-control" placeholder="Enter User Name">
        </div>
        
        <div class="form-group"> 
            <label> Password </label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" name="submit" class="btn btn-primary">Save Admin</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--update admin 33333333333333333333333333333333333333333333333-->

<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="updatemodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Admin Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="update-admin2.php" method="POST">
      <div class="modal-body">
      
      <input type="hidden" name="a_id" id="a_id">

      <div class="form-group"> 
        <label> Full Name </label>
        <input type="text" name="full_name" id="full_name"class="form-control" placeholder="Enter First name">
     </div>

        <div class="form-group">
            <label> User Name </label>
            <input type="text" name="username" id="username"class="form-control" placeholder="Enter User Name">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" name="update" class="btn btn-primary">Update Admin</button>
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

                $('#a_id').val(data[0]);
                $('#full_name').val(data[1]);
                $('#username').val(data[2]);
               
            });
        });
</script>



   </body>
</html>
