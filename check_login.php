<?php
    $username = $_COOKIE['username'];
    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $userQuery = "SELECT * FROM users
                WHERE userid = '$username'";
 
    $result = mysqli_query($connect, $userQuery);

    while(mysqli_fetch_assoc($result)) {
        print $row['user_type'];
    }
    
?>