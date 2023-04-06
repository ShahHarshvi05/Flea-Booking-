<?php include('constants.php'); 
if (!isset($_SESSION['user_id'])) {
	header("location:userlogin.php");
	die();
}
?>

<html>
<style>
body
{
	background-color : lightgrey;  
	background-size : 100% 100%;
}
.hero
{
	
	width: 100%;
	min-height: 50vh;
	justify-content: center;
	display: flex;
	flex-direction: column;
}
.signup-box
{
    margin-left: 15%;
	display: flex;
	flex-wrap: wrap;
	width: 70%;
	<!--max-width: 800px;-->
	background: #fff;
}
.right-box
{
	padding: 5px;
	flex-basis: 70px;
	flex-grow: 1;
	background: #fff;
	color: black;
}
.left-box
{
	background-image : url('signup3.jpg');
	background-repeat : no-repeat;
	background-size : 100% 100%;
	padding: 100px;
	flex-basis: 200px;
	flex-grow: 1;
}
.input-box
{
	width: 70%;
	padding: 2px;
	margin:20px 35px;
	border-top: 0px;
	border-bottom: 1px solid black;
	border-right: 0px;
	border-left: 0px;
	outline: none;
	font-color: black;
	font-size: 16px;
	
}
.lbl
{
	color: black;
	font-size: 19px;
	margin:20px 35px;
	background: transparent;
}
.button
{
	background-color: #D02116;
	border: none;
	color: white;
	padding: 15px 32px;
	text_align: center;
	text-decoration: none;
	display: inline-bloack;
	font-size: 16px;
	margin: 4px 2px;
	cursor: pointer;
	border-radius: 12px;
	width: 50%;
}
span
{
	margin:20px 35px;
	color:red;
}

.wrapingimage  
{  
float: left;   
margin: 3px 10px 2px 15px;   
}   
.content {
  text-align: center;
  position: relative;
  bottom: 0;
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
  font-size: 250%;
  font-family: monospace;
}
.logo{
	position: relative;
    right: 60;
	top: -50;
	margin: 0 100 0 100;
	}
a:active
{
color: black;
}
.bar{
	display: inline;
position: relative;
top: -150;
margin: 0 80 0 0;
color: white;
text-decoration: none;
font-weight: 1000;
bottom: 0;
}
.bar:hover{
color: 2F8F9D;
}
.regbtn{
display: inline;
position: relative;
top: -150;
margin: 0 10 0 0;
text-decoration: none;
font-weight: 1000;
bottom: 0;
width: 200px;
background-color: 2F8F9D;
padding: 10px;
color: white;
border: none;
}

</style>
<body>
<div class="bg-img">
<div class="content">
<img  class="logo" src="images1.png" alt="Sundown Fest">
<a href="video.php"class="bar">HOME</a>
<a href="booking_stall2.php" class="bar">SELL</a>
<a href="upcoming.php" class="bar">EVENTS</a>
<a href="faq.php" class="bar">FAQ</a>
<a href="generate-ticket.php" class="bar">TICKET</a>
<a href="logout.php"><button type="submit" class="regbtn">LOGOUT</button></a></div><div>
<?php  
$user = $_SESSION['user'];
$query = mysqli_query($conn,"select * from tbl_user where username = '$user'");
$row =mysqli_fetch_array($query);
$id = $row['u_id']; 
        $sql = "SELECT * FROM pass_booking WHERE user_id='$id' ";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
		if($count>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get all the values
                    $p_id = $row['p_id'];
                $name = $row['name'];
                $event_date = $row['event_date'];
				$n_passes = $row['no_of_passes'];
				$c_id = $row['c_id'];
                $user_id = $row['user_id'];
				$sql2 = "SELECT c_venue , c_artist FROM tbl_concert WHERE c_id='$c_id' ";
				$res2 = mysqli_query($conn, $sql2);

        //4. COunt rows to check whether the user exists or not
        $count2 = mysqli_num_rows($res2);
		if($count2>0)
            {
                //Food Available
                while($row2=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $c_venue = $row2['c_venue'];
                $c_artist = $row2['c_artist'];
				}
			}
?>
<div class="hero">

<div class="signup-box">
<div class="left-box">
<h2 style="color:#D02116; margin-top: -60;">SUNDOWN FEST</h2>
</div>
<div class="right-box">
<div class="wrapingimage"><img src="images.png" height="10%" width="60"></div>
<h2 style="color:#D02116">SUNDOWN FEST</h2>
<div id="form">
<form method="POST" action="">
<center><h2>Welcome to family </h2></center>
<label class="lbl">NAME : <?php echo $name;?></label><br><br>
<label class="lbl">EVENT DATE : <?php echo $event_date;?> </label><br><br>
<label class="lbl">NO OF PASSES :  <?php echo $n_passes;?></label><br><br>
<label class="lbl">ARTIST :  <?php echo $c_artist;?></label><br><br>
<label class="lbl">VENUE :  <?php echo $c_venue;?></label><br><br>
</form>
</div>
</div>
</div>
</div><?php
				}
			}
				else
				{?>
					<center><?php echo ' No ticket purchased'; ?></center><?php
				}
				?>
</body>
</html>
