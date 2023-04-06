<?php
include('constants.php');
if (!isset($_SESSION['user_id']))
 {
	header("location:usersignup.php");
	die();
}
$name = $_SESSION['name'];
$npass = $_SESSION['npass'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Billing Information</title>
        
        <style>
            header{
    width: 100vw;
    min-height: 100vh;
    background-image: url("image3.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    font-size: 1.2rem;
    display: flex;
    justify-content: center;
    align-items: center;    

   
}
.container{
    background-color: aliceblue;
    max-width: 800px;
    min-height: 500px;
    display: flex;
    justify-content:space-between;
    align-items:flex-start;
    padding: 0.5rem 1.5rem;
}
.left{
    flex-basis: 50%;
}
.right{
    flex-basis: 50%;
}
form{
    padding: 1rem;
}
h3{
    margin-top: 1rem;
    color: #34495e;
}
form input[type="text"]{
    width: 100%;
    padding: 0.5rem 0.7rem;
    margin: 0.5rem 0rem;
    outline: none;
}
#zip{
    display: flex;
    margin-top: 0.5rem;
}
#zip select{
    padding: 0.5rem 0.7rem;
}
#zip input[type="number"]{
    padding: 0.5rem 0.7rem;
    margin-left: 5px;
}
input[type="submit"]{
    width: 100%;
    padding: 0.7rem 1.5rem;
    background: #34495e;
    color: white;
    border: none;
    margin-top: 1rem;
    cursor: pointer;
}

input[type="submit"]:hover{
    background: #2c3e50;
}
@media only screen and (max-width: 70px){
    .container{
        flex-direction: column;

    }
    body{
        overflow-x: hidden;
    }
}
            </style>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="left">
                    <h3>Billing Information</h3>
                    <form action="" method="POST">
                        Full name
                        <input type="text" value="<?php echo $name;?>" name="fname" placeholder="Enter name">
                        Contact No
                        <input type="text" name="contact" placeholder="Enter Conatct no ">
                        Email
                        <input type="text" name="emailid" placeholder="Enter your email address">
                        
                       <div id="zip">
                            <label>
                                No. of passes
                                <input type="number" value="<?php echo $npass;?>" name="npass" class="input-responsive" required>
                            </label><br>
                            <label>
                                Total Price 
                                <input type="text" value="<?php echo $npass*500;?>" name="total" placeholder="Pincode" >
                            </label>
                        </div>
                </div>
               <div class="right">
                    <h3>Payment Information</h3>
                        Accepted Card<br>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Visa.svg/1200px-Visa.svg.png" width="33">
                        <img src="https://i.ytimg.com/vi/EMJHsee6ZE8/maxresdefault.jpg" width="33">
                        <img src="https://m.economictimes.com/thumb/msid-92061657,width-1200,height-900,resizemode-4,imgsize-10384/axis-bank-and-indian-oil-launch-co-branded-rupay-contactless-credit-card.jpg" width="33">
                        <br>
						<label>
                        Card Details<br>
                        <input type="text" name="" placeholder="Enter Card number">
						</label><br>
                        <label>
						Exp Month<br>
                        <input type="text" name="" placeholder="Enter Month">
						</label><br>
                       <div id="zip">
                        <label>
                           Exp Year<br>
                            <select>
                                    <option>Choose Year..</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                            </select>
                        </label></br>
                            <label>
                               CVV<br>
                                <input type="number" name="" placeholder="CVV">
                            </label><br>
                        </div>
 <input type="submit" name="submit" value="Proceed to pay">
                    </form>
                   
                </div>
            </div>
        </header>
        </div>
    </section>
    <?php
if(isset($_POST['submit']))
    {
        
      //$c_id = $_GET['c_id'];
      //$c_date = $_GET['c_date'];
        $name = $_POST['fname'];
        $c_no = $_POST['contact'];
        $emailid = $_POST['emailid'];
        $npass = $_POST['npass'];
        $total = $_POST['total'];
        $c_id = $_SESSION['cid'];

        //2. SQL Query to Save the data into database
        $sql2="select * from pass_booking where name='$name' and c_id= '$c_id'";
        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
        $row =mysqli_fetch_array($res2);
        $p_id = $row['p_id'];
        $sql = "INSERT INTO tbl_payment SET 
            p_id = '$p_id',
            name='$name',
            contact_no = '$c_no',
            email_id = '$emailid', 
            no_of_passes='$npass',
			total_amount = '$total',
            c_id = '$c_id'
        ";
		 $res = mysqli_query($conn, $sql) or die(mysqli_error());
		  if($res==TRUE)
        {
            echo "<script> window.location.href='upcoming.php';</script>";
        }
        else
        {
           header('location: bill.php');
       }

	}
?>
    </body>
</html>