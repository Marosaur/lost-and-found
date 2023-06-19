<?php
    $userid = $_GET['id'];
    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "SELECT * FROM notices
                WHERE userid = '$userid'";

    $result = mysqli_query($connect, $userQuery);

    if (mysqli_num_rows($result) == 0) {
        $userQuery = "SELECT * FROM completed_notices
                WHERE userid = '$userid'";

        $result = mysqli_query($connect, $userQuery);

        if (mysqli_num_rows($result) == 0) {
            print "none";
        }
        else {
            print "found";
        }
    }
    else {
        print "found";
    }

    mysqli_close($connect);
?>