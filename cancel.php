<?php
    $id = $_GET['id'];
    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "SELECT * FROM notices
                WHERE id = '$id'";

    $result = mysqli_query($connect, $userQuery);

    if (mysqli_num_rows($result) == 0) {
        print "No records were found with query $userQuery";
    }

    else {
        print "<input type='button' value='x' class = 'close_button' onclick='close_details();'>";
        while ($row = mysqli_fetch_assoc($result)) {
            print 
                "<p>Are you sure you want to cancel this?</p>" .
                "<input type='button' value='Yes.' class = 'buttons' onclick='delete_notice(" . $row['id'] . ");'>";
        }
        
    }

    mysqli_close($connect);
?>