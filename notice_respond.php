<?php
    $response = $_GET['q'];
    $id = $_GET['id'];
    $username = $_COOKIE['username'];

    $server = "localhost"; $user = "wbip"; $pw = "wbip123"; $db = "lost_and_found";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userQuery = "SELECT * FROM notices
                WHERE id = '$id'";

    $result = mysqli_query($connect, $userQuery); //Getting query of notice from NOTICES table.

    if (mysqli_num_rows($result) == 0) {
        print "No records were found with query $userQuery";
    } 
    else {
        while ($row = mysqli_fetch_assoc($result)) {
            $notice_user_id = $row['userid'];
            $notice_type = $row['notice_type'];

            //Inserting values into MESSAGES table.

            $messageQuery = "INSERT INTO messages (sender, receiver, response, notice_type) 
                        VALUES ('$username', '$notice_user_id', '$response', '$notice_type')";

            mysqli_query($connect, $messageQuery);

            print "<input type='button' value='x' class = 'close_button' onclick='close_details();'>";
            print "<h1>Response sent!</h1>" .
                "<p>The user has been informed and the query is cleared.</p>";

            $userQuery = "INSERT INTO completed_notices 
                        SELECT * FROM notices
                        WHERE id = '$id'";

            $result = mysqli_query($connect, $userQuery); //Adding to COMPLETED_NOTICES table.

            $userQuery = "DELETE FROM notices 
                        WHERE id = '$id'";

            $result = mysqli_query($connect, $userQuery); //Deleting from NOTICES table.

            $userQuery = "UPDATE users 
                        SET responses = responses + 1
                        WHERE userid = '$username'";

            mysqli_query($connect, $userQuery);
        }

        
        mysqli_close($connect);
    }
?>