<?php 
    include('constants.php');
    if (!isset($_SESSION['user_id'])) {
        header("location:usersignup.php");
        die();
    }
?>
<html>
<head>
    <style>
        body
{
	background-color: #F9EBC8;
}

    .container {
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
background-color: #2F8F9D;
padding: 10px;
color: white;
border: none;
}
.container1{
    text-align: left;
    margin-left: 380;
				max-width : 700px;
				width :100%;
				background-color:#fff;
				padding : 25px 30px;
				border-radius:5px;
				box-shadow:0 5px 10px rgba(0,0,0,0.15);
                color: 2F8F9D;
                font-size: 20;
                margin-top: -70;
			}
			.container1 .title{
				font-size:25px;
				font-weight:500;
                text-align: center;
			}
			.container1 .title::before{
				content:"";
				position:absolute;
				left:0;
				bottom:0;
				height:3px;
				width:30px;
				border-radius:5px;
				/*background:linear-gradient(135deg, #71b7e6, #9b59b6);*/
			}
			.content form .user-details{
				display: flex;
				flex-wrap:wrap;
				justify-content:space-between;
				margin:20px 0 12px 0;
			}
			form .user-details .input-box{
				margin-bottom:15px;
				width: calc(100% /2 - 20px);
			}
			form .input-box span.details{
                display:block;
				font-weight :500px;
				margin-bottom:5px;
			}
			.user-details .input-box input{
             height: 45px;
             width: 100%;
             outline: none;
             font-size: 16px;
             border-radius: 5px;
             padding-left: 15px;
             border: 1px solid #ccc;
             border-bottom-width: 2px;
             transition: all 0.3s ease;
            }
            .user-details .input-box input:focus, .user-details .input-box input:valid{
                border-color: #2F8F9D;
            }
            form .button{
                height: 45px;
                margin: 35px 0;
            }
            form .button input{
                height: 100%;
                width: 100%;
                border-radius: 5px;
                border: none;
                color: #fff;
                font-size: 18px;
                font-weight: 500;
                letter-spacing: 1px;
                cursor:pointer;
                transition: all 0.3s ease;
                background: #DC3535;
            }
            @media(max-width:584px){
                .container{
                    max-width: 100%;
                }
                form .user-details .input-box{
                    margin-bottom: 15px;
                    width: 100px%;
                }
                form .category{
                    width:100%;
                }
                .content form .user-details{
                    max-height: 300px;
                    overflow-y: scroll;
                }
                ,.user-details::-webkit-scrollbar{
                    width:5px;
                }
            }
            @media(max-width:459px){
                .container .content .category{
                    flex-direction: column;
                }
            }	
</style>
</head>
<body><div class="container">
<img  class="logo" src="images1.png" alt="Sundown Fest">
<a href="video.php"class="bar">HOME</a>
<a href="booking_stall.php" class="bar">SELL</a>
<a href="upcoming.php" class="bar">EVENTS</a>
<a href="faq.php" class="bar">FAQ</a>
<a href="generate-ticket.php" class="bar">TICKET</a>
<a href="logout.php"><button type="submit" class="regbtn">LOGOUT</button></a>
</div>
<div class="text-align center">
<?php
            if(isset($_POST['submit']))
            {
                $owner_name = $_POST['owner_name'];
                $email_id = $_POST['email_id'];
                $brand_name = $_POST['brand_name'];
                $city = $_POST['city'];
                $mobile_no = $_POST['mobile_no'];
                $product_category = $_POST['product_category'];

                $sql = "INSERT INTO `stall_booking`( `owner_name`, `email_id`, `brand_name`, `city`, `mobile_no`, `product_category`) VALUES ('$owner_name','$email_id','$brand_name','$city','$mobile_no','$product_category')";
                $res = mysqli_query($conn,$sql) or die(mysqli_error());
                if($res==true)
                {
                    //$_SESSION['add'] = "<div class='success'> stall inquiry added succesfully </div>";
                    //header('location: video.php');   
                    echo "<script> window.location.href='video.php';</script>";
                }
                else{
                    //$_SESSION['add'] =  "<div class='error'> failed to add concert . </div>";  
                    //header('location: video.php');    
                    echo 'fail to add stall';
                 }


            }

?>
</div>
<div class="container1">
			<div class="title"><h2>STALL BOOKINGS</h2></div>
			<div class="content">
				<form action="" method="POST">
					<div class="user-details">
						<div class="input-box">
							<span class="details">Full Name</span>
							<input type="text" name="owner_name" placeholder="enter your name" required>
                        </div>
						<div class="input-box">
							<span class="details">Email</span>
							<input type="text" name="email_id" placeholder="enter your email" required>
                        </div>
						
                        <div class="input-box">
							<span class="details">Brand Name</span>
							<input type="text"name="brand_name" placeholder="enter your brand name" required>
                        </div>
                        <div class="input-box">
							<span class="details">Origin City</span>
							<input type="text" name="city" placeholder="enter your origin city" required>
                        </div>
                        <div class="input-box">
							<span class="details">Phone Number</span>
							<input type="number" name="mobile_no" placeholder="enter your number" required>
                        </div>
                        <div class="input-box">
							<span class="details">product_category</span>
							<input type="text" name="product_category" placeholder="enter your instagram link" required>
                        </div>
                        
                        <div class="input-box">
							<span class="details">Instagram link</span>
							<input type="text" placeholder="enter your instagram link" required>
                        </div>
                       
				   </div>
				  
                   <div class="input-box">
							<input type="checkbox" id="checkbox">
                            <label for="checkbox">I agree to all terms and conditions <a href="t&c.html">TERMS & CONDITIONS</a></label>
                        </div>
				   <div class="button">
					    <input type="submit" value="submit" name="submit">
                   </div>
                   <div>
                    <p><h3>IMPORTANT NOTE:</h3>
                    This is a compulsory registration form for stall booking process ; But it does not confirm your booking for stall at 'SUN DOWN FEST'<br>
                    The form has been created to add your brand to our database and not to book a stall. Please fill the form to continue recieving updates on the upcoming events.</br>
                    for more queries email us at : <a href="">sundownfest@gmal.com</a><p>
                        <h5>WE DONT SHARE THE LAYOUT , NOR ALLOW SELECTION OF STALLS. STALLS WILL BE ALLOCATED BY THE ORGANISING COMMITTEE.</h5>
                   </div>
                </form>
                
            </div>
        </div>
        
</body>
</html>
