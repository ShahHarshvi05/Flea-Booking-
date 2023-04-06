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
                        <h2>Concert Details</h2>                       
              
					<!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Concert
</button>
</div>


                    <table>
                        <tr>
                        <th>Sr.no</th>
            <th>Date</th>
            <th>Venue</th>
			<th>Venue Capacity</th>
            <th>Artist</th>
            <th>Edit</th>
                        </tr>
                    
                </div>

                <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_concert";
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
                                    $c_id=$rows['c_id'];
                                    $c_date=$rows['c_date'];
                                    $c_venue=$rows['c_venue'];
			                        $venue_capacity=$rows['venue_capacity'];
                                    $c_artist=$rows['c_artist'];
                                    ?>
									<tr>
                                    <td><?php echo $c_id;?></td>
                <td><?php echo $c_date;?></td>
                <td><?php echo $c_venue;?></td>
				<td><?php echo $venue_capacity?></td>
                <td><?php echo $c_artist;?></td>
                <td>
                <button type="button" class="btn btn-success editbutton">Update Concert</button>
                   <a href="delete-concert.php?c_id=<?php echo $c_id;?>" class="btn btn-danger">Delete Concert</a>
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

<!-- Add Concert Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Concert Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="add-concert2.php" method="POST">
      <div class="modal-body">
      
      <div class="form-group"> 
        <label> Concert Date </label>
        <input type="date" name="c_date" id="datecontrol" class="form-control" placeholder="Enter Concert date">
     </div>

        <div class="form-group">
            <label> Concert Venue </label>
            <input type="text" name="c_venue" class="form-control" placeholder="Enter Concert Venue">
        </div>
        
        <div class="form-group"> 
            <label> Venue Capacity </label>
            <input type="text" name="venue_capacity"  class="form-control" placeholder="Enter venue capacity">
        </div>

        <div class="form-group"> 
            <label> Concert Artist </label>
            <input type="text" name="c_artist"  class="form-control" placeholder="Enter concert artist">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" name="submit" class="btn btn-primary">Save Concert</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--update Concert Modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Concert Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="update-concert2.php" method="POST">
      <div class="modal-body">
      
        <input type="hidden" name="c_id" id="c_id">
    
      <div class="form-group"> 
        <label> Concert Date </label>
        <input type="date" name="c_date" id="c_date"class="form-control" placeholder="Enter First name">
     </div>

        <div class="form-group">
            <label> Concert Venue </label>
            <input type="text" name="c_venue" id="c_venue"class="form-control" placeholder="Enter Concert Venue">
        </div>
        
        <div class="form-group"> 
            <label> Venue Capacity </label>
            <input type="text" name="venue_capacity" id="venue_capacity"class="form-control" placeholder="Enter venue capacity">
        </div>

        <div class="form-group"> 
            <label> Concert Artist </label>
            <input type="text" name="c_artist" id="c_artist" class="form-control" placeholder="Enter concert artist">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="submit" name="update" class="btn btn-primary">Update Concert</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--########################################-->
<script>
        $(document).ready(function () {

            $('.editbutton').on('click', function () {

                $('#updatemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#c_id').val(data[0]);
                $('#c_date').val(data[1]);
                $('#c_venue').val(data[2]);
                $('#venue_capacity').val(data[3]);
                $('#c_artist').val(data[4]);
            });
        });
        $(document).ready(function() {

var dtToday = new Date();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
 if (month < 10)
month = '0' + month.toString();
if(day < 10) 
day = '0'+ day.toString();

var maxDate = year + '-' + month + '-' + day;
 $('#datecontrol') .attr('min', maxDate);
        })
        $(document).ready(function() {

var dtToday = new Date();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
 if (month < 10)
month = '0' + month.toString();
if(day < 10) 
day = '0'+ day.toString();

var maxDate = year + '-' + month + '-' + day;
 $('#c_date') .attr('min', maxDate);
        })
</script>


   </body>
</html>