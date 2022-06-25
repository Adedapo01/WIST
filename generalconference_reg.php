<!--
IDENTIFICATION:
Author - Gbenga Ojo
Filename - generalconference_reg.php
Due date - 04/19/2022
Date submitted - 04/19/2022

PROBLEM SPECFIFICATION:
This code is to create the "conference registration" webpage for the WIST conference registration web application, which displays the user interface to the users.

DESIGN:
Step 1: start a session for the WIST web application, and if user not logged in, redirect to the login page
Step 2: add the "WIST" logo to the top of the Page
Step 3: create a navigation bar and include webpage internal links to the "home", "profile", and "logout" webpages
Step 4: create a form that reads the user's inputs filled in the initial "general membership registration" page" and displays those inputs in the form as "readonly"
Step 5: The prefilled form includes first name, last name, institution, street 1, street 2, city, state, zip code, phone number and email.
Step 5: prompt the user on what type of member they are registering as, with "Advisor", "Presenter," and "Others" as the type of members.
Step 6: depending on the user's choice, display the respective form of the particular option selected and take in inputs as needed.
Step 7a: if the user selected "Advisor", display the following prompts: Student Names and School Logo, and collect inputs.
Step 7b: if the user selected "Presenter", display the following prompts: Your Photo, Supporting Documents, Place of Employment, and Job Title and collect inputs.
Step 7c: if the user selected "Others/Individuals", display the following prompt: Your Photo and collect input.
Step 8: using "confReg.php", verify user's inputs.
Step 9: if user inputs are what the program requires, store inputs in database and display a successful feedback message
Step 10: else if user inputs are not what program requires, display effective error message and redirect the user to fill up the input as required 
as the program requires. 

-->




<?php

require('databaseaccess.php');

?>


<?php

    session_start();

    if(!($_SESSION['user'])){ // if a user isn't logged in
        // exit();
        header("Location: login.php"); // Redirecting To login Page
    }

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <link rel="stylesheet" type="text/css" href="css/generalconference_reg.css">
    <title>WIST Layout</title>
