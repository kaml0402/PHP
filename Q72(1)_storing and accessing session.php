<?php
    // Starting session
    session_start();
     
    // Storing Session Variables
    $_SESSION["firstname"] = "Kamal";
    $_SESSION["lastname"] = "Mittal";
    
    // Accessing Session Variables
    echo "First name is " . $_SESSION["firstname"] . "<br>";
    echo "Last name is " . $_SESSION["lastname"] . "<br>";

    // Displaying session storage information
    echo "Session is stored at: " . session_save_path() . "<br>";
    echo "Session ID is: " . session_id() . "<br>";

    echo "<br>This code is executed by Kamal Mittal!";
?>
