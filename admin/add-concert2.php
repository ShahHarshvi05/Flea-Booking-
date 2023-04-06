<?php
include('constants.php');
            if(isset($_POST['submit']))
            {
                $c_id = $_POST['c_id'];
                $c_date = $_POST['c_date'];
                $c_venue = $_POST['c_venue'];
				$venue_capacity = $_POST['venue_capacity'];
                $c_artist = $_POST['c_artist'];

                $sql = "INSERT INTO  tbl_concert SET c_id='$c_id', c_date='$c_date',c_venue='$c_venue', venue_capacity='$venue_capacity', c_artist='$c_artist' ";
                $res = mysqli_query($conn,$sql) or die(mysqli_error());
                if($res==true)
                {
                    $_SESSION['add'] = "<div class='success'> concert added succesfully </div>";
                    header('location: manage-concert2.php');
                }
                else{
                    $_SESSION['add'] =  "<div class='error'> failed to add concert . </div>";  
                    header('location: manage-concert2.php');       }


            }

?>