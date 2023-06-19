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
            print "<h1> Title: " . $row['title'] . " </h1>" .
                "<p>User: " . $row['userid'] . "</p>" .
                "<p>Type: " . ucfirst($row['notice_type']) . "</p>" .
                "<p>Description: " . $row['item_desc'] . "</p>" .
                "<p>Date lost: " . $row['date_lost'] . "</p>" .
                "<p>Venue: " . $row['venue'] . "</p>" .
                "<p>Is this your item? Write down your response!</p>" .
                "<input type='text' class = 'input' size = '50' id = 'response'><br>" .
                "<input type='button' value='Respond' class = 'buttons' onclick='notice_respond(" . $row['id'] . ");'>";
        }
        
    }

    mysqli_close($connect);
?>