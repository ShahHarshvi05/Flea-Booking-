<?php include('partials/menu.php'); ?>
<html>
<body>
<html>
    <head>
        <title>ADMIN - Home Page</title>
    </head>
    <body>
        
        <!-- Main Content Section Starts -->
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <?php $sql="select * from tbl_admin";
                         $res = mysqli_query($conn, $sql);
                         $count = mysqli_num_rows($res);
                        
                        ?>
                        <h1><?php echo $count?></h1>
                        <h3>ADMIN</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <?php $sql="SELECT * FROM `tbl_concert` WHERE `c_date`>= curdate() + 1";
                         $res = mysqli_query($conn, $sql);
                         $count = mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count?></h1>
                        <h3> EVENTS</h3>
                        <img src="schools.png" alt="">
                    </div>
                    <div class="icon-case">
                        
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <?php $sql1 = "SELECT SUM(no_of_passes) as total from pass_booking";
                        $res1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($res1);
                        $total_revenue = $row1['total'];
                        ?>
                        <h1><?PHP echo $total_revenue; ?></h1>
                        <h3>PASS SOLD</h3>
                    </div>
                    <div class="icon-case">
                    <img src="teachers.png" alt="">
                       
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <?php $sql1 = "SELECT SUM(total_amount) as total from tbl_payment";
                        $res1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($res1);
                        $total_revenue = $row1['total'];
                        ?>
                        <h1><?PHP echo $total_revenue; ?></h1>
                        <h3>INCOME</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
<div class="recent-payments">
   <div class="title">
       <h2>Details</h2>                       
</div>


   <table>
       <tr>
<th>Sr.no</th>
<th>Date</th>
<th>Artist</th>
<th>No of passes</th>
<th>Total Income</th>
       </tr>
   
</div>

<?php 
       //Query to Get all Admin
       $sql = "SELECT * FROM tbl_concert order by c_date";
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
                   $c_artist=$rows['c_artist'];
                   $sql1 = "SELECT sum(no_of_passes) as tpass , sum(total_amount) as tincome FROM tbl_payment where c_id= $c_id ";
                   $res1 = mysqli_query($conn, $sql1);
                   if($res1==TRUE)
                   {
                    $row1 = mysqli_fetch_assoc($res1);
                    $total_pass = $row1['tpass'];
                        $total_revenue = $row1['tincome'];
                    }
                   
                   ?>
                   <tr>
                   <td><?php echo $sn++;?></td>
                    <td><?php echo $c_date;?></td>
                    <td><?php echo $c_artist;?></td>
                    <td><?php echo $total_pass;?></td>
                    <td><?php echo $total_revenue;?></td>
                   </tr>
<?php

               }
           }
           else
           {
              echo "no concert until now";
           }
       }

   ?>
</div>
</table>
</div>

        </div>
</div>

				 </body>
				 </html>
				 