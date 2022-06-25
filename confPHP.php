<?php
    
    session_start();

    if(!($_SESSION['user'])) 
	{   
		header("Location:profile.php");
	}

    include('databaseaccess.php');

    
    
    $regType=$_POST['user_type'];

    header ('Location: generalconference_reg.php?type='.$regType);


    mysqli_close($link);
         
    
?>