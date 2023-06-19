<?php
    $username = $_COOKIE['username'];
    $type = $_GET['t'];
    $date = $_GET['da'];
    $venue = $_GET['v'];
    $contact = $_GET['c'];
    $title = $_GET['ti'];
    $description = $_GET['d'];

    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "INSERT INTO notices (userid, notice_type, date_lost, venue, contact, title, item_desc) 
                    VALUES('$username', '$type', '$date', '$venue', '$contact', '$title', '$description')";

    mysqli_query($connect, $userQuery);

    $userQuery = "UPDATE users
                 SET notices = notices + 1
                 WHERE userid = '$username'";

    mysqli_query($connect, $userQuery);

    print "<h1>Notice created.</h1>" . "<input type='button' value='Okay' class = 'buttons' onclick='close_details();'>";
?>