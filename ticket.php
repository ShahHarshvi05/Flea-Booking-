<?php
include('constants.php');
if (!isset($_SESSION['user_id'])) {
	header("location:usersignup.php");
	die();
}
?>
<html>
<style>
body
{
	margin: 0;
}
.container{
 position: absolute;
  right: 290;
  margin: 200px;
  padding: 50px;
  background-color: F9EBC8;
      top: 7;
	  color: 2F8F9D;
}
input[type=text], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
.btn {
  background-color: #DC3535;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
.bg-img{
	 position: relative; 
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.bg-img::before {
   background-size: cover;
      position: absolute;
      top: 0px;
      right: 0px;
      bottom: 0px;
      left: 0px;
	   content: "";
  background-image: url("image3.png");
  min-height: 800;
  opacity: 0.6;
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
  top: -250;
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
.bookbtn{
width: 250px;
background-color: transparent;
padding: 10px;
color: white;
border-color: white;
font-size: 20px;
}
.bookbtn:hover{
color: DC8449;
border-color: DC8449;
}
</style>
<body>

<div class="bg-img">
<div class="content">
<img  class="logo" src="images1.png" alt="Sundown Fest">
<a href="video.php"class="bar">HOME</a>
<a href="booking_stall2.php" class="bar">SELL</a>
<a href="upcoming.php" class="bar">EVENTS</a>
<a href="ticket.php" class="bar">FAQ</a>
<a href="generate-ticket.php" class="bar">TICKET</a>
<a href="logout.php"><button type="submit" class="regbtn">LOGOUT</button></a></div>
 <form action="" method="POST" class="container">
    <h1>GET YOUR PASSES NOW !!</h1>

    <label><b>NAME</b></label>
    <input type="text" placeholder="Enter Name" name="Name" required><br>
	
	<label><b>NO OF PASS</b></label>
    <input type="number" name="npass" required><br>
		
	<label><b>CONTACT NO</b></label>
    <input type="text" placeholder="Enter Phone No" name="phno" required><br>

   

    <button type="submit" name="submit" class="btn">Book Pass</button>
  </form></div></div></body>
</html>
<?php
$user = $_SESSION['user'];
$query = mysqli_query($conn,"select * from tbl_user where username = '$user'");
$row =mysqli_fetch_array($query);
$id = $row['u_id'];
if(isset($_POST['submit']))
    {
        
      $c_id = $_GET['c_id'];
      $c_date = $_GET['c_date'];
        $name = $_POST['Name'];
        $npass = $_POST['npass'];
        $_SESSION['cid']= $c_id;
        $_SESSION['name']= $name;
        $_SESSION['npass']= $npass;

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO pass_booking SET 
            name='$name',
            no_of_passes='$npass',
			      c_id = '$c_id',
			      event_date = '$c_date',
            user_id = '$id'
        ";
		 $res = mysqli_query($conn, $sql) or die(mysqli_error());
		  if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Ticket purchased Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location: bill.php");
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Fail to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to puchase ticket.</div>";
            //Redirect Page to Add Admin
            header("location: ticket.php");
        }

	}
?>