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
                        <h2>Ticket Details</h2>                       
                    
<form method="POST" action="">                
				<tr><td>Event date :</td>
				
				<td>
                        <select name="event_date">
						<?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM tbl_concert ";
                                
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
                                        $c_id = $row['c_id'];
                                        $c_date = $row['c_date'];

                                        ?>

                                        <option value="<?php echo $c_id; ?>"><?php echo $c_date; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No Concert Found</option>
                                    <?php
                                }
                            

                                //2. Display on Drpopdown
                            ?>
						  </select>
                    </td>
				<td colspan="2">
                        <input type="submit" class="btn btn-primary"name="submit" value="Search Concert" class="btn-secondary">
                    </td></tr></FORM>
</div>


                    <table>
                        <tr>
                        <th> Sr.no </th>
				        <th> Full name </th>
				        <th> Event Date </th>
				        <th> No of passes </th>
				        <th> Action </th>
                        </tr>
                    
                </div>
                <?php
				 if(isset($_POST['submit']))
            {
				$c_id = $_POST['event_date'];
                        //Query to Get all Admin
                        $sql = "SELECT * FROM pass_booking where c_id = $c_id ";
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
									$p_id=$rows['p_id'];
                                    $name=$rows['name'];
                                    $no_of_passes=$rows['no_of_passes'];
									$c_id=$rows['c_id'];
									$e_date=$rows['event_date']

                                    //Display the Values in our Table
                                    ?>
									<tr>
									 <td><?php echo $sn++; ?>. </td>
									 <td><?php echo $name; ?></td>
									 <td><?php echo $e_date; ?></td>
									 <td><?php echo $no_of_passes; ?></td>
										<td><a href="delete-ticket.php?p_id=<?php echo $p_id;?>" class="btn btn-danger">Cancel Ticket</a>
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
}
?>
<?php 
				  if(!isset($_POST['submit']))
				  {
                        //Query to Get all Admin
                        $sql = "SELECT * FROM pass_booking";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //CHeck whether the Query is Executed of Not
                        if($res==TRUE)
                        {
                            // Count Rows to CHeck whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn=1; //Create a Variable and Assign the valu

                            //CHeck the num of rows
                            if($count>0)
                            {
                                //WE HAve data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
									$p_id=$rows['p_id'];
                                    $name=$rows['name'];
                                    $no_of_passes=$rows['no_of_passes'];
									$c_id=$rows['c_id'];
									$e_date=$rows['event_date']

                                    //Display the Values in our Table
                                    ?>
									<tr>
									 <td><?php echo $sn++; ?>. </td>
									 <td><?php echo $name; ?></td>
									 <td><?php echo $e_date; ?></td>
									 <td><?php echo $no_of_passes; ?></td>
										<td><a href="delete-ticket.php?p_id=<?php echo $p_id;?>" class="btn btn-danger">Cancel Ticket</a>
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
				  }
                    ?>

				</table>
				 </div>
        </div>