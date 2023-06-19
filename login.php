<?php
    $username = $_GET['username'];
    $password = $_GET['password'];
    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $userQuery = "SELECT userid, pw, user_type FROM users
    WHERE userid = '$username' and pw = '$password'";
    $result = mysqli_query($connect, $userQuery);
    if (!$result) {
        die("Could not successfully run query.");
    }
    if (mysqli_num_rows($result) == 0) {
        print 'wrong';
    }else {
        $userInformation = mysqli_fetch_assoc($result);

        setcookie("username", $username, time() + (60 * 60 * 24) , '/');
        if ($userInformation['user_type'] == 'user') { 
            print 'user';
        }
        else {
            if ($userInformation['user_type'] == 'admin') {
                print 'admin';
            }
        }
    }
    mysqli_close($connect);
?>