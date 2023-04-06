<?php include('constants.php'); ?>

<html>
<style>
body
{
	background-image : url('background.png');
	background-repeat : no-repeat;
	background-size : 100% 100%;
}
.hero
{
	
	width: 100%;
	min-height: 100vh;
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

</style>
<body>
 <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
<div class="hero">

<div class="signup-box">
<div class="left-box">
</div>
<div class="right-box">
<div class="wrapingimage"><img src="images.png" height="10%" width="60"></div>
<h2 style="color:#D02116">SUNDOWN FEST</h2>
<div id="form">
<form method="POST" action="">
<center><h2>Welcome to family </h2></center>
<label class="lbl">Username</label><br>
<input type="text" name="username" class="input-box"><br>
<label class="lbl">Password </label><br>
<input type="password" name="password" class="input-box"><br>
<center><input type="submit" name="submit" value="Login In" class="button" ></center>

</form>
</div>
</div>
</div>
</div>
</body>
</html>
<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
         //$username = $_POST['username'];
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
		$raw_password = md5($_POST['password']);
       $password = mysqli_real_escape_string($conn, $raw_password);
		 //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$raw_password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $row=mysqli_fetch_assoc($res);
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
           $_SESSION['user'] = $row['username']; //TO check whether the user is logged in or not and logout will unset it
            $_SESSION['user_id'] = $row['u_id'];
            //REdirect to HOme Page/Dashboard
            header('location: video.php');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location: userlogin.php');
        }

    }

?>