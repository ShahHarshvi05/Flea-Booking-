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
                        <h2>Payment Details</h2>                       
                    

</div>


                    <table>
                        <tr>
                        <th> Sr.no </th>
                        <th> Pay ID </th>
				        <th> Full name </th>
                        <th> Contact No </th>
                        <th> Email Id </th>
				        <th> Event Date </th>
				        <th> No of passes </th>
				        <th> Total Amount </th>
                        </tr>
                    
                </div>
<?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_payment";
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
									$pay_id=$rows['pay_id'];
                                    $name=$rows['name'];
                                    $no_of_passes=$rows['no_of_passes'];
									$total = $rows['total_amount'];
									$email_id=$rows['email_id'];
                                    $contact_no=$rows['contact_no'];
                                    $c_id=$rows['c_id'];
                                    $sql2 = "SELECT * FROM tbl_concert where c_id = $c_id";
                                    $res1 = mysqli_query($conn, $sql2);
                                    if($res1==TRUE)
                                    {
                                     $row1 = mysqli_fetch_assoc($res1);
                                     $c_date = $row1['c_date'];
                                     }

                                    //Display the Values in our Table
                                    ?>
									<tr>
									 <td><?php echo $sn++; ?>. </td>
                                     <td><?php echo $pay_id; ?>. </td>
									 <td><?php echo $name; ?></td>
									 <td><?php echo $contact_no; ?></td>
                                     <td><?php echo $email_id; ?></td>
                                     <td><?php echo $c_date; ?></td>
									 <td><?php echo $no_of_passes; ?></td>
                                     <td><?php echo $total; ?></td>
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

				</table>
				 </div>
        </div>