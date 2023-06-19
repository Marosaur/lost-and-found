<?php
    $username = $_GET['u'];
    $password = $_GET['p'];

    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "SELECT * FROM users
                WHERE userid = '$username'";

    $result = mysqli_query($connect, $userQuery);

    if (mysqli_num_rows($result) == 0) {
        print "No user ID found.";
    } else {
        $userQuery = "UPDATE users
                 SET pw = '$password'
                 WHERE userid = '$username'";

        mysqli_query($connect, $userQuery);
    }   
?>