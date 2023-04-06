<?php
include('constants.php');
            if(isset($_POST['add']))
            {
                $brand = $_POST['brand'];
                $n_chair = $_POST['n_chair'];
                $n_point = $_POST['n_point'];
				$n_table = $_POST['n_table'];
                $other = $_POST['other'];

                $sql = "INSERT INTO  tbl_necessity SET s_id='$brand', no_chair='$n_chair', no_table='$n_table', plug_point='$n_point', other='$other' ";
                $res = mysqli_query($conn,$sql) or die(mysqli_error());
                if($res==true)
                {
                    $_SESSION['add'] = "<div class='success'> concert added succesfully </div>";
                    header('location: other2.php');
                }
                else{
                    $_SESSION['add'] =  "<div class='error'> failed to add concert . </div>";  
                    header('location: other2.php');       }


            }

?>