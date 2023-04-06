<?php include('constants.php');
include('login-check.php');
$user=$_SESSION['user'];
?>

<!-- Menu Section Starts -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Panel</title>
    <style>
        h5{
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h2>SUNDOWN FEST</h2>
        </div>
        <ul>
            <a class="text-decoration-none"href="adminhome.php"><li>&nbsp; <span>Dashboard</span> </li></a>
            <a class="text-decoration-none"href="manage-admin2.php"><li>&nbsp;<span>Admin</span> </li></a>
            <a class="text-decoration-none"href="manage-concert2.php"><li>&nbsp;<span>Concert</span> </li></a>
            <a class="text-decoration-none"href="manage-stall2.php"><li>&nbsp;<span>Stall</span> </li></a>
            <a class="text-decoration-none"href="manage-ticket2.php"><li>&nbsp;<span>Ticket</span> </li></a>
            <a class="text-decoration-none"href="manage-payment2.php"><li>&nbsp; <span>Payment</span></li></a>
            <a class="text-decoration-none"href="other2.php"><li>&nbsp;<span>Others</span> </li></a>
            <a class="text-decoration-none"href="logout.php"><li>&nbsp;<span>Log Out</span> </li></a>
        </ul>
    </div>
		    <div class="container" style="left: 150px; width: 1400px;">
                <div class="header">
                    <div class="nav">
                        <div class="search">
                        <h2>SUNDOWN FEST</h2>
                        </div>
                        <div class="user">  
                            <div class="img-case">
                            <img src="user.png" alt="">
                        </div>
                        <H5><?php echo $user; ?></H5>
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    

</body>