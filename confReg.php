<?php
    include('databaseaccess.php');
    $email= mysqli_real_escape_string($link, $_REQUEST['email']);
    $memberType= mysqli_real_escape_string($link, $_REQUEST['type']);
    $students = mysqli_real_escape_string($link, $_REQUEST['stdNames']);
    $pic = mysqli_real_escape_string($link, $_REQUEST['schImg']);
    $placeEmployed = mysqli_real_escape_string($link, $_REQUEST['empPlace']);
    $job= mysqli_real_escape_string($link, $_REQUEST['jobTitle']);
    $presenterPhoto = mysqli_real_escape_string($link, $_REQUEST['p_img']);
    $presenterDocs = mysqli_real_escape_string($link, $_REQUEST['p_docs']);
    $otherPhoto=mysqli_real_escape_string($link, $_REQUEST['i_img']);
    $rand='null';

    //"ADVISOR" DATA INSERTION TO DATA BASE 
   if($memberType=='Advisor')
   {   
            if(($pic =='' ) || ($students =='' ))
            {
                echo '<script language="javascript">';
		        echo 'alert("No entries can be left blank!")';
		        echo '</script>';
		        header("Refresh:0; generalconference_reg.php");
            }
            else
            { 
                $sql="INSERT INTO Register (Email, Type, Students, Photo, Documents, JobLocation, JobTitle) VALUES 
                ('$email', '$memberType', '$students', '$pic', '$rand', '$rand', '$rand')";
                $result = $link->query($sql);

                if($result==true)
                {
                    echo '<script language="javascript">';
		            echo 'alert("Successful registration!")';
			        echo '</script>';
                }
                else
                {
                    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
                }
                header("Refresh:0; url=index.php");
            }
   }
   //"PRESENTER" DATA INSERTION TO DATA BASE 
   else if($memberType=="Presenter")
   {
            if(($job =='' ) || ($placeEmployed =='' ) || ($presenterDocs =='' )||($presenterPhoto ==''))
            {
               echo '<script language="javascript">';
     	       echo'alert("No entries can be left blank!")';
     	       echo '</script>';
		       header("Refresh:0; url=generalconference_reg.php");
            }
            else
            {
                $sql="INSERT INTO Register (Email, Type, Students, Photo, Documents, JobLocation, JobTitle) VALUES 
                ('$email', '$memberType', '$rand', '$presenterPhoto', '$presenterDocs', '$placeEmployed', '$job')";
                $result = $link->query($sql);

                if($result==true)
                {
                    echo '<script language="javascript">';
		            echo 'alert("Successful registration!")';
			        echo '</script>';
                }
                else
                {
                    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
                }
                header("Refresh:0; url=index.php");
            }
   }
   //"OTHERS" DATA INSERTION TO DATA BASE 
   else if($memberType=="Others")
   {
            if(($otherPhoto =='' ))
            {
                echo '<script language="javascript">';
 	            echo 'alert("No entries can be left blank!")';
 	            echo '</script>';
 	            header("Refresh:0; url=generalconference_reg.php");
            }
            else
            {
                $sql="INSERT INTO Register (Email, Type, Photo, Documents, JobTitle, JobLocation, Students) VALUES ('$email', '$memberType', 
                '$otherPhoto', '$rand', '$rand', '$rand', '$rand')";
                $result = $link->query($sql);

                if($result==true)
                {
                    echo '<script language="javascript">';
 	                echo 'alert("Successful registration!")';
 	                echo '</script>';
                }
                else
                {
                     echo "ERROR: Could not execute $sql. " . mysqli_error($link);
                }
                header("Refresh:0; url=index.php");
            }
    }    

   mysqli_close($link);
?>