</head>
<body>
    <table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
        <tbody>
            <tr align="center">
                <td>
                    <div class="cover">
                        <nav>
                            <a class="logo" href="index.html">
                                <img style="width: 304px; height: 125px; " alt="wistLogo" src="image/wist.png" alt="Logo">
                            </a>


                            <ul>
                                <br>
                                <br>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="logout.php">LogOut</a></li>
                            </ul>
                        </nav>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: rgb(255, 192, 203);">
                    <div class="header-words">
                        <p>CONFERENCE REGISTRATION</p>


                        <center>
                            <form name="Conference Registration" method="post" action="confPHP.php" enctype="multipart/form-data">
                                <div id="prompt">
                                    <label for="Fname"> First Name:</label>
                                    <input pattern="[a-zA-Z]*" type="text" class="inputForm" name="Fname" placeholder="eg. John" title="First Name" 
                                           readonly value="<?php echo $_SESSION['fname'] ?>"/>
                                    <br>
                                    <label for="Lname"> Last Name:</label>
                                    <input pattern="[a-zA-Z]*" type="text" class="inputForm" name="Lname" placeholder="eg. Doe" title="Last Name" 
                                           readonly value="<?php echo $_SESSION['lname'] ?>"/> 
                                    <br>
                                    <label for="Inst"> Institution:</label>
                                    <input type="text" class="inputForm" name="Inst" placeholder="eg. Mississippi Valley State University" title="Institution"
                                           readonly value="<?php echo $_SESSION['institution'] ?>"/>
                                    <br>
                                    <label for="Street1"> Street 1:</label>
                                    <input type="text" class="inputForm" name="Street" placeholder="eg. Wist Women Street " title="Street" 
                                           readonly value="<?php echo $_SESSION['street1'] ?>"/>
                                    <br>
                                    <label for="Street2"> Street 2:</label>
                                    <input type="text" class="inputForm" name="Street" placeholder="eg. Wist Women Street " title="Street" 
                                           readonly value="<?php echo $_SESSION['street2'] ?>"/>
                                    <br>

                                    <label for="City"> City:</label>
                                    <input type="text" class="shortInput" name="City" placeholder="eg. Itta Bena" title="City"
                                           readonly value="<?php echo $_SESSION['city'] ?>"/>
                                    &ensp;
                                    <label for="State"> State:</label>
                                    <input type="text" class="shortInput" name="State" placeholder="eg. Mississippi" title="State" 
                                           readonly value="<?php echo $_SESSION['state'] ?>"/>  <br>
                                    <label for="Zip"> Zip Code:</label>
                                    <input type="number" class="inputForm" name="Zip" placeholder=" eg. 12345 or 12345-6789" title="Zip Code" pattern=".{5,9}"
                                           readonly value="<?php echo $_SESSION['zipCode'] ?>"/>
                                    <br>
                                    <label for="Phone"> Phone number:</label>
                                    <input type="tel" class="inputForm" name="Phone" placeholder=" eg. 123-4567-890" title="Phone Number"
                                           readonly value="<?php echo $_SESSION['phoneNo'] ?>"/> 
                                    <br>
                                    <label for="
                                    email"> Email:</label>
                                    <input type="email" class="inputForm" name="email" placeholder=" eg. Janedoe@mvsu.edu" title="Email Address" 
                                           readonly value="<?php echo $_SESSION['email'] ?>"/> <br />


                                </div>
                                </center>

                                <?php $type=0; ?>

                                <center>
                                <div id="confPrompt">
                                    <p>
                                    <small><small><small><small><small<span style="color: black;">Are you registering as a/an?</span>
                                    </small></small></small></small></small></p>
                                    <label for="advisor">Advisor</label> 
                                    <input type="radio" name="user_type" title="Advisor" value ="1" /> &ensp; 
                                    <label for="presenter">Presenter</label>
                                    <input type="radio" name="user_type" title="Presenter" value="2" /> &ensp;
                                    <label for="others">Others</label>
                                    <input type="radio" name="user_type" title="Others" value="3" /> &ensp;
                                    <?php
                                        if($_GET['type']=="")
                                        {
                                            ?>
                                            <input type="submit" id="sub" name = "load-more" class ="click1" value="NEXT" title="Load More Info" />
                                            <?php
                                        }
                                    ?>
                                </div>
                                </center>
                            </form>
                                    <?php 
                                    if (isset($_GET['type']))
                                    {
                                       
                                        if($_GET['type'] == "1")
                                        {
                                            ?>
                                            <center>
                                            <form method="post" action="confReg.php" enctype="multipart/form-data">
                                                <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>">
                                                <input type="hidden" name="type" value='Advisor'>

                                                <div id="prompt">

                                                <label for="students">Student Names: </label>
                                                <textarea name="stdNames" rows="4" cols="50" title="Student Names"></textarea>
                                                <br><br>
                                                
                                                <label for="School Logo">School Logo: </label>
                                                <input type="url" class="inputForm" name="schImg" placeholder="link to shared doc/photos"
                                                title="School Logo"/>
                                                <br><br> 
                                                <a href="generalconference_reg.php" class="click">&laquo; PREVIOUS</a>
                                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                                <input type="submit" class ="click" name="reg" value="REGISTER" title="Submit From"/>
                                            </form> 
                                            </center>
                                            <?php
                                        }
                                        else if($_GET['type']=="2")
                                        {
                                            ?>
                                            <center>
                                            <form method="post" action="confReg.php" enctype="multipart/form-data">

                                                <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>">
                                                <input type="hidden" name="type" value='Presenter'>
                                                
                                                <div id="prompt">
                                                <label for="presenterPhoto">Your Photo: </label>
                                                <input type="url" class="inputForm" name="p_img" placeholder="link to shared docs/photos " title="Presenter Photo" />
                                                <br><br>

                                                <label for="presenterDocs">Supporting Documents: </label>
                                                <input type="url" class="inputForm"name="p_docs" placeholder="resume-shared doc link" 
                                                title="Presenter Documents"/>&ensp; 
                                                <br><br>


                                                <label for="placeEmployed">Place of Employment: </label>
                                                <input type="text" name="empPlace" class="inputForm" placeholder="name of company/institution" 
                                                title="Place of Employment" /> <br><br>

                                                <label for="jobTitle">Job Title: </label>
                                                <input type="text" name="jobTitle" class="inputForm" placeholder="name of job" title="Job Title" />
                                                <br><br>
                                                <a href="generalconference_reg.php" class="click">&laquo; PREVIOUS PAGE</a>
                                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                                <input type="submit" class ="click" name="reg" value="REGISTER" title="Submit From"/>
                                                </div>
                                            </form>
                                            </center>
                                            <?php
                                        }
                                        else if($_GET['type']=="3")
                                        {
                                           ?>
                                           <center>
                                           <form method="post" action="confReg.php" enctype="multipart/form-data">
                                               
                                                <input type="hidden" name="email" value="<?php echo $_SESSION['email']?>">
                                                <input type="hidden" name="type" value='Others'>

                                                <div id="prompt">
                                                <label for="individualPhoto">Your Photo: </label>
                                                <input type="url" class="inputForm"name="i_img" placeholder="link to shared doc/photos" 
                                                title="Individual Photo" />
                                                <br><br>
                                                <a href="generalconference_reg.php" class="click">&laquo; PREVIOUS PAGE</a>
                                                &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                                <input type="submit" class ="click" name="reg" value="REGISTER" title="Submit From"/>
                                                </center>
                                                </div>
                                           </form>
                                           </center>


                                           <?php
                                        }
                                    }
                                    ?>
                            </div> 
                        </center>
                    </div>
                </td>
            </tr>
        </tbody>
    </table><br>
</body>
</html>