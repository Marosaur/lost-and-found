<?php
    $username = $_GET['u'];
    $nickname = $_GET['n'];
    $email = $_GET['e'];
    $gender = $_GET['g'];
    $birthday = $_GET['b'];
    $password = $_GET['p'];

    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "INSERT INTO users (userid, nickname, email, gender, birthday, user_type, pw) 
                    VALUES('$username', '$nickname', '$email', '$gender', '$birthday', 'user', '$password')";

    mysqli_query($connect, $userQuery);

    setcookie("username", $username, time() + (60 * 60 * 24) , '/');
    
    print "done";
?>